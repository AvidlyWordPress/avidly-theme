<?php
/**
 * Header file for theme.
 *
 * @link https://developer.wordpress.org/themes/functionality/404-pages/
 *
 * @package Avidly_Theme
 * @since 2.0.0
 */

get_header();
?>

	<div id="primary" class="site-content overflow-hidden">
		<main id="main" class="site-main">

			<header class="entry-header container text-center px-5 py-10 mb-6">
				<h1 class="my-0">404 - <?php esc_html_e( 'Page not found', 'avidly-theme' ); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content container text-center mb-12">

				<p><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'avidly-theme' ); ?></p>
				<p><a href="<?php echo esc_html( get_site_url() ); ?>" class="wp-block-button__link mt-3">
					<?php esc_html_e( 'Go to frontpage', 'avidly-theme' ); ?>
				</a>

			</div><!-- /.entry-content -->

		</main><!-- .site-main -->
	</div><!-- .site-content -->

<?php
get_footer();
