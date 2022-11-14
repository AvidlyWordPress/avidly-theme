<?php
/**
 * Create default block templates for post types.
 *
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 *
 * @package Avidly_theme
 * @since 3.4.0
 */

add_filter( 'init', 'avidly_theme_block_pattern_cat' );

/**
 * Register custom block patterns categories.
 */
function avidly_theme_block_pattern_cat() {
	// Register block pattern categories.
	register_block_pattern_category(
		'avidly_theme-content',
		array(
			'label' => _x( 'Content areas', 'admin UI: block pattern category', 'avidly-theme' ),
		)
	);
	register_block_pattern_category(
		'avidly_theme-query',
		array(
			'label' => _x( 'Query loop areas', 'admin UI: block pattern category', 'avidly-theme' ),
		)
	);
}
