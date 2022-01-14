<?php
/**
 * Block: Logo cloud
 *
 * @package phmu-starter-wp-theme
 */

$headline = get_field('lc_headline'); ?>

<section class="text-center acf-block">
	<div class="container px-4">
		<?php if ($headline): ?>
			<h2 class="text-base font-semibold tracking-wide text-gray-500 uppercase">
				<?php echo $headline; ?>
			</h2>
		<?php endif; ?>
		<div class="mt-2 grid grid-cols-2 gap-8 lg:grid-cols-6">
			<?php while (have_rows('lc_logos')):
     the_row(); ?>
				<div class="flex items-center justify-center">
					<img
						class="h-12"
						src="<?php echo the_sub_field('lc_logos_logo'); ?>"
						alt="<?php echo the_sub_field('lc_logos_company'); ?>"
					/>
				</div>
			<?php
   endwhile; ?>
		</div>
	</div>
</section>
