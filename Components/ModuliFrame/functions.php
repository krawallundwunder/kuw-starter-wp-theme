<?php

namespace Flynt\Components\ModuliFrame;

function getACFLayout(): array
{
  return [
    'name' => 'moduliFrame',
    'label' => __('Modul: OpenGeno Einbettung', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Inhalt', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
      ],
      [
        'label' => __('Tagline', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'maxlength' => 20,
        'instructions' => __('Kurzer Tag über dem Titel (z. B. „Einbettung", „Formular", „Externe Inhalte" (max. 20 Zeichen)).', 'flynt'),
      ],
      [
        'label' => __('Titel', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'maxlength' => 50,
        'instructions' => __('Titel des Inhalts. Kurz, klar und aussagekräftig (max. 50 Zeichen).', 'flynt'),
      ],
      [
        'label' => __('Beschreibung', 'flynt'),
        'name' => 'description',
        'type' => 'textarea',
        'maxlength' => 750,
        'instructions' => __('Beschreibung oder Einleitungstext zum Inhalt (max. 750 Zeichen).', 'flynt'),
      ],
      [
        'label' => __('iFrame URL', 'flynt'),
        'instructions' => __('URL der Seite, die eingebunden werden soll.', 'flynt'),
        'name' => 'iframeUrl',
        'type' => 'url',
        'default_value' => 'https://staging.opengeno.de/neuer-test/beitritt?embed=true',
        'required' => 1,
      ],
      [
        'label' => __('Einstellungen', 'flynt'),
        'name' => 'optionsTab',
        'type' => 'tab',
      ],
      [
        'label' => __('Minimale Höhe (in px)', 'flynt'),
        'instructions' => __('Start-Höhe des iFrames. Wichtig, falls das automatische Anpassen nicht funktioniert.', 'flynt'),
        'name' => 'minHeight',
        'type' => 'number',
        'default_value' => 800,
      ],
      [
        'label' => __('Scrollbalken erlauben?', 'flynt'),
        'instructions' => __('Falls der Inhalt länger ist als die Höhe, wird ein Scrollbalken angezeigt.', 'flynt'),
        'name' => 'allowScroll',
        'type' => 'true_false',
        'default_value' => 0,
        'ui' => 1,
      ],
    ],
  ];
}
