<?php

namespace App\View\Composers;

use Log1x\Navi\Navi;
use Roots\Acorn\View\Composer;

class Footer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.footer',
    ];

    /**
     * Data to be passed to view before rendering.
     */
    public function with(): array
    {
        $leftNav = Navi::make()->build('footer_left');
        $rightNav = Navi::make()->build('footer_right');

        return [
            'leftNav' => $leftNav->all(),
            'rightNav' => $rightNav->all(),

            //-- Champ acf de la page d'options "Coordonnées"
            'contacts' => get_field('contacts', 'option') ?: [],
            'address'  => get_field('address', 'option') ?: null,

            //-- Champ acf de la page d'options "Partenaires"
            'partners' => get_field('partners', 'option') ?: [],
        ];
    }
}
