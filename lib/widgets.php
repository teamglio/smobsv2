<?php
/**
 * Register sidebars and widgets
 */
function smallermobs_widgets_init() {
	$class        = apply_filters( 'smallermobs_widgets_class', '' );
	$before_title = apply_filters( 'smallermobs_widgets_before_title', '<h3 class="widget-title">' );
	$after_title  = apply_filters( 'smallermobs_widgets_after_title', '</h3>' );

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
}
add_action( 'widgets_init', 'smallermobs_widgets_init' );