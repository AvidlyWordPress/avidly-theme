<?php
/**
 * SVG Icon helper functions
 *
 * @package Avidly_Theme
 * @since 1.0.0
 */

if ( ! function_exists( 'avidly_theme_the_theme_svg' ) ) {
	/**
	 * Output and Get Theme SVG.
	 * Output and get the SVG markup for an icon in the SVG_Icons class.
	 *
	 * @param string $svg_name The name of the icon.
	 * @param string $group The group the icon belongs to.
	 * @param string $color Color code.
	 */
	function avidly_theme_the_theme_svg( $svg_name, $group = 'ui', $class = '', $color = '' ) {
		echo avidly_theme_get_theme_svg( $svg_name, $group, $color ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in avidly_theme_get_theme_svg();.
	}
}

if ( ! function_exists( 'avidly_theme_get_theme_svg' ) ) {
	/**
	 * Get information about the SVG icon.
	 *
	 * @param string $svg_name The name of the icon.
	 * @param string $group The group the icon belongs to.
	 * @param string $color Color code.
	 */
	function avidly_theme_get_theme_svg( $svg_name, $group = 'ui', $class = '', $color = '' ) {

		// Make sure that only our allowed tags and attributes are included.
		$svg = wp_kses(
			SVG_Icons::get_svg( $svg_name, $group, $class, $color ),
			array(
				'defs'  => true,
				'style' => true,
				'class' => true,

				'svg'     => array(
					'class'       => true,
					'xmlns'       => true,
					'width'       => true,
					'height'      => true,
					'viewbox'     => true,
					'aria-hidden' => true,
					'role'        => true,
					'focusable'   => true,
				),
				'g'     => array(
					'transform' => true,
				),
				'rect'    => array(
					'class'     => true,
					'width'     => true,
					'height'    => true,
					'fill'      => true,
					'fill-rule' => true,
					'transform' => true,
					'd'         => true,
					'x'         => true,
					'y'         => true,
				),
				'path'    => array(
					'class'     => true,
					'fill'      => true,
					'fill-rule' => true,
					'transform' => true,
					'd'         => true,
				),
				'polygon' => array(
					'class'     => true,
					'fill'      => true,
					'fill-rule' => true,
					'points'    => true,
					'transform' => true,
					'd'         => true,
				),
			)
		);

		if ( ! $svg ) {
			return false;
		}
		return $svg;
	}
}
