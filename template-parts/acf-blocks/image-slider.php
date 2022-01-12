<?php
/**
 * Block: Image slider
 *
 * @package phmu-starter-wp-theme
 */

$id = 'image-slider-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

$title = get_field('sl_title');
$subtitle = get_field('sl_subtitle');
$per_view = get_field('sl_per_view');
?>

<section
	class="acf-block slider image-slider"
>
	<div class="container pr-4 pl-4">
		<?php if ($title): ?>
			<h2><?php echo $title; ?></h2>
		<?php endif; ?>
		<?php if ($subtitle): ?>
			<p class="acf-block__subtitle"><?php echo $subtitle; ?></p>
		<?php endif; ?>
		<div class="glide" id="<?php echo $id; ?>">
			<div class="glide__track" data-glide-el="track">
				<ul class="glide__slides">
					<?php while (have_rows('sl_slides')):

       the_row();
       $img = get_sub_field('sl_slides_img');
       ?>
						<li class="glide__slide">
							<img alt="<?php echo $img['alt']; ?>" src="<?php echo $img['url']; ?>"/>
						</li>
					<?php
     endwhile; ?>
				</ul>
			</div>
			<div class="glide__arrows" data-glide-el="controls">
				<button class="glide__arrow glide__arrow--left" data-glide-dir="<">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/chevron-left.svg"
							 onload="SVGInject(this)"/>
				</button>
				<button class="glide__arrow glide__arrow--right" data-glide-dir="&gt;">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/chevron-right.svg"
							 onload="SVGInject(this)"/>
				</button>
			</div>
			<div class="glide__bullets" data-glide-el="controls[nav]">
				<?php
    $i = 0;
    while (have_rows('sl_slides')):
      the_row(); ?>
					<button class="glide__bullet" data-glide-dir="=<?php echo $i; ?>"></button>
					<?php $i++;
    endwhile;
    ?>
			</div>
		</div>
	</div>
</section>

<script>
	new Glide('#<?php echo $id; ?>', {
		type: 'carousel',
		startAt: 0,
		perView: <?php echo $per_view; ?>,
		breakpoints: {
			640: {
				perView: 1
			},
			768: {
				perView: <?php echo $per_view > 1 ? 2 : $per_view; ?>
			},
			1024: {
				perView: <?php echo $per_view > 2 ? 3 : $per_view; ?>
			}
		}
	}).mount()
</script>
