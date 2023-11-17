<?php
/**
 * Setup editor properties.
 *
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 *
 * @package Avidly_Theme
 */

// phpcs:disable
add_filter( 'allowed_block_types_all', 'avidly_theme_set_core_blocks', 10, 2 );
add_filter( 'allowed_block_types_all', 'avidly_theme_set_extended_blocks', 15, 2 );
// add_filter( 'allowed_block_types_all', 'avidly_theme_set_wc_blocks', 15, 2 );
// add_filter( 'allowed_block_types_all', 'avidly_theme_set_ld_blocks', 15, 2 );
// add_filter( 'allowed_block_types_all', 'avidly_theme_set_cap_based_blocks', 15, 2 );
// phpcs:enable


/**
 * Disable Openverse.
 */
add_filter(
	'block_editor_settings_all',
	function( $settings ) {
		$settings['enableOpenverseMediaCategory'] = false;
		return $settings;
	},
	10
);

/**
 * Whitelist core blocks
 *
 * Comment out the ones theme doesn't use.
 *
 * @param bool|string $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
 * @param WP_Block_Editor_Context $editor_context The current block editor context.
 *
 * @link https://wordpress.org/support/article/blocks/
 * @link https://developer.wordpress.org/reference/hooks/allowed_block_types_all/
 */
function avidly_theme_set_core_blocks( $allowed_block_types, $editor_context ) {

	// Do not use whitelist if block editor context is not detected.
	// Basically this allows all blocks to be used in Site editor (?)
	if ( empty( $editor_context->post ) ) {
		return $allowed_block_types;
	}

	// phpcs:disable
	// Create whitelist.
	$allowed_block_types = array(
		// Common.
		'core/paragraph',
		'core/details', // New in core 6.3.
		'core/image',
		'core/heading',
		'core/gallery',
		'core/list',
		'core/list-item', // New in core 6.1, required for lists.
		'core/quote',
		'core/audio',
		'core/cover',
		'core/file',
		'core/video',
		// 'core/footnotes', // New in core 6.3.

		// Formating.
		'core/code',
		// 'core/freeform', // Classic editor.
		'core/html',
		// 'core/preformatted',
		'core/pullquote',
		'core/table',
		// 'core/verse',

		// Layout elements.
		// 'core/nextpage', // Page Break.
		'core/spacer',
		'core/button', // New in core 5.4, equired for buttons.
		'core/buttons',
		'core/column', // New in core 5.8, required for columns.
		'core/columns',
		'core/text-columns', // New in core 6.0.
		'core/group',
		'core/media-text',
		// 'core/more',
		'core/block', // Reusable block.
		'core/separator',
		'core/missing', // New in core 6.0.

		// Widgets.
		// 'core/shortcode',
		// 'core/archives',
		// 'core/calendar', // New in core 5.3.
		'core/categories',
		// 'core/latest-comments',
		// 'core/latest-posts',
		// 'core/rss', // New in core 5.3.
		'core/social-link', // New in core 5.4, required for social-links.
		'core/social-links', // New in core 5.4.
		'core/search', // New in core 5.4.
		// 'core/tag-cloud', // New in core 5.3.
		// 'core/widget-group', // New in core 5.8.
		// 'core/legacy-widget', // New in core 5.8.

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
		'core/template-part', // New in core 5.9.
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
		'core/page-list', // New in core 6.0
		'core/page-list-item', // New in core 6.0, required for page-list.
		'core/navigation', // New in core 5.9.
		'core/navigation-link', // New in core 5.9.
		'core/navigation-submenu', // New in core 5.9.
		'core/pattern', // New in core 6.0.

		// Author.
		'core/avatar', // New in core 6.0.
		'core/post-author', // New in core 5.9.
		'core/post-author-name', // New in core 6.0.
		'core/post-author-biography', // New in core 6.0.

		// Comments, all new in core 6.0.
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
		
		// phpcs:enable
	);

	return $allowed_block_types;
}

/**
 * Enable Misc blocks (example from plugins).
 *
 * @param bool|string $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
 * @param WP_Block_Editor_Context $editor_context The current block editor context.
 */
function avidly_theme_set_extended_blocks( $allowed_block_types, $editor_context ) {

	// Do not use whitelist if block editor context is not detected.
	// Basically this allows all blocks to be used in Site editor (?).
	if ( empty( $editor_context->post ) ) {
		return $allowed_block_types;
	}

	// phpcs:disable
	$push_blocks = array(
		// Avidly.
		'avidly/block-toc',
		'avidly/social-share',

		// Yoast SEO.
		'yoast-seo/breadcrumbs',
		// 'yoast/how-to-block',
		// 'yoast/faq-block',

		// Gravity forms.
		'gravityforms/form',

		// Carousel Slider Block for Gutenberg.
		'cb/carousel', 
		'cb/slide',

		// Advanced Custom Fields.
		// 'acf/your-block-name',

	);
	// phpcs:enable

	$allowed_block_types = is_array( $allowed_block_types ) ? array_merge( $allowed_block_types, $push_blocks ) : $push_blocks;

	return $allowed_block_types;
}

/**
 * Enable WooCommerce blocks.
 *
 * @param bool|string $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
 * @param WP_Block_Editor_Context $editor_context The current block editor context.
 */
function avidly_theme_set_wc_blocks( $allowed_block_types, $editor_context ) {

	// Do not use whitelist if block editor context is not detected.
	// Basically this allows all blocks to be used in Site editor (?).
	if ( empty( $editor_context->post ) ) {
		return $allowed_block_types;
	}

	// Updated list from WC version 7.7.0.
	$push_blocks = array(
		'woocommerce/active-filters', 
		'woocommerce/product-title', 
		'woocommerce/product-price', 
		'woocommerce/product-image', 
		'woocommerce/product-rating', 
		'woocommerce/product-button', 
		'woocommerce/product-summary', 
		'woocommerce/product-sale-badge', 
		'woocommerce/product-sku', 
		'woocommerce/product-stock-indicator', 
		'woocommerce/all-products', 
		'woocommerce/all-reviews', 
		'woocommerce/attribute-filter', 
		'woocommerce/customer-account', 
		'woocommerce/featured-category', 
		'woocommerce/featured-product', 
		'woocommerce/filter-wrapper', 
		'woocommerce/handpicked-products', 
		'woocommerce/mini-cart', 
		'woocommerce/price-filter', 
		'woocommerce/product-best-sellers', 
		'woocommerce/product-categories', 
		'woocommerce/product-category', 
		'woocommerce/product-new', 
		'woocommerce/product-on-sale', 
		'woocommerce/product-search', 
		'woocommerce/product-tag', 
		'woocommerce/product-top-rated', 
		'woocommerce/products-by-attribute', 
		'woocommerce/rating-filter', 
		'woocommerce/reviews-by-category', 
		'woocommerce/reviews-by-product', 
		'woocommerce/stock-filter', 
		'woocommerce/filled-cart-block', 
		'woocommerce/cart-items-block', 
		'woocommerce/cart-line-items-block', 
		'woocommerce/cart-cross-sells-block', 
		'woocommerce/cart-cross-sells-products-block', 
		'woocommerce/cart-totals-block', 
		'woocommerce/cart-express-payment-block', 
		'woocommerce/proceed-to-checkout-block', 
		'woocommerce/empty-cart-block', 
		'woocommerce/cart-accepted-payment-methods-block', 
		'woocommerce/cart-order-summary-block', 
		'woocommerce/cart-order-summary-subtotal-block', 
		'woocommerce/cart-order-summary-fee-block', 
		'woocommerce/cart-order-summary-discount-block', 
		'woocommerce/cart-order-summary-shipping-block', 
		'woocommerce/cart-order-summary-coupon-form-block', 
		'woocommerce/cart-order-summary-taxes-block', 
		'woocommerce/cart-order-summary-heading-block', 
		'woocommerce/cart', 
		'woocommerce/checkout-fields-block', 
		'woocommerce/checkout-totals-block', 
		'woocommerce/checkout-shipping-address-block', 
		'woocommerce/checkout-terms-block', 
		'woocommerce/checkout-contact-information-block', 
		'woocommerce/checkout-billing-address-block', 
		'woocommerce/checkout-actions-block', 
		'woocommerce/checkout-order-note-block', 
		'woocommerce/checkout-order-summary-block', 
		'woocommerce/checkout-payment-block', 
		'woocommerce/checkout-express-payment-block', 
		'woocommerce/checkout-shipping-method-block', 
		'woocommerce/checkout-shipping-methods-block', 
		'woocommerce/checkout-pickup-options-block', 
		'woocommerce/checkout-order-summary-subtotal-block', 
		'woocommerce/checkout-order-summary-fee-block', 
		'woocommerce/checkout-order-summary-discount-block', 
		'woocommerce/checkout-order-summary-shipping-block', 
		'woocommerce/checkout-order-summary-coupon-form-block', 
		'woocommerce/checkout-order-summary-taxes-block', 
		'woocommerce/checkout-order-summary-cart-items-block', 
		'woocommerce/checkout', 
		'woocommerce/empty-mini-cart-contents-block', 
		'woocommerce/filled-mini-cart-contents-block', 
		'woocommerce/mini-cart-title-block', 
		'woocommerce/mini-cart-items-block', 
		'woocommerce/mini-cart-products-table-block', 
		'woocommerce/mini-cart-footer-block', 
		'woocommerce/mini-cart-shopping-button-block', 
		'woocommerce/mini-cart-cart-button-block', 
		'woocommerce/mini-cart-checkout-button-block', 
		'woocommerce/mini-cart-contents',
		'woocommerce/add-to-cart-form', 
		'woocommerce/product-image-gallery', 
		'woocommerce/product-details', 
		'woocommerce/product-reviews', 
		'woocommerce/product-meta'
	);

	$allowed_block_types = is_array( $allowed_block_types ) ? array_merge( $allowed_block_types, $push_blocks ) : $push_blocks;

	return $allowed_block_types;
}

/**
 * Example: Enable LearnDash blocks.
 *
 * @param bool|string $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
 * @param WP_Block_Editor_Context $editor_context The current block editor context.
 */
function avidly_theme_set_ld_blocks( $allowed_block_types, $editor_context ) {

	// Do not use whitelist if block editor context is not detected.
	// Basically this allows all blocks to be used in Site editor (?).
	if ( empty( $editor_context->post ) ) {
		return $allowed_block_types;
	}

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

	$allowed_block_types = is_array( $allowed_block_types ) ? array_merge( $allowed_block_types, $push_blocks ) : $push_blocks;

	return $allowed_block_types;
}


/**
 * Example: Modify allowed blocks by current user capability.
 *
 * @param bool|string $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
 * @param WP_Block_Editor_Context $editor_context The current block editor context.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_get_current_user/.
 */
function avidly_theme_set_cap_based_blocks( $allowed_block_types, $editor_context ) {

	// Do not use whitelist if block editor context is not detected.
	// Basically this allows all blocks to be used in Site editor (?).
	if ( empty( $editor_context->post ) ) {
		return $allowed_block_types;
	}

	// Get user.
	$user = wp_get_current_user();
	$caps = ( (array) $user->allcaps ) ? (array) $user->allcaps : array();

	// IMPORTANT!!!
	// SELECT JUST ONE WAY OF WORK FROM BELOW (either work with unset OR set own whitelists for specific capabilities).
	// Capability based whitelisting is not tested in production yeat.

	// WAY 1: Unallow these blocks for users who cannot edit theme settings (since 2.1.1.).
	if ( ! array_key_exists( 'edit_theme_options', $caps ) ) {
		array_splice( $allowed_block_types, array_search( 'core/html', $allowed_block_types, true ), 1 );
	}
	$allowed_block_types = array_values( $allowed_block_types ); // Rebase array keys.

	// WAY 2: Allow these blocks for users who cannot edit theme settings (since 2.1.1.).
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

