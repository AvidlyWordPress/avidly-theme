<?php
/**
 * Title: Latest posts
 * Description: Add block description.
 * Slug: avidly-theme/latest-posts
 * viewportWidth: 1440
 * Block Types: core/post-content
 * Post Types: page
 * Categories: dynamic
 *
 * @package Avidly_Theme
 */

?>

<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"flex","columns":3},"align":"wide"} -->
<div class="wp-block-query alignwide">

	<!-- wp:post-template -->
		<!-- wp:group {"tagName":"article","style":{"spacing":{"padding":{"top":"0%","right":"0%","bottom":"0%","left":"0%"}}},"className":"border h-full link-element"} -->
		<article class="wp-block-group border h-full link-element" style="padding-top:0%;padding-right:0%;padding-bottom:0%;padding-left:0%">

			<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"minHeight":15,"minHeightUnit":"rem","isDark":false} -->
			<div class="wp-block-cover is-light" style="min-height:15rem"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Kirjoita otsikko...","fontSize":"large"} -->
			<p class="has-text-align-center has-large-font-size"></p>
			<!-- /wp:paragraph --></div></div>
			<!-- /wp:cover -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"1rem","right":"1.5rem","bottom":"1rem","left":"1.5rem"},"blockGap":"0px","margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:1rem;padding-right:1.5rem;padding-bottom:1rem;padding-left:1.5rem">

				<!-- wp:group {"style":{"spacing":{"blockGap":"1rem"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"bottom"}} -->
				<div class="wp-block-group">
					<!-- wp:post-date {"fontSize":"small"} /-->
					<!-- wp:post-terms {"term":"category","textColor":"black","fontSize":"small","className":"no-underline"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0.5rem"}}},"fontSize":"medium"} /-->

				<!-- wp:post-excerpt /-->

			</div>
			<!-- /wp:group -->
		</article>
		<!-- /wp:group -->
	<!-- /wp:post-template -->

</div>
<!-- /wp:query -->
