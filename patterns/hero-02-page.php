<?php
/**
 * Title: Simple Page Hero
 * Description: Clean centered page title with spacing. Perfect starting point for most pages.
 * Slug: avidly-theme/page-hero-02
 * viewportWidth: 1440
 * Block Types: core/post-content
 * Post Types: page
 * Categories: avidly_theme-hero
 * Inserter: true
 *
 * @package Avidly_Theme
 */

?>
<!-- wp:cover {"dimRatio":80,"overlayColor":"primary","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:4rem;padding-bottom:4rem">
	<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:heading {"textAlign":"center","level":1,"textColor":"white"} -->
		<h1 class="wp-block-heading has-text-align-center has-white-color has-text-color"><?php echo esc_html_x( 'Hero Title', 'pattern placeholder text', 'avidly-theme' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"white"} -->
		<p class="has-text-align-center has-white-color has-text-color"><?php echo esc_html_x( 'Add a brief description or subtitle here.', 'pattern placeholder text', 'avidly-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
</div>
<!-- /wp:cover -->