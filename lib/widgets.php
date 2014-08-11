<?php
/**
 * Register sidebars and widgets
 */
function smallermobs_widgets_init() {
	$class        = apply_filters( 'smallermobs_widgets_class', '' );
	$before_title = apply_filters( 'smallermobs_widgets_before_title', '<h3 class="widget-title">' );
	$after_title  = apply_filters( 'smallermobs_widgets_after_title', '</h3>' );
	$home_row_one = 'col-md-4';
	$home_row_two = 'col-md-6';
	$home_row_three = 'col-md-3';
	$home_row_four = 'col-md-4';
	$home_row_five = 'col-md-12';
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
		'name'          => __( 'Home page row one', 'smallermobs' ),
		'id'            => 'home-page-widget-row-one',
		'before_widget' => '<section id="%1$s" class="' . $home_row_one . ' home-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	));
	register_sidebar( array(
		'name'          => __( 'Home page row two', 'smallermobs' ),
		'id'            => 'home-page-widget-row-two',
		'before_widget' => '<section id="%1$s" class="' . $home_row_two . ' home-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	));
	register_sidebar( array(
		'name'          => __( 'Home page row three', 'smallermobs' ),
		'id'            => 'home-page-widget-row-three',
		'before_widget' => '<section id="%1$s" class="' . $home_row_three . ' home-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	));
	register_sidebar( array(
		'name'          => __( 'Home page row four', 'smallermobs' ),
		'id'            => 'home-page-widget-row-four',
		'before_widget' => '<section id="%1$s" class="' . $home_row_four . ' home-widget widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => $before_title,
		'after_title'   => $after_title,
	));
	register_sidebar( array(
		'name'          => __( 'Home page row five', 'smallermobs' ),
		'id'            => 'home-page-widget-row-five',
		'before_widget' => '<section id="%1$s" class="' . $home_row_five . ' home-widget widget %2$s">',
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