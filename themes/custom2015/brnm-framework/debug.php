<?php
/**
  * Debug-on.php
  *
  * Enabled for admins enabled with dev capabilities
  * This file runs when debug mode is enabled
  * @since brnm 2.2
  * @lastmodified brnm 2.5
 **/


/* Enable debug stylesheet
-------------------------------------------------------- */
function brnm_load_debug_styles() {
	wp_register_style('debugcss', BRNM_FRAME_INCLUDE_URI.'css/debug.css', array('themecss'), '2.1.1', 'all');
	wp_enqueue_style('debugcss');
}
add_action('wp_enqueue_scripts', 'brnm_load_debug_styles');
	

/* Show that Debug is active (html)
-------------------------------------------------------- */
// Show Debug mode is On in the Front
add_action('body_close', 'brnm_debug_front_message');
function brnm_debug_front_message() {
	$html = '<div class="debug-message">Debug Mode is ENABLED</div>';
	echo $html;
}

// Show Debug mode is On in the Admin
function brnm_debug_admin_message() {
	global $wp_admin_bar;
	$url = get_bloginfo('url').'/wp-admin/admin.php?page=acf-options-developer';
	$wp_admin_bar->add_menu(array('id' => 'debug-admin', 'title' => 'Debug Mode is ENABLED', 'href' => $url));
}
add_action( 'wp_before_admin_bar_render', 'brnm_debug_admin_message' );


/* Show load time information after footer
-------------------------------------------------------- */
function brnm_load_info() {
	$load_info = '<!-- Database: '.get_num_queries().' queries in '.timer_stop().' seconds. --><!-- Useragent: '.$_SERVER['HTTP_USER_AGENT'].' -->';
	echo $load_info;
}
add_action('wp_footer', 'brnm_load_info', 99999);
?>