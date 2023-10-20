# Avidly Theme

Hi. I'm a starter theme called Avidly Theme. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

## Features

### Gutenberg with love
I'm created for WordPress Block Editor and Site Editor especially in mind. I support theme.json theme configuring that enables a finer-grained controls introduces the first step in managing styles for future WordPress releases. Read more from <a href="https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/">Block Editor Handbook</a>.

### Accessibility
I have been developed with accessibility / WCAG 2.1 criteria in mind.

### Requirements
* Requires at least WordPress 6.3
* Webpack / Laravel Mix for bundling assets
* NodeJS v14.0 or later
* npm v6 or later

## Getting Started
1. Download avidly-theme repository.
2. Rename theme folder name for your project (use only a-z and -).
3. Run `sh setup.sh` in theme folder and follow the instructions in terminal. This will run some search and replace functionality for code.

## Nice to know

### Create Block Theme Support
Templates, template parts and theme styles are managed primarily via **Site editor** (as far as they can be) and saved to theme with <a href="https://wordpress.org/plugins/create-block-theme/">Create Block Theme</a> **plugin**. Please install the plugin **only to development environment** (WP environment where you manage the theme code and GIT).

### Customize editor experience
Editor experience can be modified multiple ways. You can setup font sizes, colors, spacings and settings users can use in editor what they can move or delete and event set role based settings. See examples for theme.json, block locking ways and more advanced JavaScript methods from <a href="https://developer.wordpress.org/block-editor/how-to-guides/curating-the-editor-experience/">official documentation in developer.wordpress.org</a> or <a href="https://wordpress.tv/?s=Nick%20Diego%20editor&sort=newest">video tutorials wordpress.tv</a>.

### Development
- Get pagackes with `npm install` command
- Run development with `npm run watch` command
- Run production build with `npm run production` command (this also purges caches from edited assets by detecting version changes from /dist/mix-manifest.json)

Audit npm depencencies `npm audit` and fix them `npm audit --fix` command.

VERY IMPORTANT: Always run production build to compile compressed, production-ready CSS and JS.

### Directory structure
Directory | Contents
| --- | --- |
/assets/ | development assets (example JS, SASS, fonts)
/assets/dist/ | production ready assets (processed, combined and optimized)
/assets/fonts/ | webfonts
/assets/scss/ | development styles modified via theme
/assets/scss/blocks | development styles modified via theme, has conditional loading (loaded when block is presented)
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

### Tailwind CSS
I integrate with Tailwind CSS that is used t extend the utility styling when needed. Learn <a href="https://tailwindcss.com/docs">how to use Tailwind CSS</a> by reading the documentation. 
Note that preflight rules has been removed so that Tailwind would not clear styles that editor gets from WP core and theme.json.

#### tailwind.config.js
Setup Tailwind CSS related settings (use sam values as you use in theme.json). See detailed instructions from <a href="https://tailwindcss.com/docs">Tailwind CSS documentation</a>
