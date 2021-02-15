<?php
/**
 * Block: Testimonial
 *
 * @package phmu-starter-wp-theme
 */

$quote = get_field('tm_quote');
$author_name = get_field('tm_author_name');
$author_position = get_field('tm_author_position');
$author_img = get_field('tm_author_img');
$company_name = get_field('tm_company_name');
$company_logo = get_field('tm_company_logo');
?>

<div class="acf-block testimonial">
	<div class="container pr-4 pl-4">
		<img class="testimonial__logo" src="<?php echo $company_logo ?>" alt="<?php echo $company_name ?>"/>
		<blockquote class="mt-10 ml-0 mb-0 mr-0">
			<div class="testimonial__quote">
				<p>
					&ldquo;<?php echo $quote ?>&rdquo;
				</p>
			</div>
			<footer class="mt-8">
				<?php if ($author_img): ?>
					<div class="testimonial__author-img-wrapper">
						<img class="testimonial__author-img" src="<?php echo $author_img ?>" alt="<?php echo $author_name ?>"/>
					</div>
				<?php endif ?>
				<div class="testimonial__author">
					<div class="testimonial__author-name"><?php echo $author_name ?></div>

					<svg class="testimonial__slash" fill="currentColor" viewBox="0 0 20 20">
						<path d="M11 0h3L9 20H6l5-20z" />
					</svg>

					<div class="testimonial__author-position"><?php echo $author_position ?>, <?php echo $company_name ?></div>
				</div>
			</footer>
		</blockquote>
	</div>
</div>
