<?php
/**
 * Create default block templates for post types.
 *
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 *
 * @package Avidly_theme
 * @since 3.4.0
 */

add_filter( 'init', 'avidly_theme_block_pattern_cat' );

/**
 * Register custom block patterns categories.
 */
function avidly_theme_block_pattern_cat() {
	// Register block pattern categories.
	register_block_pattern_category(
		'avidly_theme-hero',
		array(
			'label' => _x( 'Hero areas', 'admin UI: block pattern category', 'avidly-theme' ),
		)
	);
	register_block_pattern_category(
		'avidly_theme-content',
		array(
			'label' => _x( 'Content areas', 'admin UI: block pattern category', 'avidly-theme' ),
		)
	);
	register_block_pattern_category(
		'avidly_theme-query',
		array(
			'label' => _x( 'Query loop areas', 'admin UI: block pattern category', 'avidly-theme' ),
		)
	);
}


/**
 * Create default output for column content.
 *
 * @return HTML
 */
function avidly_theme_column_content_01() {
	ob_start();
	?>

	<!-- wp:image {"id":247,"sizeSlug":"medium","linkDestination":"none"} -->
	<figure class="wp-block-image size-medium"><img src="<?php echo esc_url( site_url() ); ?>/wp-content/uploads/2022/09/image_16-9-300x169.jpg" alt="" class="wp-image-247"/></figure>
	<!-- /wp:image -->

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading">Otsikko H3</h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>Tekstiä lorem ipsum dolor sit amet. Consectetur adipicing elit.</p>
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