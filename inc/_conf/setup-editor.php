<?php
/**
 * Setup editor properties and editor related functionality
 *
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 *
 * @package Avidly_Theme
 */

/**
 * Gutenberg editor functionality.
 */
add_action(
	'after_setup_theme',
	function() {

		// Unregister default patterns and pattern categories that comes from core.
		remove_theme_support( 'core-block-patterns' );

		// Enable support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

	}
);


/**
 * Whitelist blocks
 *
 * Comment out the ones theme doesn't use.
 *
 * @link https://wordpress.org/support/article/blocks/
 * @link https://developer.wordpress.org/reference/hooks/allowed_block_types_all/
 */
add_filter(
	'allowed_block_types_all',
	function( $allowed_block_types, $editor_context ) {

		if ( empty( $editor_context->post ) ) {
			return $allowed_block_types;
		}

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
			// 'core/spacer',
			'core/buttons', // New in core 5.4.
			'core/button', // Required for buttons.
			'core/column', // New in core 5.8, required for columns.
			'core/columns',
			'core/group',
			'core/media-text',
			// 'core/more',
			'core/block', // Reusable block.
			// 'core/separator',

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

			// Theme blocks.
			'core/site-logo', // New in core 5.8.
			'core/site-tagline', // New in core 5.8.
			'core/site-title', // New in core 5.8.
			'core/query', // New in core 5.8.
			'core/query-title', // New in core 5.8.
			'core/query-pagination', // New in core 5.8.
			'core/query-pagination-numbers', // New in core 5.8.
			'core/query-pagination-next', // New in core 5.8.
			'core/query-pagination-previous', // New in core 5.8.
			'core/post-title', // New in core 5.8.
			'core/post-content', // New in core 5.8.
			'core/post-date', // New in core 5.8.
			'core/post-excerpt', // New in core 5.8.
			'core/post-featured-image', // New in core 5.8.
			'core/post-terms', // New in core 5.8.
			'core/post-template', // New in core 5.8.
			'core/loginout', // New in core 5.8.
			'core/pagelist', // New in core 5.8.

			// Embed blocks was refactored to be variations of the base Embed block on core 5.6.
			// Variations can be set via /assets/js/editor-script-block.js.
			'core/embed',

			// Gravity Forms.
			'gravityforms/form',

			/*
			// Advanced Custom Fields.
			'acf/your-block-name',
			*/

			/*
			// LearnDash LMS (block list from version 3.5.0).
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
			*/

			/*
			// WooCommerce (block list from version 5.7.1).
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
			'woocommerce/all-products',
			'woocommerce/price-filter',
			'woocommerce/attribute-filter',
			'woocommerce/active-filters',
			*/
		);

		// Modify allowed blocks by current user capability.
		// @link https://developer.wordpress.org/reference/functions/wp_get_current_user/.
		$user = wp_get_current_user();
		$caps = ( (array) $user->allcaps ) ? (array) $user->allcaps : array();

		// Unallow these blocks for not a super-admin, admin or editor users, since 2.0.1.
		if ( ! array_key_exists( 'edit_theme_options', $caps ) ) {
			array_splice( $allowed_block_types, array_search( 'core/html', $allowed_block_types, true ), 1 );
		}
		// Unallow these blocks for not a super-admin, admin or editor users, since 2.0.1.
		if ( ! array_key_exists( 'edit_pages', $caps ) ) {
			array_splice( $allowed_block_types, array_search( 'core/site-logo', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/site-tagline', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/site-title', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/query', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/query-title', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/query-pagination', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/query-pagination-numbers', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/query-pagination-next', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/query-pagination-previous', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/post-title', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/post-content', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/post-date', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/post-excerpt', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/post-featured-image', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/post-terms', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/post-template', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/loginout', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'core/pagelist', $allowed_block_types, true ), 1 );
			array_splice( $allowed_block_types, array_search( 'gravityforms/form', $allowed_block_types, true ), 1 );
		}

		$allowed_block_types = array_values( $allowed_block_types ); // Rebase array keys.
		return $allowed_block_types;

	},
	10,
	2
);


/**
 * Unregister & Register block patterns.
 */
add_action(
	'init',
	function() {
		// Register block pattern categories.
		register_block_pattern_category(
			'avidly_theme-block-cat',
			array(
				'label' => _x( 'Block category', 'admin UI: block pattern category', 'avidly-theme' ),
			)
		);

		register_block_pattern(
			'avidly-theme/example-pattern',
			array(
				'title'         => _x( 'Custom block pattern', 'admin UI: block pattern title', 'avidly-theme' ),
				'description'   => _x( 'Example of custom block pattern.', 'admin UI: block pattern description', 'avidly-theme' ),
				'categories'    => array( 'avidly_theme-block-cat' ),
				'keywords'      => '',
				'viewportWidth' => 1440,
				'content'       =>
					'<!-- wp:columns {"align":"wide"} -->
					<div class="wp-block-columns alignwide"><!-- wp:column -->
					<div class="wp-block-column"><!-- wp:heading -->
					<h2></h2>
					<!-- /wp:heading --></div>
					<!-- /wp:column -->
					
					<!-- wp:column -->
					<div class="wp-block-column">
					</div>
					<!-- /wp:column --></div>
					<!-- /wp:columns -->',
			)
		);
	}
);
