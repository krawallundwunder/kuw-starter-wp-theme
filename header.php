<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package phmu-starter-wp-theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/dist/svg-inject.min.js?=v1.2.3"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/dist/glide.min.js?=v3.5.2"></script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/dist/glide.core.min.css?=v3.5.2">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/dist/glide.theme.min.css?=v3.5.2">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="sr-only"
		 href="#primary"><?php esc_html_e(
     'Skip to content',
     'phmu-starter-wp-theme'
   ); ?></a>

	<header id="masthead" class="py-5 site-header dark:bg-gray-900">
		<div class="flex flex-row items-center justify-between px-5">
			<div class="site-branding">
				<p class="font-bold text-gray-900 dark:text-white">
					<a
						href="<?php echo esc_url(home_url('/')); ?>"
						rel="home"
					>
						<?php bloginfo('name'); ?>
					</a>
				</p>
			</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
        <div class="-mb-1 lg:hidden">
          <button
            class="hamburger hamburger--spin"
            :class="open && 'is-active'"
            aria-controls="menu-mobile"
            :aria-expanded="open"
            @click="toggle()"
          >
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
          </button>
        </div>
				<div class="hidden lg:block">
          <?php wp_nav_menu([
            'theme_location' => 'menu-1',
            'menu_class' => 'menu-desktop',
          ]); ?>
        </div>
        <div class="menu-mobile fixed top-[4rem] px-5 py-2.5 left-0 right-0 bottom-0 w-full bg-white transition" x-show="open" x-transition>
        <?php wp_nav_menu([
          'theme_location' => 'menu-1',
          'menu_id' => 'menu-mobile',
        ]); ?>
        </div>
	</nav><!-- #site-navigation -->
    </div>
	</header><!-- #masthead -->
