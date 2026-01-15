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
    'name' => 'modulSliderTextImage',
    'label' => __('Modul: Slider Text Image', 'flynt'),
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
        'maxlength' => 20,
        'instructions' => __('Kurzer Tag über dem Titel (z. B. „Über uns", „Unsere Leistung", „Was uns ausmacht" (max. 20 Zeichen)).', 'flynt'),
      ],
      [
        'label' => __('Titel', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'maxlength' => 50,
        'instructions' => __('Fügen Sie einen Titel für den gesamten Slider hinzu (max. 50 Zeichen).', 'flynt'),
      ],
      [
        'label' => __('Beschreibung', 'flynt'),
        'name' => 'description',
        'type' => 'textarea',
        'maxlength' => 500,
        'instructions' => __('Fügen Sie eine Beschreibung für den gesamten Slider hinzu (max. 500 Zeichen).', 'flynt'),
      ],
      [
        'label' => __('Slides', 'flynt'),
        'name' => 'slides',
        'type' => 'repeater',
        'instructions' => __('Hier haben Sie die Möglichkeit ihr Slider mit Inhalten zu füllen.', 'flynt'),
        'layout' => 'row',
        'min' => 1,
        'button_label' => __('Add Slide', 'flynt'),
        'sub_fields' => [
          [
            'label' => __('Inhalt', 'flynt'),
            'name' => 'contentSettings',
            'type' => 'accordion'
          ],
          [
            'label' => __('Fließtext', 'flynt'),
            'name' => 'content',
            'type' => 'textarea',
            'rows' => 6,
            'maxlength' => 500,
            'instructions' => __('Fügen Sie den Fließtext für diesen Slide hinzu (max. 500 Zeichen).', 'flynt'),
            'delay' => 1,
            'required' => 1,
          ],
          [
            'label' => __('Autor', 'flynt'),
            'name' => 'name',
            'type' => 'text',
            'maxlength' => 25,
            'instructions' => __('(max. 25 Zeichen)', 'flynt'),
            'wrapper' => [
              'width' => '33',
            ],
          ],
          [
            'label' => __('Berufsbezeichnung/Rolle', 'flynt'),
            'name' => 'role',
            'type' => 'text',
            'maxlength' => 35,
            'instructions' => __('(max. 35 Zeichen)', 'flynt'),
            'wrapper' => [
              'width' => '33',
            ],
          ],
          [
            'label' => __('Bild', 'flynt'),
            'name' => 'image',
            'type' => 'image',
            'instructions' => __('Ideal: quadratisch.', 'flynt'),
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'wrapper' => [
              'width' => '33',
            ],
          ],
          [
            'label' => __('Hintergrundfarbe', 'flynt'),
            'name' => 'bgColorClass',
            'type' => 'select',
            'instructions' => __('Wählen Sie eine Hintergrundfarbe für diesen Abschnitt aus.', 'flynt'),
            'choices' => [
              'bg-white' => 'Weiß',
              'bg-gray-100' => 'Hellgrau',
              'bg-gray-200' => 'Grau',
              'bg-black' => 'Schwarz',
            ],
            'default_value' => 'bg-white',
            'allow_null' => 0,
          ],
        ]
      ],
      [
        'label' => __('Einstellungen', 'flynt'),
        'name' => 'optionsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
      ],
      [
        'label' => '',
        'name' => 'options',
        'type' => 'group',
        'layout' => 'row',
        'sub_fields' => [

          [
            'label' => __('Autoplay aktivieren', 'flynt'),
            'name' => 'autoplay',
            'type' => 'true_false',
            'instructions' => __('Aktivieren oder deaktivieren Sie die automatische Wiedergabe für den Slider.', 'flynt'),
            'default_value' => 0,
            'ui' => 1
          ],
          [
            'label' => __('Autoplay Geschwindigkeit (in Millisekunden)', 'flynt'),
            'name' => 'autoplaySpeed',
            'type' => 'number',
            'instructions' => __('Legen Sie die Geschwindigkeit der automatischen Wiedergabe in Millisekunden fest.', 'flynt'),
            'min' => 2000,
            'step' => 1,
            'default_value' => 4000,
            'required' => 1,
            'conditional_logic' => [
              [
                [
                  'fieldPath' => 'autoplay',
                  'operator' => '==',
                  'value' => 1
                ]
              ]
            ],
          ],
        ]
      ]
    ],
  ];
}
