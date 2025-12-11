<?php

add_action('wp_head', function () {
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
    'primary' => $colorSettings['primary_color'] ?? $defaultColors['primary_color'],
    'secondary' => $colorSettings['secondary_color'] ?? $defaultColors['secondary_color'],
  ];

  // 4. Helper Closure for RGB conversion
  $hexToRgb = function ($hex) {
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
  };

  // 5. Output CSS
  ?>
  <style id="dynamic-colors">
    :root {
      <?php foreach ($colorMap as $name => $color): ?>
        --color-<?php echo $name; ?>:
          <?php echo $color; ?>
          !important;
        <?php if (!empty($color)): ?>
          --color-<?php echo $name; ?>-rgb:
            <?php echo $hexToRgb($color); ?>
            !important;
        <?php endif; ?>
      <?php endforeach; ?>
    }

    @theme {
      <?php foreach ($colorMap as $name => $color): ?>
        --color-<?php echo $name; ?>:
          <?php echo $color; ?>
        ;
        <?php if (!empty($color)): ?>
          --color-<?php echo $name; ?>-rgb:
            <?php echo $hexToRgb($color); ?>
          ;
        <?php endif; ?>
      <?php endforeach; ?>
    }
  </style>
  <?php
}, 999);
