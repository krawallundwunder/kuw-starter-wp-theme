<?php

namespace Flynt\Components\ModulGalleryMasonry;

function getACFLayout(): array
{
  return [
    'label' => __('Modul: Galerie Mosaik', 'flynt'),
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
        'instructions' => __('Beschreibung oder Einleitungstext zum Inhalt.', 'flynt'),
      ],
      [
        'label' => __('Galerie-Elemente', 'flynt'),
        'name' => 'masonryItems',
        'type' => 'repeater',
        'layout' => 'table',
        'instructions' => __('Fügen Sie hier Ihre Galerie-Elemente hinzu.', 'flynt'),
        'button_label' => __('Galerie-Element hinzufügen', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Bild', 'flynt'),
            'name' => 'image',
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'instructions' => __(
              'Bilder werden nach verfügbarem Platz angeordnet, nicht strikt nach Reihenfolge Ihrer hinzugefügten Bilder.<br>Große Formate beeinflussen die Position.',
              'flynt',
            ),
            'wrapper' => ['width' => '50%'],
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
            'wrapper' => ['width' => '50%'],
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
          'text-split' => __('Geteilt', 'flynt'),
        ],
        'default_value' => 'text-start',
        'instructions' => __(
          'Legen Sie fest, wie der Text oberhalb des Moduls ausgerichtet werden soll.',
          'flynt',
        ),
        'wrapper' => ['width' => '50%'],
      ],
    ],
  ];
}
