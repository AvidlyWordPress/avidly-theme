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

	<header class="entry-header container my-10">

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-header__image relative alignwide h-48 xxs:h-60 xs:h-96 lg:h-128 mb-5">
			<?php
			the_post_thumbnail(
				'medium_large',
				array(
					'class' => 'object-cover w-full h-full',
					'sizes' => '(min-width:1280px) 100vw, (min-width:1024px) 1024px, 90vw',
					'loading' => false, // This is above-the-fold image, disable lazy load to improve PSI.
				),
			);
			?>
			</div>
		<?php endif; ?>

		<?php the_title( '<h1 id="post-' . esc_attr( get_the_ID() ) . '" class=" my-0 alignwide">', '</h1>' ); ?>

		<?php
		// Display date for posts.
		if ( 'post' === get_post_type() ) :
			?>
			<div class="flex flex-col mt-4 sm:mt-0 sm:flex-row flex-wrap alignwide sm:items-center">
				<?php
				// phpcs:ignore
				echo sprintf(
					'<span class="entry-header__date">%s</span>',
					// phpcs:ignore.
					avidly_theme_get_post_date()
				);

				if ( has_category() ) {
					echo sprintf(
						'%s<span class="entry-header__categories text-sm">%s</span>',
						'<span class="hidden sm:block mx-2">|</span>',
						sprintf(
							/* translators: %s post category. */
							_x( '<span class="screen-reader-text">In category </span>%s', 'theme UI', 'avidly-theme' ), // phpcs:ignore.
							get_the_category_list( ', ' ) // phpcs:ignore.
						),
					);
				}
				?>
			</div>
			<?php
		endif;

		if ( has_excerpt() ) {
			echo sprintf(
				'<div class="entry-header__excerpt alignwide text-xl mt-10">%s</div>',
				// phpcs:ignore.
				apply_filters( 'the_excerpt', get_the_excerpt() )
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
