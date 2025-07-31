<?php
/**
 * Title: Three Columns Section
 * Description: Content section with three equal columns and light gray background.
 * Slug: avidly-theme/content-columns-bg
 * viewportWidth: 1440
 * Block Types: core/post-content
 * Post Types: page, post
 * Categories: avidly_theme-content
 * Inserter: false
 *
 * @package Avidly_Theme
 *
 * This pattern is hidden from the inserter by default.
 * Uses the avidly_theme_column_content_01() function for shared column content.
 * To make it available in the pattern inserter, change "Inserter: false" to "Inserter: true" above.
 */

?>
<!-- wp:group {"align":"full","backgroundColor":"lightgray","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-lightgray-background-color has-background">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html_x( 'Section Heading', 'pattern placeholder text', 'avidly-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide"><!-- wp:column -->
		<div class="wp-block-column">
		<?php
		// Get shared content (run inside function_exists to prevent errors in WP updates).
		if ( function_exists( 'avidly_theme_column_content_01' ) ) {
			echo avidly_theme_column_content_01(); //phpcs:ignore.
		}
		?>
		</div>
		<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<?php
		// Get shared content (run inside function_exists to prevent errors in WP updates).
		if ( function_exists( 'avidly_theme_column_content_01' ) ) {
			echo avidly_theme_column_content_01(); //phpcs:ignore.
		}
		?>
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<?php
		// Get shared content (run inside function_exists to prevent errors in WP updates).
		if ( function_exists( 'avidly_theme_column_content_01' ) ) {
			echo avidly_theme_column_content_01(); //phpcs:ignore.
		}
		?>
	</div>
	<!-- /wp:column -->
	</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->