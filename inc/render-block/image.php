<?php
/**
 * Block render callback: Image
 *
 * @package Avidly_Theme
 * @since 3.3.0
 */

add_filter( 'render_block_core/image', 'avidly_theme_image_block', 10, 2 );

/**
 * Modify block output.
 * NOTE: This only changes block strurture in frontend.
 * Support for WP 6.0 where wrapper div was removed from image block.
 *
 * @param string $block_content The block content about to be appended.
 * @param array  $block The full block, including name and attributes.
 *
 * @link https://developer.wordpress.org/reference/hooks/render_block/
 */
function avidly_theme_image_block( $block_content, $block ) {

	// Fallback for WP < 6.0.
	// Return original output if image block is added before WP 6.0 update.
	if ( substr( $block_content, 1, 7 ) !== '<figure' ) { // Detect if block content starts with "<figure".
		return $block_content;
	}

	// Wrap add image content inside a <span>.
	$block_content = str_replace( '<img', '<span><img', $block_content );
	$block_content = str_replace( '</figure>', '</span></figure>', $block_content );

	// Detect aligns.
	$align = isset( $block['attrs']['align'] ) ? $block['attrs']['align'] : '';

	// Move align class from <figure> into <span>.
	if ( 'left' === $align || 'right' === $align || 'center' === $align ) {
		$block_content = str_replace( ' align' . $align, '', $block_content );
		$block_content = str_replace( '<span>', '<span class="align' . esc_attr( $align ) . '">', $block_content );
	}

	// Return modified output.
	return $block_content;
}