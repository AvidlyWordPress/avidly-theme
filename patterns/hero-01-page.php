<?php
/**
 * Title: Page hero
 * Slug: avidly-theme/post-hero
 * viewportWidth: 1440
 * Block Types: core/post-content
 * Post Types: page
 * Categories: avidly_theme-content
 *
 * @package Avidly_Theme
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