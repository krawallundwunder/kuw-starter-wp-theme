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

<section class="text-center acf-block">
	<div class="container px-4">
		<h2 class="flex flex-col">
			<span><?php echo $line_1; ?></span>
			<?php if ($line_2): ?>
				<span><?php echo $line_2; ?></span>
			<?php endif; ?>
		</h2>
		<div class="flex flex-col items-center justify-center mt-6 space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
			<a class="w-full button button-primary sm:w-auto" href="<?php echo $button_primary[
     'url'
   ]; ?>">
				<?php echo $button_primary['title']; ?>
			</a>
			<?php if ($button_secondary): ?>
				<a class="w-full button button-secondary sm:w-auto" href="<?php echo $button_secondary[
      'url'
    ]; ?>">
					<?php echo $button_secondary['title']; ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
