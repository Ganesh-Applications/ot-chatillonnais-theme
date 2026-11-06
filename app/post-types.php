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
            $taxonomies[$name] = $args + ['post_types' => [$config['name']]];
        }
    }

    $taxonomies = array_merge($taxonomies, require "{$dir}/shared.php");

    //-> Les taxonomies après les post types, pour pouvoir les y rattacher
    foreach ($taxonomies as $name => $args) {
        $post_types = $args['post_types'];

        //-> 'slug' est un raccourci pour 'rewrite' => ['slug' => …]
        if (isset($args['slug'])) {
            $args['rewrite'] = ['slug' => $args['slug']];
        }

        unset($args['post_types'], $args['slug']);

        register_taxonomy($name, $post_types, array_merge($taxonomy_defaults, $args));
    }
}
