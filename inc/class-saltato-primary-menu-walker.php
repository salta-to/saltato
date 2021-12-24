<?php
/**
 * Primary menu
 *
 * @package saltato
 */

/**
 * Primary Menu
 */
class Saltato_Primary_Menu_Walker extends Walker_Nav_Menu {

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
		$current     = $item->current ? ' app-navigation__list-item--current' : '';

		if ( $args->is_mobile_menu ) {
			switch ( $depth ) {
				// Main level.
				case 0:
					$output .= '<li class="menu-menu-level-0' . $current . '">';
					$output .= '<div class="app-mobile-nav-subnav-toggler">';
					$output .= $args->before;
					$output .= '<!-- When JavaScript is enabled, the menu links expand a section below with more content, so we should make them headings -->';
					$output .= '<h3 class="app-mobile-nav-subnav__link-heading"><span class="js-app-mobile-nav-subnav__link-heading">';
					$output .= '<a href="' . $permalink . '" class="govuk-link govuk-link--no-visited-state govuk-link--no-underline app-mobile-nav-subnav-toggler__link">';
					$output .= $title;
					$output .= '</a>';
					$output .= '</span></h3>';
					$output .= $args->after;
					$output .= '</div>';
					break;
				case 1:
					$output .= '<li class="menu-menu-level-' . $depth . implode( ' ', $item->classes ) . ' app-mobile-nav__subnav-item' . $current . '">';
					$output .= $args->before;
					$output .= '<a href="' . $permalink . '" class="govuk-link govuk-link--no-visited-state govuk-link--no-underline app-navigation__link">';
					$output .= $title;
					$output .= '</a>';
					$output .= $args->after;
					break;
				default:
					$output .= '<li class="menu-menu-level-' . $depth . implode( ' ', $item->classes ) . ' app-mobile-nav__subnav-item' . $current . '">';
					$output .= $args->before;
					$output .= '<a href="' . $permalink . '" class="govuk-link govuk-link--no-visited-state govuk-link--no-underline app-navigation__link">';
					$output .= $title;
					$output .= '</a>';
					$output .= $args->after;
			}
		} else {
			$output .= '<li class="' . implode( ' ', $item->classes ) . ' app-navigation__list-item' . $current . '">';
			$output .= '<a href="' . $permalink . '" class="govuk-link govuk-link--no-visited-state govuk-link--no-underline app-navigation__link">';
			$output .= $title;
			$output .= '</a>';
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
		switch ( $depth ) {
			case 0:
				$classes = array( 'sub-menu', 'app-mobile-nav__list', 'app-mobile-nav__subnav' );
				break;
			case 1:
				$classes = array( 'sub-menu', 'app-mobile-nav__list', 'js-app-mobile-nav-subnav' );
				break;
			default:
				$classes = array( 'sub-menu', 'app-mobile-nav__list', 'app-mobile-nav__subnav' );
		}

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
