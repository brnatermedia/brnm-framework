<?php
/**
 * Plugin Name: BRNM Theme Framework
 * Plugin URI: https://github.com/brnater/brnm-framework
 * Description: <strong>Required</strong> on all BRNM-themed websites.
 * Version: 2.6.4
 * Author: brnatermedia
 * Author URI: http://brnatermedia.com
 * License: GPL2
 */


if ( ! defined( 'ABSPATH' ) ) {
	die();
}




class BRNM_FRAMEWORK {

	/**
	 * Variables
	 */
	public $version = '2.6.4';


	/**
	 * Construct
	 */
	function __construct() {
		add_action('init', array(&$this, 'initialize_framework_hooks'));
	}

	// certain hooks need to be added to the init hook to run properly
	public function initialize_framework_hooks() {
		add_action('rightnow_end', array(&$this, 'show_version')); //Show Framework Version on WP Dashboard
		add_action('init', 'dev_mode'); //Allow for Dev Modes
		add_action('plugins_loaded', 'debug_mode'); //Allow for Debug Modes
	}


	/* Show Framework Version on WP Dashboard
	 * @since brnm-framework 2.5.2
	-------------------------------------------------------- */
	public function show_version() {
		$changelog = plugin_dir_path( __FILE__ ) .'/changelog.txt';
		echo 'BRNM Framework vers. '. $this->version .' installed. <a target="_blank" href="'. $changelog .'">View changelog.</a>' ;
	}


	/* Allow for Dev & Debug Modes
	 * @since brnm-framework 2.4.4
	 * @lastmodified brnm-framework 2.6.4
	 *
	 * @update2.6.4 - wp_get_current_user() replaced with
	 * global $current_user to accommodate shift to plugin
	 * where items are loaded in different order
	-------------------------------------------------------- */
	// Dev mode is enabled whenever the Super User is logged in
	public static function dev_mode() {
		$user = wp_get_current_user();
		if($user->ID == brnm_session('options_dev_super_admins')) // dev mode shows hidden pages and allows debug mode to be enabled
			return true;
	}

	// Debug mode is enabled whenever the Super User is logged in and enables debug mode
	public static function debug_mode() {
		if(BRNM_FRAMEWORK::dev_mode()) {
			if(brnm_session('options_dev_debug_mode') == 'on') {
				require_once( plugin_dir_path( __FILE__ ) . 'debug.php');
				return true;
			}
		}
	}

}


/* Initialize hooks that load items inside BRNM_FRAMEWORK class
 * @since brnm-framework 2.6.4
-------------------------------------------------------- */
if(class_exists('BRNM_FRAMEWORK')) {
	add_action('init', 'brnm_initialize');
	function brnm_initialize() {
		$brnm_framework = new BRNM_FRAMEWORK;
		$brnm_framework->initialize_framework_hooks();
	}
}


/**
 * Pull in plugin files
 */
require_once( plugin_dir_path( __FILE__ ) . 'sessions.php'); // create php sessions to store data
require_once( plugin_dir_path( __FILE__ ) . 'activations.php'); // provide authentication for any plugins requiring activation
require_once( plugin_dir_path( __FILE__ ) . 'advanced-custom-fields-setup.php'); // initialize advanced custom fields
require_once( plugin_dir_path( __FILE__ ) . '/acf/acf-developer.php'); // developer options page
require_once( plugin_dir_path( __FILE__ ) . '/acf/acf-basic.php'); // general settings options page
require_once( plugin_dir_path( __FILE__ ) . '/acf/acf-custom.php'); // theme-specific options page
require_once( plugin_dir_path( __FILE__ ) . 'browsers.php'); // Browser Detection Functions
require_once( plugin_dir_path( __FILE__ ) . 'helpers.php'); // Helper Functions
require_once( plugin_dir_path( __FILE__ ) . 'menus.php'); // Register Menus
require_once( plugin_dir_path( __FILE__ ) . 'enqueues.php'); // Enqueue all Styles and Scripts
require_once( plugin_dir_path( __FILE__ ) . 'analytics.php'); // Enable Google Event tracking custom functionality
require_once( plugin_dir_path( __FILE__ ) . 'theme-setup.php'); // Add theme setup capabilities
require_once( plugin_dir_path( __FILE__ ) . 'theme-functions.php'); // Functions to be plugged into theme files
require_once( plugin_dir_path( __FILE__ ) . 'shortcodes.php'); // Framework shortcodes
require_once( plugin_dir_path( __FILE__ ) . '/includes/plugins/admin-post-navigation/admin-post-navigation.php'); // Admin navigation thru posts
require_once( plugin_dir_path( __FILE__ ) . '/includes/plugins/display-widgets/display-widgets.php'); // Toggle widget display per page
require_once( plugin_dir_path( __FILE__ ) . 'login.php'); // Custom login items
require_once( plugin_dir_path( __FILE__ ) . 'deprecated.php'); // Deprecated functions
