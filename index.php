<?php
/**
 * The main template file.
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

<main id="main" class="site-content">
	<?php
	if ( have_posts() && is_singular() ) :

		get_template_part( 'template-parts/entry/content', get_post_type() ); // phpcs:ignore

	elseif ( have_posts() ) :
		?>
		<header class="entry-header container px-5 py-10 mb-12">
			<div class="alignwide text-center">
				<?php if ( is_home() ) : ?>
					<h1 class="my-0"><?php echo esc_html( $posts_title ); ?></h1>
					<div class="entry-header__content mt-6">
						<?php
						// Link: https://developer.wordpress.org/reference/functions/do_blocks/.
						echo wp_kses_post( do_blocks( $posts_content ) );
						?>
					</div>
				<?php elseif ( is_search() ) : ?>
					<h1 class="my-0"><?php echo esc_html_x( 'Search from site', 'theme UI', 'avidly-theme' ); ?></h1>
					<div class="site-search-wrapper text-black"><?php get_search_form(); ?></div>
				<?php else : ?>
					<?php the_archive_title( '<h1 class="my-0"">', '</h1>' ); ?>
				<?php endif; ?>
			</div>
		</header><!-- .entry-header -->

		<div class="entry-content container">
			<ul class="grid gap-default grid-cols-1 md:grid-cols-2 lg:grid-cols-3 list-none alignwide p-0">
				<?php
				// Load content loop.
				while ( have_posts() ) {
					the_post();

					$classes = ( avidly_theme_is_sticky() ) ? 'md:col-span-2 lg:col-span-3' : '';

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


	<?php
	// Do the pagination.
	if ( ! is_singular() ) {
		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) {
			echo '<div class="my-12">';
			the_posts_pagination( array( 'class' => 'text-center' ) );
			echo '</div>';
		} else {
			echo '<div class="my-24"></div>';
		}
	}
	?>
</main><!-- .site-content -->

<?php
get_footer();
