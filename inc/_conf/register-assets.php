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
		// Manually added tailwind preflight for front end only.
		wp_enqueue_style( // phpcs:ignore
			'avidly_theme-preflight',
			avidly_theme_cache_busting( '/assets/dist/css/preflight.css' )
		);

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

		// Navigation JS.
		if ( has_nav_menu( 'primary_menu' ) ) {
			wp_enqueue_script( // phpcs:ignore
				'avidly_theme-navigation',
				avidly_theme_cache_busting( '/assets/dist/js/disclosureMenu.js' ),
				array(),
				'',
				true
			);
		}

		// A11y overlay search.
		if ( function_exists( 'a11y_overlaysearch_button' ) ) {
			wp_enqueue_style( // phpcs:ignore
				'avidly_theme_overlay-search',
				avidly_theme_cache_busting( '/assets/dist/css/overlay-search.css' )
			);
		}

		// Hypenopoly support.
		wp_enqueue_script(
			'hyphenopoly',
			get_stylesheet_directory_uri() . '/hyphenopoly/Hyphenopoly_Loader.js',
			array(),
			'4.12.0',
			true
		);

		// Hypenopoly configuration.
		// @since 3.4.1
		// See usage: https://www.mikkosaari.fi/suomenkielinen-tavutus-wordpressiin/.
		wp_add_inline_script(
			'hyphenopoly',
			'Hyphenopoly.config({
				require: {
					"fi": "pyyhkäisyelektronimikroskooppi",
				},
				paths: {
					patterndir: "' . get_stylesheet_directory_uri() . '/hyphenopoly/patterns/",
					maindir: "' . get_stylesheet_directory_uri() . '/hyphenopoly/",
				},
				setup: {
					selectors: {
						".container": {}
					}
				}
			});'
		);

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
 * Load supplemental block editor styles.
 */
add_action(
	'after_setup_theme',
	function() {
		add_theme_support( 'editor-styles' );
		add_editor_style( '/assets/dist/css/webfonts.css' );
		add_editor_style( '/assets/dist/css/editor.css' );
	}
);

// Reduces unused CSS by only loading styles for in-use blocks.
add_filter( 'should_load_separate_core_block_assets', '__return_true' );

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
 * Create preload links for webfonts.
 * You need to only preload only fonts that might give CLS issues.
 *
 * @return void
 */
function avidly_theme_preload_webfonts() {
	$font_urls = array(
		'/assets/webfonts/Roboto/Roboto-Regular.ttf',
		// '/assets/webfonts/Roboto/Roboto-Bold.ttf',
		// '/assets/webfonts/Roboto_Slab/RobotoSlab-Regular.ttf',
		'/assets/webfonts/Roboto_Slab/RobotoSlab-Bold.ttf',
	);

	foreach ( $font_urls as $font ) {
		echo '<link rel="preload" href="' . esc_url( get_theme_file_uri( $font ) ) . '" as="font" type="font/ttf" crossorigin>';
	}
}
add_action( 'wp_head', 'avidly_theme_preload_webfonts', 5 );
add_action( 'admin_head', 'avidly_theme_preload_webfonts', 5 );
