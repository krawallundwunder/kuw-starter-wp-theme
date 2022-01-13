<?php
/**
 * phmu-starter-wp-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package phmu-starter-wp-theme
 */

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if (!class_exists('Timber')) {
  add_action('admin_notices', function () {
    echo '<div class="error"><p>Timber is not detected. Make sure you <a href="' .
      esc_url(admin_url('plugin-install.php?s=Timber&tab=search&type=term')) .
      '">install and activate</a> the plugin.</p></div>';
  });

  add_filter('template_include', function ($template) {
    return get_stylesheet_directory() . '/.no-timber.html';
  });
  return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = ['components', 'views'];

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

if (!function_exists('phmu_starter_wp_theme_setup')):
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function phmu_starter_wp_theme_setup()
  {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on phmu-starter-wp-theme, use a find and replace
     * to change 'phmu-starter-wp-theme' to the name of your theme in all the template files.
     */
    load_theme_textdomain(
      'phmu-starter-wp-theme',
      get_template_directory() . '/languages'
    );

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus([
      'menu-1' => esc_html__('Primary', 'phmu-starter-wp-theme'),
    ]);

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    ]);

    // Set up the WordPress core custom background feature.
    add_theme_support(
      'custom-background',
      apply_filters('phmu_starter_wp_theme_custom_background_args', [
        'default-color' => 'ffffff',
        'default-image' => '',
      ])
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support('custom-logo', [
      'height' => 250,
      'width' => 250,
      'flex-width' => true,
      'flex-height' => true,
    ]);
  }
endif;
add_action('after_setup_theme', 'phmu_starter_wp_theme_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function phmu_starter_wp_theme_widgets_init()
{
  register_sidebar([
    'name' => esc_html__('Sidebar', 'phmu-starter-wp-theme'),
    'id' => 'sidebar-1',
    'description' => esc_html__('Add widgets here.', 'phmu-starter-wp-theme'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ]);
}

add_action('widgets_init', 'phmu_starter_wp_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function phmu_starter_wp_theme_scripts()
{
  wp_enqueue_style(
    'main-css',
    get_template_directory_uri() . '/assets/css/dist/main.min.css',
    [],
    _S_VERSION
  );
  wp_enqueue_script(
    'main-js',
    get_template_directory_uri() . '/assets/js/dist/main.min.js',
    [],
    _S_VERSION,
    true
  );
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_enqueue_scripts', 'phmu_starter_wp_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * ACF blocks.
 */
require get_template_directory() . '/inc/acf-blocks.php';

/**
 * Custom post types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}
