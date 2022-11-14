<?php
/**
 * Header file for theme.
 *
 * @link https://developer.wordpress.org/themes/functionality/404-pages/
 *
 * @package Avidly_Theme
 * @since 2.0.0
 */

$page404         = avidly_theme_get_page_by_path( '404-blocks' );
$page404_content = apply_filters( 'the_content', get_post_field( 'post_content', $page404 ) );

get_header();
?>

<main id="main" class="site-content">

	<?php if ( $page404 ) : ?>

		<div class="entry-content container">
			<?php
			// Link: https://developer.wordpress.org/reference/functions/do_blocks/.
			echo wp_kses_post( do_blocks( $page404_content ) );
			?>
		</div>

	<?php else : ?>

		<header class="entry-header container text-center px-5 py-10 mb-6">
			<h1 class="my-0">
				<?php
				/* translators: 404 page title. */
				echo esc_html_x( '404 - Page not found', 'theme UI', 'avidly-theme' );
				?>
			</h1>
		</header><!-- .entry-header -->

		<div class="entry-content container text-center mb-12">

			<p>
			<?php
			/* translators: 404 page error message. */
			echo esc_html_x( 'Oops! That page can&rsquo;t be found.', 'theme UI', 'avidly-theme' );
			?>
			</p>

			<a href="<?php echo esc_html( get_site_url() ); ?>" class="mt-3">
				<?php
				/* translators: Link to front page. */
				echo esc_html_x( 'Go to front page', 'theme UI', 'avidly-theme' );
				?>
			</a>

		</div><!-- /.entry-content -->

	<?php endif; ?>

</main><!-- .site-content -->


<?php
get_footer();
