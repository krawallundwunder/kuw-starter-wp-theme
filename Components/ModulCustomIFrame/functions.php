<?php

namespace Flynt\Components\ModulCustomIFrame;

function getACFLayout(): array
{
  return [
    'name' => 'ModulCustomIFrame',
    'label' => __('Modul: Individuelle-Einbettung', 'flynt'),
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
        'label' => __('Option 1: Einbettungs-Code', 'flynt'),
        'name' => 'accordionCustomCode',
        'type' => 'accordion',
        'open' => 0,
        'multi_expand' => 1,
        'endpoint' => 0,
      ],
      [
        'label' => __('Einbettungs-Code', 'flynt'),
        'instructions' => __('Fügen Sie hier den Einbettungs-Code ein (z. B. von Google Maps, Calendly, Typeform). Wenn dieser Code angegeben ist, wird die iFrame URL ignoriert. ⚠️ Sicherheitshinweis: Dieser Code wird ungefiltert ausgegeben. Fügen Sie ausschließlich Code aus vertrauenswürdigen Quellen ein.', 'flynt'),
        'name' => 'customCode',
        'type' => 'textarea',
        'rows' => 6,
      ],
      [
        'label' => __('Option 2: iFrame URL', 'flynt'),
        'name' => 'accordionIframeUrl',
        'type' => 'accordion',
        'open' => 0,
        'multi_expand' => 1,
        'endpoint' => 0,
      ],
      [
        'label' => __('iFrame URL', 'flynt'),
        'instructions' => __('Alternativ zum Einbettungs-Code: URL der Seite, die direkt eingebunden werden soll.', 'flynt'),
        'name' => 'iframeUrl',
        'type' => 'url',
      ],
      [
        'name' => 'accordionEnd',
        'label' => '',
        'type' => 'accordion',
        'endpoint' => 1,
      ],
      [
        'label' => __('Einstellungen', 'flynt'),
        'name' => 'optionsTab',
        'type' => 'tab',
      ],
      [
        'label' => __('Text im Kopfbereich', 'flynt'),
        'name' => 'textAlign',
        'type' => 'select',
        'choices' => [
          'text-start' => __('Links', 'flynt'),
          'text-center' => __('Zentriert', 'flynt'),
        ],
        'default_value' => 'text-start',
        'instructions' => __('Lege fest, wie der Text oberhalb des Moduls ausgerichtet werden soll.', 'flynt'),
        'required' => 1,
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
