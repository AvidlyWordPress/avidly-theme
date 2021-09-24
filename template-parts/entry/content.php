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

	<header class="entry-header container py-10 mb3-6">

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-header__image relative alignwide h-48 xxs:h-60 xs:h-96 lg:h-128 mb-5">
				<?php the_post_thumbnail( 'large', array( 'class' => 'object-cover w-full h-full' ) ); ?>
			</div>
		<?php endif; ?>

		<?php the_title( '<h1 id="post-' . esc_attr( get_the_ID() ) . '" class=" my-0 alignwide">', '</h1>' ); ?>

		<?php
		// Display date for posts.
		if ( 'post' === get_post_type() ) {
			echo sprintf( // WPCS: XSS OK.
				/* translators: 1: published title, 2: date. */
				'<time class="entry-header__time block alignwide" datetime="%s">%s: %s</time>',
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html_x( 'Published', 'theme UI', 'avidly-theme' ),
				esc_attr( get_the_date() )
			);
		}
		?>
	</header><!-- .entry-header -->

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
