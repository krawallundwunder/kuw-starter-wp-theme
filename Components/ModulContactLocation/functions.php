<?php

namespace Flynt\Components\ModulContactLocation;

add_filter('Flynt/addComponentData?name=ModulContactLocation', function ($data) {
  return $data;
});

function getACFLayout()
{
  $conditionWithForm = [
    [
      [
        'fieldPath' => 'layoutVariant',
        'operator' => '==',
        'value' => 'withForm',
      ],
    ],
  ];

  $conditionContactOnly = [
    [
      [
        'fieldPath' => 'layoutVariant',
        'operator' => '==',
        'value' => 'contactOnly',
      ],
    ],
  ];

  return [
    'name' => 'ModulContactLocation',
    'label' => __('Modul: Kontakt & Standorte', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Inhalt', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
      ],

      // --- Header (beide Layouts) ---
      [
        'label' => __('Tagline', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'instructions' => __('Kurzer Tag über dem Titel.', 'flynt'),
        'placeholder' => __('z. B. Kontakt', 'flynt'),
        'wrapper' => ['width' => '50%'],
      ],
      [
        'label' => __('Titel', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'instructions' => __('Titel des Inhalts. Kurz, klar und aussagekräftig.', 'flynt'),
        'placeholder' => __('z. B. So erreichen Sie uns', 'flynt'),
        'wrapper' => ['width' => '75%'],
      ],
      [
        'label' => __('Beschreibung', 'flynt'),
        'name' => 'description',
        'type' => 'textarea',
        'instructions' => __('Beschreibung oder Einleitungstext zum Inhalt.', 'flynt'),
      ],
      [
        'label' => __('Standorte & Kontaktdaten', 'flynt'),
        'name' => 'locations',
        'type' => 'repeater',
        'instructions' => __('Fügen Sie hier Standorte mit Kontaktdaten hinzu (max. 4).', 'flynt'),
        'min' => 0,
        'max' => 4,
        'layout' => 'block',
        'button_label' => __('Standort hinzufügen', 'flynt'),
        'conditional_logic' => $conditionWithForm,
        'sub_fields' => [
          [
            'label' => __('Standort-Name oder Kontaktperson', 'flynt'),
            'name' => 'name',
            'type' => 'text',
            'placeholder' => __('z. B. Hauptsitz', 'flynt'),
            'wrapper' => ['width' => '100%'],
          ],
          [
            'label' => __('Straße & Hausnummer', 'flynt'),
            'name' => 'street',
            'type' => 'text',
            'placeholder' => __('z. B. Musterstraße 1', 'flynt'),
            'wrapper' => ['width' => '100%'],
          ],
          [
            'label' => __('PLZ', 'flynt'),
            'name' => 'zip',
            'type' => 'text',
            'placeholder' => __('z. B. 12345', 'flynt'),
            'wrapper' => ['width' => '33.33%'],
          ],
          [
            'label' => __('Stadt', 'flynt'),
            'name' => 'city',
            'type' => 'text',
            'placeholder' => __('z. B. Berlin', 'flynt'),
            'wrapper' => ['width' => '33.33%'],
          ],
          [
            'label' => __('Land', 'flynt'),
            'name' => 'country',
            'type' => 'text',
            'placeholder' => __('z. B. Deutschland', 'flynt'),
            'wrapper' => ['width' => '33.33%'],
          ],
          [
            'label' => __('E-Mail', 'flynt'),
            'name' => 'email',
            'type' => 'email',
            'instructions' => __('Kontakt E-Mail-Adresse für diesen Standort', 'flynt'),
            'wrapper' => ['width' => '50%'],
          ],
          [
            'label' => __('Telefon', 'flynt'),
            'name' => 'phone',
            'type' => 'text',
            'instructions' => __('Telefonnummer für diesen Standort', 'flynt'),
            'wrapper' => ['width' => '50%'],
          ],
        ],
      ],

      // --- Layout 2: Nur Kontakt & Standorte ---

      // Sektion: Standorte
      [
        'label' => '',
        'name' => 'locationsDivider',
        'type' => 'message',
        'message' =>
          '<h3 style="margin:0;padding:8px 0;border-bottom:2px solid #0073aa;">Standorte</h3>',
        'conditional_logic' => $conditionContactOnly,
      ],
      [
        'label' => __('Standorte', 'flynt'),
        'name' => 'locationsList',
        'type' => 'repeater',
        'min' => 0,
        'max' => 4,
        'layout' => 'block',
        'button_label' => __('Standort hinzufügen', 'flynt'),
        'conditional_logic' => $conditionContactOnly,
        'sub_fields' => [
          [
            'label' => __('Standort-Name', 'flynt'),
            'name' => 'city',
            'type' => 'text',
            'placeholder' => __('z. B. Hauptsitz Dresden', 'flynt'),
            'wrapper' => ['width' => '100%'],
          ],
          [
            'label' => __('Straße', 'flynt'),
            'name' => 'street',
            'type' => 'text',
            'wrapper' => ['width' => '100%'],
          ],
          [
            'label' => __('PLZ', 'flynt'),
            'name' => 'zip',
            'type' => 'text',
            'wrapper' => ['width' => '33.33%'],
          ],
          [
            'label' => __('Stadt', 'flynt'),
            'name' => 'cityName',
            'type' => 'text',
            'wrapper' => ['width' => '33.33%'],
          ],
          [
            'label' => __('Land (optional)', 'flynt'),
            'name' => 'country',
            'type' => 'text',
            'wrapper' => ['width' => '33.33%'],
          ],
          [
            'label' => __('Google Maps Link (optional)', 'flynt'),
            'name' => 'mapLink',
            'type' => 'url',
            'instructions' => __('Link zu Google Maps.', 'flynt'),
          ],
        ],
      ],

      // Sektion: Kontakt
      [
        'label' => '',
        'name' => 'contactDivider',
        'type' => 'message',
        'message' =>
          '<h3 style="margin:0;padding:8px 0;border-bottom:2px solid #0073aa;">Kontakt</h3>',
        'conditional_logic' => $conditionContactOnly,
      ],
      [
        'label' => __('Kontaktbereiche', 'flynt'),
        'name' => 'contactAreas',
        'type' => 'repeater',
        'min' => 0,
        'max' => 4,
        'layout' => 'block',
        'button_label' => __('Kontaktbereich hinzufügen', 'flynt'),
        'conditional_logic' => $conditionContactOnly,
        'sub_fields' => [
          [
            'label' => __('Titel', 'flynt'),
            'name' => 'title',
            'type' => 'text',
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
            'return_format' => 'array',
            'wrapper' => ['width' => '100%'],
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
        'name' => 'layoutVariant',
        'type' => 'button_group',
        'instructions' => __('Wählen Sie das Layout für dieses Modul.', 'flynt'),
        'choices' => [
          'withForm' => __('Mit Kontaktformular', 'flynt'),
          'contactOnly' => __('Nur Kontakt & Standorte', 'flynt'),
        ],
        'default_value' => 'withForm',
        'layout' => 'horizontal',
        'wrapper' => ['width' => '50%'],
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
        'instructions' => __(
          'Legen Sie fest, wie der Text oberhalb des Moduls ausgerichtet werden soll.',
          'flynt',
        ),
        'wrapper' => ['width' => '50%'],
      ],
      [
        'label' => __('Design', 'flynt'),
        'name' => 'designTab',
        'type' => 'tab',
        'conditional_logic' => $conditionContactOnly,
      ],
      [
        'label' => __('Kontakt-Layout', 'flynt'),
        'name' => 'contactLayout',
        'type' => 'select',
        'choices' => [
          '2' => __('2 Spalten', 'flynt'),
          '3' => __('3 Spalten', 'flynt'),
          '4' => __('4 Spalten', 'flynt'),
        ],
        'default_value' => '2',
        'wrapper' => ['width' => '50%'],
        'conditional_logic' => $conditionContactOnly,
      ],
      [
        'label' => __('Standort-Layout', 'flynt'),
        'name' => 'locationsLayout',
        'type' => 'select',
        'choices' => [
          '2' => __('2 Spalten', 'flynt'),
          '3' => __('3 Spalten', 'flynt'),
          '4' => __('4 Spalten', 'flynt'),
        ],
        'default_value' => '2',
        'wrapper' => ['width' => '50%'],
        'conditional_logic' => $conditionContactOnly,
      ],
    ],
  ];
}
