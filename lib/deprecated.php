<?php
/**
 * This file adds compatibility with older functions, actions & filters that were used prior to version 3.1.1
 * Developers should NOT use these functions and actions and should instead migrate to the new ones.
 */

/**
 * Marks a function as deprecated and informs when it has been used.
 *
 * There is a hook smallermobs_deprecated_function_run that will be called that can be used
 * to get the backtrace up to what file and function called the deprecated
 * function.
 *
 * The current behavior is to trigger a user error if WP_DEBUG is true.
 *
 * This function is to be used in every function that is deprecated.
 *
 * @uses do_action() Calls 'smallermobs_deprecated_function_run' and passes the function name, what to use instead,
 *   and the version the function was deprecated in.
 * @uses apply_filters() Calls 'smallermobs_deprecated_function_trigger_error' and expects boolean value of true to do
 *   trigger or false to not trigger error.
 *
 * @param string  $function    The function that was called
 * @param string  $version     The version of WordPress that deprecated the function
 * @param string  $replacement Optional. The function that should have been called
 * @param array   $backtrace   Optional. Contains stack backtrace of deprecated function
 */
function _smallermobs_deprecated_function( $function, $version, $replacement = null, $backtrace = null ) {
	do_action( 'smallermobs_deprecated_function_run', $function, $replacement, $version );

	$show_errors = current_user_can( 'manage_options' );

	// Allow plugin to filter the output error trigger
	if ( WP_DEBUG && apply_filters( 'smallermobs_deprecated_function_trigger_error', $show_errors ) ) {
		if ( ! is_null( $replacement ) ) {
			trigger_error( sprintf( __( '%1$s is <strong>deprecated</strong> since smallermobs version %2$s! Use %3$s instead.', 'smallermobs' ), $function, $version, $replacement ) );
			trigger_error(  print_r( $backtrace ) ); // Limited to previous 1028 characters, but since we only need to move back 1 in stack that should be fine.
			// Alternatively we could dump this to a file.
		}
		else {
			trigger_error( sprintf( __( '%1$s is <strong>deprecated</strong> since smallermobs version %2$s with no alternative available.', 'smallermobs' ), $function, $version ) );
			trigger_error( print_r( $backtrace ) );// Limited to previous 1028 characters, but since we only need to move back 1 in stack that should be fine.
			// Alternatively we could dump this to a file.
		}
	}
}

/**
 * Color functions
 */
function smallermobs_sanitize_hex( $color ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::sanitize_hex()' );
	return smallermobs_Color::sanitize_hex( $color );
}

function smallermobs_get_rgb( $hex, $implode = false ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::sanitize_hex()' );
	return smallermobs_Color::get_rgb( $hex, $implode );
}

function smallermobs_get_rgba( $hex, $opacity, $echo ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::sanitize_hex()' );
	return smallermobs_Color::get_rgba( $hex, $opacity, $echo );
}

function smallermobs_get_brightness( $hex ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::get_brightness()' );
	return smallermobs_Color::get_brightness( $hex );
}

function smallermobs_adjust_brightness( $hex, $steps ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::adjust_brightness()' );
	return smallermobs_Color::adjust_brightness( $hex, $steps );
}

function smallermobs_mix_colors( $hex1, $hex2, $percentage ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::mix_colors()' );
	return smallermobs_Color::mix_colors( $hex1, $hex2, $percentage );
}

function smallermobs_hex_to_hsv( $hex ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::hex_to_hsv()' );
	return smallermobs_Color::hex_to_hsv( $hex );
}

function smallermobs_rgb_to_hsv( $color = array() ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::rgb_to_hsv()' );
	return smallermobs_Color::rgb_to_hsv( $rgb );
}

function smallermobs_brightest_color( $colors = array(), $context = 'key' ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::brightest_color()' );
	return smallermobs_Color::brightest_color( $colors, $context );
}

function smallermobs_most_saturated_color( $colors = array(), $context = 'key' ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::most_saturated_color()' );
	return smallermobs_Color::most_saturated_color( $colors, $context );
}

function smallermobs_most_intense_color( $colors = array(), $context = 'key' ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::most_intense_color()' );
	return smallermobs_Color::most_intense_color( $colors, $context );
}

function smallermobs_brightest_dull_color( $colors = array(), $context = 'key' ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::brightest_dull_color()' );
	return smallermobs_Color::brightest_dull_color( $colors, $context );
}

function smallermobs_brightness_difference( $hex1, $hex2 ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::brightness_difference()' );
	return smallermobs_Color::brightness_difference( $hex1, $hex2 );
}

function smallermobs_color_difference( $hex1, $hex2 ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::color_difference()' );
	return smallermobs_Color::color_difference( $hex1, $hex2 );
}

function smallermobs_lumosity_difference( $hex1, $hex2 ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Color::lumosity_difference()' );
	return smallermobs_Color::lumosity_difference( $hex1, $hex2 );
}

/**
 * Layout functions
 */
function smallermobs_content_width_px( $echo = false ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Layout::content_width_px()' );
	return smallermobs_Layout::content_width_px( $echo );
}

/**
 * Image functions
 */
function smallermobs_image_resize( $data ) {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', 'smallermobs_Image::image_resize()' );
	return smallermobs_Image::image_resize( $data );
}

/**
 * Actions & filters
 */
add_action( 'smallermobs_single_top', 'smallermobs_in_article_top_deprecated' );
function smallermobs_in_article_top_deprecated() {
	if ( has_action( 'smallermobs_in_article_top' ) ) {
		_smallermobs_deprecated_function( 'smallermobs_in_article_top', '3.2', 'smallermobs_single_top' );

		do_action( 'smallermobs_in_article_top' );
	}
}

add_action( 'smallermobs_entry_meta', 'smallermobs_entry_meta_override_deprecated' );
function smallermobs_entry_meta_override_deprecated() {
	if ( has_action( 'smallermobs_entry_meta_override' ) ) {
		_smallermobs_deprecated_function( 'smallermobs_entry_meta_override', '3.2', 'smallermobs_entry_meta' );

		do_action( 'smallermobs_entry_meta_override' );
	}
}

add_action( 'smallermobs_entry_meta', 'smallermobs_after_entry_meta_deprecated', 99 );
function smallermobs_after_entry_meta_deprecated() {
	if ( has_action( 'smallermobs_after_entry_meta' ) ) {
		_smallermobs_deprecated_function( 'smallermobs_after_entry_meta', '3.2', 'smallermobs_entry_meta' );

		do_action( 'smallermobs_after_entry_meta' );
	}
}

add_action( 'smallermobs_do_navbar', 'smallermobs_pre_navbar_deprecated', 9 );
function smallermobs_pre_navbar_deprecated() {
	if ( has_action( 'smallermobs_pre_navbar' ) ) {
		_smallermobs_deprecated_function( 'smallermobs_pre_navbar', '3.2', 'smallermobs_do_navbar' );

		do_action( 'smallermobs_pre_navbar' );
	}
}

add_action( 'smallermobs_do_navbar', 'smallermobs_post_navbar_deprecated', 15 );
function smallermobs_post_navbar_deprecated() {
	if ( has_action( 'smallermobs_post_navbar' ) ) {
		_smallermobs_deprecated_function( 'smallermobs_post_navbar', '3.2', 'smallermobs_do_navbar' );

		do_action( 'smallermobs_post_navbar' );
	}
}

add_action( 'smallermobs_pre_wrap', 'smallermobs_below_top_navbar_deprecated' );
function smallermobs_below_top_navbar_deprecated() {
	if ( has_action( 'smallermobs_below_top_navbar' ) ) {
		_smallermobs_deprecated_function( 'smallermobs_below_top_navbar', '3.2', 'smallermobs_pre_wrap' );

		do_action( 'smallermobs_below_top_navbar' );
	}
}

add_action( 'smallermobs_pre_wrap', 'smallermobs_breadcrumbs_deprecated' );
function smallermobs_breadcrumbs_deprecated() {
	if ( has_action( 'smallermobs_breadcrumbs' ) ) {
		_smallermobs_deprecated_function( 'smallermobs_breadcrumbs', '3.2', 'smallermobs_pre_wrap' );

		do_action( 'smallermobs_breadcrumbs' );
	}
}

add_action( 'smallermobs_pre_wrap', 'smallermobs_header_media_deprecated' );
function smallermobs_header_media_deprecated() {
	if ( has_action( 'smallermobs_header_media' ) ) {
		_smallermobs_deprecated_function( 'smallermobs_header_media', '3.2', 'smallermobs_pre_wrap' );

		do_action( 'smallermobs_header_media' );
	}
}

add_action( 'smallermobs_pre_footer', 'smallermobs_after_wrap_deprecated' );
function smallermobs_after_wrap_deprecated() {
	if ( has_action( 'smallermobs_after_wrap' ) ) {
		_smallermobs_deprecated_function( 'smallermobs_after_wrap', '3.2', 'smallermobs_pre_footer' );

		do_action( 'smallermobs_after_wrap' );
	}
}

add_action( 'smallermobs_in_loop_start', 'smallermobs_after_wrap_deprecated' );
function smallermobs_before_the_content_deprecated() {
	if ( has_action( 'smallermobs_before_the_content' ) ) {
		_smallermobs_deprecated_function( 'smallermobs_before_the_content', '3.2', 'smallermobs_in_loop_start' );

		do_action( 'smallermobs_before_the_content' );
	}
}

add_action( 'smallermobs_in_loop_start', 'smallermobs_in_loop_start_action_deprecated' );
function smallermobs_in_loop_start_action_deprecated() {
	if ( has_action( 'smallermobs_in_loop_start_action' ) ) {
		_smallermobs_deprecated_function( 'smallermobs_in_loop_start_action', '3.2', 'smallermobs_in_loop_start' );

		do_action( 'smallermobs_in_loop_start_action' );
	}
}

add_action( 'smallermobs_in_loop_end', 'smallermobs_after_the_content_deprecated' );
function smallermobs_after_the_content_deprecated() {
	if ( has_action( 'smallermobs_after_the_content' ) ) {
		_smallermobs_deprecated_function( 'smallermobs_after_the_content', '3.2', 'smallermobs_in_loop_end' );

		do_action( 'smallermobs_after_the_content' );
	}
}

/**
 * Alias of __return_true
 */
function smallermobs_return_true()  {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', '__return_true()' );
	return __return_true();
}

/**
 * Alias of __return_false
 */
function smallermobs_return_false() {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', '__return_false()' );
	return __return_false();
}

/**
 * Alias of __return_null
 */
function smallermobs_blank() {
	_smallermobs_deprecated_function( __FUNCTION__, '3.2', '__return_null()' );
	return __return_null();
}
