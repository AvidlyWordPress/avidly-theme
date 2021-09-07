<?php
/**
 * The default template for content none
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Avidly_Theme
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content container" role="status">
		<?php echo esc_html_x( 'No content found.', 'theme UI', 'avidly-theme' ); ?>
	</div><!-- .entry-content -->

</article>
