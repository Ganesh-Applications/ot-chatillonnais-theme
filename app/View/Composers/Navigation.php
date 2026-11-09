<?php

namespace App\View\Composers;

use Log1x\Navi\Navi;
use Roots\Acorn\View\Composer;

class Navigation extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.header',
    ];

    /**
     * Data to be passed to view before rendering.
     */
    public function with(): array
    {
        $navigation = Navi::make()->build('primary_navigation');

        return [
            'primaryNavigation' => $navigation->all(),
            'primaryNavigationName' => $navigation->get('name', __('Navigation principale', 'ot-chatillonnais')),
        ];
    }
}
