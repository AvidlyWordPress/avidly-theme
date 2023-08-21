
# WEBFONTS IN THEME


How to use webfonts?
1. Install & activate Create Block Theme plugin: https://wordpress.org/plugins/create-block-theme/
2. Go in Dashboard: Appearance -> Manage Theme Fonts
3. Add new font (Local / Google)
4. Select required variants (normal, medium, bold, italic, etc)
5. Click "Add X fonts to your theme" -> this will create...
- font files into /assets/fonts/ folder
- fontFamilies rules into theme.json
6. Set correct fontFamily slugs from theme.json
- use slug: system for fontFamily that is the default font for site
- use slug: heading for fontFamily that is the default font for site
- **WHY?** These are used with CSS variables in theme var(--wp--preset--font-family--system) and var(--wp--preset--font-family--heading). If you do not change slugs the original CSS variables do not exsist
7. Optimize Fonts
- Extend "fontFamily" with websafe fonts. Consult Google or designer to choose best fallback fonts
- Add "fontDisplay": "swap" or "optional"
- **WHY?** Fallback font is displayed while the webfont is loaded from server. In "swap" rule the fallback font is visible as long the custom webfont takes to load. In "optional" rule the fallback font will be displayed as the main font if the custom webfont takes too long to load. Note: If fallback font differs a lot from the desired webfont, it may cause CLS to site. You may have to consult <a href="https://www.cssfontstack.com/">cssfontstack.com</a> and/or designer to choose the best websafe font.
8. You may change the font settings from Site Editor styles and save them to theme as a code via Create Block Theme "wrench" tool.


Basically your font settings should look like:
```
"fontFamilies": [
	{
		"fontFace": [
			{
				"fontDisplay": "swap",
				"fontFamily": "YourWebFont",
				"fontStyle": "normal",
				"fontWeight": "700",
				"src": [
					"file:./assets/fonts/yourwebfont_normal_700.ttf"
				]
			},
			{
				"fontDisplay": "swap",
				"fontFamily": "YourWebFont",
				"fontStyle": "normal",
				"fontWeight": "400",
				"src": [
					"file:./assets/fonts/yourwebfont_normal_400.ttf"
				]
			}
		],
		"name": "YourWebFont",
		"fontFamily": "YourWebFont, FallbackFont, sans-serif",
		"slug": "system",
	},
	{
		...another fontFamily...
	}
],
...
```
