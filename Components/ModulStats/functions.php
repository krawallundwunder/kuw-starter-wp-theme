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
      array_filter($data['ctaButtons'], fn($ctaButton) => !empty($ctaButton['button'])),
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
    'label' => __('Modul: Statistiken (Einfach, Gitter, Zeitleiste)', 'flynt'),
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
        'instructions' => __('Kurzer Tag über dem Titel.', 'flynt'),
        'wrapper' => ['width' => '33%'],
      ],
      [
        'label' => __('Titel', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'instructions' => __('Titel des Inhalts. Kurz, klar und aussagekräftig.', 'flynt'),
        'wrapper' => ['width' => '50%'],
      ],
      [
        'label' => __('Beschreibung', 'flynt'),
        'name' => 'description',
        'type' => 'textarea',
        'rows' => 3,
        'instructions' => __('Erklärtext unter der Überschrift.', 'flynt'),
      ],
      [
        'label' => __('Buttons', 'flynt'),
        'name' => 'ctaButtons',
        'type' => 'repeater',
        'max' => 2,
        'layout' => 'row',
        'button_label' => __('Button hinzufügen', 'flynt'),
        'instructions' => __('Fügen Sie hier Buttons hinzu.', 'flynt'),
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
        'label' => __('Statistiken / Timeline-Elemente', 'flynt'),
        'name' => 'items',
        'type' => 'repeater',
        'layout' => 'block',
        'max' => 6,
        'instructions' => __(
          'Fügen Sie Statistiken oder Zeitleisten-Ereignisse hinzu. Maximal 6 Elemente.',
          'flynt',
        ),
        'button_label' => __('Element hinzufügen', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Beschriftung / Datum', 'flynt'),
            'name' => 'label',
            'type' => 'text',
            'instructions' => __('z. B. „Transaktionen" oder „Aug 2021".', 'flynt'),
            'wrapper' => ['width' => '50%'],
          ],
          [
            'label' => __('Wert / Überschrift', 'flynt'),
            'name' => 'value',
            'type' => 'text',
            'instructions' => __('z. B. „44 Millionen" oder „Unternehmen gegründet".', 'flynt'),
            'wrapper' => ['width' => '50%'],
          ],
          [
            'label' => __('Untertext / Beschreibung', 'flynt'),
            'name' => 'subtext',
            'type' => 'textarea',
            'instructions' => __(
              'Wird hauptsächlich im Timeline-Layout als Body-Text verwendet.',
              'flynt',
            ),
            'rows' => 2,
          ],
        ],
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
        'instructions' => __('Wählen Sie den visuellen Stil für die Statistiken.', 'flynt'),
        'choices' => [
          'simple' => __('Einfach', 'flynt'),
          'simpleGrid' => __('Gitter', 'flynt'),
          'timeline' => __('Zeitleiste', 'flynt'),
        ],
        'default_value' => 'simple',
        'wrapper' => ['width' => '50%'],
      ],
      [
        'label' => __('Text im Kopfbereich', 'flynt'),
        'name' => 'textAlign',
        'type' => 'button_group',
        'instructions' => __(
          'Legen Sie fest, wie der Text oberhalb des Moduls ausgerichtet werden soll.',
          'flynt',
        ),
        'choices' => [
          'text-start' => __('Links', 'flynt'),
          'text-center' => __('Zentriert', 'flynt'),
        ],
        'default_value' => 'text-start',
        'allow_null' => 0,
        'return_format' => 'value',
        'layout' => 'horizontal',
        'wrapper' => ['width' => '50%'],
      ],
      [
        'label' => __('Zähleffekt aktivieren', 'flynt'),
        'name' => 'enableCounter',
        'type' => 'true_false',
        'ui' => 1,
        'default_value' => 1,
        'instructions' => __('Aktiviert die Animations-Zähler bei den Statistikwerten.', 'flynt'),
      ],
      [
        'label' => __('Zähler-Animationsdauer (ms)', 'flynt'),
        'name' => 'counterDuration',
        'type' => 'number',
        'default_value' => 2000,
        'min' => 300,
        'step' => 100,
        'instructions' => __('Dauer der Zählanimation in Millisekunden (mind. 300 ms).', 'flynt'),
        'wrapper' => [
          'width' => '50%',
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
    ],
  ];
}
