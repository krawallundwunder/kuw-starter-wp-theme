<?php

namespace Flynt\Components\ModulSliderTextImage;

use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=ModulSliderTextImage', function (array $data): array {
  $data['sliderOptions'] = Options::getTranslatable('SliderOptions');
  $data['jsonData'] = [
    'options' => array_merge($data['sliderOptions'], $data['options']),
  ];
  return $data;
});

function getACFLayout(): array
{
  return [
    'name' => 'ModulSliderTextImage',
    'label' => __('Modul: Slider Text & Bild', 'flynt'),
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
        'instructions' => __('Kurzer Tag über dem Titel.', 'flynt'),
        'wrapper' => ['width' => '33%'],
      ],
      [
        'label' => __('Titel', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'instructions' => __('Titel für den gesamten Slider.', 'flynt'),
        'wrapper' => ['width' => '50%'],
      ],
      [
        'label' => __('Beschreibung', 'flynt'),
        'name' => 'description',
        'type' => 'textarea',
        'instructions' => __('Beschreibung oder Einleitungstext für den Slider.', 'flynt'),
      ],
      [
        'label' => __('Slides', 'flynt'),
        'name' => 'slides',
        'type' => 'repeater',
        'instructions' => __(
          'Hier haben Sie die Möglichkeit, Ihren Slider mit Inhalten zu füllen.',
          'flynt',
        ),
        'layout' => 'row',
        'min' => 1,
        'button_label' => __('Slide hinzufügen', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Inhalt', 'flynt'),
            'name' => 'contentSettings',
            'type' => 'accordion',
          ],
          [
            'label' => __('Fließtext', 'flynt'),
            'name' => 'content',
            'type' => 'textarea',
            'rows' => 6,
            'instructions' => __('Fließtext für diesen Slide.', 'flynt'),
            'delay' => 1,
          ],
          [
            'label' => __('Autor', 'flynt'),
            'name' => 'name',
            'type' => 'text',
            'instructions' => __('Name des Autors oder der Person.', 'flynt'),
            'wrapper' => ['width' => '33%'],
          ],
          [
            'label' => __('Berufsbezeichnung/Rolle', 'flynt'),
            'name' => 'role',
            'type' => 'text',
            'instructions' => __('z. B. „Geschäftsführer", „Mitglied".', 'flynt'),
            'wrapper' => ['width' => '33%'],
          ],
          [
            'label' => __('Bild', 'flynt'),
            'name' => 'image',
            'type' => 'image',
            'instructions' => __('Ideal: quadratisch.', 'flynt'),
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'wrapper' => ['width' => '33%'],
          ],
          [
            'label' => __('Hintergrundfarbe', 'flynt'),
            'name' => 'bgColorClass',
            'type' => 'select',
            'instructions' => __(
              'Wählen Sie eine Hintergrundfarbe für diesen Abschnitt aus.',
              'flynt',
            ),
            'choices' => [
              'bg-primary/20' => __('Primärfarbe', 'flynt'),
              'bg-secondary/20' => __('Sekundärfarbe', 'flynt'),
              'bg-black' => __('Schwarz', 'flynt'),
            ],
            'default_value' => 'bg-primary/20',
            'allow_null' => 0,
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
            'label' => __('Text im Kopfbereich', 'flynt'),
            'name' => 'textAlign',
            'type' => 'button_group',
            'instructions' => __(
              'Legen Sie fest, wie der Text oberhalb des Moduls ausgerichtet werden soll.',
              'flynt',
            ),
            'choices' => [
              'text-start' => __('Links', 'flynt'),
              'text-center' => __('Zentriert', 'flynt'),
            ],
            'default_value' => 'text-start',
            'allow_null' => 0,
            'return_format' => 'value',
            'layout' => 'horizontal',
            'wrapper' => ['width' => '50%'],
          ],

          [
            'label' => __('Autoplay aktivieren', 'flynt'),
            'name' => 'autoplay',
            'type' => 'true_false',
            'instructions' => __(
              'Aktivieren oder deaktivieren Sie die automatische Wiedergabe für den Slider.',
              'flynt',
            ),
            'default_value' => 0,
            'ui' => 1,
            'wrapper' => ['width' => '25%'],
          ],
          [
            'label' => __('Autoplay Geschwindigkeit (in Millisekunden)', 'flynt'),
            'name' => 'autoplaySpeed',
            'type' => 'number',
            'instructions' => __(
              'Legen Sie die Geschwindigkeit der automatischen Wiedergabe in Millisekunden fest.',
              'flynt',
            ),
            'min' => 2000,
            'step' => 1,
            'default_value' => 4000,
            'wrapper' => ['width' => '25%'],
            'conditional_logic' => [
              [
                [
                  'fieldPath' => 'autoplay',
                  'operator' => '==',
                  'value' => 1,
                ],
              ],
            ],
          ],
        ],
      ],
    ],
  ];
}
