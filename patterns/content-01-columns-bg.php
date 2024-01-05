<?php
/**
 * Title: Osio taustavärillä, kolme saraketta.
 * Description: Editing the content of the Columns block is restricted ("templateLock":"contentOnly").
 * Slug: avidly-theme/content-01-columns-bg
 * viewportWidth: 1440
 * Block Types: core/post-content
 * Categories: content
 *
 * @package Avidly_Theme
 */

?>
<!-- wp:group {"align":"full","backgroundColor":"lightgray","layout":{"type":"constrained"},"className":"pattern-content-01-columns-bg"} -->
<div class="wp-block-group alignfull has-lightgray-background-color has-background pattern-content-01-columns-bg">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">Otsikko h2</h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"templateLock":"contentOnly", "align":"wide"} -->
	<div class="wp-block-columns alignwide"><!-- wp:column -->
		<div class="wp-block-column">
		<?php
		// Get shared content (run inside function_exists to prevent errors in WP updates).
		if ( function_exists( 'avidly_theme_column_content_01' ) ) {
			echo avidly_theme_column_content_01(); //phpcs:ignore.
		};
		?>
		</div>
		<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<?php
		// Get shared content (run inside function_exists to prevent errors in WP updates).
		if ( function_exists( 'avidly_theme_column_content_01' ) ) {
			echo avidly_theme_column_content_01(); //phpcs:ignore.
		};
		?>
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<?php
		// Get shared content (run inside function_exists to prevent errors in WP updates).
		if ( function_exists( 'avidly_theme_column_content_01' ) ) {
			echo avidly_theme_column_content_01(); //phpcs:ignore.
		};
		?>
	</div>
	<!-- /wp:column -->
	</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->