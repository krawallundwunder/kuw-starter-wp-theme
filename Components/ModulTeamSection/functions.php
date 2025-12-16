<?php

namespace Flynt\Components\ModulTeamSection;

use Flynt\FieldVariables;

add_filter('Flynt/addComponentData?name=ModulTeamSection', function ($data) {
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'modulTeamSection',
        'label' => 'Moddul: Team Section',
        'sub_fields' => [
            [
                'label' => 'Überschrift',
                'name' => 'headingTab',
                'type' => 'tab',
            ],
            [
                'label' => 'Hauptüberschrift',
                'name' => 'heading',
                'type' => 'text',
                'default_value' => 'Lernen Sie unser Team kennen',
                'wrapper' => [
                    'width' => 100
                ],
            ],
            [
                'label' => 'Beschreibung',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'We\'re a dynamic group of individuals who are passionate about what we do and dedicated to delivering the best results for our clients.',
                'wrapper' => [
                    'width' => 100
                ],
            ],
            [
                'label' => 'Team-Mitglieder',
                'name' => 'teamMembersTab',
                'type' => 'tab',
            ],
            [
                'label' => 'Team-Mitglieder',
                'name' => 'teamMembers',
                'type' => 'repeater',
                'min' => 1,
                'layout' => 'block',
                'button_label' => 'Mitglied hinzufügen',
                'sub_fields' => [
                    [
                        'label' => 'Profilbild',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'wrapper' => [
                            'width' => 33.33
                        ],
                    ],
                    [
                        'label' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 33.33
                        ],
                    ],
                    [
                        'label' => 'Position',
                        'name' => 'position',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 33.33
                        ],
                    ],
                    [
                        'label' => 'Twitter/X URL',
                        'name' => 'twitterUrl',
                        'type' => 'url',
                        'wrapper' => [
                            'width' => 50
                        ],
                    ],
                    [
                        'label' => 'LinkedIn URL',
                        'name' => 'linkedinUrl',
                        'type' => 'url',
                        'wrapper' => [
                            'width' => 50
                        ],
                    ],
                ],
            ],
        ],
    ];
}
