<?php

// Define the theme version
if ( ! defined( 'smallermobs_VERSION' ) ) {
	define( 'smallermobs_VERSION', '2.0.1' );
}

if ( class_exists( 'BuddyPress' ) ) {
	require_once locate_template( '/lib/buddypress.php' );
}

if ( ! defined( 'SS_FRAMEWORK' ) ) {
	// Define bootstrap as the default framework.
	// Other frameworks can be added via plugins and override this.
	define( 'SS_FRAMEWORK', 'bootstrap' );
}

// define the 'smallermobs_ASSETS_URL' constant.
if ( ! defined( 'smallermobs_ASSETS_URL' ) ) {
	$smallermobs_assets_url = str_replace( 'http:', '', get_template_directory_uri() . '/assets' );
	$smallermobs_assets_url = str_replace( 'https:', '', $smallermobs_assets_url );
	define( 'smallermobs_ASSETS_URL', $smallermobs_assets_url );
}

/*
 * The option that is used by smallermobs in the database for all settings.
 *
 * This can be overriden by adding this in your wp-config.php:
 * define( 'smallermobs_OPT_NAME', 'custom_option' )
 */
if ( ! defined( 'smallermobs_OPT_NAME' ) ) {
	define( 'smallermobs_OPT_NAME', 'smallermobs' );
}

global $ss_settings;
$ss_settings = get_option( smallermobs_OPT_NAME );

do_action( 'smallermobs_include_files' );

require_once locate_template( '/lib/class-smallermobs_Color.php' );
require_once locate_template( '/lib/class-smallermobs_Image.php' );
require_once locate_template( '/lib/functions-core.php' );

// Get the framework
require_once locate_template( '/framework/class-SS_Framework.php' );

require_once locate_template( '/lib/template.php' );     // Custom get_template_part function.
require_once locate_template( '/lib/utils.php' );        // Utility functions
require_once locate_template( '/lib/init.php' );         // Initial theme setup and constants
require_once locate_template( '/lib/wrapper.php' );      // Theme wrapper class
require_once locate_template( '/lib/sidebar.php' );      // Sidebar class
require_once locate_template( '/lib/footer.php' );       // Footer configuration
require_once locate_template( '/lib/config.php' );       // Configuration
require_once locate_template( '/lib/titles.php' );       // Page titles
require_once locate_template( '/lib/cleanup.php' );      // Cleanup
require_once locate_template( '/lib/comments.php' );     // Custom comments modifications
require_once locate_template( '/lib/meta.php' );         // Tags
require_once locate_template( '/lib/widgets.php' );      // Sidebars and widgets
require_once locate_template( '/lib/post-formats.php' ); // Sidebars and widgets
require_once locate_template( '/lib/scripts.php' );      // Scripts and stylesheets
require_once locate_template( '/lib/deprecated.php' );   // Deprecated functions

require_once locate_template( '/lib/page-feature.php' );   // page-feature


// Only load TGM if REDUX is not installed
if ( ! class_exists( 'ReduxFramework' ) ) {
	require_once locate_template( '/lib/class-TGM_Plugin_Activation.php' ); // TGM_Plugin_Activation
	require_once locate_template( '/lib/dependencies.php' );                // load our dependencies
}

if ( class_exists( 'bbPress' ) ) {
	require_once locate_template( '/lib/bbpress.php' );
}

if ( class_exists( 'woocommerce' ) ) { 
	require_once locate_template( '/lib/woocommerce.php' );
} else { 
	return false; 
}