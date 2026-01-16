<?php

namespace Flynt\Components\ModulTextImage;

add_filter('Flynt/addComponentData?name=ModulTextImage', function ($data) {
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
  return $data;
});

function getACFLayout(): array
{
  return [
    'name' => 'modulTextImage',
    'label' => __('Modul : Text & Bild', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Inhalt', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
      ],
      [
        'label' => __('Bild', 'flynt'),
        'instructions' => __('Bild für den Inhaltsbereich (erlaubt: JPG, JPEG, PNG, SVG, WebP).', 'flynt'),
        'name' => 'image',
        'type' => 'image',
        'preview_size' => 'thumbnail',
        'mime_types' => 'jpg,jpeg,png,svg,webp',
      ],
      [
        'label' => __('Tagline', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'maxlength' => 20,
        'instructions' => __('Kurzer Tag über dem Titel (z. B. „Über uns", „Unsere Leistung", „Was uns ausmacht" (max. 20 Zeichen)).', 'flynt'),
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
        'maxlength' => 1500,
        'instructions' => __('Beschreibung oder Einleitungstext zum Inhalt (max. 1500 Zeichen).', 'flynt'),
      ],
      [
        'label' => __('Buttons', 'flynt'),
        'name' => 'ctaButtons',
        'type' => 'repeater',
        'instructions' => __('Fügen Sie hier Buttons hinzu.', 'flynt'),
        'layout' => 'row',
        'button_label' => __('Button hinzufügen', 'flynt'),
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
            'label' => __('Bildformat', 'flynt'),
            'instructions' => __('<strong>Was macht diese Einstellung?</strong><br>
                                  Bestimmt die Form aller Bilder (z.B. breiter oder höher).<br><br>', 'flynt'),
            'name' => 'aspectRatio',
            'type' => 'select',
            'choices' => [
              '4:3' => 'Klassisch (4:3) - Standard Foto',
              '16:9' => 'Breitbild (16:9) - Video Format [Standard]',
            ],
            'default_value' => '16:9',
            'ui' => 1,
            'wrapper' => [
              'width' => '50%'
            ]
          ],
          [
            'label' => __('Bildposition', 'flynt'),
            'name' => 'imagePosition',
            'instructions' => __('Position des Bildes im Layout.', 'flynt'),
            'type' => 'select',
            'choices' => [
              'left' => __('Links', 'flynt'),
              'right' => __('Rechts', 'flynt'),
              'top' => __('Oben', 'flynt'),
              'bottom' => __('Unten', 'flynt'),
            ],
            'default_value' => 'left',
            'ui' => 1,
          ],
        ],
      ],
    ],
  ];
}
