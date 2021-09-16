<?php
/**
 * WAI-ARIA Disclosure Navigation Menu template functions
 *
 * @see wp-includes/nav-menu-template.php
 * @link https://github.com/proteusthemes/WAI-ARIA-Walker_Nav_Menu
 * @link https://www.w3.org/TR/wai-aria-practices/examples/disclosure/disclosure-navigation.html
 *
 * @package Avidly_Theme
 * @since 1.1.0
 */

/**
 * Create HTML list of nav menu items.
 *
 * @since 1.0.0
 * @uses Walker
 * @uses Walker_Nav_Menu
 */
class Disclosure_Nav_Menu extends Walker_Nav_Menu {

	/**
	 * Store current item in a global scope.
	 *
	 * @var object $cur_item
	 */
	private $cur_item;

	/**
	 * Modify child menus
	 *
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu().
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );

		$level_class = ( 1 === $depth ) ? ' top-0 left-full' : ' top-full right-0';

		// Create output.
		$output .= "\n$indent";
		$output .= sprintf(
			'<ul id="submenu-%s" class="%s" aria-label="%s">',
			$this->cur_item->ID, // ID.
			'disclosure-submenu level--' . ( $depth + 1 ) . ' ' . esc_attr( $level_class ) . ' list-none menu:absolute z-10 min-w-40 w-full pl-4 menu:pl-0 menu:w-auto has-white-background-color hidden', // class.
			sprintf(
				/* translators: 1 title. */
				esc_html( _x( 'Submenu for %s', 'menu UI', 'avidly-theme' ) ),
				esc_html( $this->cur_item->title )
			),
		);
		$output .= "\n";
	}

	/**
	 * Start the element output.
	 *
	 * @see Walker_Nav_Menu::start_el() for parameters and longer explanation
	 *
	 * @param string $output HTML.
	 * @param object $item menu item object.
	 * @param int    $depth for current menu item depth.
	 * @param array  $args for custom arguments.
	 * @param int    $id meenu item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		// Restore the cur_item.
		$this->cur_item = $item;
		$indent         = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = 'relative flex justify-between items-center flex-wrap menu:flex-nowrap my-2 menu:mx-2 leading-tight'; // Style helpers.

		/**
		 * Filter the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param array  $args  An array of arguments.
		 * @param object $item  Menu item data object.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		/**
		 * Filter the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filter the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= sprintf(
			'%s<li%s%s>',
			$indent,
			$id,
			$class_names
		);

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		/**
		 * Filter the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';

		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		 * Filter a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string $title The menu item's title.
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = $args->before;

		// Create button to toddle dropdown menu.
		if ( in_array( 'menu-item-has-children', $item->classes ) ) {
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			$item_output .= sprintf(
				'<button class="%s" aria-expanded="false" aria-controls="submenu-%s" aria-haspopup="true"><span class="screen-reader-text">%s</span></button>',
				'disclosure-menu-toggle toggle-level--' . ( $depth + 1 ) . ' has-primary-background-color has-white-color relative ml-1 w-8 h-8 text-center',
				esc_attr( $this->cur_item->ID ),
				sprintf(
					/* translators: 1 title. */
					esc_html( _x( 'Submenu: %s', 'menu UI', 'avidly-theme' ) ),
					esc_html( $title )
				)
			);

		} else {
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
		}

		/**
		 * Filter a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of {@see wp_nav_menu()} arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}
