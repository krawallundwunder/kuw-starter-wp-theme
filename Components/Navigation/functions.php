<?php

namespace Flynt\Components\Navigation;

use Flynt\Utils\Asset;
use Flynt\Utils\Options;
use Timber\Timber;

add_action('init', function (): void {
  register_nav_menus([
    'navigation_main' => __('Navigation Main', 'flynt'),
  ]);
});

add_filter('Flynt/addComponentData?name=Navigation', function (array $data): array {
  $globalOptions = Options::getGlobal('Seiten Einstellungen');
  $data['menu'] = Timber::get_menu('navigation_main') ?? Timber::get_pages_menu();

  $acfLogo = $globalOptions['logo'] ?? [];
  $wpLogoID = get_theme_mod('custom_logo');
  $wpLogo = $wpLogoID ? wp_get_attachment_image_url($wpLogoID, 'full') : null;
  $defaultLogo = Asset::requireUrl('assets/images/logo.png');
  $data['logo'] = [
    'src' => ($acfLogo['src'] ?? null) ?: $wpLogo ?: $defaultLogo,
    'alt' => get_bloginfo('name'),
  ];

  return $data;
});

Options::addTranslatable('Navigation', [
  [
    'label' => __('Labels', 'flynt'),
    'name' => 'labelsTab',
    'type' => 'tab',
    'placement' => 'top',
    'endpoint' => 0,
  ],
  [
    'label' => '',
    'name' => 'labels',
    'type' => 'group',
    'sub_fields' => [
      [
        'label' => __('Aria Label', 'flynt'),
        'name' => 'ariaLabel',
        'type' => 'text',
        'default_value' => __('Main Navigation', 'flynt'),
        'required' => 1,
        'wrapper' => [
          'width' => '50',
        ],
      ],
    ],
  ],
]);
