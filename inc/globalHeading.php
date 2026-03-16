<?php

/**
 * Defines global heading fields and utilities to be used across multiple components.
 */

namespace Flynt\GlobalHeading;

function getTheme($default = ''): array
{
  return [
    'label' => __('Theme', 'flynt'),
    'name' => 'theme',
    'type' => 'select',
    'allow_null' => 0,
    'multiple' => 0,
    'ui' => 0,
    'ajax' => 0,
    'choices' => [
      '' => __('(none)', 'flynt'),
      'light' => __('Light', 'flynt'),
      'dark' => __('Dark', 'flynt'),
    ],
    'default_value' => $default,
  ];
}

function getSize($default = 'medium'): array
{
  return [
    'label' => __('Size', 'flynt'),
    'name' => 'size',
    'type' => 'radio',
    'other_choice' => 0,
    'save_other_choice' => 0,
    'layout' => 'horizontal',
    'choices' => [
      'small' => __('Small', 'flynt'),
      'medium' => __('Medium', 'flynt'),
      'large' => __('Large', 'flynt'),
      'full' => __('Full', 'flynt'),
    ],
    'default_value' => $default,
  ];
}

function getAlignment($args = []): array
{
  $options = wp_parse_args($args, [
    'label' => __('Align', 'flynt'),
    'name' => 'align',
    'default' => 'center',
  ]);

  return [
    'label' => $options['label'],
    'name' => $options['name'],
    'type' => 'radio',
    'other_choice' => 0,
    'save_other_choice' => 0,
    'layout' => 'horizontal',
    'choices' => [
      'left' => __('Left', 'flynt'),
      'center' => __('Center', 'flynt'),
    ],
    'default_value' => $options['default'],
  ];
}

function getTextAlignment($args = []): array
{
  $options = wp_parse_args($args, [
    'label' => __('Align text', 'flynt'),
    'name' => 'textAlign',
    'default' => 'left',
  ]);

  return [
    'label' => $options['label'],
    'name' => $options['name'],
    'type' => 'button_group',
    'choices' => [
      'left' => sprintf(
        '<i class="dashicons dashicons-editor-alignleft" title="%1$s"></i>',
        __('Align text left', 'flynt'),
      ),
      'center' => sprintf(
        '<i class="dashicons dashicons-editor-aligncenter" title="%1$s"></i>',
        __('Align text center', 'flynt'),
      ),
    ],
    'default_value' => $options['default'],
  ];
}

function getTaglineField(array $args = []): array
{
  $options = wp_parse_args($args, [
    'label' => __('Tagline', 'flynt'),
    'name' => 'tag',
    'instructions' => __('Kurzer Tag über dem Titel.', 'flynt'),
    'wrapper_width' => '33%',
  ]);

  return [
    'label' => $options['label'],
    'name' => $options['name'],
    'type' => 'text',
    'instructions' => $options['instructions'],
    'wrapper' => ['width' => $options['wrapper_width']],
  ];
}

function getTitleField(array $args = []): array
{
  $options = wp_parse_args($args, [
    'label' => __('Titel', 'flynt'),
    'name' => 'title',
    'instructions' => __('Titel des Inhalts. Kurz, klar und aussagekräftig.', 'flynt'),
    'wrapper_width' => '50%',
  ]);

  return [
    'label' => $options['label'],
    'name' => $options['name'],
    'type' => 'text',
    'instructions' => $options['instructions'],
    'wrapper' => ['width' => $options['wrapper_width']],
  ];
}

function getDescriptionField(array $args = []): array
{
  $options = wp_parse_args($args, [
    'label' => __('Beschreibung', 'flynt'),
    'name' => 'description',
    'instructions' => __('Beschreibung oder Einleitungstext zum Inhalt.', 'flynt'),
  ]);

  return [
    'label' => $options['label'],
    'name' => $options['name'],
    'type' => 'textarea',
    'instructions' => $options['instructions'],
  ];
}

function getCtaButtonsField(array $args = []): array
{
  $options = wp_parse_args($args, [
    'label' => __('Buttons', 'flynt'),
    'name' => 'ctaButtons',
    'instructions' => __('Fügen Sie hier Buttons hinzu.', 'flynt'),
    'max' => 2,
  ]);

  return [
    'label' => $options['label'],
    'name' => $options['name'],
    'type' => 'repeater',
    'instructions' => $options['instructions'],
    'layout' => 'row',
    'button_label' => __('Button hinzufügen', 'flynt'),
    'max' => $options['max'],
    'sub_fields' => [
      [
        'label' => __('Button', 'flynt'),
        'name' => 'button',
        'type' => 'link',
        'return_format' => 'array',
      ],
    ],
  ];
}

function getHeaderTextAlignmentField(array $args = []): array
{
  $options = wp_parse_args($args, [
    'label' => __('Text im Kopfbereich', 'flynt'),
    'name' => 'textAlignment',
    'instructions' => __(
      'Legen Sie fest, wie der Text oberhalb des Moduls ausgerichtet werden soll.',
      'flynt',
    ),
    'default_value' => 'start',
    'wrapper_width' => '50%',
  ]);

  return [
    'label' => $options['label'],
    'name' => $options['name'],
    'instructions' => $options['instructions'],
    'type' => 'select',
    'choices' => [
      'start' => __('Links', 'flynt'),
      'center' => __('Zentriert', 'flynt'),
      'split' => __('Geteilt', 'flynt'),
    ],
    'default_value' => $options['default_value'],
    'wrapper' => ['width' => $options['wrapper_width']],
  ];
}

function getHeaderFields(array $args = []): array
{
  return [
    getTaglineField($args['tagline'] ?? []),
    getTitleField($args['title'] ?? []),
    getDescriptionField($args['description'] ?? []),
    getCtaButtonsField($args['buttons'] ?? []),
  ];
}

function processCtaButtons(array $data): array
{
  if (!empty($data['ctaButtons'])) {
    $data['buttons'] = array_map(function ($ctaButton) {
      return [
        'text' => $ctaButton['button']['title'] ?? '',
        'link' => $ctaButton['button']['url'] ?? '',
        'target' => $ctaButton['button']['target'] ?? '',
      ];
    }, $data['ctaButtons']);
  }

  return $data;
}
