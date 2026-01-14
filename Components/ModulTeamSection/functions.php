<?php

namespace Flynt\Components\ModulTeamSection;


add_filter('Flynt/addComponentData?name=ModulTeamSection', function ($data) {
  return $data;
});

function getACFLayout()
{
  return [
    'name' => 'modulTeamSection',
    'label' => 'Modul: Team Sektion',
    'sub_fields' => [
      [
        'label' => __('Inhalt', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
      ],
      [
        'label' => __('Tagline', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'maxlength' => 20,
        'instructions' => __('Kurzer Tag über dem Titel (z. B. „Unser Team", „Über uns", „Die Köpfe" (max. 20 Zeichen)).', 'flynt'),
      ],
      [
        'label' => __('Titel', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'maxlength' => 50,
        'instructions' => __('Titel des Inhalts. Kurz, klar und aussagekräftig (max. 50 Zeichen).', 'flynt'),
      ],
      [
        'label' => __('Beschreibung', 'flynt'),
        'name' => 'description',
        'type' => 'textarea',
        'maxlength' => 750,
        'id' => 'input',
        'instructions' => __('Beschreibung oder Einleitungstext zum Inhalt (max. 750 Zeichen).', 'flynt'),
      ],
      [
        'label' => __('Team-Mitglieder', 'flynt'),
        'name' => 'teamMembers',
        'type' => 'repeater',
        'instructions' => __('Füge Team-Mitglieder hinzu (mind. 1).', 'flynt'),
        'min' => 1,
        'layout' => 'block',
        'button_label' => __('Neues Team-Mitglied', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Profilbild', 'flynt'),
            'name' => 'image',
            'type' => 'image',
            'instructions' => __('Optional', 'flynt'),
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'wrapper' => [
              'width' => '33.33%'
            ],
          ],
          [
            'label' => __('Name', 'flynt'),
            'name' => 'name',
            'type' => 'text',
            'instructions' => __('Optional', 'flynt'),
            'wrapper' => [
              'width' => '33.33%'
            ],
          ],
          [
            'label' => __('Position', 'flynt'),
            'name' => 'position',
            'type' => 'text',
            'instructions' => __('Optional', 'flynt'),
            'wrapper' => [
              'width' => '33.33%'
            ],
          ],
          [
            'label' => __('Social Media URL Nr. 1', 'flynt'),
            'name' => 'twitterUrl',
            'type' => 'url',
            'instructions' => __('Optional: z.B. Twitter/X Profil-URL', 'flynt'),
            'wrapper' => [
              'width' => '50%'
            ],
          ],
          [
            'label' => __('Social Media URL Nr. 2', 'flynt'),
            'name' => 'linkedinUrl',
            'type' => 'url',
            'instructions' => __('Optional: z.B. LinkedIn Profil-URL', 'flynt'),
            'wrapper' => [
              'width' => '50%'
            ],
          ],
        ],
      ],
    ],
  ];
}
