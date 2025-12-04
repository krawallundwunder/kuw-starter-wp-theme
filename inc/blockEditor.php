<?php

/**
 * Block Editor related adjustments.
 */

namespace Flynt\BlockEditor;

/*
 * Disable Full Site Editing
 */

define('DISABLE_FSE', '__return_true');

/*
 * Disable Templates and Template Parts in Block Editor
 */
add_filter(
  'block_editor_settings_all',
  function (array $settings): array {
    $settings['supportsTemplateMode'] = false;
    return $settings;
  },
  10,
);

/*
 * Conditionally remove or enable the editor based on page template
 */
add_action('init', function (): void {
  global $pagenow;

  if ($pagenow === 'post.php' && isset($_GET['post'])) {
    $post_id = intval($_GET['post']);
    $post = get_post($post_id);

    if ($post && $post->post_type === 'page') {
      // Define the templates where you want the editor enabled
      $specific_templates = ['page-custom.php'];

      $page_template = get_page_template_slug($post_id);

      if (!in_array($page_template, $specific_templates, true)) {
        // Remove editor support for pages that do not match the specific templates
        remove_post_type_support('page', 'editor');
      }
    }
  }

  remove_action('wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles');
});

/*
 * Conditionally remove Gutenberg block related styles on front-end
 */
add_action('wp_enqueue_scripts', function (): void {
  global $post;

  // Remove block styles only if the current post (or page) has no blocks
  if (isset($post) && !has_blocks($post->ID)) {
    wp_dequeue_style('core-block-supports');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
  }
});
