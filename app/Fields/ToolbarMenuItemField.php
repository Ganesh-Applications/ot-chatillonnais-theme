<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class ToolbarMenuItemField extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('toolbar_menu_item_field');

        $fields
            ->setLocation('nav_menu_item', '==', 'location/toolbar')
            ->addImage('icon', [
                'label' => 'Icône',
                'return_format' => 'id'
            ]);

        return $fields->build();
    }
}
