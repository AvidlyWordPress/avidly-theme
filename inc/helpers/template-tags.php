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
