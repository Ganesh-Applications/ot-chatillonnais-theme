<?php

/**
 * Enregistre les post types et taxonomies décrits dans app/PostTypes/.
 *
 * - Un fichier par post type (ex. event.php) : le post type et ses taxonomies propres.
 * - shared.php : les taxonomies communes à plusieurs post types.
 *
 * Seuls les réglages qui changent sont écrits dans ces fichiers,
 * les valeurs par défaut sont définies ici.
 */

add_action('init', 'otc_custom_post_types');

function otc_custom_post_types()
{
    $dir = __DIR__ . '/PostTypes';

    $post_type_defaults = [
        'public'       => true,
        'has_archive'  => true,
        'supports'     => ['title', 'thumbnail'], //-> Sans Gutenberg
        'show_in_rest' => true,
    ];

    $taxonomy_defaults = [
        'public'       => true,
        'hierarchical' => false,
        'show_in_rest' => true,
    ];

    //-> [nom de la taxonomie] => [réglages, post types]
    $taxonomies = [];

    foreach (glob("{$dir}/*.php") as $file) {
        if (basename($file) === 'shared.php') continue;

        $config = require $file;

        register_post_type($config['name'], array_merge($post_type_defaults, $config['args']));

        foreach ($config['taxonomies'] ?? [] as $name => $args) {
            $taxonomies[$name] = otc_merge_taxonomy($taxonomies[$name] ?? [], $args + ['post_types' => [$config['name']]]);
        }
    }

    foreach (require "{$dir}/shared.php" as $name => $args) {
        $taxonomies[$name] = otc_merge_taxonomy($taxonomies[$name] ?? [], $args);
    }

    //-> Les taxonomies après les post types, pour pouvoir les y rattacher
    foreach ($taxonomies as $name => $args) {
        $post_types = $args['post_types'];

        //-> Taxonomie déjà existante (native comme 'category' ou 'post_tag', ou d'un plugin) :
        //   on la rattache aux post types sans la ré-enregistrer, ses réglages restent intacts
        if (taxonomy_exists($name)) {
            foreach ($post_types as $post_type) {
                register_taxonomy_for_object_type($name, $post_type);
            }
            continue;
        }

        //-> 'slug' est un raccourci pour 'rewrite' => ['slug' => …]
        if (isset($args['slug'])) {
            $args['rewrite'] = ['slug' => $args['slug']];
        }

        unset($args['post_types'], $args['slug']);

        register_taxonomy($name, $post_types, array_merge($taxonomy_defaults, $args));
    }
}

/**
 * Fusionne deux déclarations d'une même taxonomie (ex. dans hotel.php et shared.php) :
 * les post types s'additionnent, les autres réglages de la seconde l'emportent.
 */
function otc_merge_taxonomy(array $current, array $new): array
{
    $post_types = array_merge($current['post_types'] ?? [], $new['post_types'] ?? []);

    return ['post_types' => array_values(array_unique($post_types))] + $new + $current;
}

/**
 * Sur les archives de catégorie et d'étiquette, WordPress n'affiche que les articles ('post').
 * On y inclut tous les post types rattachés à la taxonomie (ex. 'hotel' via shared.php).
 */
add_action('pre_get_posts', function (WP_Query $query) {
    if (is_admin() || ! $query->is_main_query()) return;
    if (! $query->is_category() && ! $query->is_tag()) return;
    if ($query->get('post_type')) return; //-> post type déjà forcé ailleurs (ex. ?post_type=…)

    $taxonomy = $query->is_category() ? 'category' : 'post_tag';

    $query->set('post_type', get_taxonomy($taxonomy)->object_type);
});
