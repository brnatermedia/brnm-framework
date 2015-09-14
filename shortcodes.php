<?php 
/**
  * Shortcodes
  * 
  * Custom buttons and otherise shortcodes to be plugged in
  * @since brnm 2.4
  * @lastmodified brnm 2.5.4
 **/


/* Contact Info shortcode generator
 * @since brnm 2.5.4
 * @param $atts[items] - array => list items from office to be shown
 * @param $atts[icons] - boolean => show/hide icons
-------------------------------------------------------- */
add_shortcode('contact', 'brnm_sc_the_office');
function brnm_sc_the_office($atts) {
	$atts = shortcode_atts(
		array(
			'field' => '',
			'label' => '',
			'icon' => false,
		),
		$atts
	);
	
	$acceptable_fields = array('main-phone', 'alternate-phone', 'fax-phone', 'email', 'address', 'office-hours' );
	if(in_array($atts['field'], $acceptable_fields)) {
		$output = '<span class="office-item '. $atts['field'].'">';
		$output.= brnm_office_fields_switch($atts['field'], $atts['label'], $atts['icon']);
		$output.= '</span><!-- .office-item -->';
		
		return $output;
	}
	else {
		return show_error('Error: Incorrect "item" used.');
	}
} ?>