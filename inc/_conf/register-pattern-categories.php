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
		'hero',
		array(
			'label' => _x( 'Heroalueet', 'admin UI: block pattern category', 'avidly-theme' ), // Translations is generated to .pot correclty but not in editor view, tested in WP 6.4.
		)
	);
	register_block_pattern_category(
		'content',
		array(
			'label' => _x( 'Sisältöalueet', 'admin UI: block pattern category', 'avidly-theme' ),
		)
	);
	register_block_pattern_category(
		'dynamic',
		array(
			'label' => _x( 'Dynaamiset nostot', 'admin UI: block pattern category', 'avidly-theme' ),
		)
	);
	register_block_pattern_category(
		'template',
		array(
			'label' => _x( 'Sivumallit', 'admin UI: block pattern category', 'avidly-theme' ),
		)
	);
}
