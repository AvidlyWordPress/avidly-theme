<?php
/**
 * Avidly Block Theme functions and definitions.
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
require_once 'inc/_conf/wp-cleanup.php'; // Remove unneeded WordPress default functionality.
require_once 'inc/_conf/cache-busting.php'; // Purge cache for assets added in register-assets.php.
require_once 'inc/_conf/setup-theme.php';
require_once 'inc/_conf/setup-allowed-block-types.php';
require_once 'inc/_conf/register-assets.php';
// phpcs:ignore 
// require_once 'inc/_conf/register-menus.php'; // Uncomment this if you want to use Classic menus. You need also a custom block display classic menus from backend. 
require_once 'inc/_conf/register-pattern-categories.php';
require_once 'inc/_conf/register-block-templates.php';
require_once 'inc/_conf/register-block-styles.php';

/**
 * Helpers
 */
require_once 'inc/helpers/theme-hooks.php';
require_once 'inc/helpers/override-admin-styles.php';
require_once 'inc/helpers/featured-images.php';
require_once 'inc/helpers/helper-functions-general.php';
require_once 'inc/helpers/helper-functions-patterns.php';

/**
 * Block queries
 */
require_once 'inc/queries/related-posts-query.php';

/**
 * Block renders
 */
require_once 'inc/render-block/post-template.php';
require_once 'inc/render-block/post-terms.php';
