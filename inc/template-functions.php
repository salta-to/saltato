<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package saltato
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function saltato_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'saltato_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function saltato_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'saltato_pingback_header' );

/**
 * Change comment form title
 *
 * @param array $defaults Array with default values.
 * @return array
 */
function saltato_custom_comment_title( $defaults ) {
	$defaults['title_reply']          = __( 'Share your knowledge and experience or ask a question', 'saltato' );
	$defaults['comment_notes_before'] = '';

	return $defaults;
}
add_filter( 'comment_form_defaults', 'saltato_custom_comment_title', 20 );

/**
 * Custom wp_die_handler.
 */
function get_saltato_die_handler() {
	return 'saltato_die_handler';
}
add_filter( 'wp_die_handler', 'get_saltato_die_handler' );

/**
 * Custom wp_die handler function
 *
 * @param string $message String with error message.
 * @param string $title   Title of the error.
 * @param array  $args    Array with arguments.
 */
function saltato_die_handler( $message, $title = '', $args = array() ) {
	$saltato_error_template = get_theme_root() . '/' . get_template() . '/comment-error.php';
	if ( ! is_admin() && file_exists( $saltato_error_template ) ) {
		$defaults     = array( 'response' => 500 );
		$r            = wp_parse_args( $args, $defaults );
		$have_gettext = function_exists( '__' );
		if ( function_exists( 'is_wp_error' ) && is_wp_error( $message ) ) {
			if ( empty( $title ) ) {
				$error_data = $message->get_error_data();
				if ( is_array( $error_data ) && isset( $error_data['title'] ) ) {
					$title = $error_data['title'];
				}
			}
			$errors = $message->get_error_messages();
			switch ( count( $errors ) ) :
				case 0:
					$message = '';
					break;
				case 1:
					$message = "<p>{$errors[0]}</p>";
					break;
				default:
					$message = "<ul>\n\t\t<li>" . join( "</li>\n\t\t<li>", $errors ) . "</li>\n\t</ul>";
					break;
			endswitch;
		} elseif ( is_string( $message ) ) {
			$message = "<p>$message</p>";
		}
		if ( isset( $r['back_link'] ) && $r['back_link'] ) {
			$back_text = $have_gettext ? __( '&laquo; Back' ) : '&laquo; Back';
			$message .= "\n<p><a href='javascript:history.back()'>$back_text</a></p>";
		}
		if ( empty( $title ) ) {
			$title = $have_gettext ? __( 'WordPress &rsaquo; Error' ) : 'WordPress &rsaquo; Error';
		}
		require_once $saltato_error_template;
		die();
	} else {
		_default_wp_die_handler( $message, $title, $args );
	}
}
