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
        'maxlength' => 20,
        'instructions' => __('Kurzer Tag über dem Titel (z. B. „Kontakt", „Standorte", „Ansprechpartner") (max. 20 Zeichen).', 'flynt'),
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
            'instructions' => __('Name des Standorts oder der Kontaktperson (z. B. "Hauptsitz Dresden", "Max Mustermann")', 'flynt'),
            'required' => 0,
            'wrapper' => ['width' => '100%'],
          ],
          [
            'label' => __('Straße & Hausnummer', 'flynt'),
            'name' => 'street',
            'type' => 'text',
            'instructions' => __('Straßenadresse (z. B. "Musterstraße 123")', 'flynt'),
            'required' => 0,
            'wrapper' => ['width' => '100%'],
          ],
          [
            'label' => __('PLZ', 'flynt'),
            'name' => 'zip',
            'type' => 'text',
            'instructions' => __('Postleitzahl (z. B. "01234")', 'flynt'),
            'required' => 0,
            'wrapper' => ['width' => '33.33%'],
          ],
          [
            'label' => __('Stadt', 'flynt'),
            'name' => 'city',
            'type' => 'text',
            'instructions' => __('Stadtname (z. B. "Dresden")', 'flynt'),
            'required' => 0,
            'wrapper' => ['width' => '33.33%'],
          ],
          [
            'label' => __('Land', 'flynt'),
            'name' => 'country',
            'type' => 'text',
            'instructions' => __('Land (z. B. "Deutschland")', 'flynt'),
            'required' => 0,
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
        'message' => '<h3 style="margin:0;padding:8px 0;border-bottom:2px solid #0073aa;">Standorte</h3>',
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
            'instructions' => __('z. B. "Hauptsitz Dresden" oder "Niederlassung Berlin"', 'flynt'),
            'required' => 0,
            'wrapper' => ['width' => '100'],
          ],
          [
            'label' => __('Straße', 'flynt'),
            'name' => 'street',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => '100'],
          ],
          [
            'label' => __('PLZ', 'flynt'),
            'name' => 'zip',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => '33.33'],
          ],
          [
            'label' => __('Stadt', 'flynt'),
            'name' => 'cityName',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => '33.33'],
          ],
          [
            'label' => __('Land (optional)', 'flynt'),
            'name' => 'country',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => '33.33'],
          ],
          [
            'label' => __('Google Maps Link (optional)', 'flynt'),
            'name' => 'mapLink',
            'type' => 'url',
            'required' => 0,
          ],
        ],
      ],

      // Sektion: Kontakt
      [
        'label' => '',
        'name' => 'contactDivider',
        'type' => 'message',
        'message' => '<h3 style="margin:0;padding:8px 0;border-bottom:2px solid #0073aa;">Kontakt</h3>',
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
            'required' => 0,
            'wrapper' => ['width' => '100'],
          ],
          [
            'label' => __('E-Mail', 'flynt'),
            'name' => 'email',
            'type' => 'email',
            'required' => 0,
            'wrapper' => ['width' => '50'],
          ],
          [
            'label' => __('Telefon', 'flynt'),
            'name' => 'phone',
            'type' => 'text',
            'required' => 0,
            'wrapper' => ['width' => '50'],
          ],
          [
            'label' => __('Link zum Kontaktformular', 'flynt'),
            'name' => 'formLink',
            'type' => 'link',
            'return_format' => 'array',
            'required' => 0,
            'wrapper' => ['width' => '100'],
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
        'instructions' => __('Wähle das Layout für dieses Modul.', 'flynt'),
        'choices' => [
          'withForm' => __('Mit Kontaktformular', 'flynt'),
          'contactOnly' => __('Nur Kontakt & Standorte', 'flynt'),
        ],
        'default_value' => 'withForm',
        'layout' => 'horizontal',
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
        'instructions' => __('Lege fest, wie der Text im Header-Bereich ausgerichtet werden soll.', 'flynt'),
        'required' => 1,
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
        'wrapper' => ['width' => '50'],
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
        'wrapper' => ['width' => '50'],
        'conditional_logic' => $conditionContactOnly,
      ],
    ],
  ];
}
