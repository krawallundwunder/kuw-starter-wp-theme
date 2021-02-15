<?php
/**
 * Block: CTA section
 *
 * @package phmu-starter-wp-theme
 */

$line_1 = get_field('cta_line_1');
$line_2 = get_field('cta_line_2');
$button_primary = get_field('cta_button_primary');
$button_secondary = get_field('cta_button_secondary');
?>

<div class="acf-block cta-section">
	<div class="container pr-4 pl-4">
		<h2 class="cta-section__title">
			<span><?php echo $line_1 ?></span>
			<span><?php echo $line_2 ?></span>
		</h2>
		<div class="cta-section__buttons">
			<a class="button button-primary" href="<?php echo $button_primary['url'] ?>">
				<?php echo $button_primary['title'] ?>
			</a>
			<a class="button button-secondary" href="<?php echo $button_secondary['url'] ?>">
				<?php echo $button_secondary['title'] ?>
			</a>
		</div>
	</div>
</div>
