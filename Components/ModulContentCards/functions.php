<?php

namespace Flynt\Components\ModulContentCards;

use Timber\Timber;

add_filter('Flynt/addComponentData?name=ModulContentCards', function ($data) {

    $data['taxonomies'] = $data['taxonomies'] ?: [];

    // Base Query Args
    $queryArgs = [
        'post_type' => 'content_card',
        'posts_per_page' => 9,
        'status' => 'publish',
    ];

    // NUR wenn Kategorien ausgewählt wurden, filter hinzufügen
    if (!empty($data['taxonomies'])) {
        $queryArgs['tax_query'] = [
            [
                'taxonomy' => 'content_card_category',
                'field' => 'term_id',
                'terms' => array_map(fn($tax) => $tax->term_id, $data['taxonomies']),
            ],
        ];
    }

    $data['items'] = Timber::get_posts($queryArgs);


    if (empty($data['items'])) {
        $data['items'] = [];
    }

    if (!empty($data['ctaButtons'])) {
        $data['buttons'] = array_map(
            fn($btn) => [
                'text' => $btn['button']['title'] ?? '',
                'link' => $btn['button']['url'] ?? '',
            ],
            array_filter($data['ctaButtons'], fn($btn) => !empty($btn['button']))
        );
    }

    $ratio = $data['options']['aspectRatio'] ?? '16:9';
    $data['aspectRatioClass'] = ['4:3' => 'aspect-[4/3]', '16:9' => 'aspect-video'][$ratio];

    $cardCount = count($data['items']); // ✅ Jetzt safe!
    $lgColumns = min(max($cardCount, 1), 3);
    $data['gridClass'] = [1 => 'lg:grid-cols-1', 2 => 'lg:grid-cols-2', 3 => 'lg:grid-cols-3'][$lgColumns];

    return $data;
});


function getACFLayout()
{
  return [
    'name' => 'ModulContentCards',
    'label' => __('Modul: Content-Karten', 'flynt'),
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
        'label' => __('Einstellungen', 'flynt'),
        'name' => 'optionsTab',
        'type' => 'tab',
        'placement' => 'top',
      ],
      [
        'label' => __('Text im Kopfbereich', 'flynt'),
        'name' => 'textAlign',
        'type' => 'button_group',
        'instructions' => __('Lege fest, wie der Text oberhalb des Moduls ausgerichtet werden soll.', 'flynt'),
        'choices' => [
          'text-start' => __('Links', 'flynt'),
          'text-center' => __('Zentriert', 'flynt'),
        ],
        'default_value' => 'text-start',
        'allow_null' => 0,
        'return_format' => 'value',
        'layout' => 'horizontal',
      ],
      [
        'label' => __('Bildformat', 'flynt'),
        'instructions' => __('<strong>Was macht diese Einstellung?</strong><br> Bestimmt die Form aller Bilder (z.B. breiter oder höher).<br><br>', 'flynt'),
        'name' => 'aspectRatio',
        'type' => 'select',
        'choices' => [
          '4:3' => 'Klassisch (4:3) - Standard Foto',
          '16:9' => 'Breitbild (16:9) - Video Format [Standard]',
        ],
        'default_value' => '16:9',
        'ui' => 1,
      ],
      [
        'label' => __('Kategorien', 'flynt'),
        'instructions' => __(
          'Wählen Sie 1 oder mehrere Kategorien aus oder lassen Sie das Feld leer, um alle Beiträge anzuzeigen.',
          'flynt',
        ),
        'name' => 'taxonomies',
        'type' => 'taxonomy',
        'taxonomy' => 'content_card_category',
        'field_type' => 'multi_select',
        'allow_null' => 1,
        'multiple' => 1,
        'add_term' => 0,
        'save_terms' => 0,
        'load_terms' => 0,
        'return_format' => 'object',
      ],
    ],
  ];
}
