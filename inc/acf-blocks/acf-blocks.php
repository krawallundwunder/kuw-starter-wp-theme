<?php

add_filter('block_categories_all', function ($categories, $post) {
  return array_merge(
    [
      [
        'slug'  => 'kuw-category',
        'title' => __('kuw Blöcke', 'flynt'),
        'icon'  => null,
      ],
    ],
    $categories
  );
}, 10, 2);

add_action('after_setup_theme', function (): void {
  add_theme_support('editor-styles');

  add_editor_style('assets/css/editor-style.scss');
});


if (function_exists('acf_register_block_type')) {
  add_action('acf/init', function () {
    // Register ACF Blocks
    acf_register_block_type([
      'name' => 'text',
      'title' => __('Intro', 'flynt'),
      'render_template' => 'templates/blocks/Text/Text.php',
      'category' => 'kuw-category',
      'icon' => 'text',
      'mode' => 'edit',
    ]);
  });
}
