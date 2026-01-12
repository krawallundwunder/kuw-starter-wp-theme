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
        ];
      }
    }
  }

  if (!empty($data['cardButton'])) {
    $data['cardButtonFormatted'] = [];
    foreach ($data['cardButton'] as $cardButton) {
      if (!empty($cardButton['button'])) {
        $data['cardButtonFormatted'][] = [
          'text' => $cardButton['button']['title'],
          'link' => $cardButton['button']['url'],
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
    'label' => __('Modul: Columns', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Content', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
        'layout' => 'row',
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
        'label' => __('Columns Tab', 'flynt'),
        'name' => 'columnsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
        'layout' => 'row',
      ],
      [
        'label' => __('Columns', 'flynt'),
        'name' => 'columns',
        'type' => 'repeater',
        'instructions' => __('Add between 2 and 5 columns.', 'flynt'),
        'layout' => 'row',
        'min' => 2,
        'max' => 5,
        'button_label' => __('Add Column', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Image', 'flynt'),
            'name' => 'image',
            'type' => 'image',
            'instructions' => 'Optional: Add an image to the column. Please use the same height for all columns for better alignment.',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
            'max_size' => 4,
            'mime_types' => 'jpg,jpeg,png',
            'wrapper' => [
              'width' => 20
            ]
          ],
          [
            'label' => __('Tag', 'flynt'),
            'name' => 'tag',
            'type' => 'text',
            'instructions' => 'Optional: Add a tag or label for the column.',
            'wrapper' => [
              'width' => 20
            ]
          ],
          [
            'label' => __('Subtitle', 'flynt'),
            'name' => 'subtitle',
            'type' => 'text',
            'instructions' => 'Write a short, descriptive title for the column.',
            'wrapper' => [
              'width' => 20
            ]
          ],
          [
            'label' => __('Description', 'flynt'),
            'name' => 'description',
            'type' => 'wysiwyg',
            'instructions' => 'Describe the content of the column.',
            'tabs' => 'visual',
            'toolbar' => 'basic',
            'media_upload' => 0,
            'wrapper' => [
              'width' => 25
            ]
          ],
          [
            'label' => __('Button', 'flynt'),
            'name' => 'cardButton',
            'type' => 'link',
            'instructions' => 'Optional: Add a button to the column.',
            'return_format' => 'array',
            'wrapper' => [
              'width' => 15
            ]
          ]
        ]
      ],
      [
        'label' => __('Options', 'flynt'),
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
            'label' => __('Text Alignment', 'flynt'),
            'name' => 'textAlignment',
            'instructions' => __('Select the alignment for the Card.', 'flynt'),
            'type' => 'select',
            'choices' => [
              'start' => __('Left', 'flynt'),
              'center' => __('Center', 'flynt'),
            ],
            'default_value' => 'start',
            'wrapper' => [
              'width' => 50
            ]
          ],
          [
            'label' => __('Is Image Rounded', 'flynt'),
            'name' => 'isImageRounded',
            'instructions' => __('Enable to display images with rounded corners.', 'flynt'),
            'type' => 'true_false',
            'ui' => 1,
            'wrapper' => [
              'width' => 50,
            ]
          ],
        ]
      ],
    ]
  ];
}
