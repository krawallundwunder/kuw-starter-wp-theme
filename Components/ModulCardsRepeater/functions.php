<?php

namespace Flynt\Components\ModulCardsRepeater;

add_filter('Flynt/addComponentData?name=ModulCardsRepeater', function ($data) {
  if (!empty($data['ctaButtons'])) {
    $data['buttons'] = array_map(fn($btn) => [
      'text' => $btn['button']['title'] ?? '',
      'link' => $btn['button']['url'] ?? '',
    ], array_filter($data['ctaButtons'], fn($btn) => !empty($btn['button'])));
  }

  if (!empty($data['options']['aspectRatio'])) {
    $data['aspectRatio'] = $data['options']['aspectRatio'];
  }

  return $data;
});

function getACFLayout()
{
    return [
        'name' => 'ModulCardsRepeater',
        'label' => __('Modul: Dynamische Inhaltskacheln', 'flynt'),
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
              'instructions' => __('Kurzer Tag über dem Titel (z. B. „FAQ", „Hilfe", „Support" (max. 20 Zeichen).', 'flynt'),
              'maxlength' => 20,
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
              'maxlength' => 750,
              'instructions' => __('Beschreibung oder Einleitungstext zum Inhalt (max. 750 Zeichen).', 'flynt'),
              'type' => 'textarea',
            ],
            [
              'label' => __('Buttons', 'flynt'),
              'name' => 'ctaButtons',
              'type' => 'repeater',
              'instructions' => __('Fügen Sie hier übergeordnete Buttons hinzu.', 'flynt'),
              'layout' => 'row',
              'button_label' => __('Übergeordneten Button Hinzufügen', 'flynt'),
              'max' => 2,
              'sub_fields' => [
                [
                  'label' => __('Button', 'flynt'),
                  'name' => 'button',
                  'type' => 'link',
                  'return_format' => 'array'
                ],
              ],
            ],
            [
                'label' => __('Kacheln', 'flynt'),
                'name' => 'cards',
                'type' => 'repeater',
                'min' => 1,
                'layout' => 'block',
                'button_label' => __('Kachel hinzufügen', 'flynt'),
                'sub_fields' => [
                    [
                      'label' => __('Bild', 'flynt'),
                      'name' => 'image',
                      'type' => 'image',
                      'instructions' => __('Bild der Kachel (Erlaubte Typen: jpg,jpeg,png,svg).', 'flynt'),
                      'return_format' => 'id',
                      'preview_size' => 'thumbnail',
                      'library' => 'all',
                      'mime_types' => 'jpg,jpeg,png,svg',
                    ],
                    [
                      'label' => __('Titel', 'flynt'),
                      'name' => 'title',
                      'type' => 'text',
                      'maxlength' => 20,
                      'instructions' => __('(max. 20 Zeichen)', 'flynt'),
                    ],
                    [
                      'label' => __('Beschreibung', 'flynt'),
                      'name' => 'description',
                      'type' => 'textarea',
                      'maxlength' => 1150,
                      'instructions' => __('(max. 1150 Zeichen)', 'flynt'),
                    ],
                    [
                      'label' => __('Button Link', 'flynt'),
                      'name' => 'cardButton',
                      'type' => 'link',
                      'return_format' => 'array',
                      'instructions' => __('Button für die Kachel', 'flynt'),
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
              'label' => '',
              'name' => 'options',
              'type' => 'group',
              'layout' => 'row',
              'sub_fields' => [
                [
                  'label' => __('Bildformat', 'flynt'),
                  'instructions' => __('<strong>Was macht diese Einstellung?</strong><br>
                                        Bestimmt die Form aller Bilder (z.B. breiter oder höher).<br><br>', 'flynt'),
                  'name' => 'aspectRatio',
                  'type' => 'select',
                  'choices' => [
                    '4:3' => 'Klassisch (4:3) - Standard Foto',
                    '16:9' => 'Breitbild (16:9) - Video Format [Standard]',
                  ],
                  'default_value' => '16:9',
                  'ui' => 1,
                ],
              ],
            ],
        ],
    ];
}
