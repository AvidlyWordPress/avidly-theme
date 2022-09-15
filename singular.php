<?php
/**
 * The main page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Avidly_Theme
 * @since 1.0.0
 */

get_header();
?>

	<div id="wp--skip-link--target" class="site-content overflow-hidden">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) {

			// Load content loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/entry/content', get_post_type() );
			}
		} else {
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/entry/none', get_post_type() );
		}
		?>

		</main><!-- .site-main -->
	</div><!-- .site-content -->

<?php
get_footer();
