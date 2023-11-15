const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss'); 


/**
 * --------------------------------------------------------------------------
 * Mix Asset Management
 *--------------------------------------------------------------------------
 *
 * Mix provides a clean, fluent API for defining some Webpack build steps
 * for your Laravel application. By default, we are compiling the Sass
 * file for your application, as well as bundling up your JS files.
 */

mix
	.setPublicPath('./assets/dist')
	.js('./assets/js/app.js', 'js/')
	.js('./assets/js/editor-script-block.js', 'js/')
	.js('./assets/js/client-side-filters.js', 'js/')
	.sass('./assets/scss/app.scss', 'css/')
	.sass('./assets/scss/editor.scss', 'css/')
	.version()
	.autoload({
		jquery: ['$', 'global.jQuery',"jQuery","global.$","jquery","global.jquery"]
	})
	.options({
		autoprefixer: { remove: false },
		postCss: [ tailwindcss('./tailwind.config.js') ],
		processCssUrls: false, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
	});

// Create induvidual .css from every file found from _blocks folder.
buildSass('./assets/scss/blocks', './assets/dist/css/blocks');


/**
 * Find all files from specific folder.
 * Used in buildSass.
 */
function findFiles(dir) {
	const fs = require('fs');
	return fs.readdirSync(dir).filter(file => {
		return fs.statSync(`${dir}/${file}`).isFile();
	});
}

/**
 * Bulk build Sass->CSS.
 */
function buildSass(dir, dest) {
	findFiles(dir).forEach(function (file) {
		if ( ! file.startsWith('_')) {
			mix.sass(dir + '/' + file, dest);
		}
	});
}


// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.preact(src, output); <-- Identical to mix.js(), but registers Preact compilation.
// mix.coffee(src, output); <-- Identical to mix.js(), but registers CoffeeScript compilation.
// mix.ts(src, output); <-- TypeScript support. Requires tsconfig.json to exist in the same folder as webpack.mix.js
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.less(src, output);
// mix.stylus(src, output);
// mix.postCss(src, output, [require('postcss-some-plugin')()]);
// mix.browserSync('avidlytheme.test');
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
// mix.copyDirectory(fromDir, toDir);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
// mix.babelConfig({}); <-- Merge extra Babel configuration (plugins, etc.) with Mix's default.
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.dump(); <-- Dump the generated webpack config object to the console.
// mix.extend(name, handler) <-- Extend Mix's API with your own components.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   globalVueStyles: file, // Variables file to be imported in every component.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   terser: {}, // Terser-specific options. https://github.com/webpack-contrib/terser-webpack-plugin#options
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });

