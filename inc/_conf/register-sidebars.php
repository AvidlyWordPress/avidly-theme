<?php
/**
 * Create sidebar areas and wigdet relative functionality
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package Avidly_Theme
 */

/**
 * Register: Sidebars
 */
add_action(
	'widgets_init',
	function() {
		register_sidebar(
			array(
				'name'          => esc_html_x( 'Footer', 'admin UI: widget area', 'avidly-theme' ),
				'id'            => 'footer',
				'description'   => esc_html_x( 'Add widgets here.', 'admin UI: widget area', 'avidly-theme' ),
				'before_widget' => '<div id="%1$s" class="widget nested-list-reset ph3 ph4-m ph5-l w-third-ns %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<p class="widget__title mt0 mb0 ttu tracked f6 fw7 lh-copy">',
				'after_title'   => '</p>',
			)
		);
	}
);
