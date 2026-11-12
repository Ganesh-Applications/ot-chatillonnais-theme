<?php

/**
 * Taxonomies communes à plusieurs post types.
 * Ajouter un post type dans 'post_types' pour lui rattacher la taxonomie.
 *
 * Une taxonomie qui existe déjà (native comme 'category' / 'post_tag', ou d'un plugin)
 * n'est pas ré-enregistrée : elle est seulement rattachée aux post types.
 * Seul 'post_types' est pris en compte, ses autres réglages sont ignorés.
 */
return [
    //-- Rubrique du site dans laquelle le post va être affiché (taxonomie native)
    'category' => [
        'post_types' => ['hotel'],
    ],


    'language' => [
        'label'      => 'Langues parlées',
        'slug'       => 'languages',
        'post_types' => ['hotel'],
    ],
    'equipment' => [
        'label'      => 'Équipements',
        'slug'       => 'equipments',
        'post_types' => ['hotel'],
    ],
    'service' => [
        'label'      => 'Services',
        'slug'       => 'services',
        'post_types' => ['hotel'],
    ],
    'payment_method' => [
        'label'      => 'Modes de paiement',
        'slug'       => 'payment-methods',
        'post_types' => ['hotel'],
    ],
];
