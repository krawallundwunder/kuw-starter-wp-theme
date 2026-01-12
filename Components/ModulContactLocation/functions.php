<?php

namespace Flynt\Components\ModulContactLocation;

// Hook für Component Data
add_filter('Flynt/addComponentData?name=ModulContactLocation', function ($data) {
  // Format buttons for the template
  if (!empty($data['ctaButtons'])) {
    $data['buttons'] = [];
    foreach ($data['ctaButtons'] as $ctaButton) {
      if (!empty($ctaButton['button'])) {
        $data['buttons'][] = [
          'text' => $ctaButton['button']['title'],
          'link' => $ctaButton['button']['url'],
        ];
      }
    }
  }

  return $data;
});

function getACFLayout()
{
  return [
    'name' => 'modulContactLocation',
    'label' => 'Modul: Kontakt & Standorte',
    'sub_fields' => [
      [
        'label' => __('Kontakt Section', 'flynt'),
        'name' => 'Heading',
        'type' => 'tab',
      ],
      [
        'label' => __('Tag', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'instructions' => __('Optionaler Tag über dem Titel.', 'flynt'),
      ],
      [
        'label' => __('Titel', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'instructions' => __('Hauptüberschrift des Blocks.', 'flynt'),
      ],
      [
        'label' => __('Fließtext', 'flynt'),
        'name' => 'description',
        'type' => 'wysiwyg',
        'delay' => 0,
        'media_upload' => 0,
        'instructions' => __('Textinhalt des Blocks.', 'flynt'),
      ],
      [
        'label' => __('CTA Buttons', 'flynt'),
        'name' => 'ctaButtons',
        'type' => 'repeater',
        'instructions' => __('Call to Action Buttons unter dem Textinhalt.', 'flynt'),
        'layout' => 'row',
        'button_label' => __('Button Hinzufügen', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Button', 'flynt'),
            'name' => 'button',
            'type' => 'link',
            'instructions' => __('Button-Konfiguration.', 'flynt'),
            'return_format' => 'array',
          ],
        ],
      ],

      // Kontakt Tab
      [
        'label' => __('Kontakt Section', 'flynt'),
        'name' => 'contactTab',
        'type' => 'tab',
        'ui' => 1,
        'conditional_logic' => [
          [
            [
              'fieldPath' => 'layout',
              'operator' => '==',
              'value' => 'Kontakt',
            ],
          ],
        ],
      ],
      [
        'label' => 'Kontaktbereiche',
        'name' => 'contactAreas',
        'type' => 'repeater',
        'min' => 0,
        'max' => 6,
        'layout' => 'block',
        'button_label' => 'Kontaktbereich hinzufügen',
        'sub_fields' => [
          [
            'label' => 'Titel',
            'name' => 'title',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => '100'],
          ],
          [
            'label' => 'E-Mail',
            'name' => 'email',
            'type' => 'email',
            'required' => 0,
            'wrapper' => ['width' => '50'],
          ],
          [
            'label' => 'Telefon',
            'name' => 'phone',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => '50'],
          ],
          [
            'label' => 'Link zum Kontaktformular',
            'name' => 'formLink',
            'type' => 'link',
            'return_format' => 'array',
            'required' => 0,
            'wrapper' => ['width' => '100'],
          ],
        ],
      ],

      // Standorte Tab
      [
        'label' => 'Standorte Section',
        'name' => 'locationsTab',
        'type' => 'tab',
        'ui' => 1,
        'conditional_logic' => [
          [
            [
              'fieldPath' => 'layout',
              'operator' => '==',
              'value' => 'Standorte',
            ],
          ],
        ],
      ],
      [
        'label' => 'Standorte',
        'name' => 'locations',
        'type' => 'repeater',
        'min' => 0,
        'max' => 12,
        'layout' => 'block',
        'button_label' => 'Standort hinzufügen',
        'sub_fields' => [
          [
            'label' => 'Standort-Name',
            'name' => 'city',
            'type' => 'text',
            'instructions' => 'z.B. "Hauptsitz Dresden" oder "Niederlassung Berlin"',
            'required' => 0,
            'wrapper' => ['width' => '100'],
          ],
          [
            'label' => 'Straße',
            'name' => 'street',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => '100'],
          ],
          [
            'label' => 'PLZ',
            'name' => 'zip',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => '33.33'],
          ],
          [
            'label' => 'Stadt',
            'name' => 'cityName',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => '33.33'],
          ],
          [
            'label' => 'Land (optional)',
            'name' => 'country',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => '33.33'],
          ],
          [
            'label' => 'Google Maps Link (optional)',
            'name' => 'mapLink',
            'type' => 'url',
            'required' => 0,
          ],
        ],
      ],

      // Design Tab
      [
        'label' => 'Design',
        'name' => 'designTab',
        'type' => 'tab',
      ],
      [
        'label' => __('Layout', 'flynt'),
        'name' => 'layout',
        'type' => 'select',
        'choices' => [
          'Kontakt' => __('Kontakt', 'flynt'),
          'Standorte' => __('Standorte', 'flynt'),
        ],
      ],
      [
        'label' => 'Kontakt-Layout',
        'name' => 'contactLayout',
        'type' => 'select',
        'choices' => [
          '2' => '2 Spalten',
          '3' => '3 Spalten',
          '4' => '4 Spalten',
        ],
        'default_value' => '2',
        'wrapper' => ['width' => '33.33'],
        'conditional_logic' => [
          [
            [
              'fieldPath' => 'layout',
              'operator' => '==',
              'value' => 'Kontakt',
            ],
          ],
        ],
      ],
      [
        'label' => 'Standort-Layout',
        'name' => 'locationsLayout',
        'type' => 'select',
        'choices' => [
          '2' => '2 Spalten',
          '3' => '3 Spalten',
          '4' => '4 Spalten',
        ],
        'default_value' => '2',
        'wrapper' => ['width' => '33.33'],
        'conditional_logic' => [
          [
            [
              'fieldPath' => 'layout',
              'operator' => '==',
              'value' => 'Standorte',
            ],
          ],
        ],
      ],
    ],
  ];
}
