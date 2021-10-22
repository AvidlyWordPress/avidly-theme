<?php
/**
 * The default template for displaying full content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Avidly_Theme
 * @since 1.0.0
 */

$article_class     = 'card mx-2 border h-full link-element';
$article_class    .= ( is_sticky() && ! is_paged() ) ? ' sm:flex' : ' block sm:flex md:block';
$posttype = get_post_type_object( get_post_type() );
?>

<article <?php post_class( $article_class ); ?> aria-labelledby="post-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="card__image relative flex-1">
			<?php
			the_post_thumbnail(
				'post-thumbnail',
				array(
					'class' => 'object-cover w-full h-full',
					'sizes' => '(max-width:768px) 90vw, (max-width:1280px) 50vw, 450px',
				),
			);
			?>
		</div>
	<?php endif; ?>

	<div class="card__wrapper p-4 flex-1">
		<header class="card__header mb-4">
			<div class="flex flex-col sm:flex-row flex-wrap alignwide sm:items-center">
				<?php
				// Display post type name in search results.
				if ( is_search() && $posttype ) {
					echo '<span class="card__posttype text-sm">' . esc_html( $post_type->labels->singular_name ) . '</span>';
				}

				if ( has_category() ) {
					// Get ist of categories in a string.
					$cats = implode( ', ', avidly_theme_get_the_category() );

					echo sprintf(
						'%s<span class="card__categories text-sm">%s</span>',
						( is_search() && $posttype ) ? '<span class="hidden sm:block mx-2">|</span>' : '', // phpcs:ignore.
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
			the_title( '<h2 id="post-' . esc_attr( get_the_ID() ) . '" class="my-0 text-xl break-words"><a href="' . esc_url( get_the_permalink() ) . '">', '</a></h2>' );

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
