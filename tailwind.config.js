const _      = require("lodash");

module.exports = {
	// - - - - - - - - - - - - - - -
	// PurgeCSS: https://tailwindcss.com/docs/optimizing-for-production#purge-css-options
	// - - - - - - - - - - - - - - -
	purge: {
		content: [
			'./inc/*/*.php',
			'./template-parts/*/*.php',
			'./assets/css/*.css',
			'./assets/js/*.js',
			'./comments.php',
			'./header.php',
			'./footer.php',
			'./singular.php',
			'./index.php',
			'./404.php',
			'./safelist.txt'
		],
	},

	// - - - - - - - - - - - - - - -
	// Theme Configuration: https://tailwindcss.com/docs/theme
	// - - - - - - - - - - - - - - -
	theme: {
		screens: {
			// Breakpoints: https://tailwindcss.com/docs/breakpoints#custom-media-queries
			// => @media (min-width: your-value) { ... }
			'xxs': '414px',
			'xs': '481px',
			'sm': '768px',
			'md' : '1024px', // Add this value also in theme.json => "contentSize"
			'lg': '1280px', // Add this value also in theme.json => "wideSize"
			'xl': '1624px',
			'menu' : '992px' // If you change this, update value also to to /assets/js/discloserMenu.js.
			
		},
		colors: {
			// Customizing Colors: https://tailwindcss.com/docs/customizing-colors
			// Would be nice to fetch these directly from theme.json.
			transparent: 'transparent',
			current: 'currentColor',
			black: '#000000',
			white: '#FFFFFF',
			primary : '#0000FF',
			secondary: '#00FF00',
			tertiary: '#FF0000',
		},
		fontFamily: {
			// Font Family: https://tailwindcss.com/docs/min-width
			sans: ['Roboto', 'sans-serif'],
			serif: ['Roboto\\ Slab', 'serif']
		},
		fontSize: {
			// Font Size: https://tailwindcss.com/docs/font-size
			'xs': '.75rem',
			'sm': '.875rem',
			'tiny': '.875rem',
			'base': '1rem',
			'lg': '1.125rem',
			'xl': '1.25rem',
			'2xl': '1.5rem',
			'3xl': '1.875rem',
			'4xl': '2.25rem',
			'5xl': '3rem',
			'6xl': '4rem',
			'7xl': '5rem',
		},

		// - - - - - - - - - - - - - - -
		// Extending the default theme: https://tailwindcss.com/docs/theme#extending-the-default-theme
		// - - - - - - - - - - - - - - -
		extend: {
			spacing: {
				// Spacing scale: https://tailwindcss.com/docs/customizing-spacing#extending-the-default-spacing-scale
				'sm': '1rem',
				'md': '2rem',
				'lg': '36rem',
				'128': '32rem',
			},
			minWidth: {
				// https://tailwindcss.com/docs/min-width
				'40' : '10rem',
			},
			maxWidth: {
				// https://tailwindcss.com/docs/max-width
				'1/4': '25%',
				'1/2': '50%',
				'3/4': '75%',
			},
			height: theme => ({
				// https://sung.codes/blog/2020/02/05/extending-tailwind-css-screen-height-utility/
				'128': '32rem',
			}),
		},
	},

	// - - - - - - - - - - - - - - -
	// Core Plugins: https://tailwindcss.com/docs/configuration#core-plugins
	// - - - - - - - - - - - - - - -
	corePlugins: {
	 container: false, // Deactivate container classes to support WordPress block editor.
	},

	// - - - - - - - - - - - - - - -
	// Plugins: https://tailwindcss.com/docs/plugins
	// - - - - - - - - - - - - - - -
	plugins: [
	]
};