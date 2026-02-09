<?php

namespace Flynt\Components\ModulGalleryMasonry;

function getACFLayout(): array
{
  return [
    'label' => __('Modul: Gallery Masonry', 'flynt'),
    'name' => 'ModulGalleryMasonry',
    'sub_fields' => [
      [
        'label' => __('Inhalt', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
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
        'label' => __('Masonry Items', 'flynt'),
        'name' => 'masonryItems',
        'type' => 'repeater',
        'layout' => 'table',
        'instructions' => __('Fügen Sie für jedes Masonry-Element Inhalte hinzu.', 'flynt'),
        'button_label' => __('Masonry Element hinzufügen', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Bild', 'flynt'),
            'name' => 'image',
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'instructions' => __('Bilder werden nach verfügbarem Platz angeordnet, nicht strikt nach Reihenfolge deiner hinzugefügten Bilder.<br> Große Formate beeinflussen die Position.<br> Beispiel: Soll dein erstes Bild 1x1 sein und dein zweites 2x1 sind die ersten 3 Spalten verbraucht.', 'flynt'),
            'wrapper' => [
              'width' => '50%'
            ],
          ],
          [
            'label' => __('Format', 'flynt'),
            'name' => 'itemFormat',
            'type' => 'select',
            'instructions' => __('Wählen Sie das Format des Elements.', 'flynt'),
            'choices' => [
              'default' => __('Standard (1x1)', 'flynt'),
              'tall' => __('Hochformat (1x2)', 'flynt'),
              'wide' => __('Breitformat (2x1)', 'flynt'),
            ],
            'default_value' => 'default',
            'wrapper' => [
              'width' => '50%'
            ],
          ],
        ],
      ],
      [
        'label' => __('Einstellungen', 'flynt'),
        'name' => 'settingsTab',
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
      ],
    ],
  ];
}
