<?php

namespace Flynt\Components\ModulTextImage;

add_filter('Flynt/addComponentData?name=ModulTextImage', function ($data) {
  // Format buttons for the template
  if (!empty($data['ctaButtons'])) {
    $data['buttons'] = [];
    foreach ($data['ctaButtons'] as $ctaButton) {
      if (!empty($ctaButton['button'])) {
        $data['buttons'][] = [
          'text' => $ctaButton['button']['title'],
          'link' => $ctaButton['button']['url'],
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
    'label' => __('Modul : Text & Image', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Content', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
      ],
      [
        'label' => __('Bild', 'flynt'),
        'instructions' => __('Image-Format: JPG, PNG, SVG, WebP.', 'flynt'),
        'name' => 'image',
        'type' => 'image',
        'preview_size' => 'medium',
        'mime_types' => 'jpg,jpeg,png,svg,webp',
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
        'label' => __('CTA Buttons', 'flynt'),
        'name' => 'ctaButtons',
        'type' => 'repeater',
        'instructions' => __('Call to Action Buttons unter dem Textinhalt.', 'flynt'),
        'layout' => 'row',
        'button_label' => __('Button Hinzufügen', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Button', 'flynt'),
            'name' => 'button',
            'type' => 'link',
            'instructions' => __('Button-Konfiguration.', 'flynt'),
            'return_format' => 'array',
          ],
        ],
      ],
      [
        'label' => __('Optionen', 'flynt'),
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
            'label' => __('Aspect Ratio', 'flynt'),
            'instructions' => __('Hier kannst du das Seitenverhältnis der Bilder ändern.', 'flynt'),
            'name' => 'aspectRatio',
            'type' => 'select',
            'choices' => [
              'auto' => __('Auto (Original)', 'flynt'),
              '16-9' => __('16:9 (Volle Breite)', 'flynt'),
              '4-3' => __('4:3 (Standard)', 'flynt'),
              '1-1' => __('1:1 (Quadrat)', 'flynt'),
            ],
            'default_value' => 'auto',
            'ui' => 1,
          ],
          [
            'label' => __('Bildposition', 'flynt'),
            'name' => 'imagePosition',
            'instructions' => __('Hier kannst du die Bildposition ändern. 16:9 optimal bei Oben & Unten. 4:3 & 1:1 optimal für Rechts & Links', 'flynt'),
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
