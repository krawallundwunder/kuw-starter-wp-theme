<?php

namespace Flynt\Components\ModulColumns;

add_filter('Flynt/addComponentData?name=ModulColumns', function ($data) {
  // Format buttons for the template
  if (!empty($data['ctaButtons'])) {
    $data['buttons'] = [];
    foreach ($data['ctaButtons'] as $ctaButton) {
      if (!empty($ctaButton['button'])) {
        $data['buttons'][] = [
          'text' => $ctaButton['button']['title'],
          'link' => $ctaButton['button']['url'],
          'target' => $ctaButton['button']['target'],
        ];
      }
    }
  }

  if (!empty($data['cardButton'])) {
    $data['cardButtonFormatted'] = [];
    foreach ($data['cardButton'] as $cardButton) {
      if (!empty($cardButton['button'])) {
        $data['cardButtons'][] = [
          'text' => $cardButton['button']['title'],
          'link' => $cardButton['button']['url'],
          'target' => $cardButton['button']['target'],
        ];
      }
    }
  }

  return $data;
});

function getACFLayout(): array
{
  return [
    'name' => 'modulColumns',
    'label' => __('Modul: Statische Inhaltskacheln', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Inhalt', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
        'layout' => 'row',
      ],
      [
        'label' => __('Tagline', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'instructions' => __('Kurzer Tag über dem Titel (z. B. „Leistungen", „Vorteile" (max. 20 Zeichen)).', 'flynt'),
        'maxlength' => 20,
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
        'label' => __('Buttons', 'flynt'),
        'name' => 'ctaButtons',
        'type' => 'repeater',
        'instructions' => __('Fügen Sie hier übergeordnete Buttons hinzu.', 'flynt'),
        'layout' => 'row',
        'button_label' => __('Übergeordneten Button hinzufügen', 'flynt'),
        'max' => 2,
        'sub_fields' => [
          [
            'label' => __('Button', 'flynt'),
            'name' => 'button',
            'type' => 'link',
            'return_format' => 'array',
          ],
        ],
      ],
      [
        'label' => __('Spalten', 'flynt'),
        'name' => 'columns',
        'type' => 'repeater',
        'instructions' => __('Füge zwischen 2 und 5 Spalten hinzu.', 'flynt'),
        'layout' => 'row',
        'min' => 2,
        'max' => 5,
        'button_label' => __('Spalte hinzufügen', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Bild', 'flynt'),
            'name' => 'image',
            'type' => 'image',
            'instructions' => __('Bild der Spalte (Erlaubte Typen: jpg,jpeg,png).', 'flynt'),
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
            'max_size' => 4,
            'mime_types' => 'jpg,jpeg,png',
            'wrapper' => [
              'width' => '20%'
            ]
          ],
          [
            'label' => __('Tagline', 'flynt'),
            'name' => 'tag',
            'type' => 'text',
            'maxlength' => 20,
            'instructions' => __('(max. 20 Zeichen)', 'flynt'),
            'wrapper' => [
              'width' => '20%'
            ]
          ],
          [
            'label' => __('Titel', 'flynt'),
            'name' => 'subtitle',
            'type' => 'text',
            'maxlength' => 50,
            'instructions' => __('(max. 50 Zeichen)', 'flynt'),
            'wrapper' => [
              'width' => '20%'
            ]
          ],
          [
            'label' => __('Beschreibung', 'flynt'),
            'name' => 'description',
            'type' => 'textarea',
            'id' => 'input',
            'maxlength' => 1150,
            'instructions' => __('(max. 1150 Zeichen)', 'flynt'),
            'tabs' => 'visual',
            'wrapper' => [
              'width' => '25%'
            ]
          ],
          [
            'label' => __('Button Link', 'flynt'),
            'name' => 'cardButton',
            'type' => 'link',
            'instructions' => __('Button für die Kachel', 'flynt'),
            'return_format' => 'array',
            'wrapper' => [
              'width' => '15%'
            ]
          ]
        ]
      ],
      [
        'label' => __('Einstellungen', 'flynt'),
        'name' => 'optionsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
      ],
      [
        'label' => '',
        'name' => 'options',
        'type' => 'group',
        'layout' => 'row',
        'sub_fields' => [
          [
            'label' => __('Textausrichtung', 'flynt'),
            'name' => 'textAlignment',
            'instructions' => __('Ausrichtung des Textes innerhalb der Spalten.', 'flynt'),
            'type' => 'select',
            'choices' => [
              'start' => __('Links', 'flynt'),
              'center' => __('Zentriert', 'flynt'),
            ],
            'default_value' => 'start',
            'wrapper' => [
              'width' => '50%'
            ]
          ],
          [
            'label' => __('Abgerundete Bilder', 'flynt'),
            'name' => 'isImageRounded',
            'instructions' => __('Aktivieren, um Bilder mit abgerundeten Ecken darzustellen.', 'flynt'),
            'type' => 'true_false',
            'ui' => 1,
            'wrapper' => [
              'width' => '50%',
            ]
          ],
        ]
      ],
    ]
  ];
}
