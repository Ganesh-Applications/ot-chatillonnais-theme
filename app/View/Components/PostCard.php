<?php

namespace App\View\Components;

use Illuminate\View\Component;
use WP_Post;

/**
 * Carte de contenu utilisée dans les listes (archives, « Vous aimerez aussi »…).
 *
 * Tous les post types affichés en carte partagent les mêmes champs ACF :
 * photos, description, address.
 */
class PostCard extends Component
{
    public string $title;

    public string $url;

    public ?int $imageId;

    public string $type;

    public ?string $location;

    public string $excerpt;

    public function __construct(
        public WP_Post $post,
        public bool $favorite = false,
    )
    {
        $this->title = get_field('name', $post->ID) ?: '';
        $this->url = get_permalink($post);
        $this->type = get_post_type_object($post->post_type)->labels->singular_name;
        $this->location = get_field('address', $post->ID)['city'] ?? null;
        $this->excerpt = wp_trim_words(get_field('description', $post->ID) ?: '', 20, ' …');

        $photos = get_post_meta($post->ID, 'photos', true);
        $this->imageId = ! empty($photos[0]) ? (int) $photos[0] : null;
    }

    public function render()
    {
        return view('components.post-card');
    }
}
