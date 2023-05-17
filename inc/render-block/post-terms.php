<?php
/**
 * Block render callback: Post terms
 *
 * @package Avidly_Theme
 * @since 4.0.0
 */

add_filter( 'render_block_core/post-terms', 'avidly_theme_post_terms', 10, 2 );

/**
 * Modify block output: Add taxo-term class to link output.
 * NOTE: This only changes block struture in frontend.
 *
 * @param string $block_content The block content about to be appended.
 * @param array  $block The full block, including name and attributes.
 *
 * @link https://developer.wordpress.org/reference/hooks/render_block/
 */
function avidly_theme_post_terms( $block_content, $block ) {

	// Get taxonomy type from block settings.
	$tax = $block['attrs']['term'];

	// Find all links from block output.
	preg_match_all('/<a[^>]+href=([\'"])(?<href>.+?)\1[^>]*>/i', $block_content, $matches);
	$all_urls = $matches[0];

	// Loop thru found links.
	if ( is_array( $all_urls ) && ! is_wp_error( $all_urls ) ) {
		foreach ( $all_urls as $link ) {
			// Get the term slug from URL.
			$slug = avidly_theme_get_link_part( $link );
			// Add custom class to link.
			$block_content = str_replace( $slug . '/" rel="tag"', $slug . '/" class="' . $tax . '-' .  $slug . '"  rel="tag"', $block_content );
		}
	}

	// Return modified output.
	return $block_content;
}

/**
 * Detect links from HTML string.
 *
 * @param int $post_id for ID.
 *
 * return bool
 */
function avidly_theme_get_link_part( $html ) {

	preg_match('!https?://\S+!', $html, $href);
	// error_log( print_r( $href[0], true ) );

	$url = str_replace('"', '', $href[0] );
	$url = str_replace('>', '', $url );
	// error_log( $url );

	$explode = array_filter( explode( '/', $url ) );
	// error_log( print_r( $explode, true ) );

	$slug = end( $explode );
	// error_log( $slug );

	return $slug;
}