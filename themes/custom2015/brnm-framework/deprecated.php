<?php
/**
  * Helper Functions
  * 
  * Odds and ends Functions to help the Framework 
  * @since brnm 2.4.1
  * @lastmodified brnm 2.5.2
 **/


/* Enqueue Styles
 * @deprecated 2.5.2
-------------------------------------------------------- */
function brnm_enqueue_styles() {
	$error = show_error('brnm_enqueue_styles() is deprecated. Use "brnm_enqueue_theme_style()" instead');
	return $error;
}    

/* Show a specific stylesheet for IE-6 browsers
 * @deprecated 2.5.2
-------------------------------------------------------- */
function brnm_ie6_style() {
	$error = show_error('brnm_ie6_style() is deprecated. Use "brnm_ie6_styling()" instead');
	return $error;
}

/* Custom Event Tracking
 * @deprecated 2.5.2
-------------------------------------------------------- */
function brnm_get_ga_event($type, $category = 'event', $event = 'click', $label, $value = null, $incOnClick = false) {
	$error = show_error('brnm_get_ga_event() is deprecated. Use "brnm_get_gaevent()" instead');
	return $error;
}

/* Echo the Event Tracking
 * @deprecated 2.5.2
-------------------------------------------------------- */
// echo out the ga code returned
function brnm_the_ga_event($type, $category, $event, $label, $value, $incOnClick) {
	$error = show_error('brnm_the_ga_event() is deprecated. Use "brnm_get_gaevent()" and "echo" instead');
	echo $error;
}

/* Office Shortcode
 * @deprecated 2.5.2
-------------------------------------------------------- */
function brnm_office_shortcode() {
	$error = show_error('brnm_office_shortcode() is deprecated. Use "brnm_sc_office()" and "echo" instead');
	return $error;
}

/* Button1 Shortcode
 * @deprecated 2.5.2
-------------------------------------------------------- */
function brnm_cta_shortcode() {
	$error = show_error('brnm_cta_shortcode() is deprecated. Use "brnm_sc_button2()" and "echo" instead');
	return $error;
}


/* Debug mode print
 * @deprecated 2.5.2
-------------------------------------------------------- */
function dev_print() {
	$error = show_error('dev_print() is deprecated. Use "debug_print()" and "echo" instead');
	echo $error;	
}