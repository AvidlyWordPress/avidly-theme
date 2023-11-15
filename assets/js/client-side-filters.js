const { addFilter } = wp.hooks;
const { select } = wp.data;

/**
 * If the user doesn't have permission to update settings (Editors,
 * Authors, etc.), disable the specified block settings when editing
 * the specified post types.
 * 
 * @see https://developer.wordpress.org/news/2023/05/curating-the-editor-experience-with-client-side-filters/
 *
 * @param {any}    settingValue The current value of the block setting.
 * @param {string} settingName  The name of the block setting to modify.
 * @param {string} clientId     The unique identifier for the block in the client.
 * @param {string} blockName    The name of the block type.
 * 
 * @return {any} Returns the modified setting value or the original setting value.
 */
function restrictBlockSettingsByUserPermissions(
	settingValue,
	settingName,
	clientId,
	blockName
) {
	const { canUser } = select( 'core' );

	// Check user permissions.
	// See capabilities: https://developer.wordpress.org/block-editor/reference-guides/packages/packages-core-data/#canuser
	const canUserEditPage       = canUser( 'create', 'pages' ); // Editors and lower roles.
	const canUserUpdateSettings = canUser( 'update', 'settings' ); // Authors and lower roles.


	// Looking for spefic block setting?
	// You can see all available settings with:
	console.log( settingName );

	// Disable these block settings for ! canUserEditPage.
	const disabledBlockSettingsEditPage = [
		// Spacing related settings.
		'spacing.blockGap',
		'spacing.padding',
		'spacing.margin',

		// Color management options.
		'color.custom',

		// Typography related settings.
		'typography.fontFamilies',
		'typography.lineHeight',
		'typography.fontStyle',
		'typography.textColumns',
		'typography.writingMode',

		// Dimension related settings.
		'dimensions.minHeight',
	];

	if (
		! canUserEditPage &&
		disabledBlockSettingsEditPage.includes( settingName )
	) {
		return false;
	}

	// Disable these block settings.
	const disabledBlockSettingsUpdateSettings = [
		// Border related options.
		'border.color',
		'border.radius',
		'border.style',
		'border.width',

		// Color management options.
		'color.customGradient',
		'color.heading',
		'color.button',

		// Position related settings.
		'position.fixed',
		'position.sticky',

		// Typography related settings.
		'typography.customFontSizes',
		'typography.fontStyle',
		'typography.fontWeight',
		'typography.textDecoration',
		'typography.textTransform',
		'typography.letterSpacing',
	];

	if (
		! canUserUpdateSettings &&
		disabledBlockSettingsUpdateSettings.includes( settingName )
	) {
		return false;
	}

	

	// Return the default settings.
	return settingValue;
}

addFilter(
	'blockEditor.useSetting.before',
	'custom-editor-curation/useSetting.before/user-permissions-and-post-type',
	restrictBlockSettingsByUserPermissions
);