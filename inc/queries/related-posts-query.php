<?php
/**
 * Related posts query.
 *
 * @package Avidly_Theme
 * @since 4.0.0
 */

add_filter( 'query_loop_block_query_vars', 'avidly_theme_related_posts_block_query' );
add_filter( 'rest_post_query', 'avidly_theme_related_posts_rest_query', 10, 2 );

/**
 * Filters the arguments which will be passed to WP_Query for the Query Loop Block.
 * Makes the query change for FRONT END.
 *
 * @param array $query Array containing parameters for WP_Query as parsed by the block context.
 *
 * @return $query
 */
function avidly_theme_related_posts_block_query( $query ) {

	// Get global page now info.
	global $post;

	if ( ! is_object( $post ) ) {
		// Return the default query.
		return $query;
	}

	// Get search query if set.
	$query_s = ( isset( $query['s'] ) ) ? trim( $query['s'] ) : '';
	$query = avidly_theme_related_posts( $query, $query_s, $post->ID );

	// Return our customized query.
	return $query;
}

/**
 * Filters WP_Query arguments when querying posts via the REST API.
 * Makes the query change for BLOCK EDITOR.
 *
 * @param array           $query Array of arguments for WP_Query.
 * @param WP_REST_Request $request The REST API request.
 *
 * @return $query
 */
function avidly_theme_related_posts_rest_query( $query, $request ) {

	// Get current post info.
	$headers      = ( $request->get_headers('referer') ) ? $request->get_headers('referer') : false;
	$referer      = ( $headers ) ? $headers['referer'][0] : false;
	$curr_post_id = 0; // Set default to 0.

	// Fetch the current post ID from referer (url).
	if ( $referer ) {
		preg_match( "/&?post=([^&]+)/", $referer, $matches );
		$curr_post_id = ( isset( $matches[1] ) ) ? $matches[1] : 0;
	}

	// Get search query if set.
	$query_s = ( isset( $query['s'] ) ) ? trim( $query['s'] ) : '';
	$query = avidly_theme_related_posts( $query, $query_s, $curr_post_id );

	// Return our customized query.
	return $query;
}

/**
 * Modify the query if query search keyword is found.
 *
 * @param array  $query the original query arguments.
 * @param string $query_s the search keyword.
 * @param int    $curr_post_id post ID.
 * @return void
 */
function avidly_theme_related_posts( $query, $query_s, $curr_post_id ) {

	// Return default query if search is not presented.
	if ( ! $query_s ) {
		return $query;
	}

	// Return the default query if there is no ':related_custom_query'' in search.
	if ( ! str_contains( $query_s, ':related_custom_query' ) ) {
		return $query;
	}

	// Clear search, unset search query variable or use a stop-word filter.
	$query['s'] = '';

	// Get the post categories.
	$categories = wp_get_post_categories( $curr_post_id );

	// Show posts in the same categories.
	$query['category__in'] = $categories;
	$query['post__not_in'] = array( $curr_post_id ); 

	return $query;
}