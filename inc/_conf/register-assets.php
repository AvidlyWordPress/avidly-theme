<?php
/**
 * Register: Assets
 *
 * Enqueue scripts and stylesheets for theme.
 *
 * @package Avidly_Theme
 */

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
add_filter( 'style_loader_src', 'avidly_theme_remove_wp_ver', 9999 );
add_filter( 'script_loader_src', 'avidly_theme_remove_wp_ver', 9999 );


/**
 * Enqueue scripts and styles.
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		// Main style.
		wp_enqueue_style( // phpcs:ignore
			'avidly_theme',
			avidly_theme_cache_busting( '/assets/dist/css/app.css' )
		);

		// Navigation JS.
		if ( has_nav_menu( 'primary_menu' ) ) {
			wp_enqueue_script( // phpcs:ignore
				'avidly_theme-navigation',
				avidly_theme_cache_busting( '/assets/dist/js/disclosureMenu.js' ),
				array(),
				'',
				true
			);

			// Localize navigation texts.
			wp_localize_script(
				'avidly_theme-navigation',
				'screenReaderText',
				array(
					'expand'   => _x( 'Expand submenu', 'menu UI', 'avidly-theme' ),
					'collapse' => _x( 'Collapse submenu', 'menu UI', 'avidly-theme' ),
				)
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

		/*
		// Remove Gutenberg stylesheets.
		// By default we want to use block styles from core so they will be up-to-date if block structures or classes changes.
		wp_deregister_style( 'wp-block-library-theme' );
		wp_deregister_style( 'wp-block-library' );
		*/

		// Comments.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
);


/**
 * Enqueue supplemental block editor styles.
 */
add_action(
	'enqueue_block_editor_assets',
	function() {
		wp_enqueue_script(
			'avidly-theme-block-editor-script',
			get_theme_file_uri( '/assets/js/editor-script-block.js' ),
			array( 'wp-blocks', 'wp-dom' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
	},
	1,
	1
);


/**
 * Load supplemental block editor styles.
 */
add_theme_support( 'editor-styles' );
add_editor_style( '/assets/dist/css/webfonts.css' );
add_editor_style( '/assets/dist/css/editor.css' );


/**
 * Create preload links for webfonts.
 *
 * @return void
 */
function avidly_theme_preload_webfonts() {
	$font_urls = array(
		'/assets/webfonts/Roboto/Roboto-Regular.ttf',
		'/assets/webfonts/Roboto/Roboto-Bold.ttf',
		'/assets/webfonts/Roboto_Slab/RobotoSlab-Regular.ttf',
		'/assets/webfonts/Roboto_Slab/RobotoSlab-Bold.ttf',
	);

	foreach ( $font_urls as $font ) {
		echo '<link rel="preload" href="' . esc_url( get_theme_file_uri( $font ) ) . '" as="font" type="font/ttf" crossorigin>';
	}
}
add_action( 'wp_head', 'avidly_theme_preload_webfonts', 5 );
add_action( 'admin_head', 'avidly_theme_preload_webfonts', 5 );
