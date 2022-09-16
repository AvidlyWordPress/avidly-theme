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
$posts_title    = get_the_title( $page_for_posts );
$posts_content  = apply_filters( 'the_content', get_post_field( 'post_content', $page_for_posts ) );

get_header();
?>

	<div id="wp--skip-link--target" class="site-content overflow-hidden">
		<main id="main" class="site-main">

		<header class="entry-header container px-5 py-10 mb-6">
			<div class="alignwide text-center">
				<?php
				if ( is_home() ) {
					echo '<h1 class="my-0">' . esc_html( $posts_title ) . '</h1>';
					echo '<div class="entry-header__content mt-6">' . wp_kses_post( $posts_content ) . '</div>';
				} elseif ( is_search() ) {
					echo '<h1 class="my-0"">' . esc_html_x( 'Search from site', 'theme UI', 'avidly-theme' ) . '</h1>';
					echo '<div class="site-search-wrapper text-black">' . get_search_form( array( 'echo' => false ) ) . '</div>';
				} else {
					the_archive_title( '<h1 class="my-0"">', '</h1>' );
				}
				?>
			</div>
		</header><!-- .entry-header -->

			<?php
			if ( have_posts() && is_singular() ) :

				get_template_part( 'template-parts/entry/content', get_post_type() ); // phpcs:ignore

			elseif ( have_posts() ) :
				?>
				<div class="entry-content container mb-6">
					<ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 list-none alignwide">
						<?php
						// Load content loop.
						while ( have_posts() ) {
							the_post();

							$classes = 'mb-4';
							$classes .= ( avidly_theme_is_sticky() ) ? ' md:col-span-2 lg:col-span-3' : '';

							echo '<li class="' . esc_attr( $classes ) . '">';
							get_template_part( 'template-parts/card/content', get_post_type() );
							echo '</li>';
						}
						?>
					</ul>
				</div><!-- /.entry-content -->
				<?php
			else :

				// If no content, include the "No posts found" template.
				get_template_part( 'template-parts/entry/none', get_post_type() );

			endif;
			?>

			<?php the_posts_pagination( array( 'class' => 'text-center' ) ); ?>

		</main><!-- .site-main -->
	</div><!-- .site-content -->

<?php
get_footer();
