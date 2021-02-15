<?php
/**
 * Block: Team section
 *
 * @package phmu-starter-wp-theme
 */

$headline = get_field('ts_headline');
$subtitle = get_field('ts_subtitle');
?>

<section class="acf-block team-section">
	<div class="container pr-4 pl-4">
		<h2><?php echo $headline ?></h2>
		<?php if ($subtitle): ?>
			<p><?php echo $subtitle ?></p>
		<?php endif ?>
		<div class="team-section__grid">
			<?php while (have_rows('ts_team_members')): the_row(); ?>
				<div class="team-section__team-member">
					<img src="<?php the_sub_field('ts_team_members_img') ?>"
							 alt="<?php the_sub_field('ts_team_members_name') ?>"/>
					<div class="mt-3">
						<p class="team-section__name"><?php the_sub_field('ts_team_members_name') ?></p>
						<p class="team-section__position"><?php the_sub_field('ts_team_members_position') ?></p>
					</div>
				</div>
			<?php endwhile ?>
		</div>
	</div>
</section>
