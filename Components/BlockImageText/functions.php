<?php

namespace Flynt\Components\BlockImageText;

use Flynt\FieldVariables;

function getACFLayout(): array
{
  return [
    'name' => 'blockImageText',
    'label' => __('Block: Image Text', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Content', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
      ],
      [
        'label' => __('Image Position', 'flynt'),
        'name' => 'imagePosition',
        'type' => 'button_group',
        'choices' => [
          'left' => sprintf('<i class="dashicons dashicons-align-left" title="%1$s"></i>', __('Image on the left', 'flynt')),
          'right' => sprintf('<i class="dashicons dashicons-align-right" title="%1$s"></i>', __('Image on the right', 'flynt'))
        ],
        'default_value' => 'left',
      ],
      [
        'label' => __('Image', 'flynt'),
        'instructions' => __('Image-Format: JPG, PNG, SVG, WebP.', 'flynt'),
        'name' => 'image',
        'type' => 'image',
        'preview_size' => 'medium',
        'mime_types' => 'jpg,jpeg,png,svg,webp',
      ],
      [
        'label' => __('Image Subtitle', 'flynt'),
        'instructions' => __('Optional caption below the image', 'flynt'),
        'name' => 'subtitle',
        'type' => 'text',
      ],
      [
        'label' => __('Title', 'flynt'),
        'name' => 'title',
        'type' => 'text',
      ],
      [
        'label' => __('Text', 'flynt'),
        'name' => 'contentHtml',
        'type' => 'wysiwyg',
        'delay' => 0,
        'media_upload' => 0,
      ],
      [
        'label' => __('Button', 'flynt'),
        'name' => 'button',
        'type' => 'link',
        'return_format' => 'array',
      ],
      [
        'label' => __('Options', 'flynt'),
        'name' => 'optionsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
      ],
      [
        'label' => '',
        'name' => 'options',
        'type' => 'group',
        'layout' => 'row',
        'sub_fields' => [
          FieldVariables\getTheme(),
          [
            'label' => __('Aspect Ratio', 'flynt'),
            'name' => 'aspectRatio',
            'type' => 'select',
            'choices' => [
              'auto' => __('Auto (Original)', 'flynt'),
              '16-9' => __('16:9 (Landscape)', 'flynt'),
              '4-3' => __('4:3', 'flynt'),
              '1-1' => __('1:1 (Square)', 'flynt'),
            ],
            'default_value' => 'auto',
            'ui' => 1,
          ],
          [
            'label' => __('Content Alignment', 'flynt'),
            'name' => 'contentAlign',
            'type' => 'button_group',
            'choices' => [
              'left' => __('Left', 'flynt'),
              'center' => __('Center', 'flynt'),
              'right' => __('Right', 'flynt'),
            ],
            'default_value' => 'left',
          ],
          [
            'label' => __('Vertical Alignment', 'flynt'),
            'name' => 'verticalAlign',
            'type' => 'button_group',
            'choices' => [
              'top' => __('Top', 'flynt'),
              'center' => __('Center', 'flynt'),
              'bottom' => __('Bottom', 'flynt'),
            ],
            'default_value' => 'center',
          ],
          [
            'label' => __('Gap Size', 'flynt'),
            'name' => 'gapSize',
            'type' => 'button_group',
            'choices' => [
              'small' => __('Small', 'flynt'),
              'medium' => __('Medium', 'flynt'),
              'large' => __('Large', 'flynt'),
            ],
            'default_value' => 'medium',
          ],
          [
            'label' => __('Content Background', 'flynt'),
            'name' => 'contentBackground',
            'type' => 'true_false',
            'default_value' => 0,
            'ui' => 1,
          ],
        ]
      ],
      [
        'label' => __('Button Style', 'flynt'),
        'name' => 'buttonStyleTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
        'conditional_logic' => [
          [
            [
              'field' => 'button',
              'operator' => '!=empty',
            ],
          ],
        ],
      ],
      [
        'label' => __('Button Style', 'flynt'),
        'name' => 'button_style',
        'type' => 'button_group',
        'choices' => [
          'primary' => __('Primary', 'flynt'),
          'secondary' => __('Secondary', 'flynt'),
          'outline' => __('Outline', 'flynt'),
        ],
        'default_value' => 'primary',
        'conditional_logic' => [
          [
            [
              'field' => 'button',
              'operator' => '!=empty',
            ],
          ],
        ],
      ],
    ]
  ];
}

add_filter('Flynt/addComponentData?name=BlockImageText', function ($data) {
  if (!empty($data['button']) && !empty($data['button_style'])) {
    $data['button']['style'] = $data['button_style'];
  }
  return $data;
});
