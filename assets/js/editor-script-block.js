/**
 * Remove unused block styles
 *
 * @since 1.0.0
 */

/**
 * Handle styles.
 */
wp.domReady( function() {
	wp.blocks.unregisterBlockStyle( 'core/pullquote', 'solid-color' );
	wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );
	wp.blocks.unregisterBlockStyle( 'core/separator', 'wide' );
	wp.blocks.unregisterBlockStyle( 'core/separator', 'dots' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
} );

/**
 * Handle embed block variations.
 */
wp.domReady( function() {
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
		'issuu',
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
} );
