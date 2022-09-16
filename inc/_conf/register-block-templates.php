<?php
/**
 * Create default block templates for post types.
 *
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 *
 * @package Avidly_theme
 * @since 3.4.0
 */

add_action( 'init', 'avidly_theme_register_page_template' );
add_action( 'init', 'avidly_theme_register_post_template' );

/**
 * Register template: Page
 *
 * @return void
 */
function avidly_theme_register_page_template() {
	$post_type_object = get_post_type_object( 'page' );

	// Combine templates.
	$template = array_merge( avidly_theme_block_header_page(), avidly_theme_block_content() );

	$post_type_object->template = $template;
}

/**
 * Register template: Post
 *
 * @return void
 */
function avidly_theme_register_post_template() {
	$post_type_object = get_post_type_object( 'post' );

	// Combine templates.
	$template = array_merge( avidly_theme_block_header_post(), avidly_theme_block_content() );

	$post_type_object->template = $template;
}

/**
 * Create header block template structure for page.
 *
 * @return array
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
 * Create header block template structure for page.
 *
 * @return array
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
 * Create default structure for tart of every post type template.
 *
 * @return array
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

