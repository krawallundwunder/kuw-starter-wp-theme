<?php

namespace Flynt\Components\ModulFAQ;

function getACFLayout(): array
{
  return [
    'name' => 'modulFAQ',
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
        'instructions' => __('Kurzer Tag über dem Titel (z. B. „FAQ", „Hilfe", „Support" (max. 20 Zeichen)).', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'maxlength' => 20,
      ],
      [
        'label' => __('Titel', 'flynt'),
        'instructions' => __('Titel des Inhalts. Kurz, klar und aussagekräftig (max. 50 Zeichen).', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'maxlength' => 50,
      ],
      [
        'label' => __('Beschreibung', 'flynt'),
        'instructions' => __('Beschreibung oder Einleitungstext zum Inhalt (max. 750 Zeichen).', 'flynt'),
        'name' => 'description',
        'type' => 'textarea',
        'maxlength' => 750,
      ],
      [
        'label' => __('FAQ Items', 'flynt'),
        'instructions' => __('Fügen Sie Fragen und Antworten hinzu (mind. 1).', 'flynt'),
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
            'instructions' => __('(max. 150 Zeichen)', 'flynt'),
            'maxlength' => 150,
            'required' => 1,
          ],
          [
            'label' => __('Antwort', 'flynt'),
            'name' => 'answer',
            'type' => 'textarea',
            'maxlength' => 1000,
            'instructions' => __('(max. 1000 Zeichen)', 'flynt'),
            'required' => 1,
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
        'label' => __('Layout', 'flynt'),
        'instructions' => __('Wähle das Layout der FAQ-Items.', 'flynt'),
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
        'instructions' => __('Anzahl der Spalten für das Kachel-Layout.', 'flynt'),
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
