<?php
/**
 * Block: Welcome Text
 *
 * @package Advelio_WP_Theme
 */

$headline = get_field('sb_headline');
$text = get_field('sb_text')
?>

<div class="acf-block sample-block">
	<div class="container pr-4 pl-4">
		<h2 class="sample-block__headline">
			<?php the_field('sb_headline') ?>
		</h2>
		<div class="sample-block__text">
			<?php the_field('sb_text') ?>
		</div>
	</div>
</div>
