<?php
/**
 * Create custom block styles
 *
 * @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/
 *
 * @package Avidly_Theme
 * @since 4.0.0
 */

// Do not continue if register_block_style is not supported.
if ( ! function_exists( 'register_block_style' ) ) {
	return;
}

// List: None.
register_block_style(
	'core/list',
	array(
		'name'       => 'list-none',
		'label'      => _x( 'None', 'admin UI', 'avidly-theme' ),
		'is_default' => false,
		'inline_style' => '.is-style-list-none { list-style:none; padding-left:0; }'
	)
);
