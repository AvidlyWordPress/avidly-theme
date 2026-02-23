<?php
/**
 * Create custom block styles
 *
 * @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/
 *
 * @package Avidly_Theme
 * @since 4.0.0
 */

/**
 * Register custom block styles on init (after translations are loaded).
 */
function avidly_theme_register_block_styles() {
	if ( ! function_exists( 'register_block_style' ) ) {
		return;
	}

	register_block_style(
		'core/list',
		array(
			'name'         => 'list-none',
			'label'        => _x( 'None', 'admin UI', 'avidly-theme' ),
			'is_default'   => false,
			'inline_style' => '.is-style-list-none { list-style:none; padding-left:0; }',
		)
	);
}

add_action( 'init', 'avidly_theme_register_block_styles' );
