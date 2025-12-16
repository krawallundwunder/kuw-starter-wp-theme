<?php

namespace Flynt\Components\ModulColumns;

use Flynt\FieldVariables;

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
        'label' => __('Title', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'instructions' => __('Optional: Add a title for the section.', 'flynt'),
        'required' => 0,
      ],
      [
        'label' => __('Description', 'flynt'),
        'name' => 'description',
        'type' => 'wysiwyg',
        'instructions' => __('Optional: Add a description for the section.', 'flynt'),
        'tabs' => 'visual',
        'toolbar' => 'basic',
        'media_upload' => 0,
        'required' => 0,
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
            'required' => 0,
            'wrapper' => [
              'width' => 20
            ]
          ],
          [
            'label' => __('Tag', 'flynt'),
            'name' => 'tag',
            'type' => 'text',
            'instructions' => 'Optional: Add a tag or label for the column.',
            'required' => 0,
            'wrapper' => [
              'width' => 20
            ]
          ],
          [
            'label' => __('Subtitle', 'flynt'),
            'name' => 'subtitle',
            'type' => 'text',
            'instructions' => 'Write a short, descriptive title for the column.',
            'required' => 0,
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
            'required' => 0,
            'wrapper' => [
              'width' => 25
            ]
          ],
          [
            'label' => __('Button', 'flynt'),
            'name' => 'button',
            'type' => 'link',
            'instructions' => 'Optional: Add a button to the column.',
            'return_format' => 'array',
            'required' => 0,
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
            'instructions' => __('Select the alignment for the Subtitle, Description and Button.', 'flynt'),
            'type' => 'select',
            'choices' => [
              'left' => __('Left', 'flynt'),
              'center' => __('Center', 'flynt'),
            ],
            'default_value' => 'left',
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
