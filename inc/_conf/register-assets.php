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

add_filter( 'wp_enqueue_scripts', 'avidly_theme_default_enqueue' );
add_action( 'after_setup_theme', 'avidly_theme_editor_styles' );
add_action( 'after_setup_theme', 'avidly_theme_conditional_block_styles' );
add_action( 'enqueue_block_editor_assets', 'avidly_theme_editor_scripts' );

// Reduces unused CSS by only loading styles for in-use blocks.
add_filter( 'should_load_separate_core_block_assets', '__return_true' );

// Fires once the requested HTTP headers for caching, content type, etc. have been sent.
// https://developer.wordpress.org/reference/hooks/send_headers/
add_action( 'send_headers', 'avidly_theme_cache_headers' );

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

	// Main js, run in footer.
	wp_enqueue_script( // phpcs:ignore
		'avidly_theme',
		avidly_theme_cache_busting( '/assets/dist/js/app.js' ),
		array( 'wp-i18n' ),
		'',
		array(
			'in_footer' => true,
			'strategy'  => 'async',
		)
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
	// Remove default Gutenberg block editor stylesheets.
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

	// Generate arrays from filed found in /assets/dist/css/blocks.
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
		if (  str_starts_with( $file_name, '.') || 6 > strlen( $file_name ) ) {
			continue;
		}

		// Make sure that we have just two arra element (package and name).
		$block['package'] = $block_arr[0];
		unset( $block_arr[0] );
		$block['name'] = implode( '-', $block_arr );

		$args = array(
			'handle' => 'theme-' . $block['name'],
			'src'    => avidly_theme_cache_busting( '/assets/dist/css/blocks/' . $file_name . '.css' ),
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

/**
 * Enqueue supplemental block editor styles.
 * NOTE: This doesn't purge the editor JS automatically, you need to update the theme version.
 */
function avidly_theme_editor_scripts() {
	wp_enqueue_script(
		'avidly-theme-editor-script-block',
		avidly_theme_cache_busting( '/assets/dist/js/editor-script-block.js' ),
		array( 'wp-blocks', 'wp-dom' ),
		'',
		array(
			'in_footer' => true,
			'strategy'  => 'async',
		)
	);

	wp_enqueue_script(
		'avidly-theme-client-side-filters',
		avidly_theme_cache_busting( '/assets/dist/js/client-side-filters.js' ),
		array( 'wp-blocks', 'wp-dom' ),
		'',
		array(
			'in_footer' => true,
			'strategy'  => 'async',
		)
	);
}

/**
 * Remove WordPress core version param from any theme enqueued assets.
 * Handle the versioning and cache busting with mix-manifest.json.
 *
 * @param string $src first occurrence of a substring in a string.
 * @return $src
 */
function avidly_theme_remove_wp_ver( $src ) {
	if ( strpos( $src, '/avidly-theme/' ) && strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}

	return $src;
}

/**
 * Add an Expires & a Cache-Control Header.
 *
 * @return void
 */
function avidly_theme_cache_headers() {
	$seconds_to_cache = 900; // 900 sec = 15min.
	$ts               = gmdate( 'D, d M Y H:i:s', time() + $seconds_to_cache );

	if ( ! is_user_logged_in() ) {
		header( 'Expires: ' . $ts );
		header( 'Cache-control: max-age=' . $seconds_to_cache );
	}
}
