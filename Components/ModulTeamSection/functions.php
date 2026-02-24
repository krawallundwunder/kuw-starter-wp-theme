<?php

namespace Flynt\Components\ModulTeamSection;

add_filter('Flynt/addComponentData?name=ModulTeamSection', function ($data) {
  $groupedMembers = [];

  // 1. Get all ungrouped team members (no taxonomy assigned)
  $ungroupedArgs = [
    'post_type' => 'team_member',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'tax_query' => [
      [
        'taxonomy' => 'team_group',
        'operator' => 'NOT EXISTS',
      ]
    ],
    'meta_query' => [
      [
        'key' => 'team_member_is_shown',
        'value' => '1',
        'compare' => '=='
      ]
    ]
  ];

  $ungroupedMembers = get_posts($ungroupedArgs);

  if (!empty($ungroupedMembers)) {
    foreach ($ungroupedMembers as $member) {
      $member->fields = get_fields($member->ID);
    }
    $groupedMembers[] = [
      'title' => '', // No title for ungrouped
      'members' => $ungroupedMembers,
      'is_ungrouped' => true
    ];
  }

  // 2. Get grouped team members by taxonomy terms
  $terms = get_terms([
    'taxonomy' => 'team_group',
    'hide_empty' => true,
  ]);

  if (!empty($terms) && !is_wp_error($terms)) {
    foreach ($terms as $term) {
      $args = [
        'post_type' => 'team_member',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'tax_query' => [
          [
            'taxonomy' => 'team_group',
            'field' => 'term_id',
            'terms' => $term->term_id,
          ]
        ],
        'meta_query' => [
          [
            'key' => 'team_member_is_shown',
            'value' => '1',
            'compare' => '=='
          ]
        ]
      ];

      $members = get_posts($args);

      if (!empty($members)) {
        foreach ($members as $member) {
          $member->fields = get_fields($member->ID);
        }
        $groupedMembers[] = [
          'title' => $term->name,
          'members' => $members,
          'is_ungrouped' => false
        ];
      }
    }
  }

  $data['groupedMembers'] = $groupedMembers;
  return $data;
});

function getACFLayout()
{
  return [
    'name' => 'ModulTeamSection',
    'label' => 'Modul: Team Bereich',
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
        'instructions' => __('Kurzer Tag über dem Titel (z. B. „Unser Team", „Über uns", „Die Köpfe" (max. 20 Zeichen)).', 'flynt'),
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
        'label' => __('Einstellungen', 'flynt'),
        'name' => 'optionsTab',
        'type' => 'tab',
        'placement' => 'top',
      ],
      [
        'label' => __('Text Ausrichtung', 'flynt'),
        'name' => 'textAlign',
        'type' => 'button_group',
        'instructions' => __('Lege fest, wie der Text oberhalb des Moduls ausgerichtet werden soll.', 'flynt'),
        'choices' => [
          'text-start' => __('Links', 'flynt'),
          'text-center' => __('Zentriert', 'flynt'),
        ],
        'default_value' => 'text-start',
      ],
    ],
  ];
}
