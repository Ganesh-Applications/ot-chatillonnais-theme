<?php

namespace App\View\Composers;

use Log1x\Navi\Navi;
use Roots\Acorn\View\Composer;

class Toolbar extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.toolbar',
    ];

    /**
     * Data to be passed to view before rendering.
     */
    public function with(): array
    {
        $items = collect(Navi::make()->build('toolbar')->all());

        foreach ($items as $item)
        {
            //-- Récupére l'image depuis le champs acf
            $imageId = get_field('icon', $item->id);
            $item->icon = $imageId;
        }

        return [
            'items' => $items
        ];
    }
}
