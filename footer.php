<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package phmu-starter-wp-theme
 */
?>

<footer class="container bg-white">
  <div class="px-4 py-12 mx-auto overflow-hidden max-w-7xl sm:px-6 lg:px-8">
    <nav class="flex flex-wrap justify-center -mx-5 -my-2" aria-label="Footer">
      <div class="px-5 py-2">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-base text-gray-500 hover:text-gray-900"> Home </a>
      </div>

    </nav>

    <p class="mt-8 text-base text-center text-gray-400">		<a href="<?php echo esc_url(
    __('https://wordpress.org/', 'phmu-starter-wp-theme')
  ); ?>">
			 <?php printf(
      esc_html__('Proudly powered by %s', 'phmu-starter-wp-theme'),
      'WordPress'
    ); ?>
		</a>
		<span class="sep"> | </span>
		 <?php printf(
     esc_html__('Theme: %1$s by %2$s.', 'phmu-starter-wp-theme'),
     'phmu-starter-wp-theme',
     '<a href="https://www.phmu.de/">PHMU</a>'
   ); ?></p>
  </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
