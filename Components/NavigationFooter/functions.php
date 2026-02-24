<?php

namespace Flynt\Components\NavigationFooter;

use Flynt\Utils\Options;
use Timber\Timber;

add_action('init', function (): void {
  register_nav_menus([
    'navigation_footer' => __('Navigation Footer', 'flynt'),
  ]);
});

add_filter('Flynt/addComponentData?name=NavigationFooter', function (array $data): array {
  $globalOptions = Options::getGlobal('Seiten Einstellungen');
  $footerSettings = $globalOptions['footer_settings'] ?? [];
  $data['footer_logo'] = $footerSettings['footer_logo'] ?? [];
  $data['footer_social_media'] = $footerSettings['footer_social_media'] ?? [];
  $data['footer_address'] = $footerSettings['footer_address'] ?? '';
  $data['menu'] = Timber::get_menu('navigation_footer') ?? Timber::get_pages_menu();

  $acfLogo = $globalOptions['logo'] ?? [];
  $wpLogoID = get_theme_mod('custom_logo');
  $footerLogo = $data['footer_logo'] ?? [];
  $wpLogo = $wpLogoID ? wp_get_attachment_image_url($wpLogoID, 'full') : null;
  $data['logo'] = [
    'src' => $acfLogo ?: $wpLogo ?: $footerLogo ?: null,
    'alt' => get_bloginfo('name'),
  ];


  return $data;
});

Options::addTranslatable('NavigationFooter', [
  [
    'label' => __('Content', 'flynt'),
    'name' => 'contentTab',
    'type' => 'tab',
    'placement' => 'top',
    'endpoint' => 0,
  ],
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
        'default_value' => __('Footer Navigation', 'flynt'),
        'required' => 1,
        'wrapper' => [
          'width' => '50',
        ],
      ],
    ],
  ],
]);
