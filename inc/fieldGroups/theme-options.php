<?php

use Flynt\Utils\Options;

Options::addGlobal('Seiten Einstellungen', [

  [
    'label' => 'Logo',
    'name' => 'logo',
    'type' => 'image',
    'return_format' => 'array',
    'preview_size' => 'thumbnail',
    'library' => 'all',
    'min_width' => 0,
    'max_width' => 0,
    'min_height' => 0,
    'max_height' => 0,
    'min_size' => 0,
    'max_size' => 0,
    'mime_types' => 'jpg,jpeg,svg,png,gif',
    'instructions' => __('Lade ein Logo für die Webseite hoch.', 'flynt'),
  ],

  [
    'label' => 'Farben Einstellungen',
    'name' => 'color_settings',
    'type' => 'group',
    'sub_fields' => [
      [
        'label' => __('Primärfarbe', 'flynt'),
        'name' => 'primary_color',
        'type' => 'color_picker',
        'instructions' => __('Wähle die Primärfarbe der Webseite.', 'flynt'),
        'default_value' => '#2563eb',
        'wrapper' => [
          'width' => '20',
        ],
      ],
      [
        'label' => __('Sekundärfarbe', 'flynt'),
        'name' => 'secondary_color',
        'type' => 'color_picker',
        'instructions' => __('Wähle die Sekundärfarbe der Webseite.', 'flynt'),
        'default_value' => '#4f46e5',
        'wrapper' => [
          'width' => '20',
        ],
      ]
    ],
  ],

  [
    'label' => 'Footer',
    'name' => 'footer_settings',
    'type' => 'group',
    'sub_fields' => [
      [
        'label' => __('Footer Logo', 'flynt'),
        'name' => 'footer_logo',
        'type' => 'image',
        'instructions' => __('Lade ein Logo für den Footer hoch.(wenn kein logo gibt wird das Header Logo verwendet)', 'flynt'),
        'default_value' => '',
        'wrapper' => [
          'width' => '50',
        ],
      ],

      [
        'label' => __('Footer Address', 'flynt'),
        'name' => 'footer_address',
        'type' => 'wysiwyg',
        'instructions' => __('Gib die Adresse ein, die im Footer angezeigt werden soll.', 'flynt'),
        'default_value' => '',
        'media_upload' => 0,
        'wrapper' => [
          'width' => '50',
        ],
      ],
      [
        'label' => __('Footer Social Media', 'flynt'),
        'name' => 'footer_social_media',
        'type' => 'repeater',
        'button_label' => __('Add Social Media', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Icon', 'flynt'),
            'name' => 'icon',
            'type' => 'image',
            'default_value' => '',
          ],
          [
            'label' => __('Link', 'flynt'),
            'name' => 'link',
            'type' => 'url',
            'default_value' => '',
          ],
        ],
      ]
    ],
  ],
]);
