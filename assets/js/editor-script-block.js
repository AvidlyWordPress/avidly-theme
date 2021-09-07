/**
 * Remove unused block styles
 *
 * @since 1.0.0
 */

/* global wp */
wp.domReady( function() {
	wp.blocks.unregisterBlockStyle( 'core/pullquote', 'solid-color' );
	wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );
	wp.blocks.unregisterBlockStyle( 'core/separator', 'wide' );
	wp.blocks.unregisterBlockStyle( 'core/separator', 'dots' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
} );
