<?php
/**
  * Template Functions
  *
  * Functions to be used within the template
  * @since brnm-framework 2.5.2
  * @lastmodified brnm-framework 2.6
 **/


/* Social icons display
 * @since brnm-framework 2.4
 * @lastmodified brnm-framework 2.5.4
-------------------------------------------------------- */
// this function shows up in the header and footer
function brnm_the_social_icons($classes = null) {
	$classes = ' '. str_replace(array(',', ' ', '-'), ' ', $classes); // add any classes into the div, optional

	$display = '<div class="social'. $classes .'"><ul>';
	$socials = array('facebook', 'twitter', 'instagram', 'google', 'youtube', 'linkedin', 'pinterest', 'tumblr', 'yelp', 'skype', 'vimeo', 'rss', 'apple', 'soundcloud', 'vine');
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
 * @since brnm-framework 2.4.4
 * @lastmodified brnm-framework 2.5.4
 *
 * @param $handle	-- string. Must be main_phone, alt_phone, fax_phone, email, address, social,
 *					or an acceptable social media outlet, including facebook, twitter, youtube,
 					pinterest, yelp, google+, linkedin, tumblr, skype, vimeo, rss
 * @param $wrap		-- the html tag that will wrap the output
 * @param $output	-- the result that will be displayed
 * @param $icon show or hide related icon
-------------------------------------------------------- */
function brnm_the_office( $handle, $label = false, $wrap = null, $icon = false ) {
	$handle = esc_html($handle);
	$output = brnm_office_fields_switch($handle, $label, $icon);

	$acceptable_fields = array('address', 'article', 'aside', 'blockquote', 'caption', 'cite', 'code', 'content', 'div', 'pre', 'section', 'span', 'strong', 'textarea');

	if(in_array( $wrap, $acceptable_fields)) {
		$preoutput = '<'.$wrap.'>';
		$postoutput = '</'.$wrap.'>';
		echo $preoutput . $output . $postoutput;
	} else {
		echo $output;
	}
}


/* Logo display
 * @since brnm-framework 2.5.2
 * @lastmodified brnm-framework 2.5.3
 *
 * @param $size = integer (less than or equal to 1)
-------------------------------------------------------- */
function brnm_the_logo($size = null) {
	$logo = wp_get_attachment_image_src(brnm_session('options_login_logo'), 'logo-front');

	if($size == 1 || !$size) {
		$logoW = $logo[1];
		$logoH = $logo[2];
		$bg_size = 'auto';
	} elseif($size < 1 && $size > 0) {
		$logoW = $logo[1] * $size;
		$logoH = $logo[2] * $size;
		$bg_size = 'cover';
	} else {
		die('for the "brnm_the_logo()" function to work, please enter a number between 0 and 1 or leave blank');
	}

	$the_logo =
		'<style type="text/css" scoped>
		#site-title a { background: url('. $logo[0] .') no-repeat center; width: '. $logoW .'px; height: '. $logoH .'px; background-size: '. $bg_size .'; display: block; }
		</style>
		<a href="'. home_url( '/' ) .'"
		title="'. esc_attr(get_bloginfo('name')) .' | '. esc_attr( get_bloginfo('site_description')) .'"
		rel="home"><span class="ir">'. get_bloginfo('site_name').' - '. get_bloginfo('site_description') .'</span></a>';

	echo $the_logo;
}


/* Follow attribute for 'a' tags
 * @since brnm-framework 2.4
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


/* Sharing Buttons
 * @since brnm-framework 2.6
 * @lastmodified brnm-framework 2.6.1
-------------------------------------------------------- */
add_filter('the_content', 'brnm_sharing_buttons');
function brnm_sharing_buttons($content = '', $css = '') {
	global $post;
	$share_setting = brnm_session('options_sharing_enable');

	if($share_setting == 'yes' && $post->post_type == 'post') {
		$title = str_replace(' ', '%20', $post->post_title);
		$url = get_permalink($post->ID);
		$image_id = get_post_thumbnail_id($post->ID);
		$image = wp_get_attachment_image_src($image_id, 'full');
		$domain = brnm_session('home');
		$css = ($css ? ' '. sanitize_text_field($css) : '');

		$display  = '<div class="sharing social cf'.$css .'"><ul>';
		$display .= (brnm_session('options_sharing_title') ? '<h3>'. apply_filters('the_title', brnm_session('options_sharing_title')) .'</h3>' : '');
		$share_networks = brnm_session('options_sharing_networks');

		foreach($share_networks as $social) :
			switch($social) {
				case 'facebook';
					$display .= '<li><a class="'. $social .' icon-'. $social .'" href="http://www.facebook.com/sharer/sharer.php?u='. $url .'&amp;title='. $title .'"><span class="ir">'. $social .'</span></a></li>';
				break;
				case 'twitter';
					$display .= '<li><a class="'. $social .' icon-'. $social .'" href="http://twitter.com/intent/tweet?status='. $title .'+'. $url .'"><span class="ir">'. $social .'</span></a></li>';
				break;
				case 'google';
					$display .= '<li><a class="'. $social .' icon-'. $social .'" href="https://plus.google.com/share?url='. $url .'"><span class="ir">'. $social .'</span></a></li>';
				break;
				case 'pinterest';
					$display .= '<li><a class="'. $social .' icon-'. $social .'" href="http://pinterest.com/pin/create/bookmarklet/?media='. $image .'&amp;url='. $url .'&amp;is_video=false&amp;description='. $title .'"><span class="ir">'. $social .'</span></a></li>';
				break;
				case 'tumblr';
					$display .= '<li><a class="'. $social .' icon-'. $social .'" href="http://www.tumblr.com/share?v=3&amp;u='.$url .'&amp;t='. $title .'"><span class="ir">'. $social .'</span></a></li>';
				break;
				case 'linkedin';
					$display .= '<li><a class="'. $social .' icon-'. $social .'" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. $url.'&amp;title='. $title.'&amp;source='. $domain .'"><span class="ir">'. $social .'</span></a></li>';
				break;
				case 'envelope';
					$display .= '<li><a class="'. $social .' icon-'. $social .'" href="mailto:?subject='.$title .'&amp;body=Check out this site I came across -- '. $url .'"><span class="ir">'. $social .'</span></a></li>';
				break;
			}
		endforeach;

		$display .= '</ul></div><!-- .sharing social -->';

		$content = $content . $display;
	}
	return $content;
}


/* Return the lat lng of a raw address
 * @since brnm-framework 2.6
 *
 * @param $meta => array - postmeta data
-------------------------------------------------------- */
function geocodeAddy($rawAdd) {

	//add the user entered location to the Google Maps API url query string
	$gmapsApiAdd = 'http://maps.googleapis.com/maps/api/geocode/json?address='. str_replace(' ','+', urlencode($rawAdd)) .'&sensor=false';

	//Open the Google Maps API and send it the above url containing user entered address
	//Google Maps will return a JSON file (Javascript multidimensional array)
	if($results = @file_get_contents($gmapsApiAdd)) {
		//convert the json file to PHP array
		$response = json_decode($results, true);
		//If the user entered address matched a Google Maps API address, it will return 'OK' in the status field.
		if($response["status"] == "OK") {
		//If okay, find the lat and lng values and assign them to local array
		$coordinates = array("lat"=>$response["results"][0]["geometry"]["location"]["lat"],
						"lng" =>$response["results"][0]["geometry"]["location"]["lng"]);
		return $coordinates;
		}
	}
	else {
		return false;
	}
}


/* Custom Excerpt giving option between regular excerpt
 * and use of the <!--more--> tag
 * @since brnm-framework 2.6
 * @lastmodified brnm-framework 2.6.1
-------------------------------------------------------- */
function brnm_the_excerpt($moretext = null) {
	if(!$moretext) {
		$moretext = 'Read Full Article...';
	} else {
		$moretext = sanitize_text_field($moretext);
	}

	global $post;
	if(strpos($post->post_content, '<!--more-->')) {
		the_content($moretext);
	} else {
		the_excerpt();
	}
}


/* Check for Even Number
 * @since brnm-framework 2.6.1
-------------------------------------------------------- */
function brnm_is_even($number) {
	if($number % 2 == 0)
		return true;
}