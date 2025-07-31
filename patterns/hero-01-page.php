<?php
/**
 * Title: Page Hero with Cover Image
 * Description: Full-width hero section with featured image background, overlay, and content positioning.
 * Slug: avidly-theme/page-hero-01
 * viewportWidth: 1440
 * Block Types: core/post-content
 * Post Types: page
 * Categories: avidly_theme-hero
 * Inserter: false
 *
 * @package Avidly_Theme
 *
 * This pattern is hidden from the inserter by default.
 * To make it available in the pattern inserter, change "Inserter: false" to "Inserter: true" above.
 */

?>
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"overlayColor":"black","contentPosition":"bottom center","align":"full"} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-center">
	<span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-0 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:columns -->
		<div class="wp-block-columns"><!-- wp:column {"width":"50%","backgroundColor":"white","textColor":"black"} -->
			<div class="wp-block-column has-black-color has-white-background-color has-text-color has-background" style="flex-basis:50%">
				<!-- wp:post-title {"level":1} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"></div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
</div>
<!-- /wp:cover -->