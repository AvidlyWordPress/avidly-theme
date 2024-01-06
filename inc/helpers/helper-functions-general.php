<?php
/**
 * Helper functions: General.
 *
 * @package Avidly_Theme
 * @since 2.0.0
 */

/**
 * Get translated ID from page path.
 * Can be used to detect a specific page and it's translations.
 *
 * @link https://developer.wordpress.org/reference/functions/get_page_by_path/
 *
 * @param string $path to page.
 *
 * @return $page_id.
 */
function avidly_theme_get_page_by_path( $path ) {

	$page = get_page_by_path( $path );

	// Return false if page do not exsist.
	if ( null === $page ) {
		return false;
	}

	// Set ID from post object.
	$page_id = $page->ID;

	// Detect Polylang translations.
	$page_id = function_exists( 'pll_get_post' ) ? pll_get_post( $page_id ) : $page_id;

	// Make sure that page is published.
	if ( 'publish' === get_post_status( $page_id ) ) {
		return $page_id;
	}

	// Return false if page is not published.
	return false;
}

