<?php

namespace Flynt\Components\ModulCardsRepeater;

use Flynt\FieldVariables;


function getACFLayout()
{
    return [
        'name' => 'ModulCardsRepeater',
        'label' => 'Modul: Cards Repeater',
        'sub_fields' => [
            [
                'label' => 'Tag',
                'name' => 'tag',
                'type' => 'text',
                'instructions' => __('Füge ein Tag hinzu', 'flynt'),
                'maxlength' => 50,
            ],
            [
                'label' => 'Titel',
                'name' => 'title',
                'type' => 'text',
                'instructions' => __('Füge einen Haupttitel hinzu', 'flynt'),
            ],
            [
                'label' => 'Beschreibung',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 4,
                'instructions' => __('Füge einen einleitenden Beschreibungstext hinzu', 'flynt'),
            ],
            [
                'label' => __('Call-to-Action (CTA)', 'flynt'),
                'name' => 'ctaButtons',
                'type' => 'repeater',
                'min' => 0,
                'max' => 2,
                'layout' => 'row',
                'button_label' => __('Button hinzufügen', 'flynt'),
                'instructions' => __('Max. 2 Buttons (1. Button = Primary, 2. Button = Secondary)', 'flynt'),
                'sub_fields' => [
                    [
                      'label' => __('Button Link', 'flynt'),
                      'name' => 'button',
                      'type' => 'link',
                      'instructions' => __('Fügen Sie eine Call-to-Action-Schaltfläche hinzu.', 'flynt'),
                      'return_format' => 'array',
                    ],
                ],
            ],
            [
                'label' => 'Cards',
                'name' => 'cards',
                'type' => 'repeater',
                'min' => 1,
                'layout' => 'block',
                'button_label' => 'Card hinzufügen',
                'sub_fields' => [
                    [
                        'label' => 'Bild',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'preview_size' => 'medium',
                        'instructions' => __('Optional: Bild für die Card', 'flynt'),
                    ],
                    [
                        'label' => 'Titel',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => __('Optional: Titel der Card', 'flynt'),
                    ],
                    [
                        'label' => 'Beschreibung',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 4,
                        'maxlength' => 200,
                        'instructions' => __('Optional: Beschreibung der Card', 'flynt'),
                    ],
                    [
                      'label' => __('Button Link', 'flynt'),
                      'name' => 'button',
                      'type' => 'link',
                      'instructions' => __('Fügen Sie eine Call-to-Action-Schaltfläche hinzu.', 'flynt'),
                      'return_format' => 'array',
                    ],
                ],
            ],
        ],
    ];
}
