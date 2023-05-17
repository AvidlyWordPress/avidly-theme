<?php
/**
 * Cache busting functionality.
 *
 * @package Avidly_Theme
 */

/**
 * Cache busting
 * Gets the path to a versioned Mix file in a theme.
 *
 * Use this function if you want to load theme dependencies. This function will cache the contents
 * of the manifest file for you. This also means that you can’t work with different mix locations.
 *
 * Inspired by <https://www.sitepoint.com/use-laravel-mix-non-laravel-projects/>.
 *
 * @since 1.0.0
 *
 * @link https://github.com/mindkomm/theme-lib-mix/blob/master/mix.php
 *
 * @param string $path The relative path to the file.
 * @param bool   $is_child Optional. Detect if function is called from child theme.
 * @param string $manifest_directory Optional. Custom path to manifest directory. Default: '/assets/dist'.
 *
 * @return string The versioned file URL.
 */
function avidly_theme_cache_busting( $path, $is_child = false, $manifest_directory = '/assets/dist' ) {

	static $manifest;
	static $manifest_path;

	$theme_directory     = get_template_directory();
	$theme_directory_uri = get_template_directory_uri();

	// Set theme directory based on if the cache bustong is run in child theme.
	if ( $is_child ) {
		$theme_directory     = get_stylesheet_directory();
		$theme_directory_uri = get_stylesheet_directory_uri();
	}

	if ( ! $manifest_path ) {
		$manifest_path = $theme_directory . '/' . $manifest_directory . '/mix-manifest.json';
	}

	// Bailout if manifest couldn’t be found.
	if ( ! file_exists( $manifest_path ) ) {
		return get_theme_file_uri( $path );
	}

	// Get the manifest content.
	if ( ! $manifest ) {
		$manifest = json_decode( file_get_contents( $manifest_path ), true );
	}

	// Remove manifest directory from path.
	$path = str_replace( $manifest_directory, '', $path );

	// Make sure there’s a leading slash.
	$path = '/' . ltrim( $path, '/' );

	// Get file URL from manifest file.
	$path = $manifest[ $path ];

	// Make sure there’s no leading slash.
	$path = ltrim( $path, '/' );
	return $theme_directory_uri . trailingslashit( $manifest_directory ) . $path;
}


/**
 * Remove wp version param from any enqueued scripts.
 * We will handle the cache busting with mix-manifest.json.
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

// Fires once the requested HTTP headers for caching, content type, etc. have been sent.
// https://developer.wordpress.org/reference/hooks/send_headers/
add_action( 'send_headers', 'avidly_theme_cache_headers' );

if ( ! function_exists( 'avidly_theme_cache_headers' ) ) {
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
}
