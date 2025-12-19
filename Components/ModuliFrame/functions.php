<?php

namespace Flynt\Components\ModuliFrame;

function getACFLayout(): array
{
  return [
    'name' => 'moduliFrame',
    'label' => __('Modul: iFrame', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Inhalt', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
      ],
      [
        'label' => __('Tag', 'flynt'),
        'instructions' => __('Kleine Überschrift/Kategorie (Optional)', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
      ],
      [
        'label' => __('Titel', 'flynt'),
        'instructions' => __('Hauptüberschrift des Moduls', 'flynt'),
        'name' => 'title',
        'type' => 'text',
      ],
      [
        'label' => __('Beschreibung', 'flynt'),
        'instructions' => __('Einführungstext, der über dem iFrame angezeigt wird (Optional)', 'flynt'),
        'name' => 'contentHtml',
        'type' => 'wysiwyg',
        'media_upload' => 0,
        'delay' => 1,
      ],
      [
        'label' => __('iFrame URL', 'flynt'),
        'instructions' => __('Die Adresse der Seite, die eingebunden werden soll', 'flynt'),
        'name' => 'iframeUrl',
        'type' => 'url',
        'default_value' => 'https://staging.opengeno.de/neuer-test/beitritt?embed=true',
        'required' => 1,
      ],
      [
        'label' => __('iFrame Einstellungen', 'flynt'),
        'name' => 'settingsTab',
        'type' => 'tab',
      ],
      [
        'label' => __('Minimale Höhe (in px)', 'flynt'),
        'instructions' => __('Start-Höhe des iFrames. Wichtig, falls das automatische Anpassen nicht klappt.', 'flynt'),
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
