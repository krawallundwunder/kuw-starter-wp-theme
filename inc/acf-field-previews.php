<?php

namespace Flynt\ACF;

\add_filter('acf/fields/flexible_content/layout_title', function ($title, $field, $layout, $i) {
  if (!\is_admin() || !isset($layout['name'])) {
    return $title;
  }

  global $post;
  if (!$post) {
    return $title;
  }

  $label = \get_post_meta($post->ID, "pageComponents_{$i}_title", true);
  if ($label) {
    $title .= ' — <span class="acf-layout-title__label">' . \esc_html($label) . '</span>';
  }

  return $title;
}, 10, 4);


// \add_filter('acf/fields/flexible_content/layout_title', function ($title, $field, $layout, $i) {
//   if (!\is_admin() || !isset($layout['name'])) {
//     return $title;
//   }

//   global $post;
//   if (!$post) {
//     return $title;
//   }

//   // First, try to get the custom preview text (first_card_preview)
//   $customPreview = \get_post_meta($post->ID, "pageComponents_{$i}_first_card_preview", true);

//   // If custom preview exists, use it
//   if ($customPreview) {
//     $title .= ' — <span class="acf-layout-title__label">' . \esc_html($customPreview) . '</span>';
//   } else {
//     // Fallback to headline if custom preview is empty
//     $headline = \get_post_meta($post->ID, "pageComponents_{$i}_headline", true);
//     if ($headline) {
//       $title .= ' — <span class="acf-layout-title__label">' . \esc_html($headline) . '</span>';
//     }
//   }

//   return $title;
// }, 10, 4);

