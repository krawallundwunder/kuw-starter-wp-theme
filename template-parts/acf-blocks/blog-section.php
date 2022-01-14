<?php
/**
 * Block: Blog section
 *
 * @package phmu-starter-wp-theme
 */

$title = get_field('bs_title');
$subtitle = get_field('bs_subtitle');

$query = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 3,
]);
?>

<section
	class="text-center acf-block"
>
	<div class="container px-4">
		<h2><?php echo $title; ?></h2>
		<?php if ($subtitle): ?>
			<p class="acf-block__subtitle"><?php echo $subtitle; ?></p>
		<?php endif; ?>
		<?php if ($query->have_posts()): ?>
			<div class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
				<?php
    while ($query->have_posts()):
      $query->the_post(); ?>
					<a
						class="text-left rounded-xl shadow bg-white transition-all hover:-mt-0.5 hover:shadow-lg"
						href="<?php the_permalink(); ?>"
					>
						<img
							class="object-cover object-center w-full h-48 rounded-tr-xl rounded-tl-xl sm:h-40 xl:h-64"
							src="<?php echo get_the_post_thumbnail_url(); ?>"
							alt=""
						/>
						<div class="px-6 py-5">
							<h3 class="mt-0 mb-3 text-lg md:text-2xl"><?php the_title(); ?></h3>
							<p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
						</div>
					</a>
				<?php
    endwhile;
    wp_reset_postdata();
    ?>
			</div>
		<?php endif; ?>
		<div></div>
	</div>
</section>
