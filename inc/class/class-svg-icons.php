<?php
/**
 * Custom icons for this theme.
 *
 * @package Avidly_Theme
 * @since 1.0.0
 */

if ( ! class_exists( 'SVG_Icons' ) ) {
	/**
	 * SVG ICONS CLASS
	 * Retrieve the SVG code for the specified icon. Based on a solution in Twenty Nineteen.
	 */
	class SVG_Icons {
		/**
		 * GET SVG CODE
		 * Get the SVG code for the specified icon
		 *
		 * @param string $icon Icon name.
		 * @param string $group Icon group.
		 * @param string $class custom Class.
		 * @param string $color Color.
		 */
		public static function get_svg( $icon, $group = 'ui', $class = '', $color = '' ) {
			if ( 'ui' === $group ) {
				$arr = self::$ui_icons;
			} elseif ( 'theme' === $group ) {
				$arr = self::$theme_icons;
			} else {
				$arr = array();
			}

			// Return empty if SVG icon is not found.
			if ( ! array_key_exists( $icon, $arr ) ) {
				return null;
			}

			// Add custom classes after group info.
			$group .= ( $class ) ? ' ' . $class : '';
			$group .= ( $color ) ? ' custom-fill' : '';

			$repl = '<svg class="svg-icon icon-' . $group . '" aria-hidden="true" focusable="false" ';
			$svg  = preg_replace( '/^<svg /', $repl, trim( $arr[ $icon ] ) ); // Add extra attributes to SVG code.
			$svg  = preg_replace( "/([\n\t]+)/", ' ', $svg ); // Remove newlines & tabs.
			$svg  = preg_replace( '/>\s*</', '><', $svg ); // Remove white space between SVG tags.

			// Replace fill with custom color.
			if ( $color ) {
				$svg = str_replace( 'currentColor', $color, $svg ); // Replace the color.
			}

			return $svg;
		}


		/**
		 * Theme Icons – svg sources.
		 * Note: Do not use inline hex colors because wp_kses encodes the hashtag.
		 * Convert color to to RGB or RGBA: http://hex2rgba.devoth.com/
		 *
		 * @var array
		 */
		public static $theme_icons = array(
			'logo' => '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1060 396" width="1060" height="396"><polygon points="132 264.38 180.24 264.38 156.12 223.03 132 264.38"/><polygon points="189.88 165.15 247.76 264.38 286.35 264.38 209.18 132.07 189.88 165.15"/><polygon points="392.48 173.42 416.6 132.07 368.36 132.07 392.48 173.42"/><polygon points="262.24 132.07 339.42 264.38 358.71 231.3 300.83 132.07 262.24 132.07"/><rect x="448.38" y="132.08" width="33.08" height="132.3"/><polygon points="880.13 132.07 904.25 173.42 928.37 132.07 880.13 132.07"/><polygon points="779.47 132.07 837.36 231.3 837.36 264.38 870.43 264.38 870.43 221.85 818.06 132.07 779.47 132.07"/><rect x="522.56" y="132.08" width="33.08" height="132.3"/><path d="M582.65,132.08h-11a71.69,71.69,0,0,1,0,132.3h11a66.15,66.15,0,0,0,0-132.3Z"/><rect x="684.08" y="132.08" width="33.08" height="132.3"/><path d="M755.56,264.38H791.5v-33A71.89,71.89,0,0,1,755.56,264.38Z"/></svg>',
		);


		/**
		 * UI Icons – svg sources.
		 *
		 * Heroicon icons: https://heroicons.com/
		 *
		 * @var array
		 */
		public static $ui_icons = array(
			'arrow_right' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>',

			'arrow_left' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>',

			'close'      => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>',

			'menu'       => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>',

			'plus'       => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>',

			'minus'      => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" /></svg>',

			'search'     => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>',
		);

	}
}
