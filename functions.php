<?php
/**
 * Avidly Theme functions and definitions.
 *
 * Include PHP files, nothing else.
 *
 * All the functions, hooks and setup should be in their own files organized under /inc/ folder.
 * The names of the file should describe the functionality.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Avidly_Theme
 */

/**
 * Configuration
 */
require_once 'inc/_conf/cache-busting.php'; // Purge assets cache in register-assets.php.
require_once 'inc/_conf/setup-theme.php';
require_once 'inc/_conf/setup-editor.php';
require_once 'inc/_conf/register-assets.php';
require_once 'inc/_conf/register-menus.php';
require_once 'inc/_conf/register-sidebars.php';


/**
 * Classes
 */
require_once 'inc/class/class-disclosure-nav-menu.php';
require_once 'inc/class/class-svg-icons.php';

/**
 * Helpers
 */
require_once 'inc/helpers/wp-cleanup.php'; // Remove unneeded WordPress default functionality.
require_once 'inc/helpers/svg-icons.php';
require_once 'inc/helpers/template-tags.php';


// Our custom post type function
function create_posttype() {
 
    register_post_type( 'custom',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Custom' ),
                'singular_name' => __( 'Custom' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'custom-cpt' ),
            'show_in_rest' => true,
 
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


 
//create a custom taxonomy name it Services for your posts
 
function create_services_tag_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Services', 'taxonomy general name' ),
    'singular_name' => _x( 'Service', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Services' ),
    'all_items' => __( 'All Services' ),
    'parent_item' => __( 'Parent Service' ),
    'parent_item_colon' => __( 'Parent Service:' ),
    'edit_item' => __( 'Edit Service' ), 
    'update_item' => __( 'Update Service' ),
    'add_new_item' => __( 'Add New Service' ),
    'new_item_name' => __( 'New Service Name' ),
    'menu_name' => __( 'Services' ),
  );    
 
// Now register the taxonomy
  register_taxonomy( 'Services', array('custom'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'custom-cpt' ),
  ));
 
}
add_action( 'init', 'create_services_tag_taxonomy', 0 );


//create a custom taxonomy name it Services for your posts
 
function create_city_hierarchical_taxonomy() {
 
	// Add new taxonomy, make it hierarchical like categories
	//first do the translations part for GUI
	 
	  $labels = array(
		'name' => _x( 'City', 'taxonomy general name' ),
		'singular_name' => _x( 'City', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search City' ),
		'all_items' => __( 'All City' ),
		'parent_item' => __( 'Parent City' ),
		'parent_item_colon' => __( 'Parent City:' ),
		'edit_item' => __( 'Edit City' ), 
		'update_item' => __( 'Update City' ),
		'add_new_item' => __( 'Add New City' ),
		'new_item_name' => __( 'New City Name' ),
		'menu_name' => __( 'City' ),
	  );    
	 
	// Now register the taxonomy
	  register_taxonomy( 'City', array('custom'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'custom-cpt' ),
	  ));
	 
	}
	add_action( 'init', 'create_city_hierarchical_taxonomy', 0 );