<?php

namespace Flynt\Components\ModulStats;


add_filter('Flynt/addComponentData?name=ModulStats', function ($data) {
  if (!empty($data['ctaButtons'])) {
    $data['buttons'] = array_map(
      fn($ctaButton) => [
        'text' => $ctaButton['button']['title'] ?? '',
        'link' => $ctaButton['button']['url'] ?? '',
        'target' => $ctaButton['button']['target'] ?? '',
      ],
      array_filter($data['ctaButtons'], fn($ctaButton) => !empty($ctaButton['button']))
    );
  }

  $data['enableCounter'] = isset($data['enableCounter']) ? (bool) $data['enableCounter'] : true;
  $data['counterDuration'] = max(300, (int) ($data['counterDuration'] ?? 2000));

  return $data;
});

/**
 * Defines the ACF fields for the component.
 * This aligns with the "Simple", "Simple Grid", and "Timeline" layouts requested.
 */
function getACFLayout(): array
{
  return [
    'name' => 'ModulStats',
    'label' => __('Modul: Stats (Simple, Grid, Timeline)', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Inhalt', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
      ],
      [
        'label' => __('Tagline', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'instructions' => __('Small label appearing above the title.', 'flynt'),
      ],
      [
        'label' => __('Titel', 'flynt'),
        'name' => 'title',
        'type' => 'text',
      ],
      [
        'label' => __('Beschreibung', 'flynt'),
        'name' => 'description',
        'type' => 'textarea',
        'rows' => 3,
      ],
      [
        'label' => __('Buttons', 'flynt'),
        'name' => 'ctaButtons',
        'type' => 'repeater',
        'max' => 2,
        'layout' => 'row',
        'button_label' => __('Button hinzufügen', 'flynt'),
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
        'label' => __('Stats / Timeline Items', 'flynt'),
        'name' => 'items',
        'type' => 'repeater',
        'layout' => 'block',
        'instructions' => __('Limits by layout: Simple (max 3), Simple Grid (max 4), Timeline (max 6).', 'flynt'),
        'button_label' => __('Add Stat/Event', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Label / Date', 'flynt'),
            'name' => 'label',
            'type' => 'text',
            'instructions' => __('e.g., "Transactions" or "Aug 2021"', 'flynt'),
            'wrapper' => ['width' => '50'],
          ],
          [
            'label' => __('Value / Heading', 'flynt'),
            'name' => 'value',
            'type' => 'text',
            'instructions' => __('e.g., "44 million" or "Founded Company"', 'flynt'),
            'wrapper' => ['width' => '50'],
          ],
          [
            'label' => __('Subtext / Description', 'flynt'),
            'name' => 'subtext',
            'type' => 'textarea',
            'instructions' => __('Used primarily in Timeline layout for the body text.', 'flynt'),
            'rows' => 2,
          ],
        ]
      ],
      [
        'label' => __('Einstellungen', 'flynt'),
        'name' => 'settingsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
      ],
      [
        'label' => __('Layout', 'flynt'),
        'name' => 'layout',
        'type' => 'select',
        'instructions' => __('Select the visual style for the statistics.', 'flynt'),
        'choices' => [
          'simple' => __('Simple', 'flynt'),
          'simpleGrid' => __('Simple Grid', 'flynt'),
          'timeline' => __('Timeline', 'flynt')
        ],
        'default_value' => 'simple',
      ],
      [
        'label' => __('Text im Kopfbereich', 'flynt'),
        'name' => 'textAlign',
        'type' => 'button_group',
        'instructions' => __('Lege fest, wie der Text oberhalb des Moduls ausgerichtet werden soll.', 'flynt'),
        'choices' => [
          'text-start' => __('Links', 'flynt'),
          'text-center' => __('Zentriert', 'flynt'),
        ],
        'default_value' => 'text-start',
        'allow_null' => 0,
        'return_format' => 'value',
        'layout' => 'horizontal',
      ],
      [
        'label' => __('Counter-Effekt aktivieren', 'flynt'),
        'name' => 'enableCounter',
        'type' => 'true_false',
        'ui' => 1,
        'default_value' => 1,
      ],
      [
        'label' => __('Counter-Dauer (ms)', 'flynt'),
        'name' => 'counterDuration',
        'type' => 'number',
        'default_value' => 2000,
        'min' => 300,
        'step' => 100,
        'wrapper' => [
          'width' => '50',
        ],
        'conditional_logic' => [
          [
            [
              'fieldPath' => 'enableCounter',
              'operator' => '==',
              'value' => 1,
            ],
          ],
        ],
      ],
    ]
  ];
}
