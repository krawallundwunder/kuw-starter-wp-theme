<?php

namespace Flynt\Components\SliderTextImage;

use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=SliderTextImage', function (array $data): array {
  $data['sliderOptions'] = Options::getTranslatable('SliderOptions');
  $data['jsonData'] = [
    'options' => array_merge($data['sliderOptions'], $data['options']),
  ];
  return $data;
});

function getACFLayout(): array
{
  return [
    'name' => 'sliderTextImage',
    'label' => __('Slider: Text Image', 'flynt'),
    'sub_fields' => [
      [
        'label' => __('Content', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
      ],
      [
        'label' => __('Tag', 'flynt'),
        'name' => 'tag',
        'type' => 'text',
        'instructions' => __('Fügen Sie einen Titel für den gesamten Slider hinzu.', 'flynt'),
        'required' => 0,
      ],
      [
        'label' => __('Titel', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'instructions' => __('Fügen Sie einen Titel für den gesamten Slider hinzu.', 'flynt'),
        'required' => 0,
      ],
      [
        'label' => __('Beschreibung', 'flynt'),
        'name' => 'description',
        'type' => 'wysiwyg',
        'instructions' => __('Fügen Sie eine Beschreibung für den gesamten Slider hinzu.', 'flynt'),
        'required' => 0,
        'media_upload' => 0,
      ],
      [
        'label' => __('Slides', 'flynt'),
        'name' => 'slides',
        'type' => 'repeater',
        'instructions' => __('Fügen Sie Slides zum Slider hinzu.', 'flynt'),
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
            'label' => __('Fließtext (WYSIWYG!)', 'flynt'),
            'name' => 'content',
            'type' => 'wysiwyg',
            'instructions' => __('fügen sie den Fließtext für diesen Slide hinzu.', 'flynt'),
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 0,
            'delay' => 1,
            'required' => 1
          ],
          [
            'label' => __('Author', 'flynt'),
            'name' => 'name',
            'type' => 'text',
            'instructions' => __('Name der Person, die das Zitat gesagt hat.', 'flynt'),
            'wrapper' => [
              'width' => '33',
            ],
          ],
          [
            'label' => __('Berufsbezeichnung/Rolle', 'flynt'),
            'name' => 'role',
            'type' => 'text',
            'instructions' => __('Berufsbezeichnung oder Rolle der Person, die das Zitat gesagt hat.', 'flynt'),
            'wrapper' => [
              'width' => '33',
            ],
          ],
          [
            'label' => __('Bild', 'flynt'),
            'name' => 'image',
            'type' => 'image',
            'instructions' => __('Bild der Person, die das Zitat gesagt hat. Ideal: quadratisch.', 'flynt'),
            'required' => 0,
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
            'required' => 0,
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
        'label' => __('Options', 'flynt'),
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
