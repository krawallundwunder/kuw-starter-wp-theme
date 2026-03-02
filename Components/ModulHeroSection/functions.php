<?php

namespace Flynt\Components\ModulHeroSection;

add_filter('Flynt/addComponentData?name=ModulHeroSection', function ($data) {
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

function getACFLayout()
{
  return [
    'name' => 'ModulHeroSection',
    'label' => __('Modul: Hero-Bereich', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Inhalt', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
      ],
      [
        'label' => __('Tagline', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'instructions' => __('Kurzer Tag über der Überschrift.', 'flynt'),
        'wrapper' => ['width' => '33%'],
      ],
      [
        'label' => __('Überschrift', 'flynt'),
        'name' => 'headline',
        'type' => 'text',
        'instructions' => __('Hauptüberschrift des Startbereichs. Kurz und einprägsam.', 'flynt'),
        'tabs' => 'visual',
        'wrapper' => ['width' => '50%'],
      ],
      [
        'label' => __('Unterzeile', 'flynt'),
        'name' => 'description',
        'type' => 'text',
        'instructions' => __('Kurzer Einleitungstext unter der Überschrift.', 'flynt'),
        'tabs' => 'visual',
        'wrapper' => ['width' => '75%'],
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
      ],
      [
        'label' => __('Hintergrundfarbe', 'flynt'),
        'name' => 'backgroundColor',
        'type' => 'select',
        'instructions' => __('Wählen Sie zwischen 2 Textfarben.', 'flynt'),
        'choices' => [
          'white' => __('Weiß', 'flynt'),
          'black' => __('Schwarz', 'flynt'),
        ],
        'default_value' => 'white',
        'wrapper' => ['width' => '33%'],
      ],
      [
        'label' => __('Textposition', 'flynt'),
        'name' => 'textPosition',
        'type' => 'button_group',
        'instructions' => __('Position des Textes im Layout.', 'flynt'),
        'choices' => [
          'full' => __('Voll', 'flynt'),
          'left' => __('Links', 'flynt'),
        ],
        'default_value' => 'full',
        'wrapper' => ['width' => '33%'],
      ],
      [
        'label' => __('Hintergrundbild', 'flynt'),
        'name' => 'backgroundImage',
        'type' => 'image',
        'instructions' => __(
          'Optionales Hintergrundbild für die gesamte Sektion (erlaubt: .jpg, .jpeg, .png, .svg, .webp)',
          'flynt',
        ),
        'return_format' => 'array',
        'preview_size' => 'thumbnail',
        'mime_types' => 'jpg, jpeg, png, svg, webp',
        'library' => 'all',
        'wrapper' => ['width' => '33%'],
      ],
    ],
  ];
}
