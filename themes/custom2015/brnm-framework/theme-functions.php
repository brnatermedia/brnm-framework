<?php
/**
  * Template Functions
  * 
  * Functions to be used within the template
  * @since brnm 2.5.2
  * @lastmodified brnm 2.5.3
 **/


/* Social icons display
 * @since brnm 2.4
 * @since brnm 2.5.2
-------------------------------------------------------- */
// this function shows up in the header and footer
function brnm_the_social_icons($classes = null) {
	$classes = ' '. str_replace(array(',', ' ', '-'), ' ', $classes); // add any classes into the div, optional
	
	$display = '<div class="social'. $classes .'"><ul>';
	$socials = array('facebook', 'twitter', 'instagram', 'google', 'youtube', 'linkedin', 'pinterest', 'tumblr', 'yelp', 'skype', 'vimeo', 'rss', 'apple', 'soundcloud');
	foreach($socials as $social) {
		$link = brnm_session('options_social_'.$social);
		if(!empty($link)) {
			$click = brnm_get_gaevent('send', 'Social Media Link', 'click', $social, '', true );
			$display.= '<li><a '. $click .' href="'.esc_url($link).'" target="_blank" class="'. $social .' icon-'.$social.'"><span class="ir">'.$social.'</span></a></li>';
		}
	}
	$display.= '</ul></div><!-- .social'. $classes .' -->';
	echo $display;
}


/* Pull Office info directly into the content
 * @since brnm 2.4.4
 *
 * @param $handle	-- string. Must be main_phone, alt_phone, fax_phone, email, address, social,
 *					or an acceptable social media outlet, including facebook, twitter, youtube,
 					pinterest, yelp, google+, linkedin, tumblr, skype, vimeo, rss
 * @param $wrap		-- the html tag that will wrap the output
 * @param $output	-- the result that will be displayed
-------------------------------------------------------- */
function brnm_the_office( $handle, $wrap = null ) {
	$handle = esc_html($handle);
	$output = brnm_office_fields_switch($handle);
	
	if($output == '') {
		$output = show_error('Error: Selected field(s) do not exist in the options. Add it in the Options Page first.');
	} else {
		$acceptable_fields = array('address', 'article', 'aside', 'blockquote', 'caption', 'cite', 'code', 'content', 'div', 'pre', 'section', 'span', 'strong', 'textarea');
	
		if(in_array( $wrap, $acceptable_fields)) {
			$preoutput = '<'.$wrap.'>';
			$postoutput = '</'.$wrap.'>';
			echo $preoutput . $output . $postoutput;
		} else {
			echo $output;
		}
	}
}


/* Logo display
 * @since brnm 2.5.2
 * @lastmodified brnm 2.5.3
 *
 * @param $size = integer (less than or equal to 1)
-------------------------------------------------------- */
function brnm_the_logo($size = null) {
	$logo = wp_get_attachment_image_src(brnm_session('options_login_logo'), 'logo-front');
	
	if($size == 1 || !$size) {
		$logoW = $logo[1];
		$logoH = $logo[2];
	} elseif($size < 1 && $size > 0) {
		$logoW = $logo[1] * $size;
		$logoH = $logo[2] * $size;
	} else {
		die('for the "brnm_the_logo()" function to work, please enter a number between 0 and 1 or leave blank');
	}
	
	$the_logo =
		'<style type="text/css" scoped>
		#site-title a { background: url('. $logo[0] .') no-repeat center; width: '. $logoW .'px; height: '. $logoH .'px; background-size: cover; display: block; }
		</style>
		<a href="'. home_url( '/' ) .'"
		title="'. esc_attr(get_bloginfo('name')) .' | '. esc_attr( get_bloginfo('site_description')) .'"
		rel="home"><span class="ir">'. get_bloginfo('site_name').' - '. get_bloginfo('site_description') .'</span></a>';
		
	echo $the_logo;
}


/* Follow attribute for 'a' tags
 * @since brnm 2.4
-------------------------------------------------------- */
function brnm_the_follow($status = 'nofollow', $page = null) {
/*
$follow => string. accepts 'follow', and 'nofollow'. nofollow by default
$page => string. accepts 'all', 'front', 'interior'. empty by default
*/
	$rel = 'rel="'. $status .'"';
	
	//pages to show the attribute
	if($page == 'front') { 
		if(is_front_page()) echo $rel;
	} elseif($page == 'interior') {
		if(!is_front_page()) echo $rel;
	} elseif($page == 'all') {
		echo $rel;
	} else { // $page == null
		return; // brings back a 'rel' that can be echoed however desired
	}
}