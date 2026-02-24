<?php

namespace Flynt\Components\ModulColumns;

add_filter('Flynt/addComponentData?name=ModulColumns', function ($data) {
  if (!empty($data['ctaButtons'])) {
    $data['buttons'] = array_map(function ($ctaButton) {
      return [
        'text' => $ctaButton['button']['title'] ?? '',
        'link' => $ctaButton['button']['url'] ?? '',
        'target' => $ctaButton['button']['target'] ?? '',
      ];
    }, $data['ctaButtons']);
  }

  if (!empty($data['columns'])) {
    foreach ($data['columns'] as &$column) {
      if (!empty($column['image'])) {
        if (is_object($column['image']) && method_exists($column['image'], 'src')) {
          $imageUrl = $column['image']->src();
          $imageAlt = method_exists($column['image'], 'alt') ? $column['image']->alt() : '';
        } elseif (is_array($column['image'])) {
          $imageUrl = $column['image']['url'] ?? '';
          $imageAlt = $column['image']['alt'] ?? '';
        } else {
          $imageUrl = '';
          $imageAlt = '';
        }
        $column['image_url'] = $imageUrl;
        $column['image_alt'] = $imageAlt;
        $extension = strtolower(pathinfo($imageUrl, PATHINFO_EXTENSION));
        $column['isSvg'] = ($extension === 'svg');

        if ($column['isSvg']) {
          $size = $column['iconSize'] ?? 'normal';
          switch ($size) {
            case 'small':
              $column['iconSizeClass'] = 'w-12 h-12';
              break;
            case 'normal':
              $column['iconSizeClass'] = 'w-20 h-20';
              break;
            case 'large':
              $column['iconSizeClass'] = 'w-32 h-32';
              break;
            default:
              $column['iconSizeClass'] = 'w-20 h-20';
              break;
          }
        }
      }
    }
  }

  $ratio = $data['options']['aspectRatio'] ?? '16:9';
  $data['aspectRatioClass'] = ($ratio === '4:3') ? 'aspect-[4/3]' : 'aspect-video';
  $data['textAlignmentClass'] = 'text-' . ($data['options']['textAlignment'] ?? 'start');
  $data['isImageRounded'] = $data['options']['isImageRounded'] ?? false;

  return $data;
});

function getACFLayout(): array
{
  return [
    'name' => 'modulColumns',
    'label' => __('Modul: Statische Inhaltskacheln', 'flynt'),
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
        'instructions' => __('Kurzer Tag über dem Titel (z. B. „Leistungen", „Vorteile" (max. 20 Zeichen)).', 'flynt'),
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
        'type' => 'textarea',
        'maxlength' => 750,
        'instructions' => __('Beschreibung oder Einleitungstext zum Inhalt (max. 750 Zeichen).', 'flynt'),
      ],
      [
        'label' => __('Buttons', 'flynt'),
        'name' => 'ctaButtons',
        'type' => 'repeater',
        'instructions' => __('Fügen Sie hier übergeordnete Buttons hinzu.', 'flynt'),
        'layout' => 'row',
        'button_label' => __('Übergeordneten Button hinzufügen', 'flynt'),
        'max' => 2,
        'sub_fields' => [
          [
            'label' => __('Button', 'flynt'),
            'name' => 'button',
            'type' => 'link',
            'return_format' => 'array',
          ],
        ],
      ],
      [
        'label' => __('Spalten', 'flynt'),
        'name' => 'columns',
        'type' => 'repeater',
        'instructions' => __('Füge zwischen 2 und 4 Spalten hinzu.', 'flynt'),
        'layout' => 'row',
        'min' => 2,
        'max' => 4,
        'button_label' => __('Spalte hinzufügen', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Bild', 'flynt'),
            'name' => 'image',
            'type' => 'image',
            'instructions' => __('Bild der Spalte (Erlaubte Typen: jpg,jpeg,png).', 'flynt'),
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'max_size' => 4,
            'mime_types' => 'jpg,jpeg,png,svg,webp',
            'wrapper' => ['width' => '25%']
          ],
          [
            'label' => __('Icon Größe', 'flynt'),
            'name' => 'iconSize',
            'type' => 'select',
            'instructions' => __('Nur erforderlich, wenn das Bild ein SVG ist.', 'flynt'),
            'choices' => [
              'small' => 'Klein',
              'normal' => 'Normal',
            ],
            'default_value' => 'normal',
            'wrapper' => ['width' => '15%'],
            'conditional_logic' => [
              [
                [
                  'field' => 'image',
                  'operator' => '==',
                  'value' => 'svg',
                ],
              ],
            ],
          ],
          [
            'label' => __('SVG Position', 'flynt'),
            'name' => 'svgPosition',
            'type' => 'select',
            'instructions' => __('Legt die Position des SVG innerhalb der Spalte fest.', 'flynt'),
            'choices' => [
              'left' => __('Links', 'flynt'),
              'center' => __('Zentriert', 'flynt'),
            ],
            'default_value' => 'center',
            'wrapper' => ['width' => '20%']
          ],
          [
            'label' => __('Tagline', 'flynt'),
            'name' => 'tag',
            'type' => 'text',
            'maxlength' => 20,
            'instructions' => __('(max. 20 Zeichen)', 'flynt'),
            'wrapper' => [
              'width' => '20%'
            ]
          ],
          [
            'label' => __('Titel', 'flynt'),
            'name' => 'subtitle',
            'type' => 'text',
            'maxlength' => 50,
            'instructions' => __('(max. 50 Zeichen)', 'flynt'),
            'wrapper' => [
              'width' => '20%'
            ]
          ],
          [
            'label' => __('Beschreibung', 'flynt'),
            'name' => 'description',
            'type' => 'textarea',
            'maxlength' => 1150,
            'instructions' => __('(max. 1150 Zeichen)', 'flynt'),
            'tabs' => 'visual',
            'wrapper' => [
              'width' => '25%'
            ]
          ],
          [
            'label' => __('Button Link', 'flynt'),
            'name' => 'cardButton',
            'type' => 'link',
            'instructions' => __('Button für die Kachel', 'flynt'),
            'return_format' => 'array',
            'wrapper' => [
              'width' => '15%'
            ]
          ]
        ]
      ],
      [
        'label' => __('Einstellungen', 'flynt'),
        'name' => 'optionsTab',
        'type' => 'tab',
      ],
      [
        'label' => '',
        'name' => 'options',
        'type' => 'group',
        'layout' => 'row',
        'sub_fields' => [
          [
            'label' => __('Text im Kopfbereich', 'flynt'),
            'name' => 'textAlignment',
            'instructions' => __('Lege fest, wie der Text oberhalb des Moduls ausgerichtet werden soll.', 'flynt'),
            'type' => 'select',
            'choices' => [
              'start' => __('Links', 'flynt'),
              'center' => __('Zentriert', 'flynt'),
            ],
            'default_value' => 'start',
            'wrapper' => [
              'width' => '50%'
            ]
          ],
          [
            'label' => __('Bildformat', 'flynt'),
            'instructions' => __('<strong>Was macht diese Einstellung?</strong><br>
                                  Bestimmt die Form aller Bilder (z.B. breiter oder höher).<br><br>
                                  <strong>⚠️ Wichtig für Icons/Logos:</strong><br>
                                  Diese Option schneidet Bilder zu. Für unverzerrte Icons aktivieren Sie bitte "Abgerundete Bilder".', 'flynt'),
            'name' => 'aspectRatio',
            'type' => 'select',
            'choices' => [
              '4:3' => 'Klassisch (4:3) - Standard Foto',
              '16:9' => 'Breitbild (16:9) - Video Format [Standard]',
            ],
            'default_value' => '16:9',
            'ui' => 1,
            'wrapper' => [
              'width' => '50%'
            ]
          ],
          [
            'label' => __('Abgerundete Bilder', 'flynt'),
            'name' => 'isImageRounded',
            'instructions' => __('Aktivieren, um Bilder mit abgerundeten Ecken darzustellen.', 'flynt'),
            'type' => 'true_false',
            'ui' => 1,
            'wrapper' => [
              'width' => '50%',
            ]
          ],
        ]
      ],
    ]
  ];
}
