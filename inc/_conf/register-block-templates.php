<?php
/**
 * Create default block templates for post types.
 *
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 *
 * @package Avidly_theme
 * @since 3.4.0
 */

add_filter( 'block_editor_settings_all', 'avidly_theme_default_block_template' );
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
 * Register template: Post
 * 
 * A block template is defined as a list of block items and can have predefined attributes or placeholder content.
 * Block templates allow specifying a default initial state for an editor session.
 * @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-templates/
 *
 * @return void
 */
function avidly_theme_register_post_template() {
	$post_type_object = get_post_type_object( 'post' );

	// Combine templates.
	$template = array_merge( avidly_theme_block_header_post(), avidly_theme_block_content_post() );

	$post_type_object->template = $template;
}

/**
 * Header block template structure for post.
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
 * Header block template structure for post.
 *
 * @return array
 */
function avidly_theme_block_content_post() {
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
				'fontSize'   => 'medium',
				'placeholder' => esc_html_x( 'Add ingress text.', 'placeholder', 'avidly-theme' ),
			),
		),
		array(
			'core/paragraph',
			array(
				'placeholder' => esc_html_x( 'Type / to choose block', 'placeholder', 'avidly-theme' ),
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

