<?php
/**
 * Template tag hook functions.
 *
 * @package Avidly_Theme
 * @since 3.1.1
 */

add_filter( 'post_thumbnail_id', 'avidly_theme_fallback_post_thumbnail_id', 5, 2 );
add_filter( 'post_thumbnail_size', 'avidly_theme_default_thumbnail_size', 5, 2 );
add_filter( 'wp_get_attachment_image_attributes', 'avidly_theme_first_featured_image', 5, 2 );

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
 * @param string $size Featured image size, defaults to post_thumbnail (hard crop).
 * @param string $post_id The post ID.
 *
 * @return $size
 */
function avidly_theme_default_thumbnail_size( $size, $post_id ) {
	global $wp_query;

	// Detect if featured image is main image.
	$is_main_featured = avidly_theme_is_main_image( get_queried_object_id(), $post_id );

	// Change featured image size.
	if ( $is_main_featured && $post_id === $wp_query->queried_object_id ) {
		$size = 'medium_large';
	}

	return $size;
}

/**
 * Undocumented function
 *
 * @param array   $attr Array of attribute values for the image markup, keyed by attribute name.
 * @param WP_Post $attachment Image attachment post.
 *
 * @return $attr
 */
function avidly_theme_first_featured_image( $attr, $attachment ) {
	global $wp_query;

	// Detect if featured image is main image.
	$is_main_featured = avidly_theme_is_main_image( get_queried_object_id(), $attachment->ID );

	// Change loading method for current page featured image.
	if ( $is_main_featured && get_the_id() === $wp_query->queried_object_id ) {
		// Change loading method and add custom src-set and sizes attributes.
		$attr['loading'] = 'eager';
		$attr['sizes']   = '(min-width:1280px) 100vw, (min-width:1024px) 1024px, 90vw';
	}

	return $attr;
}

/**
 * Detect if current post has same featured image as...?
 *
 * @param [type] $current_id Current post ID.
 * @param [type] $found_id Post ID found for featured image.
 * @return bool
 */
function avidly_theme_is_main_image( $current_id, $found_id ) {
	$current_featured_id = ( 'attachment' === get_post_type( $current_id ) ) ? $current_id : get_post_thumbnail_id( $current_id );
	$found_featured_id   = ( 'attachment' === get_post_type( $found_id ) ) ? $found_id : get_post_thumbnail_id( $found_id );

	if ( $current_featured_id === $found_featured_id ) {
		return true;
	}

	return false;
}
