<?php 
/**
  * Better Browser and Device Detection
  *
  * WordPress automatically assigns $is_iphone to anything mobile.
  * This better designates what type of mobile we are working with.
  * @since brnatermedia 1.3
  * @modified brnm 2.4.1
 **/


function brnm_browser_detection() {
	// Global tests
	global $useragent,$is_mobile,$is_android_device,$android_device,$is_idevice,$is_iphone,$is_ipod,$is_ipad,$is_blackberry,$is_win,$is_mac,$is_linux,$is_webkit,$is_firefox,$is_chrome,$is_safari,$is_lynx,$is_opera;
	
	// Set all to false
	$useragent = $is_mobile = $is_android_device = $android_device = $is_idevice = $is_iphone = $is_ipod = $is_ipad = $is_blackberry = $is_win = $is_mac = $is_linux = $is_webkit = $is_firefox = $is_chrome = $is_safari = $is_lynx = $is_opera = null;
	
	// Get the User Agent
	$useragent = strtolower( $_SERVER['HTTP_USER_AGENT'] ); 
	
	// Mobile Test
	if(strpos($useragent, 'mobile') !== false)		 	{ $is_mobile = true; } // is a mobile device
	if(strpos($useragent, 'android') !== false) 		{ $is_mobile = true; $is_android_device = true; } // is a mobile android device
	if(strpos($useragent, 'silk') !== false) 			{ $is_mobile = true; $is_android_device = true; $android_device = 'silk'; } // is a silk device
	if(strpos($useragent, 'kindle') !== false) 			{ $is_mobile = true; $is_android_device = true; $android_device = 'kindle'; } // is a kindle
	if(strpos($useragent, 'iphone') !== false) 			{ $is_mobile = true; $is_idevice = true; $is_iphone = true; } // is an iphone mobile device
	if(strpos($useragent, 'ipod') !== false) 			{ $is_mobile = true; $is_idevice = true; $is_ipod = true; } // is an ipod touch device
	if(strpos($useragent, 'ipad') !== false)	 		{ $is_mobile = true; $is_idevice = true; $is_ipad = true; } // is an ipad device
	if(strpos($useragent, 'blackberry') !== false)		{ $is_mobile = true; $is_blackberry = true; } // is a mobile blackberry device
	
	// OS Test
	if(strpos($useragent, 'win') !== false) 			{ $is_win = true; } // is a windows machine
	if(strpos($useragent, 'macintosh') !== false)	 	{ $is_mac = true; } // is a mac machine
	if(strpos($useragent, 'linux') !== false)	 		{ $is_linux = true; } // is a linux machine
	
	// Browsers Test
	if(strpos($useragent, 'applewebkit') !== false) 	{ $is_webkit = true; } // webkit browser
	if(strpos($useragent, 'firefox') !== false) 		{ $is_firefox = true; } // firefox browser
	if(strpos($useragent, 'chrome') !== false)		 	{ $is_chrome = true; } // chrome browser
	if(strpos( $useragent, 'safari') !== false 
		&& strpos($useragent, 'chrome') == false)	 	{ $is_safari = true; } // safari browser
	
	if(strpos($useragent, 'lynx') !== false) 			{ $is_lynx = true;  } // lynx browser
	if(strpos($useragent, 'opera') !== false) 			{ $is_opera = true; } // opera browser
	
}
brnm_browser_detection();
	
/* Set up HTML class	
   Creates a series of classes for the HTML tag for CSS purposes */
function brnm_html_class() {
	global $is_mobile,$is_android_device,$android_device,$is_idevice,$is_iphone,$is_ipod,$is_ipad,$is_blackberry,$is_win,$is_mac,$is_linux,$is_webkit,$is_firefox,$is_chrome,$is_safari,$is_lynx,$is_opera;
	$html = 'brnm no-js';
	if(is_front_page()) { $html .= ' front'; } else { $html .= ' interior'; }
	if(is_page_template('page-mobile.php') || $is_mobile) $html .= ' mobile';

	// Add Browsers
	if($is_android_device)			$html .= ' android';
	if($android_device) 			$html .= ' '.$android_device;
	if($is_idevice) 				$html .= ' idevice';
	if($is_iphone)					$html .= ' iphone';
	if($is_ipod) 					$html .= ' ipod';
	if($is_ipad) 					$html .= ' ipad';
	if($is_blackberry)				$html .= ' blackberry';
	if($is_win)						$html .= ' win';
	if($is_mac)						$html .= ' mac';
	if($is_linux)					$html .= ' linux';
	if($is_webkit) 					$html .= ' webkit';
	if($is_firefox) 				$html .= ' firefox';
	if($is_chrome)					$html .= ' chrome';
	if($is_safari)					$html .= ' safari';
	if($is_lynx)					$html .= ' lynx';
	if($is_opera)					$html .= ' opera';
	
	if(function_exists('brnm_is_IE')) { 
		if(brnm_is_IE()) $html .= ' ie ie-' . brnm_is_IE(); 
		if(brnm_is_IE() >= 10) $html .= ' ie-gte10';
		if(brnm_is_IE() == 9) $html .= ' ie-lte9 ie-lt10';
		if(brnm_is_IE() == 8) $html .= ' ie-lte8 ie-lt9 ie-lt10';
		if(brnm_is_IE() == 7) $html .= ' ie-lte7 ie-lt8 ie-lt9 ie-lt10';
		if(brnm_is_IE() == 6) $html .= ' ie-lte6 ie-lt7 ie-lt8 ie-lt9 ie-lt10';
		if(brnm_is_IE() == 5) $html .= ' ie-lte6 ie-lt7 ie-lt8 ie-lt9 ie-lt10';
		//if(brnm_is_IE() <= 4) $html .= ' ie-lte6 ie-lt7 ie-lt8 ie-lt9 ie-lt10';
	}
			
	echo $html;
}
//add_action('get_header', 'brnm_html_class');
	
	
// For Touch Devices ( simulates iDevice behaviour )	
global $is_mobile,$is_idevice; 
if( $is_mobile && !$is_idevice ) {
	wp_register_script('brnm_android_nav_fix', BRNM_FRAME_INCLUDE_URI.'js/base/android-nav-fix.js', array('jquery'), 1.0, true);
	wp_enqueue_script('brnm_android_nav_fix'); 
}
?>