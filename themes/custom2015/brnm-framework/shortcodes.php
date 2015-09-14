<?php 
/**
  * Shortcodes
  * 
  * Custom buttons and otherise shortcodes to be plugged in
  * @since brnm 2.4
  * @lastmodified brnm 2.4.3
 **/


/* Content Button Shortcode #1
 * @since brnm 2.5.2
 * @lastmodified 2.5.3
-------------------------------------------------------- */
add_shortcode('button1', 'brnm_sc_button1');
function brnm_sc_button1($atts, $content = null) {
	
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
}


/* Content Button Shortcode #2
 * @since 2.4.5
 * @lastmodified 2.5.3
 *
 * @param $atts['href'] -- string -- page link the button leads to
 * @param $atts['regtext'] -- string -- text in normal font weight
 * @param $atts['boldtext'] -- string -- bold weight font (or can be styled anyhow, since in <span>
 * @param $atts['color'] -- string -- select from one of the available colors in the style.css
 * @param $click -- string -- result of event tracking insertion
-------------------------------------------------------- */
add_shortcode('button2', 'brnm_sc_button2');
function brnm_sc_button2($atts) {
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
}


/* Contact Info shortcode generator
 * @since brnm 2.5.2
 * @param $atts[items] - array => list items from office to be shown
 * @param $atts[icons] - boolean => show/hide icons
-------------------------------------------------------- */
add_shortcode('office', 'brnm_sc_office');
function brnm_sc_office($atts) {
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
}