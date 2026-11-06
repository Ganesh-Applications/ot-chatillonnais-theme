<?php

/**
 * Taxonomies communes à plusieurs post types.
 * Ajouter un post type dans 'post_types' pour lui rattacher la taxonomie.
 */
return [
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
