<?php
/**
 * The default template for displaying full content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Avidly_Theme
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> aria-labelledby="post-<?php the_ID(); ?>">

	<?php
	/**
	 * Basic entry header has been moved to own template part to support header area creations with blocks.
	 * Take template part to use: get_template_part( 'template-parts/entry/header', get_post_type() );
	 */
	?>

	<div class="entry-content container">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>

</article>
