<?php
/**
  * Debug Settings
  *
  * Enabled for admins with dev capabilities
  * This file runs when debug mode is enabled
  * @since brnm-framework 2.2
  * @lastmodified brnm-framework 2.6.4
 **/


/* Enable debug stylesheet
 * @since brnm-framework 2.2
 * @lastmodified brnm-framework 2.6.4
-------------------------------------------------------- */
function load_debug_style() {
	wp_register_style('debugcss', plugins_url() .'/brnm-framework/includes/css/debug.css', array('themecss'), '2.1.1', 'all');
	wp_enqueue_style('debugcss');
}
add_action('wp_enqueue_scripts', 'load_debug_style', 99);


/* Show Developer that Debug is active with a message
 * @since brnm-framework 2.2
 * @lastmodified brnm-framework 2.6.4
-------------------------------------------------------- */
// Show Debug mode is On in the Front
function debug_footer_message() {
	$html = '<div class="debug-message">Debug Mode is ENABLED</div>';
	echo $html;
}
add_action('body_close', 'debug_footer_message');

// Show Debug mode is On in the Admin
function debug_admin_message() {
	global $wp_admin_bar;
	$url = get_bloginfo('url').'/wp-admin/admin.php?page=acf-options-developer';
	$wp_admin_bar->add_menu(array('id' => 'debug-admin', 'title' => 'Debug Mode is ENABLED', 'href' => $url));
}
add_action( 'wp_before_admin_bar_render', 'debug_admin_message' );


/* Show load time information after footer in html
 * @since brnm-framework 2.2
 * @lastmodified brnm-framework 2.6.4
-------------------------------------------------------- */
function loadtime_info() {
	$load_info = '<!-- Database: '.get_num_queries().' queries in '.timer_stop().' seconds. --><!-- Useragent: '.$_SERVER['HTTP_USER_AGENT'].' -->';
	echo $load_info;
}
add_action('wp_footer', 'loadtime_info', 99999);


/* Errors show only to the Super User when logged in
 * @since brnm-framework 2.2
 * @lastmodified brnm-framework 2.6.4
-------------------------------------------------------- */
function show_error($string = 'Error') {
	if(BRNM_FRAMEWORK::dev_mode()) {
		return '<div style="background: red; padding: .5em; color: #fff; font-size: 0.875em;">'. $string .'</div>';
	}
}
