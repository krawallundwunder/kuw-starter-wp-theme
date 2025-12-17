<?php

/**
 * Convert hex color to RGB values
 *
 * @param string $hex Hex color code
 * @return string RGB values as comma-separated string
 */
function kuw_hex_to_rgb($hex)
{
  $hex = str_replace('#', '', $hex);
  $length = strlen($hex);

  if ($length === 3) {
    $r = hexdec(str_repeat(substr($hex, 0, 1), 2));
    $g = hexdec(str_repeat(substr($hex, 1, 1), 2));
    $b = hexdec(str_repeat(substr($hex, 2, 1), 2));
  } else {
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
  }

  return "{$r}, {$g}, {$b}";
}

/**
 * Output dynamic CSS color variables in the document head
 */
function kuw_output_dynamic_colors()
{
  // 1. Attempt to fetch settings
  $colorSettings = null;

  // Try Flynt Options
  if (class_exists('\Flynt\Utils\Options')) {
    $colorSettings = \Flynt\Utils\Options::getGlobal('Seiten Einstellungen', 'color_settings');
  }

  // Fallback to ACF Options
  if ((!$colorSettings || !is_array($colorSettings)) && function_exists('get_field')) {
    $colorSettings = get_field('color_settings', 'options');
  }

  // 2. Define Defaults
  $defaultColors = [
    'primary_color' => '#2563eb',
    'secondary_color' => '#4f46e5',

  ];

  // 3. Map settings to CSS variable names (using defaults if empty)
  // Format: 'css-var-name' => 'database_key'
  $colorMap = [
    'primary' => !empty($colorSettings['primary_color']) ? $colorSettings['primary_color'] : $defaultColors['primary_color'],
    'secondary' => !empty($colorSettings['secondary_color']) ? $colorSettings['secondary_color'] : $defaultColors['secondary_color'],
  ];

  // 4. Output CSS
  ?>
  <style id="dynamic-colors">
    :root {
      <?php foreach ($colorMap as $name => $color): ?>
        <?php if (!empty($color)): ?>
          --color-<?php echo $name; ?>:
            <?php echo $color; ?>
            !important;
          --color-<?php echo $name; ?>-rgb:
            <?php echo kuw_hex_to_rgb($color); ?>
            !important;
        <?php endif; ?>
      <?php endforeach; ?>
    }

    @theme {
      <?php foreach ($colorMap as $name => $color): ?>
        <?php if (!empty($color)): ?>
          --color-<?php echo $name; ?>:
            <?php echo $color; ?>
          ;
          --color-<?php echo $name; ?>-rgb:
            <?php echo kuw_hex_to_rgb($color); ?>
          ;
        <?php endif; ?>
      <?php endforeach; ?>
    }
  </style>
  <?php
}

add_action('wp_head', 'kuw_output_dynamic_colors', 999);
