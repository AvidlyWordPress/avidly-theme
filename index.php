<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Avidly_Theme
 * @since 1.0.0
 */

$page_for_posts = get_option( 'page_for_posts' );



get_header();
?>

	<div id="primary" class="site-content overflow-hidden">
		<main id="main" class="site-main">

		<header class="entry-header container text-center has-text-color has-white-color has-background-color has-primary-background-color alignfull px-5 py-10 mb-6">
			<?php
			if ( is_home() ) {
				echo '<h1 class="my-0">' . esc_html( get_the_title( $page_for_posts ) ) . '</h1>';
			} else if ( is_search() ) {
				echo sprintf(
					'<h1 class="my-0"">' . esc_html_x( 'You searched for %s', 'theme UI', 'avidly-theme' ) . '</h1>',
					'<span>' . get_search_query() . '</span>'
				);
			} else {
				the_archive_title( '<h1 class="my-0"">', '</h1>' );
			}
			?>
		</header><!-- .entry-header -->

			<div class="entry-content container">

				<?php if ( have_posts() ) : ?>

					<ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 list-none alignwide">
						<?php
						// Load content loop.
						while ( have_posts() ) {
							the_post();

							$classes = 'mb-4';
							$classes .= is_sticky() ? ' md:col-span-2 lg:col-span-3' : '';

							echo '<li class="' . esc_attr( $classes ) . '">';
							get_template_part( 'template-parts/entry/card', get_post_type() );
							echo '</li>';
						}
						?>
					</ul>

				<?php
				else :

					// If no content, include the "No posts found" template.
					get_template_part( 'template-parts/entry/none', get_post_type() );

				endif;
				?>

				<?php the_posts_pagination( array( 'class' => 'text-center' ) ); ?>

			</div><!-- /.entry-content -->

		</main><!-- .site-main -->
	</div><!-- .site-content -->

<?php
get_footer();
