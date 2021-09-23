<?php
/**
 * Create navigation menus and menu relative functionality
 *
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 *
 * @package Avidly_Theme
 */

/**
 * Register: Menus
 */
add_action(
	'after_setup_theme',
	function() {
		register_nav_menus(
			array(
				'primary_menu'   => _x( 'Primary menu', 'menu UI', 'avidly-theme' ),
				'secondary_menu' => _x( 'Secondary menu', 'menu UI', 'avidly-theme' ),
				'policy_menu'    => _x( 'Policy menu', 'menu UI', 'avidly-theme' ),
			)
		);
	}
);


/**
 * Add custom classes to all <a> elements wp_nav_menu() menus.
 *
 * @return $atts.
 */
add_action(
	'nav_menu_link_attributes',
	function( $atts ) {
		$atts['class'] = 'no-underline';
		return $atts;
	},
	10
);
