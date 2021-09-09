<?php
/**
 * Header file for theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Avidly_Theme
 * @since 1.0.0
 */

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
			<header class="site-header relative w-full menu:flex items-center justify-between alignwide">

				<a class="skip-link screen-reader-text border-2 border-primary has-white-background-color has-text-color has-primary-color p-4" href="#primary">
					<?php echo esc_html_x( 'Skip to the content', 'skip link', 'avidly-theme' ); ?>
				</a>

				<div class="site-header__logo px-4 w-3/4 menu:w-auto xl:px-0">
					<?php
					echo sprintf(
						'<p class="site-header__title"><a href="%s" aria-label="%s">%s</a></p>',
						esc_url( get_site_url() ),
						esc_html_x( 'Go to front page', 'screen reader text', 'avidly-theme' ),
						avidly_theme_get_theme_svg( 'logo', 'theme' ) // phpcs:ignore
					);
					?>
				</div><!-- /.site-header__logo -->

				<div id="main-navigation-wrapper" class="main-navigation-wrapper">
					<?php
					echo sprintf(
						'<button class="%s" aria-expanded="false" aria-controls="mobile-menu" aria-label="%s">%s</button>',
						'mobile-menu-toggle absolute top-4 right-2 block my-2 mx-4 xl:mx-0 p-4 has-primary-background-color has-white-color menu:hidden',
						esc_html( _x( 'Menu', 'menu UI', 'avidly-theme' ) ),
						avidly_theme_get_theme_svg( 'menu', 'ui', 'w-8 mx-auto' ) // phpcs:ignore
					);
					?>

					<div id="mobile-menu" class="hidden px-4 xl:px-0 menu:block">
						<nav id="nav" class="nav-primary" aria-label="<?php echo esc_html_x( 'Primary menu', 'menu UI', 'avidly-theme' ); ?>">
							<?php
							if ( has_nav_menu( 'primary_menu' ) ) {
								wp_nav_menu(
									array(
										'theme_location' => 'primary_menu',
										'container'      => false,
										'depth'          => 4,
										'menu_class'     => 'disclosure-menu list-none flex flex-col menu:flex-row menu:flex-wrap menu:justify-end',
										'menu_id'        => 'main-menu',
										'echo'           => true,
										'walker'         => new Disclosure_Nav_Menu(),
										'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									)
								);
							}
							?>
						</nav>
					</div><!-- /.mobile-menu -->
				</div>
			</header>
		</div>
