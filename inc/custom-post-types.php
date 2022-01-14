<?php
/**
 * Register custom post types
 *
 * @package phmu-starter-wp-theme
 */

// TODO: delete this or use this to create a real custom post type
function phmu_starter_wp_theme_create_post_types()
{
  register_post_type(
    'sample-type',
    // CPT Options
    [
      'labels' => [
        'name' => __('Sample types'),
        'singular_name' => __('Sample type'),
      ],
      'public' => true,
      'publicly_queryable' => true,
      'has_archive' => true,
      'rewrite' => ['slug' => 'sample-type'],
      'show_in_rest' => true,
      'rest_base' => 'sample-type',
      'supports' => ['title', 'editor'],
    ]
  );
}

add_action('init', 'phmu_starter_wp_theme_create_post_types');
