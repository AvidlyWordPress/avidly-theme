<?php
/**
 * Template tag hook functions.
 *
 * @package Avidly_Theme
 * @since 3.1.1
 */

add_filter( 'post_thumbnail_id', 'avidly_theme_fallback_post_thumbnail_id', 5, 2 );
add_filter( 'post_thumbnail_size', 'avidly_theme_default_thumbnail_size' );

/**
 * Set the default festured image ID if none exists.
 *
 * @param int     $thumbnail_id Post thumbnail ID or false if the post does not exist.
 * @param WP_Post $post Post ID or WP_Post object. Default is global $post.
 *
 * @return $thumbnail_id
 */
function avidly_theme_fallback_post_thumbnail_id( $thumbnail_id, $post ) {
	// Modify $thumbnail_id only for posts.
	if ( 'post' === get_post_type( $post ) ) {
		$thumbnail_id = ( ! $thumbnail_id ) ? 1947 : $thumbnail_id;
	}

	return $thumbnail_id;
}


/**
 * Change default thumbnail size.
 *
 * @param string $size Featured image size, defaults to post_thumbnail.
 *
 * @return $size
 */
function avidly_theme_default_thumbnail_size( $size ) {
	return 'medium_large';
}
