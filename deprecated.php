<?php
/**
  * Helper Functions
  *
  * Odds and ends Functions to help the Framework
  * @since brnm-framework 2.4.1
  * @lastmodified brnm-framework 2.5.2
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


/* Content Button Shortcode #1
 * @since brnm 2.5.2
 * @lastmodified 2.5.3
-------------------------------------------------------- */
add_shortcode('button1', 'brnm_sc_button1');
function brnm_sc_button1($atts, $content = null) {
	$error = show_error('brnm_sc_button1() shortcode function is deprecated. Use "brnm_sc_button() instead"');
	return $error;
/*
	$atts = shortcode_atts(
		array(
			'href' => '#',
			'color' => 'nocolor', // background color
			'size' => 'small', //options = normal, big
		), $atts
	);

	// cleaning up some of the user submitted info
	if($atts['href'] != "#") { $atts['href'] = esc_url($atts['href']); } //clean up the url

	//reset the size if it's not one of the acceptable sizes
	$acceptable_sizes = array('small', 'big');
	if(!in_array($atts['size'], $acceptable_sizes)) { $atts['size'] = 'small'; }

	$click = brnm_get_gaevent('Content Button', 'click', $content, '', true);
	$button = '<a '. $click .' href="'. $atts['href'] .'" class="button white bg-'. $atts['color'] .' '. $atts['size'] .'">'. $content .'</a>';
	return $button;
*/
}


/* Content Button Shortcode #2
 * @deprecated 2.5.4
 * @since 2.4.5
 *
 * @param $atts['href'] -- string -- page link the button leads to
 * @param $atts['regtext'] -- string -- text in normal font weight
 * @param $atts['boldtext'] -- string -- bold weight font (or can be styled anyhow, since in <span>
 * @param $atts['color'] -- string -- select from one of the available colors in the style.css
 * @param $click -- string -- result of event tracking insertion
-------------------------------------------------------- */
add_shortcode('button2', 'brnm_sc_button2');
function brnm_sc_button2($atts) {
	$error = show_error('brnm_sc_button2() shortcode function is deprecated. Use "brnm_sc_button()"');
	return $error;
/*
	global $post;
	$atts = shortcode_atts(
		array(
			'href' => '#',
			'regtext' => '',
			'boldtext' => '',
			'color' => 'nocolor'
		), $atts
	);
	$spacer = ( ( !empty( $atts['regtext'] ) && !empty( $atts['boldtext'] ) ) ? ' | ' : '' ); // have a spacer only if both texts are present
	$click = brnm_get_gaevent('Content Button', 'click', $atts['regtext'].$spacer.$atts['boldtext'].' - '.$post->post_title, '', true); // label => button label + page title
	$output = '<a '.$click.' class="button cta bg-gold white bg-'. $atts['color'] .'" href="'.$atts['href'].'">'; // create a ga event for all content buttons

	if(!empty($atts['regtext']) && empty($atts['boldtext'])) { $output.= $atts['regtext']; }
	elseif(empty($atts['regtext']) && !empty($atts['boldtext'])) { $output.= '<span>'.$atts['boldtext'].'</span>'; }
	elseif(!empty($atts['regtext']) && !empty($atts['boldtext'])) { $output.= $atts['regtext'].'<br /><span>'.$atts['boldtext'].'</span>'; }

	$output.= '</a>';

	return $output;
*/
}


/* Contact Info shortcode generator
 * @since brnm 2.5.2
 * @depracated brnm 2.5.4
 *
 * @param $atts[items] - array => list items from office to be shown
 * @param $atts[icons] - boolean => show/hide icons
-------------------------------------------------------- */
add_shortcode('office', 'brnm_sc_office');
function brnm_sc_office($atts) {
	$error = show_error('brnm_sc_office() shortcode function is deprecated. Use "brnm_sc_the_office() instead"');
	return $error;
/*
	$atts = shortcode_atts(
		array(
			'items' => array('main_phone', 'alternate_phone', 'fax_phone', 'email', 'address', 'office_hours' ),
			'icons' => false
		),
		$atts
	);

	if(!is_array($atts['items'])) $atts['items'] = (explode(',', str_replace(array(' ', '-', ';'), '', $atts['items'])));

	$total_items = count($atts['items']);

	$output = '<ul class="office-items">';
	for($d = 0; $d < $total_items; $d ++) :
		$output.= '<li>'. brnm_office_fields_switch($atts['items'][$d]) .'</li>';
	endfor;
	$output.= '</ul><!-- .office-items -->';

	return $output;
*/
}


/* ACF Basic & Custom Option pages cleaning
 * @lastmodified brnm 2.5.3
 *
 * $label =>	bool|string -- label of the item being display
 * Note :: do not use these functions directly
 * Use brnm_the_office($item) instead
-------------------------------------------------------- */
function brnm_c_main_phone($label = false) {
	$error = show_error('brnm_c_main_phone() shortcode function is deprecated. Use "brnm_main_phone() instead"');
	return $error;
/*
	if(get_option('options_office_phone_main')) {
		$stripoffice = str_replace(array(' ', '-', '.', ','), '', get_option('options_office_phone_main'));
		if($label == true) { $label = (is_bool($label) ? $label = 'Office: ' : $label = $label .' ' ); } else { $label = ''; }
		return '<span class="icon-phone">'. $label .'<a href="tel:'. $stripoffice .'">'. get_option('options_office_phone_main') .'</a></span>';
	} else {
		return show_error('Add your main phone number on the Options page');
	}
*/
}

function brnm_c_alt_phone($label = false) {
	$error = show_error('brnm_c_alt_phone() shortcode function is deprecated. Use "brnm_alt_phone() instead"');
	return $error;
/*
	if(get_option('options_office_phone_alt')) {
		$stripalternate = str_replace(array(' ', '-', '.', ','), '', get_option('options_office_phone_alt'));
		if($label) { $label = (is_bool($label) ? $label = 'Alternate: ' : $label = $label .' ' ); } else { $label = ''; }
		return '<span class="icon-phone">'. $label .'<a href="tel:'. $stripalternate .'">'. get_option('options_office_phone_alt') .'</a></span>';
	} else {
		return show_error('Add your alternate phone number on the Options page');
	}
*/
}

function brnm_c_fax_phone($label = false) {
	$error = show_error('brnm_c_fax_phone() shortcode function is deprecated. Use "brnm_fax_phone() instead"');
	return $error;
/*
	if(get_option('options_office_phone_fax')) {
		$stripfax = str_replace(array(' ', '-', '.', ','), '', get_option('options_office_phone_fax'));
		if($label) { $label = (is_bool($label) ? $label = 'Fax: ' : $label = $label .' ' ); } else { $label = ''; }
		return '<span class="icon-phone">'. $label .'<a href="tel:'. $stripfax .'">'. get_option('options_office_phone_fax') .'</a></span>';
	} else {
		return show_error('Add your fax phone number on the Options page');
	}
*/
}

function brnm_c_email($label = false) {
	$error = show_error('brnm_c_email() shortcode function is deprecated. Use "brnm_email() instead"');
	return $error;
/*
	if(get_option('options_office_email')) {
		if($label) { $label = (is_bool($label) ? $label = 'Email: ' : $label = $label .' ' ); } else { $label = ''; }
		return '<span class="icon-envelope">'. $label .'<a href="mailto:'. get_option('options_office_email') .'">'. get_option('options_office_email') .'</a></span>';
	} else {
		return show_error('Add your email on the Options page');
	}
*/
}

function brnm_c_address($label = false) {
	$error = show_error('brnm_c_address() shortcode function is deprecated. Use "brnm_address() instead"');
	return $error;
/*
	if(get_option('options_office_address')) {
		if($label) { $label = (is_bool($label) ? $label = 'Address: ' : $label = $label .' ' ); } else { $label = ''; }
		return '<span class="icon-location">'. $label.'<div class="office-address">'. apply_filters('the_content', get_option('options_office_address')) .'</div></span>';
	} else {
		return show_error('Add your address on the Options page');
	}
*/
}

function brnm_c_hours($label = false) {
	$error = show_error('brnm_c_hours() shortcode function is deprecated. Use "brnm_hours() instead"');
	return $error;
/*
	$hours = get_option('options_office_hours');
	if($hours) {
		$output .= '<ul class="office-hours">';
		if($label) { $label = (is_bool($label) ? $label = '<li>Hours of Operation:</li>' : $label = '<li>'. $label .'</li>' ); } else { $label = ''; }
		$output .= $label;
		for($c = 0; $c < $hours; $c ++) :
			$output .= '<li>'. get_option('options_office_hours_'.$c.'_office_day') .' : '. get_option('options_office_hours_'.$c.'_office_time') .'</li>';
		endfor;
		$output .= '</ul>';

		return $output;

	} else {
		return show_error('Add your office hours on the Options page');
	}
*/
}


/* Enable titles on pages & posts
 * @lastmodified brnm-framework 2.4
 * @deprecated 2.5.4
-------------------------------------------------------- */
function brnm_display_page_titles() {
	$error = show_error('brnm_display_page_titles() function is deprecated and no longer used"');
	return $error;
/*
	$brnm_display_pg_titles = false;
	if( function_exists('has_sub_field')) {
		$brnm_pg_titles = brnm_session('options_dev_page_titles');
		global $post;
		if( (is_page() && !is_singular()) && ( $brnm_pg_titles == 'enable_pages' || $brnm_pg_titles == 'enable_all' ) ) { $brnm_display_pg_titles = true; }
		elseif( (is_home() || is_singular()) && ( $brnm_pg_titles == 'enable_posts' || $brnm_pg_titles == 'enable_all' ) ) { $brnm_display_pg_titles = true; }
	}

	return $brnm_display_pg_titles;
*/
}
