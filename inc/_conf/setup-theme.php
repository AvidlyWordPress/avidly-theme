<?php
/**
 * Setup: Theme
 *
 * @package Avidly_Theme
 */

/**
 * Theme supports.
 */
add_action(
	'after_setup_theme',
	function() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Avidly Theme, use a find
		 * and replace to change 'avidly-theme' to the name of your theme in
		 * all the template files.
		 */
		load_theme_textdomain( 'avidly-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Unregister default patterns and pattern categories that comes from core.
		remove_theme_support( 'core-block-patterns' );

		// Enable support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-entry__thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Set post thumbnail size.
		 *
		 * @link https://developer.wordpress.org/reference/functions/set_post_thumbnail_size/
		 */
		set_post_thumbnail_size( 450, 300, true );

		/*
		 * Set custom image sizes.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_image_size/
		 */
		// Example: Hard crop, 16:9.
		// add_image_size( 'custom-thumb', 400, 225, true );
		// add_image_size( 'custom-medium', 800, 450, true );
		// add_image_size( 'custom-large', 1200, 675, true );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
);


/**
 * Check do we have Javascript in use and replace no-js class from <html>.
 */
add_action(
	'wp_head',
	function() {
		echo '<script>document.documentElement.className = document.documentElement.className.replace( "no-js", "js" );</script>';
	}
);


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
add_action(
	'wp_print_footer_scripts',
	function() {
		// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
		?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
		</script>
		<?php
	}
);

/**
 * Set default favicon if site icon is not added.
 * Site icon is set via Customize -> Site Identity view -> Site Icon.
 */
add_action(
	'wp_head',
	function() {
		if ( '' === get_site_icon_url() ) {
			echo sprintf(
				'<!-- Favicons -->
				<link rel="icon" href="%1$s-32x32.png" sizes="32x32" />
				<link rel="icon" href="%1$s-192x192.png" sizes="192x192" />
				<link rel="apple-touch-icon" href="%1$s-180x180.png" />
				<meta name="msapplication-TileImage" content="%1$s-270x270.png" />',
				esc_url( get_stylesheet_directory_uri() . '/assets/img/favicon/favicon' )
			);
		}
	}
);
