
# Change Log
All notable changes to this project will be documented in this file.
 
The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [3.3.0] - 2022-06-09
Support for WordPress 6.0

### Fixed
- Wrap image blocks output in div to prevent breaking floats.
- Improve paddings in editor and front end.

### Watch command fixes (to prevent stucks)
- Update Laravel Mix.
- Remove utilities from overlay search styles.
- Remove `! important rules` globally.
- Purge support with fast-glob system (requires global install: `yarn add fast-glob -D`).

### Changed
- Use functions with hooks in `setup-editor.php` for easier activate/deactivate functionality.
- Run WooCommerce and LearnDash blocks whitelisting in own hooks.
- Move default patterns unregister and responsive embeds support to `setup-theme.php`

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
 
