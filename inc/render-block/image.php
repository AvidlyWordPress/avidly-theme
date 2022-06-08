<?php
/**
 * Change default render: Image block
 *
 * @package Avidly_Theme
 * @since 2.0.0
 */

add_filter( 'render_block', 'avidly_theme_image_block', 10, 2 );

/**
 * Create new output for image block.
 * NOTE: This only changes block sturcture in front end.
 * Support for WP 6.0 where wrapper div was removed from image block.
 *
 * @param string $block_content The block content about to be appended.
 * @param array $block The full block, including name and attributes.
 *
 * @link https://developer.wordpress.org/reference/hooks/render_block/
 */
function avidly_theme_image_block( $block_content, $block ) {

	// Get block name.
	$block_name = ( isset( $block['blockName'] ) ) ? $block['blockName'] : 'unknown';

	// Return if not gallery orimage block.
	if ( 'core/image' !== $block_name ) {
		return $block_content;
	}

	// Fallback, return original output for image blocks added before WP 6.0 update.
	if ( substr( $block_content, 1, 7 ) !== '<figure' ) { // Detect if block content starts with <figure.
		return $block_content;
	}

	// Remove .wp-block-image class from figure, we will reuse it in custom wrapper.
	$block_content = str_replace('<figure class="wp-block-image', '<figure class="wp-block-image__content', $block_content );

	// Return modified output.
	return sprintf(
		'<div class="wp-block-image">%s</div>',
		$block_content
	);
}
