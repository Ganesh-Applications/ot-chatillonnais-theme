<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class CategoryField extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('category_field');

        $fields
            ->setLocation('taxonomy', '==', 'category');

        $fields
            ->addImage('image');

        return $fields->build();
    }
}
