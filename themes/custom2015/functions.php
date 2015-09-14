<?php 
/**
  * Theme Functions
  *
  * Calls in the brnm-framework functions.
  * no need to make any edits to this file
  * @since brnatermedia 0.1
  * @lastmodified brnm 2.5.2
 **/


/**
 * Absolute File Paths
 */
define('BRNM_FRAME', get_template_directory().'/brnm-framework'); // absolute path to framework folder
define('BRNM_FRAME_URI', get_template_directory_uri().'/brnm-framework'); // uri path to framework folder
define('BRNM_FRAME_INCLUDE', get_template_directory().'/brnm-framework/includes'); // absolute path to includes folder
define('BRNM_FRAME_INCLUDE_URI', get_template_directory_uri().'/brnm-framework/includes'); // uri path to includes folder


// Establish Sessions
	include(BRNM_FRAME.'/sessions.php');


/* Show Framework Version on WP Dashboard
 * @since brnm 2.5.2
-------------------------------------------------------- */
function brmn_framework_version() {
	global $brnm_framework_vers;
	$brnm_framework_vers = '2.5.2';
	$changelog = BRNM_FRAME_URI .'/changelog.txt';
	echo 'BRNM Framework vers. '. $brnm_framework_vers .' installed. <a target="_blank" href="'. $changelog .'">view changelog</a>' ;
}
add_action('rightnow_end', 'brmn_framework_version', 99);


/* Dev, Debug and Errors Checking
 * @since brnm 2.4.4
 * @lastmodified brnm 2.4.5
-------------------------------------------------------- */
function dev_mode() {
	$user = wp_get_current_user();
	if($user->ID == brnm_session('options_dev_super_admins')) // dev mode shows hidden pages and allows debug mode to be enabled
		return true;
}

function debug_mode() {
	if(dev_mode()) {
		if(brnm_session('options_dev_debug_mode') == 'on')
			return true;
	}
}

function show_error($string = 'Error') {
	if(dev_mode()) {
		return '<div style="background: red; padding: .5em; color: #fff; font-size: 0.875em;">'. $string .'</div>';
	}
}


/* Includes
 * @since brnm 0.1
 * @lastmodified brnm 2.4.5
-------------------------------------------------------- */
// Set the content width based on the theme's design and stylesheet.
	if ( ! isset( $content_width ) ) $content_width = 640;
	
// Activate Plugins
	include(BRNM_FRAME.'/activations.php');

// ACF Functions
	require_once(BRNM_FRAME.'/advanced-custom-fields-setup.php');
	require_once(BRNM_FRAME.'/acf/acf-developer.php');
	require_once(BRNM_FRAME.'/acf/acf-basic.php');
	require_once(BRNM_FRAME.'/acf/acf-custom.php');
	
// Browser Detection Functions
	require_once(BRNM_FRAME.'/browsers.php');

// Helper Functions
	require_once(BRNM_FRAME.'/helpers.php');

// Register Menus
	require_once(BRNM_FRAME.'/menus.php');

// Enqueue all Styles and Scripts
	require_once(BRNM_FRAME.'/enqueues.php');
	
// Enable Google Event tracking custom functionality
	require_once(BRNM_FRAME.'/analytics.php');
	
// Add theme setup capabilities
	require_once(BRNM_FRAME.'/theme-setup.php');

// Add theme preset capabilities
	require_once(get_template_directory().'/theme-presets.php');

// Functions to be plugged into theme files
	require_once(BRNM_FRAME.'/theme-functions.php');

// Framework shortcodes
	require_once(BRNM_FRAME.'/shortcodes.php');

// Admin navigation thru posts
	require_once(BRNM_FRAME_INCLUDE.'/plugins/admin-post-navigation/admin-post-navigation.php');

// Toggle widget display per page
	require_once(BRNM_FRAME_INCLUDE.'/plugins/display-widgets/display-widgets.php');

// Custom login items
	require_once(BRNM_FRAME.'/login.php');

// Deprecated functions
	require_once(BRNM_FRAME.'/deprecated.php');
	
// Custom functions
	require_once(get_template_directory().'/functions-custom.php');
	
// Enable Debug mode
	if (debug_mode()) {
		require_once(BRNM_FRAME.'/debug.php');
	}
?>