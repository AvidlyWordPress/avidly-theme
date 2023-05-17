# Avidly Theme

Hi. I'm a starter theme called Avidly Theme. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

## Features

### Gutenberg with love
I'm created for WordPress Block Editor especially in mind. I support theme.json theme configuring that enables a finer-grained controls introduces the first step in managing styles for future WordPress releases. Read more from <a href="https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/">Block Editor Handbook</a>.

### Accessibility
I have been developed with accessibility / WCAG 2.1 criteria in mind.

### Tailwind CSS
I integrate with Tailwind CSS. Learn <a href="https://tailwindcss.com/docs">how to use Tailwind CSS</a> by reading the documentation. Note that preflight rules has been customized so that Tailwind would not cleat styles that editor gets from thene.json.

### Requirements
* Requires at least WordPress 6.1
* Webpack / Laravel Mix for bundling assets
* NodeJS v14.0 or later
* npm v6 or later

## Getting Started
1. Download avidly-theme repository.
2. Rename theme folder name for your project (use only a-z and -).
3. Run `sh setup.sh` in theme folder and follow the instructions in terminal. This will run some search and replace functionality for code.

## Nice to know

### Development
- Get pagackes with `npm install` command
- Run development with `npm run watch` command
- Run production build with `npm run production` command (this also purges caches from edited assets by detecting version changes from /dist/mix-manifest.json)

VERY IMPORTANT: Always run production build to compile compressed, production-ready CSS and JS. Otherwise you'll end up with ridiculously large CSS and JS files and your clients will call you on a Saturday evening when you're trying to enjoy a beer with your friends.

### Directory structure
Directory | Contents
| --- | --- |
/assets/ | development assets (example JS, SASS, fonts)
/assets/dist/ | production ready assets (processed, combined and optimized)
/inc/ | php files that are not part of template structure
/inc/_conf/ | basic setups for theme and editor & register stuff (assets, menus, widgets, block pattern categories, etc...)
/inc/helpers/ | general theme related functions and hooks
/inc/queries/ | modifications to queries (query block, get_pre_posts queries, etc...)
/inc/render_block/ | modifications to blocks output
/languages/ | translations
/patterns/ | block patterns
/parts/ | template parts for site editor
/templates/ | templates for site editor

### theme.json
- Setup global settings and styles for block editor. Read details from <a href="https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/">Block Editor Handbook</a>.

More reading and examples from Fullsiteediting.com:
<a href="https://fullsiteediting.com/lessons/creating-theme-json/">Exercise: Creating theme.json</a> and 
<a href="https://fullsiteediting.com/lessons/global-styles/">Global Styles & theme.json</a>


### tailwind.config.js
- Setup Tailwind CSS related settings. See detailed instructions from <a href="https://tailwindcss.com/docs">Tailwind CSS documentation</a>


