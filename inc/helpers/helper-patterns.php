<?php
/**
 * Helper functions: Block patterns.
 *
 * @package Avidly_Theme
 * @since 3.1.1
 */


/**
 * Create default output for column content.
 *
 * @return HTML
 */
function avidly_theme_column_content_01() {
	ob_start();
	?>

	<!-- wp:image {"aspectRatio":"4/3","scale":"cover","linkDestination":"none"} -->
	<figure class="wp-block-image"><img src="" alt="" style="aspect-ratio:4/3;object-fit:cover"/></figure>
	<!-- /wp:image -->

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading">Otsikko H3</h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>Muuta tähän sisältö lorem ipsum dolor sit amet. Consectetur adipicing elit.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button">
			<a class="wp-block-button__link wp-element-button" href="#">CTA-painike</a>
		</div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<?php
	$content = ob_get_contents();
	ob_end_clean();

	return $content;
}