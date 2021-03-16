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

<section class="acf-block">
	<div class="container px-4 relative text-center">
		<img
			class="mx-auto h-8 w-auto"
			src="<?php echo $company_logo ?>"
			alt="<?php echo $company_name ?>"
		/>
		<blockquote class="mt-10 mb-0 mx-0">
			<div class="max-w-3xl mx-auto font-medium text-xl sm:text-2xl">
				<p>
					&ldquo;<?php echo $quote ?>&rdquo;
				</p>
			</div>
			<footer class="mt-8 flex flex-col items-center justify-center sm:flex-row">
				<?php if ($author_img): ?>
					<div class="flex-shrink-0 flex">
						<img class="rounded-full h-10 w-10 mx-auto" src="<?php echo $author_img ?>" alt="<?php echo $author_name ?>"/>
					</div>
				<?php endif ?>
				<div class="flex flex-col items-center mt-3 sm:flex-row sm:mt-0 sm:ml-3">
					<div class="font-medium"><?php echo $author_name ?></div>

					<svg class="h-5 text-gray-600 hidden sm:block" fill="currentColor" viewBox="0 0 20 20">
						<path d="M11 0h3L9 20H6l5-20z" />
					</svg>

					<div class="font-medium text-gray-500"><?php echo $author_position ?>, <?php echo $company_name ?></div>
				</div>
			</footer>
		</blockquote>
	</div>
</section>
