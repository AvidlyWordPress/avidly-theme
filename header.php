<?php
/**
 * Header file for theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Avidly_Theme
 * @since 1.0.0
 */

avidly_theme_cache_headers();

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php
		// All <head> related should be hooked in wp_head action and assets enquequed.
		wp_head();
		?>
	</head>

	<body <?php body_class(); ?>>

		<?php wp_body_open(); ?>

		<div class="nav-container container">
			<header class="site-header relative w-full flex flex-wrap items-center justify-between alignwide" aria-label="<?php echo esc_html_x( 'Site header', 'theme UI: aria landmark', 'avidly-theme' ); ?>">

				<a class="skip-link screen-reader-text border-2 border-primary has-white-background-color has-text-color has-primary-color p-4" href="#wp--skip-link--target">
					<?php
					/* translators: Link to skip site section. */
					echo esc_html_x( 'Skip to the content', 'theme UI: skip link', 'avidly-theme' );
					?>
				</a>

				<div class="site-header__logo z-10 px-4 mr-auto max-w-xs xl:px-0 flex-1 order-2">
					<?php
					echo sprintf(
						'<div class="site-header__title"><a href="%s" aria-label="%s">%s</a></div>',
						esc_url( home_url( '/' ) ),
						/* translators: Link to front page. */
						esc_html_x( 'Go to front page', 'theme UI', 'avidly-theme' ),
						avidly_theme_get_theme_svg( 'logo', 'theme' ) // phpcs:ignore
					);
					?>
				</div><!-- /.site-header__logo -->

				<?php avidly_theme_the_search_link( 'px-2 z-10 menu:hidden items-center order-2' ); ?>

				<?php
				echo sprintf(
					'<button class="%s" aria-expanded="false" aria-controls="mobile-menu" aria-label="%s">%s</button>',
					'mobile-menu-toggle flex-initial xl:mx-0 p-4 m-4 order-3 has-primary-background-color has-white-color menu:hidden ',
					/* translators: Mobile menu toggle button. */
					esc_html( _x( 'Menu', 'menu UI: toggle', 'avidly-theme' ) ),
					avidly_theme_get_theme_svg( 'menu', 'ui', 'w-8 mx-auto' ) // phpcs:ignore
				);
				?>

				<div id="main-navigation-wrapper" class="main-navigation-wrapper order-3 w-full menu:w-auto">
					<?php if ( has_nav_menu( 'primary_menu' ) ) : ?>

						<div id="mobile-menu" class="hidden xl:px-0 menu:block">
							<nav id="nav" class="nav-primary" aria-label="<?php echo esc_html_x( 'Primary menu', 'menu UI: aria landmark', 'avidly-theme' ); ?>">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'primary_menu',
										'container'      => false,
										'depth'          => 4,
										'menu_class'     => 'disclosure-menu list-none flex flex-col menu:flex-row menu:flex-wrap menu:justify-end has-text-color mt-0 p-0',
										'menu_id'        => 'main-menu',
										'echo'           => true,
										'walker'         => new Disclosure_Nav_Menu(),
										'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									)
								);
								?>
							</nav>
						</div><!-- /.mobile-menu -->
					<?php endif; ?>
				</div>

				<?php avidly_theme_the_search_link( 'px-4 hidden menu:flex items-center order-1 menu:w-auto menu:order-5' ); ?>
			</header>

		</div>

