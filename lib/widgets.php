<?php
/**
 * Register sidebars and widgets
 */
function smallermobs_widgets_init() {
	global $ss_settings;
	$class        = apply_filters( 'smallermobs_widgets_class', '' );
	$before_title = apply_filters( 'smallermobs_widgets_before_title', '<h3 class="widget-title">' );
	$after_title  = apply_filters( 'smallermobs_widgets_after_title', '</h3>' );
	$home_row_one = 'col-md-' . $ss_settings['home_row_one'];
	// Sidebars
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'smallermobs' ),
		'id'            => 'sidebar-primary',
		'before_widget' => '<section id="%1$s" class="' . $class . ' widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	));

	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'smallermobs' ),
		'id'            => 'sidebar-secondary',
		'before_widget' => '<section id="%1$s" class="' . $class . ' widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	));

	register_sidebar( array(
		'name'          => __( 'Home page widgets area', 'smallermobs' ),
		'id'            => 'home-page-widgets-area',
		'before_widget' => '<section id="%1$s" class="' . $home_row_one . ' home-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	));

	register_sidebar( array(
		'name'          => __( 'Products Sidebar', 'smallermobs' ),
		'id'            => 'products-widgets-area',
		'before_widget' => '<section id="%1$s" class="' . $class . ' widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	));
}
add_action( 'widgets_init', 'smallermobs_widgets_init' );
/**
* Register Widgets
*/
include 'widgets/panel.php';

function register_smobs_custom_widgets() {
    register_widget( 'PanelWidget' );
}
add_action( 'widgets_init', 'register_smobs_custom_widgets' );