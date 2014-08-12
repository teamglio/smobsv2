<?php
/**
 * Enqueue scripts and stylesheets
 */
function smallermobs_scripts() {

	$stylesheet_url = apply_filters( 'smallermobs_main_stylesheet_url', smallermobs_ASSETS_URL . '/css/style-default.css' );
	$stylesheet_ver = apply_filters( 'smallermobs_main_stylesheet_ver', null );
	$smobs_css_url = apply_filters( 'smobs_css_url', smallermobs_ASSETS_URL . '/css/smobs.css' );
	$smobs_css_ver = apply_filters( 'smobs_css_ver', null );

	wp_enqueue_style( 'smallermobs_css', $stylesheet_url, false, $stylesheet_ver );
	wp_enqueue_style( 'smobs_css', $smobs_css_url, false, $smobs_css_ver );

	wp_register_script( 'modernizr', smallermobs_ASSETS_URL . '/js/vendor/modernizr-2.7.0.min.js', false, null, false );
	wp_register_script( 'fitvids', smallermobs_ASSETS_URL . '/js/vendor/jquery.fitvids.js',false, null, true  );
	wp_register_script( 'mixitup', smallermobs_ASSETS_URL . '/js/vendor/jquery.mixitup.js',false, null, true  );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'fitvids' );
	wp_enqueue_script( 'mixitup' );

	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'smallermobs_scripts', 100 );
