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
                'instructions' => 'Kleines Label zur Kategorisierung',
                'maxlength' => 50,
            ],
            [
                'label' => 'Titel',
                'name' => 'title',
                'type' => 'text',
                'instructions' => 'Haupttitel des Moduls',
            ],
            [
                'label' => 'Beschreibung',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 4,
                'instructions' => 'Einleitender Beschreibungstext',
            ],
            [
                'label' => 'Buttons',
                'name' => 'buttons',
                'type' => 'repeater',
                'min' => 0,
                'max' => 2,
                'layout' => 'block',
                'button_label' => 'Button hinzufügen',
                'sub_fields' => [
                    [
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'link',
                        'return_format' => 'array',
                    ],
                    [
                        'label' => 'Style',
                        'name' => 'style',
                        'type' => 'select',
                        'choices' => [
                            'primary' => 'Primary',
                            'secondary' => 'Secondary',
                        ],
                        'default_value' => 'primary',
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
                        'instructions' => 'Optional: Bild für die Card',
                    ],
                    [
                        'label' => 'Titel',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => 'Optional: Titel der Card',
                    ],
                    [
                        'label' => 'Beschreibung',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 4,
                        'maxlength' => 200,
                        'instructions' => 'Optional: Beschreibung der Card',
                    ],
                    [
                        'label' => 'Button',
                        'name' => 'button',
                        'type' => 'link',
                        'return_format' => 'array',
                        'instructions' => 'Optional: Button/Link der Card',
                    ],
                ],
            ],
        ],
    ];
}
