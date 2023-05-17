const _   = require("lodash");

module.exports = {
	// - - - - - - - - - - - - - - -
	// Content Configuration: https://tailwindcss.com/docs/content-configuration
	// - - - - - - - - - - - - - - -
	content: require('fast-glob').sync([ //
		'./inc/*/*.php',
		'./parts/*.html',
		'./templates/*.html',
		'./assets/js/*.js',
		'./assets/scss/*/*.scss',
		'./*.php',
		'./safelist.txt'
	]),

	// - - - - - - - - - - - - - - -
	// Theme Configuration: https://tailwindcss.com/docs/theme
	// - - - - - - - - - - - - - - -
	theme: {
		screens: {
			// Breakpoints: https://tailwindcss.com/docs/breakpoints#custom-media-queries
			// => @media (min-width: your-value) { ... }
			'xs': '481px',
			'sm': '768px',
			'menu': '992px', // Custom breakpoint for navigation block.
			'md' : '1024px',
			'lg': '1280px',
			'xl': '1624px',

			// Advanced, max: https://tailwindcss.com/docs/screens#max-width-breakpoints
			'max-xs': {'max': '480px'},
			'max-sm': {'max': '767px'},
			'max-md': {'max': '1023px'},
			'max-menu': {'max': '991px'}, // Custom breakpoint for navigation block.
			'max-lg': {'max': '1279px'},
			'max-xl': {'max': '1623px'},

			// Advadvanced, fixed-range: https://tailwindcss.com/docs/screens#fixed-range-breakpoints
			'only-sm': {'min': '481px', 'max': '767px'},
			'only-md': {'min': '768px', 'max': '1023px'},
			'only-lg': {'min': '1024px', 'max': '1279px'},
		},
		colors: {
			// Customizing Colors: https://tailwindcss.com/docs/customizing-colors
			// Would be nice to fetch these directly from theme.json.
			transparent: 'transparent',
			current: 'currentColor',
			black: '#2A2A2A',
			white: '#FFFFFF',
			darkgray: "#595959",
			lightgray: '#EEEEEE',
			primary: '#0F3052',
			secondary: '#AEBECB',
			tertiary: '#FAE1DF',
		},
		fontFamily: {
			// Font Family: https://tailwindcss.com/docs/font-family
			sans: ['Roboto', 'Oxygen-Sans', 'Ubuntu', 'Cantarell', 'Helvetica\\ Neue', 'sans-serif'],
			serif: ['Roboto\\ Slab', 'Georgia', 'Times\\ New\\ Roman', 'serif']
		},
		fontSize: {
			// Font Size: https://tailwindcss.com/docs/font-size
			'sm': '.813rem',
			'base': '1rem',
			'md': '1.125rem',
			'lg': '1.25rem',
			'xl': '1.5rem',
			'2xl': '2rem',
			'3xl': '3.375rem',
		},

		// - - - - - - - - - - - - - - -
		// Extending the default theme: https://tailwindcss.com/docs/theme#extending-the-default-theme
		// - - - - - - - - - - - - - - -
		extend: {
			spacing: {
				// Spacing scale: https://tailwindcss.com/docs/customizing-spacing#extending-the-default-spacing-scale
				'xs': '1rem',
				'sm': '1.5rem',
				'md': '2rem',
				'lg': '4rem',
				'xl': '6rem',
				'xxl': '8rem',
			},
			gap: {
				'default': '1.5rem',
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
				'2xs': '16rem',
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
	 blur: false, // Deactive blur in decrease outputed CSS size.
	 animation: false, // Deactive animation in decrease outputed CSS size.
	 preflight: false, // Disable default preflight to create own for frontend only.
	},

	// - - - - - - - - - - - - - - -
	// Plugins: https://tailwindcss.com/docs/plugins
	// - - - - - - - - - - - - - - -
	plugins: [
	]
};
