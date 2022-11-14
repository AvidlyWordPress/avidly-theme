<?php
/**
 * Functionality to override styles that WP core sets in editor and frontend.
 *
 * @package Avidly_Theme
 * @since 3.5.0
 */

add_action( 'admin_footer', 'avidly_theme_admin_styles' );
add_action( 'wp_footer', 'avidly_theme_footer_styles', 100 );

/**
 * Add custom styles to admin view.
 */
function avidly_theme_admin_styles() {
	echo '<style>
	/* Styles added via avidly_theme_admin_styles() function. */
	';

	// Makedefault post title smaller in editor (should be displayed via block).
	echo '.edit-post-visual-editor__post-title-wrapper h1 {
		font-size: 1rem !important;
		color: gray !important;
	}';

	// Improve editor margins.
	echo '.editor-styles-wrapper {
		margin-left: 1.5rem;
		margin-right: 1.5rem;
	}
	.editor-styles-wrapper .alignfull {
		margin-left: -1.5rem;
		margin-right: -1.5rem;
	}';

	echo '</style>';
}

/**
 * Add inline styles to footer (after core styles).
 *
 * @return void
 */
function avidly_theme_footer_styles() {
	echo '<style>
	/* Styles added via avidly_theme_footer_styles() function. */
	';

	// Detect margin top 0.
	echo 'body .is-layout-flow > * + *.mt-0 {
		margin-block-start: 0;
	}';

	echo '</style>';
}
