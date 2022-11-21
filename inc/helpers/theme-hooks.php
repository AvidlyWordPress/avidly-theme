<?php
/**
 * Custom hooks to override default core functionality.
 *
 * @package Avidly_Theme
 * @since 3.5.1
 */

add_filter( 'excerpt_length', 'avidly_theme_excerpt_length', 999 );
add_filter( 'excerpt_more', 'avidly_theme_excerpt_more' );

/**
 * Filters the maximum number of words in a post excerpt.
 *
 * @param int $length The maximum number of words. Default 55.
 *
 * @return $length
 */
function avidly_theme_excerpt_length( $length ) {
	return 30;
}

/**
 * Filters the string in the “more” link displayed after a trimmed excerpt.
 *
 * @param string $more The string shown within the more link..
 * @return $more
 */
function avidly_theme_excerpt_more( $more ) {
	return '&hellip;';
}
