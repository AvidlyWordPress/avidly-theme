<?php
/**
 * The default template for displaying full content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Avidly_Theme
 * @since 1.0.0
 */

$article_class  = 'card mx-2 border h-full link-element';
$article_class .= ( is_sticky() && ! is_paged() ) ? ' sm:flex' : ' block xs:flex md:block';
?>

<article <?php post_class( $article_class ); ?> aria-labelledby="post-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="card__image relative flex-1">
			<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'object-cover w-full h-full' ) ); ?>
		</div>
	<?php endif; ?>

	<div class="card__wrapper p-4 flex-1">
		<header class="card__header mb-2">
			<?php
			the_title( '<h2 id="post-' . esc_attr( get_the_ID() ) . '" class="my-0 text-xl break-words"><a href="' . esc_url( get_the_permalink() ) . '">', '</a></h2>' );
			?>

			<?php
			if ( 'post' === get_post_type() ) {
				// phpcs:ignore
				echo avidly_theme_get_post_date();
			}
			?>
		</header><!-- .card__header -->

		<div class="card__content">
			<?php the_excerpt(); ?>
		</div><!-- .card__content -->
	</div><!-- .card__wrapper -->

</article>
