<?php
/**
 * Block: Hero section
 *
 * @package phmu-starter-wp-theme
 */

$title = get_field('hs_title');
$subtitle = get_field('hs_subtitle');
$button_primary = get_field('hs_button_primary');
$button_secondary = get_field('hs_button_secondary');
$bg = get_field('hs_bg');
$is_front_page = get_field('hs_is_front_page');

$bg_style = $bg ? 'background-image: linear-gradient(rgba(0, 0, 0, 0.625), rgba(0, 0, 0, 0.625)), url('.$bg.')' : ''
?>

<section
	class="acf-block hero-section<?php echo ($bg ? ' has-bg-img' : '') ?><?php echo ($is_front_page ? ' is-front-page' : '') ?>"
	style="<?php echo $bg_style ?>"
>
	<div class="container pr-4 pl-4">
		<h1 class="hero-section__title"><?php echo $title ?></h1>
		<p class="hero-section__subtitle"><?php echo $subtitle ?></p>
		<?php if ($button_primary): ?>
			<div class="hero-section__buttons">
				<a class="button button-primary" href="<?php echo $button_primary['url'] ?>">
					<?php echo $button_primary['title'] ?>
				</a>
				<?php if ($button_secondary): ?>
					<a class="button button-secondary" href="<?php echo $button_secondary['url'] ?>">
						<?php echo $button_secondary['title'] ?>
					</a>
				<?php endif ?>
			</div>
		<?php endif ?>
	</div>
</section>
