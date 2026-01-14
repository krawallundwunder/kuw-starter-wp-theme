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
          'target' => $ctaButton['button']['target'],
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
        'label' => __('Inhalt', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
      ],
      [
        'label' => __('Tagline', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'maxlength' => 20,
        'instructions' => __('Kurzer Tag über dem Titel (z. B. „Kontakt", „Standorte", „Ansprechpartner" (max. 20 Zeichen).', 'flynt'),
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
        'id' => 'input',
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
        'label' => __('Kontaktbereiche', 'flynt'),
        'name' => 'contactAreas',
        'type' => 'repeater',
        'instructions' => __('Fügen Sie hier Kontaktbereiche hinzu (max. 6).', 'flynt'),
        'min' => 0,
        'max' => 6,
        'layout' => 'block',
        'button_label' => __('Kontaktbereich hinzufügen', 'flynt'),
        'conditional_logic' => [
          [
            [
              'fieldPath' => 'layout',
              'operator' => '==',
              'value' => 'Kontakt',
            ],
          ],
        ],
        'sub_fields' => [
          [
            'label' => __('Titel', 'flynt'),
            'name' => 'title',
            'type' => 'text',
            'maxlength' => 50,
            'instructions' => __('(max. 50 Zeichen)', 'flynt'),
            'wrapper' => ['width' => '100%'],
          ],
          [
            'label' => __('E-Mail', 'flynt'),
            'name' => 'email',
            'type' => 'email',
            'wrapper' => ['width' => '50%'],
          ],
          [
            'label' => __('Telefon', 'flynt'),
            'name' => 'phone',
            'type' => 'text',
            'wrapper' => ['width' => '50%'],
          ],
          [
            'label' => __('Link zum Kontaktformular', 'flynt'),
            'name' => 'formLink',
            'type' => 'link',
            'instructions' => __('Optional: Link zum Kontaktformular', 'flynt'),
            'return_format' => 'array',
            'wrapper' => ['width' => '100%'],
          ],
        ],
      ],
      [
        'label' => __('Standorte', 'flynt'),
        'name' => 'locations',
        'type' => 'repeater',
        'instructions' => __('Fügen Sie hier Standorte hinzu (max. 12).', 'flynt'),
        'min' => 0,
        'max' => 12,
        'layout' => 'block',
        'button_label' => 'Standort hinzufügen',
        'conditional_logic' => [
          [
            [
              'fieldPath' => 'layout',
              'operator' => '==',
              'value' => 'Standorte',
            ],
          ],
        ],
        'sub_fields' => [
          [
            'label' => __('Standort-Name', 'flynt'),
            'name' => 'city',
            'type' => 'text',
            'instructions' => __('(z. B. "Hauptsitz", "Niederlassung")', 'flynt'),
            'required' => 0,
            'wrapper' => ['width' => '100%'],
          ],
          [
            'label' => __('Straße', 'flynt'),
            'name' => 'street',
            'type' => 'text',
            'instructions' => __('(z. B. "Musterstraße 1")', 'flynt'),
            'required' => 0,
            'wrapper' => ['width' => '100%'],
          ],
          [
            'label' => __('PLZ', 'flynt'),
            'name' => 'zip',
            'type' => 'text',
            'instructions' => __('(z. B. "12345")', 'flynt'),
            'required' => 0,
            'wrapper' => ['width' => '33.33%'],
          ],
          [
            'label' => __('Stadt', 'flynt'),
            'name' => 'cityName',
            'type' => 'text',
            'instructions' => __('(z. B. "Berlin")', 'flynt'),
            'required' => 0,
            'wrapper' => ['width' => '33.33%'],
          ],
          [
            'label' => __('Land', 'flynt'),
            'name' => 'country',
            'type' => 'text',
            'instructions' => __('(z. B. "Deutschland")', 'flynt'),
            'required' => 0,
            'wrapper' => ['width' => '33.33%'],
          ],
          [
            'label' => __('Google Maps Link', 'flynt'),
            'name' => 'mapLink',
            'type' => 'url',
            'instructions' => __('Link zu Google Maps.', 'flynt'),
            'required' => 0,
          ],
        ],
      ],

      [
        'label' => __('Einstellungen', 'flynt'),
        'name' => 'optionsTab',
        'type' => 'tab',
      ],
      [
        'label' => __('Layout', 'flynt'),
        'name' => 'layout',
        'type' => 'select',
        'instructions' => __('Wählen Sie zwischen Kontakt- oder Standorte-Ansicht.', 'flynt'),
        'choices' => [
          'Kontakt' => __('Kontakt', 'flynt'),
          'Standorte' => __('Standorte', 'flynt'),
        ],
      ],
      [
        'label' => __('Kontakt-Layout', 'flynt'),
        'name' => 'contactLayout',
        'type' => 'select',
        'instructions' => __('Anzahl der Spalten für Kontaktbereiche.', 'flynt'),
        'choices' => [
          '2' => '2 Spalten',
          '3' => '3 Spalten',
          '4' => '4 Spalten',
        ],
        'default_value' => '2',
        'wrapper' => ['width' => '50%'],
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
        'label' => __('Standort-Layout', 'flynt'),
        'name' => 'locationsLayout',
        'type' => 'select',
        'instructions' => __('Anzahl der Spalten für Standorte.', 'flynt'),
        'choices' => [
          '2' => '2 Spalten',
          '3' => '3 Spalten',
          '4' => '4 Spalten',
        ],
        'default_value' => '2',
        'wrapper' => ['width' => '50%'],
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
