<?php
/**
 * Default block templates for post types.
 *
 * This file manages the default block structure that appears when creating new posts/pages.
 * Currently configured to provide empty templates for maximum flexibility.
 * 
 * Contains example functions showing how to build complex block templates using arrays.
 * These examples demonstrate cover blocks, columns, spacers, and metadata integration.
 *
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 *
 * @package Avidly_theme
 * @since 3.4.0
 */

add_filter( 'block_editor_settings_all', 'avidly_theme_default_block_template' );
add_action( 'init', 'avidly_theme_register_page_template' );
add_action( 'init', 'avidly_theme_register_post_template' );


/**
 * Filters the settings to pass to the block editor for all editor type.
 *
 * @param array $settings Default editor settings.
 * @return $settings
 */
function avidly_theme_default_block_template( $settings ) {
	$settings['defaultBlockTemplate'] = file_get_contents( get_theme_file_path( 'templates/default-template.html' ) );
	return $settings;
}

/**
 * Register template: Page
 *
 * Defines the default block template for new pages. Currently set to empty
 * to provide a clean starting point. Users can add blocks via the pattern inserter.
 *
 * To add default blocks, use this format:
 * $template = array(
 *     array( 'core/heading', array( 'level' => 1 ) ),
 *     array( 'core/paragraph', array( 'placeholder' => 'Start writing...' ) )
 * );
 *
 * @return void
 */
function avidly_theme_register_page_template() {
	$post_type_object = get_post_type_object( 'page' );

	// Empty template provides clean starting point - users choose content via patterns
	$template = array();

	$post_type_object->template = $template;
}

/**
 * Register template: Post
 *
 * Defines the default block template for new posts. Currently set to empty
 * to provide a clean starting point. Users can add blocks via the pattern inserter.
 *
 * To add default blocks, use this format:
 * $template = array(
 *     array( 'core/cover', array( 'useFeaturedImage' => true ) ),
 *     array( 'core/paragraph', array( 'placeholder' => 'Tell your story...' ) )
 * );
 *
 * @return void
 */
function avidly_theme_register_post_template() {
	$post_type_object = get_post_type_object( 'post' );

	// Empty template provides clean starting point - users choose content via patterns
	$template = array();

	$post_type_object->template = $template;
}

/**
 * Create header block template structure for page.
 *
 * Example function showing how to build complex block structures.
 * Returns a cover block with featured image, overlay, and columns layout.
 * Currently unused but kept as reference for building custom templates.
 *
 * @return array Block template array
 */
function avidly_theme_block_header_page() {
	return array(
		array(
			'core/cover',
			array( // Cover settings.
				'align'            => 'full',
				'useFeaturedImage' => true,
				'overlayColor'     => 'black',
				'dimRatio'         => 0,
				'contentPosition'  => 'bottom center',
				'useFeaturedImage' => true,
			),
			array( // Cover content.
				array(
					'core/columns',
					array(), // Columns settings.
					array( // Columns content.
						array(
							'core/column',
							array( // Column settings.
								'width'           => '50%',
								'backgroundColor' => 'white',
								'textColor'       => 'black',
							),
							array( // Column content.
								array(
									'core/post-title',
									array( // Post title settings.
										'level' => 1,
									),
								),
							),
						),
						array(
							'core/column',
						),
					),
				),
			),
		),
	);
}

/**
 * Create header block template structure for post.
 *
 * Example function showing how to build post-specific templates.
 * Returns a cover block with post title, date, and category metadata.
 * Currently unused but kept as reference for building custom templates.
 *
 * @return array Block template array
 */
function avidly_theme_block_header_post() {
	return array(
		array(
			'core/cover',
			array( // Cover settings.
				'align'            => 'full',
				'useFeaturedImage' => true,
				'overlayColor'     => 'black',
				'dimRatio'         => 0,
				'contentPosition'  => 'bottom center',
				'useFeaturedImage' => true,
			),
			array( // Cover content.
				array(
					'core/columns',
					array(), // Columns settings.
					array( // Columns content.
						array(
							'core/column',
							array( // Column settings.
								'width'           => '50%',
								'backgroundColor' => 'white',
								'textColor'       => 'black',
							),
							array( // Column content.
								array(
									'core/post-title',
									array( // Post title settings.
										'level' => 1,
									),
								),
								array(
									'core/group',
									array(
										'layout' => array( // Group styles.
											'type' => 'flex',
										),
									),
									array( // Group content.
										array(
											'core/post-date',
										),
										array(
											'core/post-terms',
											array( // Post terms settings.
												'term' => 'category',
											),
										),
									),
								),
							),
						),
						array(
							'core/column',
						),
					),
				),
			),
		),
	);
}


/**
 * Create default content structure for post type templates.
 *
 * Example function showing how to build reusable content blocks.
 * Returns spacers and paragraph with placeholder text.
 * Currently unused but kept as reference for building custom templates.
 *
 * @return array Block template array
 */
function avidly_theme_block_content() {
	return array(
		array(
			'core/spacer',
			array(
				'height' => '5rem',
			),
		),
		array(
			'core/paragraph',
			array(
				'className'   => 'has-medium-font-size',
				'placeholder' => esc_html_x( 'Add ingress text.', 'placeholder', 'avidly-theme' ),
			),
		),
		array(
			'core/spacer',
			array(
				'height' => '5rem',
			),
		),
	);
}

