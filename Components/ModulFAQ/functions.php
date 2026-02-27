<?php

namespace Flynt\Components\ModulFAQ;

add_filter('Flynt/addComponentData?name=ModulFAQ', function ($data) {
  // 1. Grid Logic for Layout 1 (Tiles)
  if ($data['layoutType'] === 'layout-1') {
    $cols = $data['columns'] ?? '2';
    $data['gridClass'] = $cols === '1' ? 'grid-cols-1' : 'grid-cols-1 md:grid-cols-2';
  }

  return $data;
});

function getACFLayout(): array
{
  return [
    'name' => 'ModulFAQ',
    'label' => __('Modul: Fragen und Antworten ', 'flynt'),
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
        'instructions' => __('Kurzer Tag über dem Titel.', 'flynt'),
        'placeholder' => __('z. B. FAQ', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'wrapper' => ['width' => '50%'],
      ],
      [
        'label' => __('Titel', 'flynt'),
        'instructions' => __('Titel des Inhalts. Kurz, klar und aussagekräftig.', 'flynt'),
        'placeholder' => __('z. B. Häufig gestellte Fragen', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'wrapper' => ['width' => '75%'],
      ],
      [
        'label' => __('Beschreibung', 'flynt'),
        'instructions' => __('Beschreibung oder Einleitungstext zum Inhalt.', 'flynt'),
        'name' => 'description',
        'type' => 'textarea',
      ],
      [
        'label' => __('Fragen & Antworten', 'flynt'),
        'instructions' => __('Fügen Sie hier Ihre Fragen und Antworten hinzu.', 'flynt'),
        'name' => 'faqItems',
        'type' => 'repeater',
        'layout' => 'block',
        'button_label' => __('Frage hinzufügen', 'flynt'),
        'min' => 1,
        'sub_fields' => [
          [
            'label' => __('Frage', 'flynt'),
            'name' => 'question',
            'type' => 'text',
            'instructions' => __('Die Frage, die beantwortet werden soll.', 'flynt'),
            'wrapper' => ['width' => '50%'],
          ],
          [
            'label' => __('Antwort', 'flynt'),
            'name' => 'answer',
            'type' => 'textarea',
            'instructions' => __('Ausführliche Antwort auf die Frage.', 'flynt'),
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
        'label' => __('Text im Kopfbereich', 'flynt'),
        'name' => 'textAlign',
        'type' => 'select',
        'choices' => [
          'start' => __('Links', 'flynt'),
          'center' => __('Zentriert', 'flynt'),
        ],
        'default_value' => 'start',
        'instructions' => __(
          'Legen Sie fest, wie der Text oberhalb des Moduls ausgerichtet werden soll.',
          'flynt',
        ),
        'wrapper' => ['width' => '33%'],
      ],
      [
        'label' => __('Layout', 'flynt'),
        'instructions' => __('Wählen Sie das Layout für die Fragen & Antworten.', 'flynt'),
        'name' => 'layoutType',
        'type' => 'select',
        'choices' => [
          'layout-1' => __('Kacheln (immer sichtbar)', 'flynt'),
          'layout-2' => __('Accordion (aufklappbar)', 'flynt'),
        ],
        'default_value' => 'layout-1',
        'ui' => 1,
        'wrapper' => ['width' => '33%'],
      ],
      [
        'label' => __('Spaltenanzahl', 'flynt'),
        'instructions' => __('Anzahl der Spalten für das Kachel-Layout.', 'flynt'),
        'name' => 'columns',
        'type' => 'select',
        'choices' => [
          '1' => __('1 Spalte', 'flynt'),
          '2' => __('2 Spalten', 'flynt'),
        ],
        'default_value' => '2',
        'ui' => 1,
        'wrapper' => ['width' => '33%'],
        'conditional_logic' => [
          [
            [
              'fieldPath' => 'layoutType',
              'operator' => '==',
              'value' => 'layout-1',
            ],
          ],
        ],
      ],
    ],
  ];
}
