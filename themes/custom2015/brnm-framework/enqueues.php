<?php 
/**
  * Enqueue Scripts for Website
  * 
  * @since brnm 1.3
  * @lastmodified brnm 2.5.3
 **/


/* Enqueue basic stylesheets
 * @lastmodified 2.5.1
-------------------------------------------------------- */
// Add theme stylesheet to head
function brnm_enqueue_base_theme_style() {
	wp_register_style('themecss', get_template_directory_uri() . '/style.css', array(), '1.0', 'all'); // custom theme specifics
	wp_enqueue_style('themecss');
}    
add_action('wp_enqueue_scripts', 'brnm_enqueue_base_theme_style');

// Show a specific stylesheet for IE-6 browsers
function brnm_ie6_styles() {
	if(!brnm_is_IE() ) return;
	if(brnm_is_IE() < 7) {
		wp_register_style('ie6style', 'http://universal-ie6-css.googlecode.com/files/ie6.1.1.css', array('themecss'), '1.0', 'all');
		wp_enqueue_style('ie6style');
	}
}
add_action('wp_enqueue_scripts', 'brnm_ie6_styles');


/* Enqueue basic scripts
 * @lastmodified brnm 2.5.3
-------------------------------------------------------- */
// Load the most current version of jQuery acceptable to WP
if( !function_exists( 'brnm_enqueue_scripts' ) ) {
	function brnm_enqueue_scripts() {
		// Load Google's CDN if available, else load local copy
		global $wp_scripts;
		$jquery_version = $wp_scripts->registered['jquery']->ver;
		$google_jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/'.$jquery_version.'/jquery.min.js'; // the URL to check against
		$test_google_jquery = @fopen($google_jquery,'r'); // test parameters
		if($test_google_jquery !== false) { // Google's Script is there, so lets use it
			wp_deregister_script('jquery');
			wp_register_script('jquery', $google_jquery, array(), $jquery_version);
		}
		wp_enqueue_script('jquery');
				
		// Register and load BRNM scripts
		wp_register_script('basejs', BRNM_FRAME_INCLUDE_URI.'/js/base/base.js', array('jquery'), '2.1.0', true );
		wp_register_script('customjs', get_template_directory_uri() .'/lib/custom-js.php', array('jquery'), '1.0', 'all');
		
		wp_enqueue_script('basejs');
		wp_enqueue_script('customjs');
		
		// Load Comments Reply Script if needed
		if ( is_singular() && get_option('thread_comments')) wp_enqueue_script( 'comment-reply' );
		
	}    
	add_action('wp_enqueue_scripts', 'brnm_enqueue_scripts');
}


/* Conditionally Enqueue Scripts for IE browsers less than IE 9
-------------------------------------------------------- */
function brnm_enqueue_lt_ie9() {
	if( !brnm_is_IE() ) return;
    if( brnm_is_IE() < 9 ) {
	
		// HTML5Shim.js - Load CDN if available, local if not
		$cdn_version = 'https://html5shim.googlecode.com/svn/trunk/html5.js'; // the URL to check against
		$test_cdn_version = @fopen($cdn_version,'r'); // test parameters
		if($test_cdn_version !== false) { // CDN Script is there, so lets use it
			wp_register_script('html5shim', $cdn_version);
		} else {
			// CDN Not there, so let's go local
			wp_register_script('html5shim', BRNM_FRAME_URI.'/js/base/html5shim.js', array('jquery'));
		}
		wp_enqueue_script('html5shim');
	}
}
add_action( 'wp_enqueue_scripts', 'brnm_enqueue_lt_ie9' );


/* Add Google Fonts to admin, as desired -- Editor Stylesheet
 * @lastmodified brnm 2.5
/* @param $google_fonts => string, array
-------------------------------------------------------- */
// Add URL from the Google Font <link> method into the array below ( *** use https in URL )
// Adding too many can slow down the load time of the website
$admin_fonts = array(
	'https://fonts.googleapis.com/css?family=Lato:400,600,700,400italic,600italic,700italic',
	'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700italic'  // Remember, no comma at the end of the last one!
);
brnm_add_google_fonts($admin_fonts, 'admin');

function brnm_editor_styling() {
	// Bring in editor stylesheet
	add_editor_style(BRNM_FRAME_INCLUDE_URI.'/css/admin.css');
}
add_action('admin_enqueue_scripts', 'brnm_editor_styling', 9999);



/* Admin JS
 * @since brnm 2.5
-------------------------------------------------------- */
function brnm_admin_js() {
	// Register & load BRNM admin JS
	wp_register_script('adminjs', BRNM_FRAME_INCLUDE_URI.'/js/base/admin.js', array('jquery'), '2.5');
	wp_enqueue_script('adminjs');
}
add_action('admin_enqueue_scripts', 'brnm_admin_js');


/* Admin styling
-------------------------------------------------------- */
function brnm_load_admin_styles() {
	wp_register_style('admincss', BRNM_FRAME_INCLUDE_URI.'/css/admin.css', false, '2.1.1', 'all');
	wp_enqueue_style('admincss');
}
add_action('admin_enqueue_scripts', 'brnm_load_admin_styles');


/* Feature Media Areas (originally from theme-setup.php)
 * @lastmodified brnm 2.5.2
-------------------------------------------------------- */
// These functions are controlled by (1) the developer setup and
// (2) whether we're on a front or interior page, as coded in the header
function brnm_hero_scripts() {
	$chosen_stage = get_option('options_media_type');
	switch($chosen_stage):
			
		case 'layerslider':
			wp_register_script('lsgreenstock', BRNM_FRAME_INCLUDE_URI.'/js/layerslider/js/greensock.js', array('jquery'), '5.3.0', true);
			wp_register_script('lstransitions', BRNM_FRAME_INCLUDE_URI.'/js/layerslider/js/layerslider.transitions.js', array('lsgreenstock'), '5.3.0', true);
			wp_register_script('layersliderjs', BRNM_FRAME_INCLUDE_URI.'/js/layerslider/js/layerslider.kreaturamedia.jquery.js', array('lstransitions'), '5.3.0', true);
			wp_register_style('layerslidercss', BRNM_FRAME_INCLUDE_URI.'/js/layerslider/css/layerslider.css', array('themecss'), '5.3.0', 'all');
			
			if(is_front_page()) {
				wp_enqueue_script('lsgreenstock');
				wp_enqueue_script('lstransitions');
				wp_enqueue_script('layersliderjs');
				wp_enqueue_style('layerslidercss');
			}
		break;
		
		case 'owlcarousel':
			wp_register_script('owlcarouseljs', BRNM_FRAME_INCLUDE_URI.'/js/owl-carousel/owl.carousel.min.js', array('jquery'), '1.3.2', true);
			wp_register_style('ocbasecss', BRNM_FRAME_INCLUDE_URI.'/js/owl-carousel/owl.carousel.css', array('themecss'), '1.3.2', 'all');
			wp_register_style('octhemecss', BRNM_FRAME_INCLUDE_URI.'/js/owl-carousel/owl.theme.css', array('ocbasecss'), '1.3.2', 'all');
			wp_register_style('octransitionscss', BRNM_FRAME_INCLUDE_URI.'/js/owl-carousel/owl.transitions.css', array('octhemecss'), '1.3.2', 'all');
			
			if(!is_front_page()) {
				wp_enqueue_script('owlcarouseljs');
				wp_enqueue_style('ocbasecss');
				wp_enqueue_style('octhemecss');
				wp_enqueue_style('octhemecss');
			}

			add_action('wp_enqueue_scripts', 'brnm_display_owlcarousel');
		break;

		case 'mosaic':
		break;

	endswitch;

}
add_action('wp_enqueue_scripts', 'brnm_hero_scripts');
?>