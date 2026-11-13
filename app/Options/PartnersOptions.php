<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class PartnersOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Partenaires';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Partenaires| Options';

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
        $fields = Builder::make('partners_options');

        $fields
            ->addRepeater('partners', [
                'label' => 'Partenaires',
                'button_label' => 'Ajouter un partenaire',
            ])
                ->addText('name', ['label' => 'Nom'])
                ->addImage('logo', ['label' => 'Logo'])
            ->endRepeater();

        return $fields->build();
    }
}
