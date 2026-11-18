<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class HeaderMenuItemField extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('header_menu_item_field');

        $fields
            ->setLocation('nav_menu_item', '==', 'location/primary_navigation');

        $fields
            ->addTrueFalse('display_as_tag', [
                'label' => 'Afficher comme une étiquette',
                'ui' => true
            ])
            ->addGroup('tag', ['label' => 'Étiquette'])
                ->conditional('display_as_tag', '==', '1')

                ->addImage('icon', [
                    'label' => 'Icône',
                    'return_format' => 'id'
                ])
            ->endGroup()
        ;

        return $fields->build();
    }
}
