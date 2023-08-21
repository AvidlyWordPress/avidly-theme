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
require_once 'inc/_conf/cache-busting.php'; // Purge assets cache in register-assets.php.
require_once 'inc/_conf/setup-theme.php';
require_once 'inc/_conf/setup-editor.php';
require_once 'inc/_conf/register-assets.php';
// require_once 'inc/_conf/register-menus.php'; // Uncomment his if you wan't to use Classic menus. You need also a custom block or Avidly Classic Menu block to display classic menus from backend.
require_once 'inc/_conf/register-block-patterns.php';
require_once 'inc/_conf/register-block-templates.php';
require_once 'inc/_conf/register-block-styles.php';

/**
 * Helpers
 */
require_once 'inc/helpers/theme-hooks.php';
require_once 'inc/helpers/override-core-styles.php';
require_once 'inc/helpers/featured-images.php';
require_once 'inc/helpers/helper-functions.php';

/**
 * Block queries
 */
require_once 'inc/queries/related-posts-query.php';

/**
 * Block renders
 */
require_once 'inc/render-block/post-template.php';
require_once 'inc/render-block/post-terms.php';
