<?php
/**
  * Login Functions
  *
  * These functions take place on the admin
  * login page and are used to tailor the admin
  * for the client
  * @since brnm-framework 2.2
  * @lastmodified brnm-framework 2.3
 **/


/* Login Logo
 * @since brnm-framework 2.2
-------------------------------------------------------- */
function brnm_login_logo_bg() {
	$logo = wp_get_attachment_image_src(brnm_session('options_login_logo'), 'logo');
	$bg = null;

	$style = '<style type="text/css">';
	if($logo) {
		$style.= '.login h1 a { background: url('.$logo[0].') no-repeat bottom center !important; margin-bottom: 10px; background-size: auto; width: 100%; }';
	}
	if(brnm_session('options_login_bg_type') == 'color') {
		$bg = brnm_session('options_login_color');
		$style.= 'body.login { background: '.$bg.'}';
	} else {
		$bg = wp_get_attachment_image_src(brnm_session('options_login_image'), 'login-background');
		$bg_position = str_replace('_', ' ', brnm_session('options_login_image_position'));
		$style.= 'body.login { background: url('.$bg[0].') no-repeat '.$bg_position.'; background-size: auto; }';
	}

	$style.= '</style>';

	echo $style;
}
add_action('login_head', 'brnm_login_logo_bg', 30);


/* Login Background
 * @since brnm-framework 2.2
-------------------------------------------------------- */
function brnm_login_bg() {

}
add_action('login_head', 'brnm_login_bg');


/* Dashboard Logo
 * @since brnm-framework 2.4.4
-------------------------------------------------------- */
add_action('admin_head', 'brnm_dashboard_logo');
function brnm_dashboard_logo() {
	global $current_screen;
	if( isset( $current_screen ) && ( $current_screen->id == 'dashboard' ) && brnm_session('options_login_logo') ):

		$logo = wp_get_attachment_image_src(brnm_session('options_login_logo'), 'logo');

		$paddingL = $logo[1] + 25;
		$paddingVertical = ($logo[2] / 2);
		echo '<style type="text/css">
			.wrap h2 { position: relative; line-height: 1em; background: transparent url('. $logo[0] .') no-repeat left center; height:'. $logo[2].'px; }
			.wrap h2 span { display: inline-block; line-height: 1em; position: absolute; left: '. $paddingL .'px; top: 50%; margin-top: -11.5px; }
			</style>';

		echo '<script type="text/javascript">
			jQuery(document).ready(function($) {
			$(".wrap h2").wrapInner("<span />");
			});
			</script>';
	endif;
}
