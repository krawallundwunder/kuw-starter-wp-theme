<?php

// Register custom block category, change "PHMU" to customer name
function phmu_starter_wp_theme_custom_block_category( $categories, $post )
{
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'phmu-blocks',
				'title' => __( 'PHMU Blocks', 'phmu-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'phmu_starter_wp_theme_custom_block_category', 10, 2);

add_action('acf/init', 'acf_blocks_init');
function acf_blocks_init()
{

	// Check function exists.
	if (function_exists('acf_register_block_type')) {

		// Page Header.
		acf_register_block_type(array(
			'name'              => 'sample-block',
			'title'             => __('Sample Block'),
			'description'       => __('Just a sample block. Delete it after creating the first real block.'),
			'render_template'   => 'template-parts/acf-blocks/sample-block.php',
			'category'          => 'phmu-blocks',
			'mode'              => 'edit',
		));
	}
}
