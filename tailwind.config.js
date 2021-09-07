const plugin = require('tailwindcss/plugin');
const _ = require("lodash");

module.exports = {
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
    theme: {
        screens: {
            'xs': '414px',
            'sm': '768px',
            'md' : '1024px',
            'lg': '1280px',
            'xl': '1624px',
            'menu' : '992px' // If you change this, update value also to to /assets/js/discloserMenu.js.
            
        },
        colors: {
            // Would be nice to fects these direct from theme.json.
            transparent: 'transparent',
            current: 'currentColor',
            black: '#000000',
            white: '#FFFFFF',
            primary : '#00009B',
            secondary: '#FF7068',
            tertiary: '#FFDDE0',
        },
        fontFamily: {
          sans: ['Roboto', 'sans-serif'],
          serif: ['Roboto\\ Slab', 'serif']
        },
        minWidth: {
            '0': '0',
            '1/4': '25%',
            '1/2': '50%',
            '3/4': '75%',
            '36' : '9rem',
            '40' : '10rem',
            'full': '100%'
        },
    },
    corePlugins: {
      // ...
     container: false,
    },
    plugins: [
    ]
};