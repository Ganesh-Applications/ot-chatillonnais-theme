<?php

/**
 * Post type « hotel » et ses taxonomies propres.
 * Les taxonomies communes à plusieurs post types sont dans shared.php.
 */
return [
    'name' => 'hotel',
    'args' => [
        'label'           => 'Hôtels',
        'menu_icon'       => 'dashicons-building',
        'rewrite'         => ['slug' => 'hotels'],
        'tourinsoft_flux' => 'https://api-v3.tourinsoft.com/api/syndications/decibelles-data.tourinsoft.com/4c217a6e-d281-4747-a0a4-567cdd4f0e95?format=json',
    ],
    'taxonomies' => [
        'hotel_type' => [
            'label' => "Types d'hébergement",
            'slug'  => 'hotel-types',
        ],
        'hotel_rating' => [
            'label' => 'Classements',
            'slug'  => 'hotel-ratings',
        ],
    ],
];
