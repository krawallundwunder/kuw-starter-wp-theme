<?php
/**
 * Block: Blog section
 *
 * @package phmu-starter-wp-theme
 */

$title = get_field('bs_title');
$subtitle = get_field('bs_subtitle');

$query = new WP_Query(array(
	'post_type' => 'post',
	'posts_per_page' => 3,
));
?>

<section
	class="acf-block blog-section"
>
	<div class="container">
		<h2 class="blog-section__title"><?php echo $title ?></h2>
		<?php if ($subtitle): ?>
			<p class="blog-section__subtitle"><?php echo $subtitle ?></p>
		<?php endif ?>
		<?php if ($query->have_posts()): ?>
			<div class="blog-section__grid">
				<?php while ($query->have_posts()): $query->the_post() ?>
					<a class="blog-section__post-card" href="<?php the_permalink() ?>">
						<img src="<?php echo get_the_post_thumbnail_url() ?>" alt=""/>
						<div class="blog-section__post-card-content">
							<h3><?php the_title() ?></h3>
							<p><?php echo wp_trim_words(get_the_excerpt(), 15) ?></p>
						</div>
					</a>
				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php endif ?>
		<div></div>
	</div>
</section>
