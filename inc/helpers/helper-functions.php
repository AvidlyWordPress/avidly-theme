<?php
/**
 * Template tag functions.
 *
 * @package Avidly_Theme
 * @since 2.0.0
 */

/**
 * Create post date tag.
 *
 * @param string $format PHP date format. Defaults to the 'date_format' option.
 *
 * @return HTML
 */
function avidly_theme_get_post_date( $format = '' ) {
	$posted_on = sprintf(
		/* translators: %s post date. */
		esc_html_x( 'Posted on %s', 'theme UI', 'avidly-theme' ),
		esc_html( get_the_date( $format ) )
	);

	return sprintf(
		'<time class="card__time text-sm" datetime="%s">%s</time>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( $posted_on ),
	);
}

/**
 * Create link that leads to search page.
 *
 * @param string $wrap_class set classes for link wrapper.
 *
 * @return void
 */
function avidly_theme_the_search_link( $wrap_class = '' ) {
	?>

	<div class="search-link-wrapper <?php echo esc_attr( $wrap_class ); ?>">
		<?php
		if ( function_exists( 'a11y_overlaysearch_button' ) ) :

			// Create search button functionality via plugin.
			echo a11y_overlaysearch_button( false, 'inline-block p-1 text-black hover:bg-black hover:text-white' ); // phpcs:ignore

		else :

			// Default theme search buttutton functionality (link to search results page).
			echo sprintf(
				'<a href="%s" class="%s" aria-label="%s">%s</a>',
				esc_url( home_url( '/' ) . '?s=+' ), // Href.
				'inline-block p-1 text-black hover:bg-black hover:text-white', // Classes.
				/* translators: Site search link. */
				esc_html_x( 'Search from site', 'theme UI', 'avidly-theme' ), // Screen reader text.
				avidly_theme_get_theme_svg( 'search', 'ui' ) // phpcs:ignore
			);

		endif;
		?>
	</div><!-- /.search-link-wrapper -->

	<?php
}

/**
 * Get current post categories without link.
 */
function avidly_theme_get_the_category() {
	$terms = array();

	foreach ( ( get_the_category() ) as $key => $category ) {
		$terms[ $key ] = $category->cat_name;
	}

	if ( empty( $terms ) ) {
		return false;
	}
	return $terms;
}

/**
 * Get translated ID from page path.
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
