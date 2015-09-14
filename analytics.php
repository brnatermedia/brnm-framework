<?php
/**
  * Analytics
  *
  * Assists with putting together particular google analytics
  * actions, such as eCommerce tracking and event tracking
  * @since brnm 2.4
  * @lastmodified 2.5.2
 **/


/* Custom Event Tracking
 * @since 2.5.2
 *
 * this is based on universal analytics, not classic version
 * 
 * @param $category - string - name of the google event category
 * @param $action - string - the google envent action required to take
 * @param $label - string - label to the category
 * @param $value - string - optional
 * @param $click - boolean - wrap the code on an onlick attribute?
-------------------------------------------------------- */
function brnm_get_gaevent($category, $action, $label, $value = null, $click = false) {
	if(brnm_session('options_dev_ga_event_tracking')) {
		$code = null;
	
		if($click == true) { $code.= 'onclick="'; } //surround the code with the onclick attribute
		$code.= "ga('send', 'event', { eventCategory: '$category', eventAction: '$action', eventLabel: '$label'});";
		if($click == true) { $code.= '"'; } // surround the code with the onclick attribute
	
		return $code;
	}
}


/* Event Tracking on Gravity Forms
 * @since 2.5.2
 *
 * this is based on universal analytics, not classic version
 * 
 * @param $post - object - results of the page query
 * @param $button - object - the submit button for the gravity form
 * @param $form - object - entire gravity form object
 * @param $input - string - HTML dom object
-------------------------------------------------------- */
function brnm_gf_button_tracking($button, $form) {
	if(brnm_session('options_dev_ga_event_tracking')) {
		global $post;
		$title = $form['title'] .' - '. $post->post_title;
		
		$dom = new DOMDocument();
		$dom->loadHTML($button);
		$input = $dom->getElementsByTagName('input')->item(0);
		if ($input->hasAttribute('onclick')) {
			$input->setAttribute("onclick","ga('send', 'event', { eventCategory: 'Forms', eventAction: 'click', eventLabel: '". $title ."'});".$input->getAttribute("onclick"));
		} else {
			$input->setAttribute("onclick","ga('send', 'event', { eventCategory: 'Forms', eventAction: 'click', eventLabel: '". $title ."'});");
		}
		return $dom->saveHtml();
	}
	else {
		return $button;
	}
}

add_filter( 'gform_submit_button', 'brnm_gf_button_tracking', 10, 2);



/* add event tracking to all content links
-------------------------------------------------------- */
// in development. need a regular expression to find 'a' elements
// with onclick attributes containing ga() functions
/*
add_filter('the_content', 'brnm_add_ga_event_links');
function brnm_add_ga_event_links($content) {
	
	require_once(BRNM_FRAME_INCLUDE .'/plugins/simple-html-dom.php');
	
	$raw_content = str_get_html($content);
	$new_content = null;
	
	foreach($raw_content->find('a') as $a) {
		//if the onclick attribute contains 'ga(', we don't do anything, otherwise, add the code
		if(!preg_match('ga\(', $a->onclick, $match)) {
			$new_content .= $a->onclick . '<br />';
		}
		
	}
	return $new_content;
}
*/
?>