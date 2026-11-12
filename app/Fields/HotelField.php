<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class HotelField extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('hotel_field');

        $fields
            ->setLocation('post_type', '==', 'hotel');

        $fields
            ->addText('name', [
                'label' => 'Nom',
                'required' => true,
                'tourinsoft_path' => 'SyndicObjectName',
            ])
            ->addTextarea('description', [
                'label' => 'Description',
                'tourinsoft_path' => 'DESCRIPTIFs.0.Descriptioncommerciale',
            ])

            ->addTaxonomy('category', [
                'label' => "Catégorie",
                'taxonomy' => 'category',
                'field_type' => 'select',
                'save_terms' => 1,
                'load_terms' => 1,
                //-- @todo changer ce path une fois que le flux sera mis à jour
                'tourinsoft_path' => 'TYPEHEBERGEMENT',
            ])
            ->addTaxonomy('hotel_type', [
                'label' => "Type d'hébergement",
                'taxonomy' => 'hotel_type',
                'field_type' => 'select',
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'TYPEHEBERGEMENT',
            ])
            ->addTaxonomy('hotel_rating', [
                'label' => 'Classement',
                'taxonomy' => 'hotel_rating',
                'field_type' => 'select',
                'allow_null' => 1,
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'CLASSEMENTs',
            ])
            ->addNumber('rooms', [
                'label' => 'Nombre de chambres',
                'tourinsoft_path' => 'NBRECHAMBRES',
            ])
            ->addTrueFalse('pets_allowed', [
                'label' => 'Animaux acceptés',
                'ui' => 1,
                'tourinsoft_path' => 'ANIMAUXACCEPTES',
            ])
            ->addTrueFalse('disabled_access', [
                'label' => 'Accessible aux personnes handicapées',
                'ui' => 1,
                'tourinsoft_path' => 'PERSONNEHANDICAPEEs.0.Personnehandicapee',
            ])

            ->addGallery('photos', [
                'label' => 'Photos',
                'tourinsoft_path' => 'PHOTOSs',
                'tourinsoft_url_path' => 'Photo.Url',
                'tourinsoft_legend_path' => 'Photo.Credit',
                'tourinsoft_description_path' => 'Descriptionphoto',
            ])

            ->addGroup('address', [
                'label' => 'Adresse',
            ])
                ->addText('street', [
                    'label' => 'Adresse',
                    'tourinsoft_path' => 'ADRESSE1',
                ])
                ->addText('postal_code', [
                    'label' => 'Code postal',
                    'tourinsoft_path' => 'CODEPOSTAL',
                ])
                ->addText('city', [
                    'label' => 'Commune',
                    'tourinsoft_path' => 'COMMUNE',
                ])
                ->addText('latitude', [
                    'label' => 'Latitude',
                    'tourinsoft_path' => 'GmapLatitude',
                ])
                ->addText('longitude', [
                    'label' => 'Longitude',
                    'tourinsoft_path' => 'GmapLongitude',
                ])
            ->endGroup()

            ->addRepeater('contacts', [
                'label' => 'Moyens de contact',
                'tourinsoft_path' => 'MOYENSDECOMMUNICATIONs',
            ])
                ->addText('type', [
                    'label' => 'Type',
                    'tourinsoft_path' => 'TypedaccesTelecom.ThesLibelle',
                ])
                ->addText('code', [
                    'label' => 'Code',
                    'tourinsoft_path' => 'TypedaccesTelecom.ThesCode',
                ])
                ->addText('value', [
                    'label' => 'Coordonnée',
                    'tourinsoft_path' => 'CoordonneesTelecom',
                ])
            ->endRepeater()

            ->addTaxonomy('equipments', [
                'label' => 'Équipements',
                'taxonomy' => 'equipment',
                'field_type' => 'checkbox',
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'EQUIPEMENTSs',
            ])

            ->addTaxonomy('services', [
                'label' => 'Services',
                'taxonomy' => 'service',
                'field_type' => 'checkbox',
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'SERVICESs',
            ])

            ->addRepeater('comforts', [
                'label' => 'Confort',
                'tourinsoft_path' => 'CONFORTs',
            ])
                ->addText('label', [
                    'label' => 'Libellé',
                    'tourinsoft_path' => 'ThesLibelle',
                ])
            ->endRepeater()

            ->addTaxonomy('languages', [
                'label' => 'Langues parlées',
                'taxonomy' => 'language',
                'field_type' => 'checkbox',
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'LANGUESPARLEESs',
            ])

            ->addTaxonomy('payment_methods', [
                'label' => 'Modes de paiement',
                'taxonomy' => 'payment_method',
                'field_type' => 'checkbox',
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'MODEPAIEMENTs',
            ])
        ;

        return $fields->build();
    }
}
