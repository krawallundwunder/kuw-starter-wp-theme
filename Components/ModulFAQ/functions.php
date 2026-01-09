<?php

namespace Flynt\Components\ModulFAQ;

function getACFLayout(): array
{
  return [
    'name' => 'modulFAQ',
    'label' => __('Modul : FAQ', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Content', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
      ],
      [
        'label' => __('Tagline', 'flynt'),
        'instructions' => __('Optional: Kurzer Tag über dem Titel (z.B. "FAQ", "Hilfe", "Support")', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
      ],
      [
        'label' => __('Titel', 'flynt'),
        'instructions' => __('Hauptüberschrift der FAQ-Sektion', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'required' => 1,
      ],
      [
        'label' => __('Beschreibung', 'flynt'),
        'instructions' => __('Optional: Einleitungstext zur FAQ-Sektion', 'flynt'),
        'name' => 'description',
        'type' => 'textarea',
      ],
      [
        'label' => __('FAQ Items', 'flynt'),
        'instructions' => __('Füge hier deine Fragen und Antworten hinzu', 'flynt'),
        'name' => 'faqItems',
        'type' => 'repeater',
        'layout' => 'block',
        'button_label' => __('Frage hinzufügen', 'flynt'),
        'min' => 1,
        'sub_fields' => [
          [
            'label' => __('Frage', 'flynt'),
            'instructions' => __('Die Frage, die gestellt wird', 'flynt'),
            'name' => 'question',
            'type' => 'text',
            'required' => 1,
          ],
          [
            'label' => __('Antwort', 'flynt'),
            'instructions' => __('Die Antwort auf die Frage', 'flynt'),
            'name' => 'answer',
            'type' => 'textarea',
            'required' => 1,
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
        'label' => __('Layout', 'flynt'),
        'instructions' => __('Wähle das Layout der FAQ-Items', 'flynt'),
        'name' => 'layoutType',
        'type' => 'select',
        'choices' => [
          'layout-1' => __('Kacheln (immer sichtbar)', 'flynt'),
          'layout-2' => __('Accordion (aufklappbar)', 'flynt'),
        ],
        'default_value' => 'layout-1',
        'ui' => 1,
      ],
      [
        'label' => __('Spaltenanzahl', 'flynt'),
        'instructions' => __('Wähle die Anzahl der Spalten für das Kachel-Layout', 'flynt'),
        'name' => 'columns',
        'type' => 'select',
        'choices' => [
          '1' => __('1 Spalte', 'flynt'),
          '2' => __('2 Spalten', 'flynt'),
        ],
        'default_value' => '2',
        'ui' => 1,
        'conditional_logic' => [
          [
            [
              'fieldPath' => 'layoutType',
              'operator' => '==',
              'value' => 'layout-1'
            ]
          ]
        ],
      ],
    ],
  ];
}
