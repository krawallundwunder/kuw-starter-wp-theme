<?php

namespace Flynt\Components\ModulContactLocation;

use Timber\Timber;

// Hook für Component Data
add_filter('Flynt/addComponentData?name=ModulContactLocation', function ($data) {
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'modulContactLocation',
        'label' => 'Modul: Kontakt & Standorte',
        'sub_fields' => [
            // Kontakt Tab
            [
                'label' => __('Kontakt Section', 'flynt'),
                'name' => 'contactTab',
                'type' => 'tab',
            ],
            [
                'label' => 'Überschrift Kontakt',
                'name' => 'contactHeading',
                'type' => 'text',
                'default_value' => 'Kontakt aufnehmen',
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => 'Beschreibung Kontakt',
                'name' => 'contactDescription',
                'type' => 'textarea',
                'rows' => 3,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Button', 'flynt'),
                'instructions' => __('Hier kannst du einen Button hinzufügen', 'flynt'),
                'name' => 'button',
                'type' => 'link',
                'return_format' => 'array',
            ],
            [
                'label' => 'Kontaktbereiche',
                'name' => 'contactAreas',
                'type' => 'repeater',
                'min' => 0,
                'max' => 6,
                'layout' => 'block',
                'button_label' => 'Kontaktbereich hinzufügen',
                'sub_fields' => [
                    [
                        'label' => 'Titel',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 0,
                        'wrapper' => ['width' => '100'],
                    ],
                    [
                        'label' => 'E-Mail',
                        'name' => 'email',
                        'type' => 'email',
                        'required' => 0,
                        'wrapper' => ['width' => '50'],
                    ],
                    [
                        'label' => 'Telefon',
                        'name' => 'phone',
                        'type' => 'text',
                        'required' => 0,
                        'wrapper' => ['width' => '50'],
                    ],
                    [
                        'label' => 'Link zum Kontaktformular',
                        'name' => 'formLink',
                        'type' => 'link',
                        'return_format' => 'array',
                        'required' => 0,
                        'wrapper' => ['width' => '100'],
                    ],
                ],
            ],

            // Standorte Tab
            [
                'label' => 'Standorte Section',
                'name' => 'locationsTab',
                'type' => 'tab',
            ],
            [
                'label' => 'Überschrift Standorte',
                'name' => 'locationsHeading',
                'type' => 'text',
                'default_value' => 'Unsere Standorte',
                'wrapper' => ['width' => '50'],
            ],
            [
                'label' => 'Beschreibung Standorte',
                'name' => 'locationsDescription',
                'type' => 'textarea',
                'rows' => 3,
                'wrapper' => ['width' => '50'],
            ],
            [
                'label' => 'Standorte',
                'name' => 'locations',
                'type' => 'repeater',
                'min' => 0,
                'max' => 12,
                'layout' => 'block',
                'button_label' => 'Standort hinzufügen',
                'sub_fields' => [
                    [
                        'label' => 'Standort-Name',
                        'name' => 'city',
                        'type' => 'text',
                        'instructions' => 'z.B. "Hauptsitz Dresden" oder "Niederlassung Berlin"',
                        'required' => 0,
                        'wrapper' => ['width' => '100'],
                    ],
                    [
                        'label' => 'Straße',
                        'name' => 'street',
                        'type' => 'text',
                        'required' => 0,
                        'wrapper' => ['width' => '100'],
                    ],
                    [
                        'label' => 'PLZ',
                        'name' => 'zip',
                        'type' => 'text',
                        'required' => 0,
                        'wrapper' => ['width' => '33.33'],
                    ],
                    [
                        'label' => 'Stadt',
                        'name' => 'cityName',
                        'type' => 'text',
                        'required' => 0,
                        'wrapper' => ['width' => '33.33'],
                    ],
                    [
                        'label' => 'Land (optional)',
                        'name' => 'country',
                        'type' => 'text',
                        'required' => 0,
                        'wrapper' => ['width' => '33.33'],
                    ],
                    [
                        'label' => 'Google Maps Link (optional)',
                        'name' => 'mapLink',
                        'type' => 'url',
                        'required' => 0,
                    ],
                ],
            ],

            // Design Tab
            [
                'label' => 'Design',
                'name' => 'designTab',
                'type' => 'tab',
            ],
            [
                'label' => 'Kontakt-Layout',
                'name' => 'contactLayout',
                'type' => 'select',
                'choices' => [
                    '2' => '2 Spalten',
                    '3' => '3 Spalten',
                    '4' => '4 Spalten',
                ],
                'default_value' => '2',
                'wrapper' => ['width' => '33.33'],
            ],
            [
                'label' => 'Standort-Layout',
                'name' => 'locationsLayout',
                'type' => 'select',
                'choices' => [
                    '2' => '2 Spalten',
                    '3' => '3 Spalten',
                    '4' => '4 Spalten',
                ],
                'default_value' => '2',
                'wrapper' => ['width' => '33.33'],
            ],
        ],
    ];
}
