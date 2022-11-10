<?php
/**
 * Register: Assets
 *
 * Enqueue scripts and stylesheets for theme.
 *
 * @package Avidly_Theme
 */

add_filter( 'style_loader_src', 'avidly_theme_remove_wp_ver', 9999 );
add_filter( 'script_loader_src', 'avidly_theme_remove_wp_ver', 9999 );

add_filter( 'wp_enqueue_scripts', 'avidly_theme_primary_enqueue', -9999 );
add_filter( 'wp_enqueue_scripts', 'avidly_theme_default_enqueue' );
add_action( 'after_setup_theme', 'avidly_theme_editor_styles' );
add_action( 'enqueue_block_editor_assets', 'avidly_theme_editor_scripts' );


/**
 * Remove wp version param from any enqueued scripts.
 * We will handle the cache busting with mix-manifest.json.
 *
 * @param string $src first occurrence of a substring in a string.
 * @return $src
 */
function avidly_theme_remove_wp_ver( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}

	return $src;
}

/**
 * Enqueue PRIMARY scripts and styles (will be run as soon as possible).
 */
function avidly_theme_primary_enqueue() {
	// Manually added tailwind preflight for frontend use only.
	wp_enqueue_style( // phpcs:ignore
		'avidly_theme-preflight',
		avidly_theme_cache_busting( '/assets/dist/css/preflight.css' )
	);
}

/**
 * Enqueue scripts and styles.
 */
function avidly_theme_default_enqueue() {
	// Main style.
	wp_enqueue_style( // phpcs:ignore
		'avidly_theme',
		avidly_theme_cache_busting( '/assets/dist/css/app.css' )
	);

	/* phpcs:ignore
	// Cache busting usage example in child themes.
	wp_enqueue_style( // phpcs:ignore
		'child_theme',
		avidly_theme_cache_busting( '/assets/dist/css/app.css', true )
	);
	*/

	// A11y overlay search.
	if ( function_exists( 'a11y_overlaysearch_button' ) ) {
		wp_enqueue_style( // phpcs:ignore
			'avidly_theme_overlay-search',
			avidly_theme_cache_busting( '/assets/dist/css/overlay-search.css' )
		);
	}

	// Navigation JS, run in footer.
	if ( has_nav_menu( 'primary_menu' ) ) {
		wp_enqueue_script( // phpcs:ignore
			'avidly_theme-navigation',
			avidly_theme_cache_busting( '/assets/dist/js/disclosureMenu.js' ),
			array(),
			'',
			true
		);
	}

	// Main js, run in footer.
	wp_enqueue_script( // phpcs:ignore
		'avidly_theme',
		avidly_theme_cache_busting( '/assets/dist/js/app.js' ),
		array(),
		'',
		true
	);

	/* phpcs:ignore
	// Remove Gutenberg stylesheets.
	// By default we want to use block styles from core so they will be up-to-date if block structures or classes changes.
	wp_deregister_style( 'wp-block-library-theme' );
	wp_deregister_style( 'wp-block-library' );
	*/

	// Comments, add if commenting is used.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Load supplemental block editor styles.
 */
function avidly_theme_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( '/assets/dist/css/editor.css' );
}

/* phpcs:ignore
// Reduces unused CSS by only loading styles for in-use blocks.
add_filter( 'should_load_separate_core_block_assets', '__return_true' );
*/

/**
 * Enqueue supplemental block editor styles.
 */
function avidly_theme_editor_scripts() {
	wp_enqueue_script(
		'avidly-theme-block-editor-script',
		get_theme_file_uri( '/assets/js/editor-script-block.js' ),
		array( 'wp-blocks', 'wp-dom' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
