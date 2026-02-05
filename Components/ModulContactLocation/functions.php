<?php

namespace Flynt\Components\ModulContactLocation;

add_filter('Flynt/addComponentData?name=ModulContactLocation', function ($data) {
  // No additional data processing needed for this simplified version
  return $data;
});

function getACFLayout()
{
  return [
    'name' => 'ModulContactLocation',
    'label' => __('Modul: Kontakt & Standorte', 'flynt'),
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

      [
        'label' => __('Einstellungen', 'flynt'),
        'name' => 'optionsTab',
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
        'instructions' => __('Lege fest, wie der Text im Header-Bereich ausgerichtet werden soll.', 'flynt'),
        'required' => 1,
      ],
    ],
  ];
}
