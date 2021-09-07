# Avidly Theme

Hi. I'm a starter theme called Avidly Theme. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

## Features

### Gutenberg with love
I'm created for Gutenberg editor especially in mind. With theme.json you can configure the editor that enables a finer-grained control and introduces the first step in managing styles for future WordPress releases. Read more from documentation: https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/

### TailWind CSS
I integrate with TailWind CSS. Learn <a href="https://tailwindcss.com/docs">how to use TailWind CSS</a> by reading the docs.

### Requirements
* Requires at least WordPress 5.8
* Webpack / Laravel Mix for bundling assets
* NodeJS v12.14.1 or later with npm 6.13.4 (no guarantees for v14 or newer)

## Getting Started
1. Downloads avidly-theme.
2. Rename theme folder name for your project (use only a-z and -).
3. Rename .pot file as your theme name in /languages/ folder (use only a-z and -).
4. Run `sh setup.sh` in theme folder and follow the instructions in terminal. This will run some search and replace functionality for code.

## Nice to know

### Development
- Get pagackes with `npm install` command
- Run development with `npm run watch`command
- Run production build with `npm run production` command (this also purges caches from edited assets, bu detecting version changes from /dist/mix-manifest.json)

VERY IMPORTANT: Allways run production build to compile compressed, production-ready CSS and JS. Otherwise you'll end up with ridiculously large CSS and JS files and your clients will call you on a Saturday evening when you're trying to enjoy a beer with your friends.

### theme.json
- Setup global settings and styles for block editor. Read details from <a href="https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/">Block Editor Handbook</a>.

More reading and examples from Dullsiteediting.com:
<a href="https://fullsiteediting.com/lessons/creating-theme-json/">Exercise: Creating theme.json</a>
<a href="https://fullsiteediting.com/lessons/global-styles/">Global Styles & theme.json</a>


### tailwind.config.js
- Setup Tailwind CSS related settings. See detailed instructions from <a href="https://tailwindcss.com/docs">Tailwind CSS documentation</a>
