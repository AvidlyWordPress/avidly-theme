/**
 * Modify block styles and variations.
 *
 * @since 1.0.0
 */

 wp.domReady( function() {
	/**
	 * Handle styles.
	 */
	wp.blocks.unregisterBlockStyle( 'core/pullquote', 'solid-color' );
	wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );
	wp.blocks.unregisterBlockStyle( 'core/separator', 'wide' );
	wp.blocks.unregisterBlockStyle( 'core/separator', 'dots' );
	// wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	wp.blocks.unregisterBlockStyle( 'core/quote', 'plain' );

	/**
	 * Handle embed block variations.
	 */
	const allowedEmbedBlocks = [
		'youtube',
		// 'wordpress',
		'soundcloud',
		// 'spotify',
		// 'flickr',
		'vimeo',
		// 'animoto',
		// 'cloudup',
		// 'crowdsignal',
		// 'dailymotion',
		// 'imgur',
		'twitter',
		'issuu',
		'pinterest', // New in core 5.9.
		// 'wolfram-cloud', // New in core 5.9.
		// 'kickstarter',
		// 'meetup-com',
		// 'mixcloud',
		// 'reddit',
		// 'reverbnation',
		// 'screencast',
		// 'scribd',
		// 'slideshare',
		// 'smugmug',
		// 'speaker-deck',
		// 'tiktok',
		// 'ted',
		// 'tumblr',
		// 'videopress',
		// 'wordpress-tv',
		// 'amazon-kindle',
	];

	wp.blocks.getBlockType( 'core/embed' ).variations.forEach( function( blockVariation ) {
		if ( allowedEmbedBlocks.indexOf( blockVariation.name ) === -1 ) {
			wp.blocks.unregisterBlockVariation( 'core/embed', blockVariation.name );
		}
	} );

	/**
	 * Handle block toolbar format types.
	 */
	wp.richText.unregisterFormatType('core/footnote')
	// wp.richText.unregisterFormatType('core/bold')
	// wp.richText.unregisterFormatType('core/code')
	wp.richText.unregisterFormatType('core/image')
	// wp.richText.unregisterFormatType('core/italic')
	// wp.richText.unregisterFormatType('core/link')
	// wp.richText.unregisterFormatType('core/strikethrough')
	wp.richText.unregisterFormatType('core/underline')
	wp.richText.unregisterFormatType('core/text-color')
	wp.richText.unregisterFormatType('core/subscript')
	wp.richText.unregisterFormatType('core/superscript')
	wp.richText.unregisterFormatType('core/keyboard')
	// wp.richText.unregisterFormatType('core/language')

	// Looking for name of new format type?
	// You may use this to output active format types:
	// console.log( wp.data.select( 'core/rich-text' ).getFormatTypes() );

	// Looking for list of all available blocks?
	// You may use this to output all blocks that are found (core and plugin blocks):
	// console.log( wp.data.select( 'core/blocks' ).getBlockTypes() );
 } );
 