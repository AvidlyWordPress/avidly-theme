<?php
/**
 * Create default block templates for post types.
 *
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 *
 * @package Avidly_theme
 * @since 3.4.0
 */

add_action( 'init', 'avidly_theme_unregister_core_block_pattern_cats' );
add_filter( 'init', 'avidly_theme_register_custom_block_pattern_cats' );

/**
 * Unregister induvidual categories created by WordPress core.
 * Note: Tested with WordPress 6.4, if categories names has some changes in future, deprecated names will generate PHP error. There is no functionality at the moment to automatically detect and disable all core pattern categories at once.
 *
 * @link https://developer.wordpress.org/reference/functions/unregister_block_pattern_category/
 *
 * @return void
 */
function avidly_theme_unregister_core_block_pattern_cats() {
	unregister_block_pattern_category( 'banner' );
	unregister_block_pattern_category( 'buttons' );
	unregister_block_pattern_category( 'columns' );
	unregister_block_pattern_category( 'text' );
	unregister_block_pattern_category( 'query' );
	unregister_block_pattern_category( 'featured' );
	unregister_block_pattern_category( 'call-to-action' );
	unregister_block_pattern_category( 'team' );
	unregister_block_pattern_category( 'testimonials' );
	unregister_block_pattern_category( 'services' );
	unregister_block_pattern_category( 'contact' );
	unregister_block_pattern_category( 'about' );
	unregister_block_pattern_category( 'portfolio' );
	unregister_block_pattern_category( 'gallery' );
	unregister_block_pattern_category( 'media' );
	unregister_block_pattern_category( 'posts' );
	unregister_block_pattern_category( 'footer' );
	unregister_block_pattern_category( 'header' );
}

/**
 * Register custom block patterns categories.
 *
 * Note: Translations is detected to .pot correctly but not in editor view (WordPress 6.4.)
 * @return void
 */
function avidly_theme_register_custom_block_pattern_cats() {
	// Register block pattern categories.
	register_block_pattern_category(
		'hero',
		array(
			'label' => _x( 'Heroalueet', 'admin UI: block pattern category', 'avidly-theme' ),
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
