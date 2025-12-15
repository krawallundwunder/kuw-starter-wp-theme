<?php

namespace Flynt\Components\BlockHeroSection;

add_filter('Flynt/addComponentData?name=BlockHeroSection', function ($data) {
  return $data;
});

function getACFLayout()
{
  return [
    'name' => 'BlockHeroSection',
    'label' => __('Block: Hero Section', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Inhalt', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
      ],
      [
        'label' => __('Überschrift', 'flynt'),
        'name' => 'headline',
        'type' => 'wysiwyg',
        'instructions' => __('Geben Sie die Überschrift für den Header ein.', 'flynt'),
        'tabs' => 'visual',
        'toolbar' => 'basic',
        'media_upload' => 0,
        'delay' => 1,
        'required' => 0,
      ],
      [
        'label' => __('CTA Button', 'flynt'),
        'name' => 'ctaButton',
        'type' => 'link',
        'wrapper' => [
          'width' => '50%',
        ],
      ],
      [
        'label' => __('Einstellungen', 'flynt'),
        'name' => 'settingsTab',
        'type' => 'tab',
        'placement' => 'top',
      ],
      [
        'label' => __('Hintergrundfarbe', 'flynt'),
        'name' => 'backgroundColor',
        'type' => 'select',
        'choices' => [
          'white' => __('Weiß', 'flynt'),
          'black' => __('Schwarz', 'flynt'),
        ],
        'default_value' => 'white',
        'wrapper' => [
          'width' => '33%',
        ],
      ],
      [
        'label' => __('Text Position', 'flynt'),
        'name' => 'textPosition',
        'type' => 'button_group',
        'choices' => [
          'full' => __('Voll', 'flynt'),
          'left' => __('Links', 'flynt'),
        ],
        'default_value' => 'right',
        'wrapper' => [
          'width' => '33%',
        ],
      ],
      [
        'label' => __('Hintergrundbild', 'flynt'),
        'name' => 'backgroundImage',
        'type' => 'image',
        'instructions' => __('Hintergrund für die gesamte Sektion.', 'flynt'),
        'return_format' => 'array',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'wrapper' => [
          'width' => '33%',
        ],
      ],
    ],
  ];
}
