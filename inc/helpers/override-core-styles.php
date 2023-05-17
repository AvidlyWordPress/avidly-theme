<?php
/**
 * Functionality to override styles that WP core sets in editor and frontend.
 *
 * @package Avidly_Theme
 * @since 3.5.0
 */

add_action( 'admin_footer', 'avidly_theme_admin_styles' );

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
