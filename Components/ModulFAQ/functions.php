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
        'type' => 'wysiwyg',
        'media_upload' => 0,
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
            'type' => 'wysiwyg',
            'delay' => 0,
            'media_upload' => 0,
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
        'label' => '',
        'name' => 'options',
        'type' => 'group',
        'layout' => 'row',
        'sub_fields' => [
          [
            'label' => __('Layout', 'flynt'),
            'instructions' => __('Wähle das Layout der FAQ-Items', 'flynt'),
            'name' => 'layout',
            'type' => 'select',
            'choices' => [
              'single' => __('Einspaltig', 'flynt'),
              'two-columns' => __('Zweispaltig', 'flynt'),
            ],
            'default_value' => 'two-columns',
            'ui' => 1,
          ],
        ],
      ],
    ],
  ];
}
