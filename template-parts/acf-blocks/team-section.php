<?php
/**
 * Block: Team section
 *
 * @package phmu-starter-wp-theme
 */

$headline = get_field('ts_headline');
$subtitle = get_field('ts_subtitle');
?>

<section class="acf-block text-center">
	<div class="container px-4">
		<h2><?php echo $headline; ?></h2>
		<?php if ($subtitle): ?>
			<p class="acf-block__subtitle"><?php echo $subtitle; ?></p>
		<?php endif; ?>
		<div class="mt-10 grid grid-cols-1 gap-8 md:grid-cols-3">
			<?php while (have_rows('ts_team_members')):
     the_row(); ?>
				<div class="text-center">
					<img
						class="mx-auto w-48 h-48 rounded-full lg:h-64 lg:w-64"
						src="<?php the_sub_field('ts_team_members_img'); ?>"
						alt="<?php the_sub_field('ts_team_members_name'); ?>"
					/>
					<div class="mt-3">
						<p class="font-semibold">
							<?php the_sub_field('ts_team_members_name'); ?>
						</p>
						<p class="font-medium text-gray-600">
							<?php the_sub_field('ts_team_members_position'); ?>
						</p>
					</div>
				</div>
			<?php
   endwhile; ?>
		</div>
	</div>
</section>
