<?php
/**
 * Main footer.php
 *
 * @package Avidly_Theme
 * @since 1.0.0
 */

?>

<footer class="site-footer container" aria-label="<?php echo esc_html_x( 'Site footer', 'theme UI', 'avidly-theme' ); ?>">

	<?php if ( has_nav_menu( 'policy_menu' ) ) : ?>
	<nav class="mt-8 has-background has-black-background-color has-text-color has-white-color alignfull" aria-label="<?php echo esc_html_x( 'Policy menu', 'menu UI', 'avidly-theme' ); ?>">
		<div class="nowrap overflow-x-auto alignwide">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'policy_menu',
					'menu_class'     => 'list flex flex-wrap list-none my-3',
					'fallback_cb'    => false, // Do not fall back to wp_page_menu().
				)
			);
			?>
		</div>
	</nav>
	<?php endif; ?>

	<div class="site-footer__widgets has-background has-tertiary-background-color alignfull py-5">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			<div class="alignwide md:flex justify-between">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div>
		<?php endif; ?>
	</div><!-- /.site-footer__widgets -->
</footer>

<?php wp_footer(); ?>
</body>
</html>
