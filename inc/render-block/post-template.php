<?php
/**
 * Block render callback: Post template
 *
 * @package Avidly_Theme
 * @since 3.4.0
 */

add_filter( 'block_type_metadata_settings', 'avidly_theme_post_template_settings', 10, 2 );

/**
 * Filters the settings determined from the block type metadata
 *
 * @param array $settings Array of determined settings for registering a block type.
 * @param array $metadata Metadata provided for registering a block type.
 *
 * @return $settings
 */
function avidly_theme_post_template_settings( $settings, $metadata ) {
	if ( 'core/post-template' !== $metadata['name'] ) {
		return $settings;
	}
	if ( 'render_block_core_post_template' !== $settings['render_callback'] ) {
		return $settings;
	}
	$settings['render_callback'] = 'avidly_theme_render_block_core_post_template';
	return $settings;
}

/**
 * Exclude current post from Query loop block.
 *
 * @param array    $attributes for post template render.
 * @param string   $content for post template render.
 * @param WP_Block $block content.
 *
 * @return $output
 */
function avidly_theme_render_block_core_post_template( $attributes, $content, $block ) {
	global $post;

	// Return the default render if there is no $post Object or current view is not single.
	if ( ! is_object( $post ) || ! is_single() ) {
		return render_block_core_post_template( $attributes, $content, $block );
	}

	$callback = fn( $query ) => $query->set( 'post__not_in', array( $post->ID ) );

	add_action( 'pre_get_posts', $callback, 999 );
	$output = render_block_core_post_template( $attributes, $content, $block );
	remove_action( 'pre_get_posts', $callback, 999 );

	return $output;
}
