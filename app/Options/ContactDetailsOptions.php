<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class ContactDetailsOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Coordonnées';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Coordonnées | Options';

    /**
     * The option page menu position.
     *
     * @var int
     */
    public $position = 0;

    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('contact_details_options');

        $fields
            ->addFlexibleContent('contacts',[
                'Label' => 'Coordonnées',
                'button_label' => 'Ajouter'
            ])
                ->addLayout('simple_text', ['label' => 'Texte simple'])
                    ->addText('text', ['label' => 'Texte'])
                ->addLayout('link', ['label' => 'Lien'])
                    ->addLink('link', ['label' => 'Lien'])
            ->endFlexibleContent()

            ->addGoogleMap('address', [
                'label' => 'Adresse',
                'required' => true,
            ]);

        return $fields->build();
    }
}
