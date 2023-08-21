
# Change Log
All notable changes to this project will be documented in this file.
 
The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [5.0.0] - 2023-08-21
MAJOR CHANGE - not compatible with previous theme version!
Create development support for Create Block Theme, fix styles for WP 6.3

### Changed
- stucture in theme.json
- HTML output in templates and template parts
- workflow to add webfonts via Create Block Theme

### Removed
- Tailwind preflight support
- unneeded CSS styles and files
- "theme" attribute from all template parts used in templates
- legacy markup support for image block

### Added
- new block support: Details & Footnotes block
- instructions how to optimize webfont performance
- loading strategy for app.js

### Improved
- site editor compability
- example how to style cite in theme.json
- how to detect global paddings from theme.json (refer: twenty-twentythree)

### Fixed
- Query block: grid customizations, sticky support
- _blank links aria-label impementation in app.js


## [4.0.0] - 2023-05-17
MAJOR CHANGE - not compatible with previous theme version!
Convert starter theme to Block theme.

### Changed
- Overall file stucture

### Removed
- Classic theme related PHP files, styling and functionality

### Added
- Breakpoint to override navigation and media&text block core breakpoint
- Build-in supports for Relevanssi Live Ajax Search
- Default templates and template parts
- Possibillity to detect term links via class in post-terms block
- Block pattern for related posts (posts from same category)

### Improvement
- General block editor support (example has-global-padding class)
- Better readibility for safelist.txt
- Improved file stucture and file stucture documentation in README.md
- Improve font size naming

## [3.5.1] - 2023-02-14
Happy Valentine's Day!
Create support for Figma styleguide template and general improvements to functionality and optimization.

### Changed
- Create block based styles and load them separately only when block occures in page.
- Enable [should_load_separate_core_block_assets](https://developer.wordpress.org/reference/hooks/should_load_separate_core_block_assets/) filter.

### Improvement
- Match theme settings to Figma template.
- Style current menu-item hierarcy items.
- Reduce scrollbar width from alignwide media&text padding detection.
- Target on theme assets ?ver= changes for cache-busting.
- Remove unneede aria-haspopup from Disclosure Menu Walker.

### Added
- Hooks for excerpt lenght and more.
- Localize Script support for app.js.
- Detect links with target `_blank` links and add `aria-label` helper.
- Default ::after style for target `_blank` links.

### Update
- NPM dependencies.

## [3.5.0] - 2022-11-14
Support for WordPress 6.1 + changes to theme functionality.

### Improvement
- Deactive cache headers (expires & cache-control) for logged in users.
- Do not optimize core block style by default
- Make sure preflight is runned before any other styles.
- Better readibility for Enqueue scripts and stylesheets for theme functionality.
- Usage of blockGap in theme & block template editor.
- Simplify DOM structure for default PHP templates.
- Simplify general link and button :hover and :focus styles.
- Run 404 and block page content via do_blocks() function.
- Override default media & text breakpoint.
- Comment area styles.

### Added
- Create theme translations via make-pot command.
- fontFace include example via theme.json.
- New block whitelists: core/list-item and Yoast SEO blocks.
- New settings and styling to theme.json.
- Create block patterns via patterns directory.
- Create default block template via templates directory.
- Add custom editor styles in footer.
- Better detection of archive paginations.

### Removed
- Hyphenopoly support (can be added via plugin).
- Webfont related functionality from PHP.
- References to block template parts.
- PHP template for singular content.

## [3.4.1] - 2022-09-15
Small bug fixes, improvements and Hypenopoly support.

### Improvement
- Improve commenting.
- Clone cleanups & WordPress PHPCS improvements.
- Remove _list.scss block styles.
- Modify index.php for better fallback template.
- Media & text block styles improving.

### Fixed
- Add no-underline class to default search button.

### Added
- Hyphenopoly support: https://www.mikkosaari.fi/suomenkielinen-tavutus-wordpressiin/

## [3.4.0] - 2022-09-15
Improve content side FSE support (production).

### Changed
- Update README.txt about required Node, npm and WordPress core versions.
- Change primary ID to wp--skip-link--target.
- Remove plain Quote block style.
- Use font-display: optional and base font-family preload for better CLS.

### Improvements
- Use clamp() text sizes with names and add margins (theme.json).
- Improve styles: button hover and focus, paddings and spacing globally (a11y improvement), simplify Quote block styles, hover effect for images in link-elements.
- Add WordPress PHPCS improvements.

### Added
- Create base for Block gap support (note: might change in 6.1).
- Set block gap to theme.json (requires for WP >= 6.0).
- Set custom srcset and sizes attrubutes for current post featured image.
- Functionality to exclude current post from Query post loop.
- Create default block content templates for posts and pages.

## [3.3.1] - 2022-06-23
Improve content side FSE support (BETA).

### Changed
- Create entry header via own template-part.
- Set custom image size medium_large for features images (srcset and sizes still requires improvements).
- Rename template-tags.php to more common helper-fuctions.php.

### Added
- Set fallback image ID manually for post featured images.
- Get 404 page content from block editor if page exsist.
- Block pattern for example post header.

## [3.3.0] - 2022-06-13
Support for WordPress 6.0

### Fixed
- Wrap image blocks output in div to prevent breaking floats.
- Improve paddings in editor and front end.
- Fix blockquote default paddings & margins.

### Watch command fixes (to prevent stucks)
- Update Laravel Mix.
- Remove utilities from overlay search styles.
- Remove `! important rules` globally.
- Purge support with fast-glob system (requires global install: `yarn add fast-glob -D`).

### Changed
- Use functions with hooks in `setup-editor.php` for easier activate/deactivate functionality.
- Run WooCommerce and LearnDash blocks whitelisting in own hooks.
- Move default patterns unregister and responsive embeds support to `setup-theme.php`.
- Scss improvements and small code refactoring.
- Tweak font sizes in theme.json.

### Added
- New blocks from 6.0.

## [3.2.1] - 2022-05-20
Minor fixes to improve child theme support.

### Fixed
Modify cache busting function to create support for use of child themes.

## [3.2.0] - 2022-01-25
New implementation of Tailwind CSS preflight.

### Changed
Run Tailwind preflight as separely file to prevent conflicts with theme.json styles in editor.

## [3.1.0] - 2022-01-25
Minor changes + WordPress 5.9.1 support.

### Changed
Move a11y overlay search styles to own CSS file -> load only if functionality is found
Comment out example how to remove allowed blocks from different capabilities.

### Fixed
Create temp workaround for WP 5.9.1 and Tailwind preflight styles incompatibility.

## [3.0.1] - 2022-01-25
Minor fix.

### Fixed
- Tailwind content configurations rules and list styles
- Add PHP files to tailwind.config content listing

## [3.0.0] - 2022-01-21
WordPress 5.9 support.

### Added
- Version 2 support to theme.json
- Pinterest and Wolfram Cloud as block embed variations
- New blocks: widget-group, legacy-widget, term-description, post-author, post-comments, navigation, navigation-link, navigation-submenu, template-part

### Changed
- Clean up theme styles
- Change content width to base on rems

### Fixed
- return Twitter as whitelisted embeds

## [2.1.3] - 2021-26-11
 
### Changed
- Deactivate blur and animation from Tailwind corePlugins to optimize app.css file size.

## [2.1.2] - 2021-11-26
 
### Changed
- Reduce unused CSS by only loading styles for in-use blocks.
 
## [2.1.1] - 2021-11-25
 
### Added
- Way to Unallow blocks by current users capabilities.
 
## [2.1.0] - 2021-11-22
 
### Added
- A11y Overlay Search support
   
### Changed
- site-header__title link target to support Polylang.
 
