<?php
/**
 * Setup editor properties and editor related functionality
 *
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 *
 * @package Avidly_Theme
 */

// phpcs:disable
add_filter( 'allowed_block_types_all', 'avidly_theme_whitelist_blocks', 10, 2 );
// add_filter( 'allowed_block_types_all', 'avidly_theme_set_wc_blocks', 15, 2 );
// add_filter( 'allowed_block_types_all', 'avidly_theme_set_ld_blocks', 15, 2 );
// add_filter( 'allowed_block_types_all', 'avidly_theme_set_capability_based_blocks', 15, 2 );
add_filter( 'init', 'avidly_theme_block_pattern_cat' );
add_filter( 'init', 'avidly_theme_block_patterns' );
// phpcs:enable


/**
 * Whitelist blocks
 *
 * Comment out the ones theme doesn't use.
 *
 * @param bool|string             $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
 * @param WP_Block_Editor_Context $editor_context The current block editor context.
 *
 * @link https://wordpress.org/support/article/blocks/
 * @link https://developer.wordpress.org/reference/hooks/allowed_block_types_all/
 */
function avidly_theme_whitelist_blocks( $allowed_block_types, $editor_context ) {

	// DO not use whitelist if block editor context is not detected.
	if ( empty( $editor_context->post ) ) {
		return $allowed_block_types;
	}

	// phpcs:disable
	// Create whitelist.
	$allowed_block_types = array(
		// Common.
		'core/paragraph',
		'core/image',
		'core/heading',
		'core/gallery',
		'core/list',
		'core/quote',
		'core/audio',
		'core/cover',
		'core/file',
		'core/video',

		// Formating.
		'core/code',
		// 'core/freeform', // Classic editor.
		'core/html',
		// 'core/preformatted',
		// 'core/pullquote',
		'core/table',
		// 'core/verse',

		// Layout elements.
		// 'core/nextpage', // Page Break.
		'core/spacer',
		'core/button', // Required for buttons.
		'core/buttons', // New in core 5.4.
		'core/column', // New in core 5.8, required for columns.
		'core/columns',
		'core/text-columns', // New in core 6.0.
		'core/group',
		'core/media-text',
		// 'core/more',
		'core/block', // Reusable block.
		// 'core/separator',
		'core/missing', // New in core 6.0.

		// Widgets.
		// 'core/shortcode',
		// 'core/archives',
		// 'core/calendar', // New in core 5.3.
		'core/categories',
		// 'core/latest-comments',
		'core/latest-posts',
		'core/rss', // New in core 5.3.
		// 'core/social-link', // New in core 5.4, required for social-links.
		// 'core/social-links', // New in core 5.4.
		// 'core/search', // New in core 5.4.
		'core/tag-cloud', // New in core 5.3.
		'core/widget-group', // New in core 5.8.
		'core/legacy-widget', // New in core 5.8.

		// Theme blocks.
		'core/site-logo', // New in core 5.8.
		'core/site-tagline', // New in core 5.8.
		'core/site-title', // New in core 5.8.
		'core/home-link', // New in core 6.0.
		'core/query', // New in core 5.8.
		'core/query-title', // New in core 5.8.
		'core/query-pagination', // New in core 5.8.
		'core/query-pagination-numbers', // New in core 5.8.
		'core/query-pagination-next', // New in core 5.8.
		'core/query-pagination-previous', // New in core 5.8.
		'core/query-no-results',  // New in core 6.0.
		'core/term-description', // New in core 5.9.
		'core/post-title', // New in core 5.8.
		'core/post-content', // New in core 5.8.
		'core/post-date', // New in core 5.8.
		'core/post-excerpt', // New in core 5.8.
		'core/read-more', // New in core 6.0.
		'core/post-featured-image', // New in core 5.8.
		'core/post-terms', // New in core 5.8.
		'core/post-template', // New in core 5.8.
		'core/post-comments', // New in core 5.9.
		'core/post-navigation-link', // New in core 6.0.
		'core/loginout', // New in core 5.8.
		'core/pagelist', // New in core 5.8.
		'core/page-list', // Same as above, just renamed in core 6.0?
		'core/navigation', // New in core 5.9.
		'core/navigation-link', // New in core 5.9.
		'core/navigation-submenu', // New in core 5.9.
		'core/template-part', // New in core 5.9.
		'core/pattern', // New in core 6.0.

		// Author.
		'core/avatar', // New in core 6.0.
		'core/post-author', // New in core 5.9.
		'core/post-author-biography', // New in core 6.0.

		// Comments, new in core 6.0.
		'core/post-comments',
		'core/post-comments-form',
		'core/comment-author-name',
		'core/comment-content',
		'core/comment-date',
		'core/comment-edit-link',
		'core/comment-reply-link',
		'core/comment-template',
		'core/comments-title',
		'core/comments-query-loop',
		'core/comments-pagination',
		'core/comments-pagination-next',
		'core/comments-pagination-numbers',
		'core/comments-pagination-previous',

		// Embed blocks was refactored to be variations of the base Embed block on core 5.6.
		// Variations can be set via /assets/js/editor-script-block.js.
		'core/embed',

		// Gravity Forms.
		'gravityforms/form',

		// Advanced Custom Fields.
		// 'acf/your-block-name',

		// Custom blocks.
		'avidly/social-share',
		'avidly/accordion',

		// phpcs:enable
	);

	return $allowed_block_types;

}

/**
 * Example: Enable WooCommerce blocks.
 *
 * @param bool|string             $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
 * @param WP_Block_Editor_Context $editor_context The current block editor context.
 */
function avidly_theme_set_wc_blocks( $allowed_block_types, $editor_context ) {

	// Updated list from WC version 6.5.1.
	$push_blocks = array(
		'woocommerce/all-reviews',
		'woocommerce/featured-category',
		'woocommerce/featured-product',
		'woocommerce/handpicked-products',
		'woocommerce/product-best-sellers',
		'woocommerce/product-categories',
		'woocommerce/product-category',
		'woocommerce/product-new',
		'woocommerce/product-on-sale',
		'woocommerce/products-by-attribute',
		'woocommerce/product-top-rated',
		'woocommerce/reviews-by-product',
		'woocommerce/reviews-by-category',
		'woocommerce/product-search',
		'woocommerce/product-tag',
		'woocommerce/product-title',
		'woocommerce/product-price',
		'woocommerce/product-image',
		'woocommerce/product-rating',
		'woocommerce/product-button',
		'woocommerce/product-summary',
		'woocommerce/product-sale-badge',
		'woocommerce/all-products',
		'woocommerce/price-filter',
		'woocommerce/attribute-filter',
		'woocommerce/stock-filter',
		'woocommerce/active-filters',
		'woocommerce/legacy-template',
	);

	$allowed_block_types = array_merge( $allowed_block_types, $push_blocks );

	return $allowed_block_types;
}

/**
 * Example: Enable LearnDash blocks.
 *
 * @param bool|string             $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
 * @param WP_Block_Editor_Context $editor_context The current block editor context.
 */
function avidly_theme_set_ld_blocks( $allowed_block_types, $editor_context ) {

	// Updated list from LD version 4.2.0.1.
	$push_blocks = array(
		'learndash/ld-login',
		'learndash/ld-profile',
		'learndash/ld-course-list',
		'learndash/ld-lesson-list',
		'learndash/ld-topic-list',
		'learndash/ld-quiz-list',
		'learndash/ld-course-progress',
		'learndash/ld-visitor',
		'learndash/ld-student',
		'learndash/ld-course-complete',
		'learndash/ld-course-inprogress',
		'learndash/ld-course-notstarted',
		'learndash/ld-course-resume',
		'learndash/ld-course-info',
		'learndash/ld-user-course-points',
		'learndash/ld-group-list',
		'learndash/ld-user-groups',
		'learndash/ld-group',
		'learndash/ld-payment-buttons',
		'learndash/ld-course-content',
		'learndash/ld-course-expire-status',
		'learndash/ld-certificate',
		'learndash/ld-quiz-complete',
		'learndash/ld-courseinfo',
		'learndash/ld-quizinfo',
		'learndash/ld-groupinfo',
		'learndash/ld-usermeta',
		'learndash/ld-registration',
		'learndash/ld-infobar',
		'learndash/ld-materials',
		'learndash/ld-user-status',
		'learndash/ld-navigation',
		'learndash/ld-exam-question',
		'learndash/ld-question-answers-block',
		'learndash/ld-incorrect-answer-message-block',
		'learndash/ld-correct-answer-message-block',
		'learndash/ld-question-description',
	);

	$allowed_block_types = array_merge( $allowed_block_types, $push_blocks );

	return $allowed_block_types;
}


/**
 * Example: Modify allowed blocks by current user capability.
 *
 * @param bool|string             $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
 * @param WP_Block_Editor_Context $editor_context The current block editor context.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_get_current_user/.
 */
function avidly_theme_set_capability_based_blocks( $allowed_block_types, $editor_context ) {
	$user = wp_get_current_user();
	$caps = ( (array) $user->allcaps ) ? (array) $user->allcaps : array();

	// IMPORTANT!!!
	// SELECT JUST ONE WAY OF WORK FROM BELOW (either work with unset OR set own whitelists for specific capabilities).
	// Capability based whitelistings are not tested in production yeat.

	// Way 1: Unallow these blocks for users who cannot edit theme settings (since 2.1.1.).
	if ( ! array_key_exists( 'edit_theme_options', $caps ) ) {
		array_splice( $allowed_block_types, array_search( 'core/html', $allowed_block_types, true ), 1 );
	}
	$allowed_block_types = array_values( $allowed_block_types ); // Rebase array keys.

	// Way 2: Allow these blocks for users who cannot edit theme settings (since 2.1.1.).
	if ( ! array_key_exists( 'edit_theme_options', $caps ) ) {
		$allowed_block_types = array(
			'core/paragraph',
			'core/list',
			'core/image',
			'core/buttons',
			'core/quote',
		);
	}

	return $allowed_block_types;
}


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
	register_block_pattern(
		'avidly-theme/post-header-pattern',
		array(
			'title'         => _x( 'Example Post header', 'admin UI: block pattern title', 'avidly-theme' ),
			'description'   => _x( 'Example of custom block pattern.', 'admin UI: block pattern description', 'avidly-theme' ),
			'categories'    => array( 'avidly_theme-block-cat' ),
			'keywords'      => '',
			'viewportWidth' => 1440,
			'content'       =>
				'<!-- wp:post-featured-image {"height":"40vw","align":"full"} /-->

				<!-- wp:group {"tagName":"header","align":"wide","layout":{"inherit":false}} -->
				<header class="wp-block-group alignwide"><!-- wp:post-title {"level":1,"style":{"spacing":{"margin":{"top":"5vh"}}}} /-->
				
				<!-- wp:post-date {"format":"j. F\\t\\a Y \\k\\l\\o H:i"} /-->
				
				<!-- wp:paragraph {"fontSize":"medium"} -->
				<p class="has-medium-font-size">Artikkelin ingressi lorem ipsum dolor sit amet. Quisque at arcu a elit ultricies cursus nec tincidunt urna. Nulla et nisl aliquet, semper leo ac, varius quam. Mauris et diam vitae orci ultrices lacinia tempus sed felis.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:spacer {"height":"5vh"} -->
				<div style="height:5vh" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer --></header>
				<!-- /wp:group -->',
		)
	);
}
