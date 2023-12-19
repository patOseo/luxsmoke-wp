<?php
// Create custom Gutenberg block category for ACF Blocks
function lux_block_category( $categories, $post ) {
    array_unshift( $categories, array(
		'slug'	=> 'lux-blocks',
		'title' => 'Lux Smoke Blocks'
	) );

	return $categories;
}
add_filter( 'block_categories_all', 'lux_block_category', 1, 2);

/**
 * Registers custom ACF blocks.
 */
add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/../blocks/product-categories' );
	register_block_type( __DIR__ . '/../blocks/product' );
	register_block_type( __DIR__ . '/../blocks/social-links' );
	register_block_type( __DIR__ . '/../blocks/blog-feed' );
}
