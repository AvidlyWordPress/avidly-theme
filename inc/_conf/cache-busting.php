<?php
/**
 * Cache busting functionality.
 *
 * @package Avidly_Theme
 */

if ( ! function_exists( 'avidly_theme_cache_busting' ) ) {
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
	 * @param string $manifest_directory Optional. Custom path to manifest directory. Default 'build'.
	 *
	 * @return string The versioned file URL.
	 */
	function avidly_theme_cache_busting( $path, $manifest_directory = 'assets/dist' ) {

		static $manifest;
		static $manifest_path;

		if ( ! $manifest_path ) {
			$manifest_path = get_theme_file_path( $manifest_directory . '/mix-manifest.json' );
		}

		// Bailout if manifest couldn’t be found.
		if ( ! file_exists( $manifest_path ) ) {
			return get_theme_file_uri( $path );
		}
		if ( ! $manifest ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		}

		// Remove manifest directory from path.
		$path = str_replace( $manifest_directory, '', $path );

		// Make sure there’s a leading slash.
		$path = '/' . ltrim( $path, '/' );

		// Bailout with default theme path if file could not be found in manifest.
		if ( ! array_key_exists( $path, $manifest ) ) {
			return get_theme_file_uri( $path );
		}

		// Get file URL from manifest file.
		$path = $manifest[ $path ];

		// Make sure there’s no leading slash.
		$path = ltrim( $path, '/' );
		return get_theme_file_uri( trailingslashit( $manifest_directory ) . $path );
	}
}

/**
 * Add an Expires & a Cache-Control Header.
 *
 * @param int $seconds_to_cache default to 900 (15min).
 *
 * @return void
 */
function avidly_theme_cache_headers( $seconds_to_cache = 900 ) {
	$ts = gmdate( 'D, d M Y H:i:s', time() + $seconds_to_cache ) . ' GTM';

	header( 'Expires: ' . $ts );
	header( 'Cache-control: max-age=' . $seconds_to_cache );
}
