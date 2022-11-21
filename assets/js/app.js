const { __ } = wp.i18n;

// Detect all links that open in new window.
document.addEventListener( 'DOMContentLoaded', detectLinksBlank );

/**
 * Run function after DOMContentLoaded is loaded.
 */
function detectLinksBlank() {
	const blankLinks = document.querySelectorAll('.site-content a[target="_blank"], .site-header a[target="_blank"], .site-footer a[target="_blank"]');

	blankLinks.forEach(link => {
		link.setAttribute('aria-label', link.innerHTML + ' ' + localizeText.newwin);
	});
}