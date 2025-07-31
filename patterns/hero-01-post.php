<?php
/**
 * Title: Post Hero with Metadata
 * Description: Full-width post hero with featured image, title, date, and category information.
 * Slug: avidly-theme/post-hero-01
 * viewportWidth: 1440
 * Block Types: core/post-content
 * Post Types: post
 * Categories: avidly_theme-hero
 * Inserter: false
 *
 * @package Avidly_Theme
 *
 * This pattern is hidden from the inserter by default.
 * To make it available in the pattern inserter, change "Inserter: false" to "Inserter: true" above.
 */

?>

<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"overlayColor":"black","contentPosition":"bottom center","isDark":false,"align":"full"} -->
<div class="wp-block-cover alignfull is-light has-custom-content-position is-position-bottom-center">
	<span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-0 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">

		<!-- wp:columns -->
		<div class="wp-block-columns">
			<!-- wp:column {"width":"50%","backgroundColor":"white","textColor":"black"} -->
			<div class="wp-block-column has-black-color has-white-background-color has-text-color has-background" style="flex-basis:50%">

				<!-- wp:post-title {"level":1} /-->

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:post-date /-->
					<!-- wp:post-terms {"term":"category"} /-->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

	</div>
</div>
<!-- /wp:cover -->
