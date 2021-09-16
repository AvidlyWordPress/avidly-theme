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
 */
add_action(
	'allowed_block_types_all',
	function( $allowed_block_types, $post ) {

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
			'core/freeform', // Classic editor.
			'core/html',
			'core/preformatted',
			'core/pullquote',
			'core/table',
			'core/verse',

			// Layout elements.
			'core/nextpage', // Page Break.
			'core/spacer',
			'core/buttons', // New in core 5.4.
			'core/button', // Required for buttons.
			'core/column', // New in core 5.8, required for columns.
			'core/columns',
			'core/group',
			'core/media-text',
			'core/more',
			'core/block', // Reusable block.
			'core/separator',

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

			// Widgets.
			'core/shortcode',
			'core/archives',
			'core/calendar', // New incore 5.3.
			'core/categories',
			'core/latest-comments',
			'core/latest-posts',
			'core/rss', // New incore 5.3.
			'core/social-link', // New in core 5.4, required for social-links.
			'core/social-links', // New incore 5.4.
			'core/search', // New incore 5.4.
			'core/tag-cloud', // New incore 5.3.

			// Embeds, common.
			'core/embed',
			'core-embed/twitter',
			'core-embed/youtube',
			'core-embed/facebook',
			'core-embed/instagram',
			'core-embed/wordpress',
			'core-embed/soundcloud',
			'core-embed/spotify',
			'core-embed/flickr',
			'core-embed/vimeo',
			'core-embed/animoto',
			'core-embed/cloudup',
			'core-embed/crowdsignal',
			'core-embed/dailymotion',
			'core-embed/imgur',
			'core-embed/issuu',
			'core-embed/kickstarter',
			'core-embed/meetup-com',
			'core-embed/mixcloud',
			'core-embed/reddit',
			'core-embed/reverbnation',
			'core-embed/screencast',
			'core-embed/scribd',
			'core-embed/slideshare',
			'core-embed/smugmug',
			'core-embed/speaker',
			'core-embed/speaker-deck',
			'core-embed/tiktok', // New incore 5.4.
			'core-embed/ted',
			'core-embed/tumblr',
			'core-embed/videopress',
			'core-embed/wordpress-tv',
			'core-embed/amazon-kindle',

			// Custom (for example 'acf/block-name', etc..).
			'gravityforms/form',
			'acf/avidly-acf-block',

		);

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
				'label' => _x( 'Block category', 'admin: block pattern category', 'avidly-theme' ),
			)
		);

		register_block_pattern(
			'avidly-theme/example-pattern',
			array(
				'title'         => _x( 'Custom block pattern', 'admin: block pattern title', 'avidly-theme' ),
				'description'   => _x( 'Example of custom block pattern.', 'admin: block pattern description', 'avidly-theme' ),
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
