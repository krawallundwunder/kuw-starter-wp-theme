<?php
/**
 * Block: CTA section
 *
 * @package phmu-starter-wp-theme
 */

$headline = get_field('lc_headline');
?>

<div class="acf-block logo-cloud">
	<div class="container pr-4 pl-4">
		<?php if ($headline): ?>
			<h2 class="logo-cloud__title">
				<?php echo $headline ?>
			</h2>
		<?php endif ?>
		<div class="logo-cloud__grid">
			<?php while (have_rows('lc_logos')): the_row(); ?>
				<div class="logo-cloud__grid-item">
					<img src="<?php echo the_sub_field('lc_logos_logo') ?>"
							 alt="<?php echo the_sub_field('lc_logos_company') ?>"/>
				</div>
			<?php endwhile ?>
		</div>
	</div>
</div>
