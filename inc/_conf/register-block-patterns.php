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
add_filter( 'init', 'avidly_theme_block_patterns' );

/**
 * Register custom block patterns categories.
 */
function avidly_theme_block_pattern_cat() {
	// Register block pattern categories.
	register_block_pattern_category(
		'avidly_theme-block-cat',
		array(
			'label' => _x( 'Block category', 'admin UI: block pattern category', 'avidly-theme' ),
		)
	);
}

/**
 * Register custom block patterns.
 */
function avidly_theme_block_patterns() {

	// Post hero.
	register_block_pattern(
		'avidly-theme/post-hero-pattern',
		array(
			'title'         => _x( 'Post hero area', 'admin UI: block pattern title', 'avidly-theme' ),
			'description'   => _x( 'Hero area for posts.', 'admin UI: block pattern description', 'avidly-theme' ),
			'categories'    => array( 'avidly_theme-block-cat' ),
			'keywords'      => '',
			'viewportWidth' => 1440,
			'content'       =>
				'<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"overlayColor":"black","contentPosition":"bottom center","isDark":false,"align":"full"} -->
				<div class="wp-block-cover alignfull is-light has-custom-content-position is-position-bottom-center"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container">

				<!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":"50%","backgroundColor":"white","textColor":"black"} -->
				<div class="wp-block-column has-black-color has-white-background-color has-text-color has-background" style="flex-basis:50%">

				<!-- wp:post-title {"level":1} /-->

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
				<!-- wp:post-date /-->
				<!-- wp:post-terms {"term":"category"} /--></div>
				<!-- /wp:group -->

				</div>
				<!-- /wp:column -->
				
				<!-- wp:column -->
				<div class="wp-block-column">
				</div>
				<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->

				</div></div>
				<!-- /wp:cover -->',
		)
	);

	// Post Query loop.
	register_block_pattern(
		'avidly-theme/post-query-loop',
		array(
			'title'         => _x( 'Post hero area', 'admin UI: block pattern title', 'avidly-theme' ),
			'description'   => _x( 'Loop recent posts.', 'admin UI: block pattern description', 'avidly-theme' ),
			'categories'    => array( 'avidly_theme-block-cat' ),
			'keywords'      => '',
			'viewportWidth' => 1440,
			'content'       =>
				'<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"flex","columns":3}} -->
				<div class="wp-block-query">

				<!-- wp:post-template -->
				<!-- wp:group {"tagName":"article","style":{"spacing":{"padding":{"top":"0%","right":"0%","bottom":"0%","left":"0%"}}},"className":"border h-full link-element"} -->
				<article class="wp-block-group border h-full link-element" style="padding-top:0%;padding-right:0%;padding-bottom:0%;padding-left:0%">

				<!-- wp:post-featured-image {"className":"mt-0"} /-->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"1rem","right":"1.5rem","bottom":"1rem","left":"1.5rem"},"blockGap":"0px","margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:1rem;padding-right:1.5rem;padding-bottom:1rem;padding-left:1.5rem">
				<!-- wp:group {"style":{"spacing":{"blockGap":"1rem"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"bottom"}} -->
				<div class="wp-block-group"><!-- wp:post-date {"fontSize":"small"} /-->

				<!-- wp:post-terms {"term":"category","textColor":"black","fontSize":"small","className":"no-underline"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0.5rem"}}},"fontSize":"medium"} /-->

				<!-- wp:post-excerpt /--></div>
				<!-- /wp:group -->
				</article>
				<!-- /wp:group -->
				<!-- /wp:post-template -->

				</div>
				<!-- /wp:query -->',
		)
	);
}
