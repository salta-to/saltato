<?php
/**
 * Secondary menu
 *
 * @package saltato
 */

/**
 * Secondary Menu
 */
class Saltato_Secondary_Menu_Walker extends Walker_Nav_Menu {

	/**
	 * Starts the element output.
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$object      = $item->object;
		$type        = $item->type;
		$title       = $item->title;
		$description = $item->description;
		$permalink   = $item->url;
		$current     = $item->current ? ' app-subnav__section--current' : '';

		if ( $permalink && '#' === $permalink ) {
			$output .= '<li><h3 class="app-subnav__theme">' . $title . '</h3>';
		} else {
			switch ( $depth ) {
				// Main level.
				case 0:
					$output .= '<li class="menu-menu-level-0' . $current . '">';
					$output .= $args->before;
					$output .= '<a href="' . $permalink . '" class="app-subnav__link govuk-link govuk-link--no-visited-state govuk-link--no-underline">';
					$output .= $title;
					$output .= '</a>';
					$output .= $args->after;
					break;
				case 1:
					$output .= '<li class="menu-menu-level-' . $depth . ' ' . implode( ' ', $item->classes ) . ' app-mobile-nav__subnav-item' . $current . '">';
					$output .= $args->before;
					$output .= '<a href="' . $permalink . '" class="app-subnav__link govuk-link govuk-link--no-visited-state govuk-link--no-underline">';
					$output .= $title;
					$output .= '</a>';
					$output .= $args->after;
					break;
				default:
					$output .= '<li class="menu-menu-level-' . $depth . ' ' . implode( ' ', $item->classes ) . ' app-mobile-nav__subnav-item' . $current . '">';
					$output .= $args->before;
					$output .= '<a href="' . $permalink . '" class="app-subnav__link govuk-link govuk-link--no-visited-state govuk-link--no-underline">';
					$output .= $title;
					$output .= '</a>';
					$output .= $args->after;
			}
		}
	}

	/**
	 * Starts the list before the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::start_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

		// The classes for the <ul>.
		$classes = array( 'app-subnav__section' );

		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @since 4.8.0
		 *
		 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = implode( ' ', apply_filters( 'saltato_nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= "{$n}{$indent}<ul$class_names>{$n}";
	}
}
