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
$article_class .= ( avidly_theme_is_sticky() ) ? ' sm:flex' : ' block sm:flex md:block';
$posttype       = get_post_type_object( get_post_type() );
?>

<article <?php post_class( $article_class ); ?> aria-labelledby="post-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="wp-block-post-featured-image card__image relative flex-1 mt-0">
			<?php
			the_post_thumbnail(
				'post-thumbnail',
				array(
					'class' => 'object-cover w-full h-full',
					'sizes' => '(max-width:768px) 90vw, (max-width:1280px) 50vw, 450px',
				),
			);
			?>
		</figure>
	<?php endif; ?>

	<div class="card__wrapper flex-1 wp-block-group py-4 px-6">
		<div class="flex flex-wrap gap-4 items-center has-small-font-size">
			<?php
			if ( 'post' === get_post_type() ) {
				// phpcs:ignore
				echo avidly_theme_get_post_date();
			}

			if ( has_category() ) {
				// Get ist of categories in a string.
				$cats = implode( ', ', avidly_theme_get_the_category() );

				echo sprintf(
					'<span class="card__categories has-small-font-size">%s</span>',
					sprintf(
						/* translators: %s post category. */
						_x( '<span class="screen-reader-text">In category </span>%s', 'theme UI', 'avidly-theme' ), // phpcs:ignore.
						esc_html( $cats )
					),
				);
			}
			?>
		</div>

		<?php
		the_title( '<h2 id="post-' . esc_attr( get_the_ID() ) . '" class="mb-0 mt-2 has-medium-font-size break-words"><a href="' . esc_url( get_the_permalink() ) . '">', '</a></h2>' );

		// Display post type name in search results.
		if ( is_search() && $posttype ) {
			echo '<span class="card__posttype mt-4 block">' . esc_html( $posttype->labels->singular_name ) . '</span>';
		}
		?>

		<div class="card__content">
			<?php the_excerpt(); ?>
		</div><!-- .card__content -->
	</div><!-- .card__wrapper -->

</article>
