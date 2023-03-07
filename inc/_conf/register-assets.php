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
add_action( 'after_setup_theme', 'avidly_theme_conditional_block_styles' );
add_action( 'enqueue_block_editor_assets', 'avidly_theme_editor_scripts' );


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
		array( 'wp-i18n' ),
		'',
		true
	);

	// Add translations to app.js.
	wp_localize_script(
		'avidly_theme',
		'localizeText',
		array(
			'newwin' => _x( '(opens in a new window)', 'theme UI', 'avidly-theme' ),
		)
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

/*
* Load additional block styles.
*/
function avidly_theme_conditional_block_styles() {

	// Generate arrays from filed found in /assets/dist/css/_blocks.
	$theme_directory = get_stylesheet_directory() . '/assets/dist/css/blocks/';
	$styled_blocks   = scandir( $theme_directory  );

	// Return if there is no content in $styled_blocks.
	if ( ! is_array( $styled_blocks ) && is_wp_error( $styled_blocks ) ) {
		return;
	}

	// Loop thrue found $styled_blocks &&  enqueue block style.
	foreach ( $styled_blocks as $file_name ) {
		$file_name = str_replace( '.css', '', $file_name );
		$block_arr = explode( '-', $file_name );
		
		// Skip if invisible files or too short file names.
		if (  6 > strlen( $file_name ) ) {
			continue;
		}

		// Make sure that we have just two arra element (package and name).
		$block['package'] = $block_arr[0];
		unset( $block_arr[0] );
		$block['name'] = implode( '-', $block_arr );

		$args = array(
			'handle' => 'theme-' . $block['name'],
			'src'    => get_theme_file_uri( 'assets/dist/css/blocks/' . $file_name . '.css' ),
		);

		wp_enqueue_block_style( $block['package'] . '/' . $block['name'], $args );
	}
}

/**
 * Load supplemental block editor styles.
 */
function avidly_theme_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( '/assets/dist/css/editor.css' );
}


// Reduces unused CSS by only loading styles for in-use blocks.
add_filter( 'should_load_separate_core_block_assets', '__return_true' );

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
