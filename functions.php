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
require_once 'inc/_conf/_cache-busting.php'; // Purge assets cache in register-assets.php.
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
require_once 'inc/helpers/function-cleanup.php'; // Remove unneeded WordPress default functionality.
require_once 'inc/helpers/function-svg-icons.php';
