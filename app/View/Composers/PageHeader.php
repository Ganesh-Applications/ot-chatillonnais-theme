<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Post;
use WP_Post_Type;
use WP_Term;

/**
 * Données du header de page
 *
 * Le template reçoit toujours les mêmes variables :
 * $title, $description et $image
 *
 * Pour un cas particulier, ajouter une branche avant le cas général, ex. :
 * $object instanceof WP_Post && $object->post_type === 'hotel' => [...],
 */
class PageHeader extends Composer
{
    protected static $views = [
        'partials.page-header',
    ];

    public function with(): array
    {
        $object = get_queried_object();

        $data = [
            'title' => null,
            'description' => null,
            'image' => null
        ];

        if ($object instanceof WP_Term)
        {
            $data['title'] = $object->name;
            $data['description'] = term_description($object);
            $data['image'] = get_field('image', $object)['ID'] ?? null;
        }
        else if ($object instanceof WP_Post_Type)
        {
            $data['title'] = $object->label;
            $data['description'] = $object->description;
        }

        return $data;
    }
}
