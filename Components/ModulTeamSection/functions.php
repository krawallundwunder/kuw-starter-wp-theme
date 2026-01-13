<?php

namespace Flynt\Components\ModulTeamSection;


add_filter('Flynt/addComponentData?name=ModulTeamSection', function ($data) {
  return $data;
});

function getACFLayout()
{
  return [
    'name' => 'modulTeamSection',
    'label' => 'Modul: Team Section',
    'sub_fields' => [
      [
        'label' => 'Überschrift',
        'name' => 'headingTab',
        'type' => 'tab',
      ],
      [
        'label' => __('Tag', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'instructions' => __('Optionaler Tag über dem Titel.', 'flynt'),
      ],
      [
        'label' => __('Titel', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'instructions' => __('Hauptüberschrift des Blocks.', 'flynt'),
      ],
      [
        'label' => __('Fließtext', 'flynt'),
        'name' => 'description',
        'type' => 'wysiwyg',
        'delay' => 0,
        'media_upload' => 0,
        'instructions' => __('Textinhalt des Blocks.', 'flynt'),
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
              'width' => '33.33%'
            ],
          ],
          [
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
            'instructions' => __('Hier kannst du einen Namen eingeben.', 'flynt'),
            'wrapper' => [
              'width' => '33.33%'
            ],
          ],
          [
            'label' => 'Position',
            'name' => 'position',
            'type' => 'text',
            'instructions' => __('Hier kannst du die Position eingeben.', 'flynt'),
            'wrapper' => [
              'width' => '33.33%'
            ],
          ],
          [
            'label' => 'Twitter/X URL',
            'name' => 'twitterUrl',
            'type' => 'url',
            'instructions' => __('Hier kannst du die dazugehörige Twitter/X URL eingeben.', 'flynt'),
            'wrapper' => [
              'width' => '50%'
            ],
          ],
          [
            'label' => 'LinkedIn URL',
            'name' => 'linkedinUrl',
            'type' => 'url',
            'instructions' => __('Hier kannst du die dazugehörige LinkedIn URL eingeben.', 'flynt'),
            'wrapper' => [
              'width' => '50%'
            ],
          ],
        ],
      ],
    ],
  ];
}
