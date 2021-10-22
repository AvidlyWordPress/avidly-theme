<?php
/**
 * SVG Icon helper functions
 *
 * @package Avidly_Theme
 * @since 2.0.0
 */

/**
 * Create post date tag.
 *
 * @param string $format PHP date format. Defaults to the 'date_format' option.
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
 * @return void
 */
function avidly_theme_the_search_link( $wrap_class = '' ) {
	?>
	<div class="search-link-wrapper <?php echo esc_attr( $wrap_class ); ?>">
		<?php
		echo sprintf(
			'<a href="%s" class="%s" aria-label="%s">%s</a>',
			esc_url( get_site_url() . '?s' ),
			'inline-block p-1 text-black hover:bg-black hover:text-white',
			/* translators: Site search link. */
			esc_html_x( 'Search from site', 'theme UI', 'avidly-theme' ),
			avidly_theme_get_theme_svg( 'search', 'ui' ) // phpcs:ignore
		);
		?>
	</div>
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
