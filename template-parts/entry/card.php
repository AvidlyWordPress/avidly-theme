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

<article <?php post_class( 'mx-2 p-4 border h-full' ); ?> aria-labelledby="post-<?php the_ID(); ?>">

	<header class="card-header">
		<?php the_title( '<h2 id="post-' . esc_attr( get_the_ID() ) . '" class="my-0 text-xl"><a href="' . esc_url( get_the_permalink() ) . '">', '</a></h2>' ); ?>

		<?php
		if ( 'post' === get_post_type() ) {
			echo sprintf( // WPCS: XSS OK.
				/* translators: 1: published title, 2: date. */
				'<time class="entry-header__time" datetime="%s">%s: %s</time>',
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html_x( 'Published', 'theme UI', 'avidly-theme' ),
				esc_attr( get_the_date() )
			);
		}
		?>
	</header><!-- .cardcard-header -->

	<div class="card-content">
		<?php the_excerpt(); ?>
	</div><!-- .card-content -->

</article>
