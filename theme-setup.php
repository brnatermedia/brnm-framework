<?php
/**
  * Theme Setup
  *
  * Activations to customize the theme per client
  * as well as further tailor the installation
  * @since brnm-framework 2.1
  * @lastmodified brnm-framework 2.6.2
 **/


global $theme_preset;
$theme_preset = brnm_session('options_dev_theme_presets');


/* White Label Settings
 * @since brnm-framework 2.4
-------------------------------------------------------- */
global $agency_name, $agency_url, $agency_support, $agency_title;
if(brnm_session('options_dev_white_label') == true) {
	$agency_name = brnm_session('options_dev_wl_agency_name'); // name of agency
	$agency_url = esc_url(brnm_session('options_dev_wl_agency_link')); // home page url
	$agency_support = esc_url(brnm_session('dev_wl_agency_support')); // contact page url
	$agency_title = brnm_session('options_dev_wl_agency_name'); // label for 'a' element title attribute
} else {
	// otherwise (and by default), show BRNM credits
	$agency_name = 'BRNater Media';
	$agency_url = 'http://brnatermedia.com';
	$agency_support = 'http://brnatermedia.com/contact-us/';
	$agency_title = 'Custom Web Development & Marketing';
}


/* Logo Custom image sizes
 * @since brnm-framework 2.4
-------------------------------------------------------- */
add_image_size( 'logo', 320, 80 );
add_image_size( 'login-background', 400, 290 );


/* Admin footer text
 * @since brnm-framework 2.4
 * @lastmodified brnm-framework 2.4
-------------------------------------------------------- */
function brnm_footer_text(){
	global $agency_name, $agency_url, $agency_support, $agency_title;

	$text = '<strong style="color: #000 !important; font-size: 1.1em;">'. wp_get_theme().'</strong> is a custom theme by <a rel="nofollow" href="'.$agency_url.'" target="_blank" title="'.$agency_title.'">'.$agency_name.'</a>, proudly powered on <a href="http://www.wordpress.org" target="_blank" title="Wordpress">Wordpress</a>.<br />';
	$text.= 'Do you have a question? <a target="_blank" href="'.$agency_support.'">Ask us!</a>';

	echo $text;
}
add_filter('admin_footer_text', 'brnm_footer_text');


/* RSS Feed Links for Posts and Comments
 * @since brnm-framework 2.4
 * @lastmodified brnm-framework 2.4
-------------------------------------------------------- */
add_theme_support('automatic-feed-links');


/* Blog Post formats
 * @since brnm 2.4
 * @lastmodified brnm 2.4
-------------------------------------------------------- */
// show the following post formats on all views except "Website (only)"
if(function_exists('has_sub_field') && $theme_preset != 'site') {
	$brnm_post_formats = array(
		//'aside',
		'audio',
		//'image',
		'video',
		//'gallery',
		//'chat',
		//'status',
		//'link',
		'quote'
	);
	add_theme_support('post-formats', $brnm_post_formats);
}


/* ACF Display Formats
 * @since brnm-framework 2.4
-------------------------------------------------------- */
if(function_exists('has_sub_field')) {
	function brnm_format_display() {
		global $theme_preset;
		if($theme_preset == 'blog' || $theme_preset == 'blogsite' || $theme_preset == 'full') {
			require_once( plugin_dir_path( __FILE__ ) .'/acf/acf-format-options-audio.php');
			require_once( plugin_dir_path( __FILE__ ) .'/acf/acf-format-options-quote.php');
			require_once( plugin_dir_path( __FILE__ ) .'/acf/acf-format-options-video.php');
		}
	}
	brnm_format_display();
}

/* ACF Basic & Custom Option pages cleaning
 * @lastmodified brnm-framework 2.5.4
 *
 * $label bool|string -- label of the item being displayed
 * Note :: DO NOT use these functions directly
 *	Use brnm_the_office($item) instead
-------------------------------------------------------- */
function brnm_main_phone($label = '', $icon = '') {
	if(brnm_session('options_office_phone_main')) {
		$stripoffice = preg_replace("/[A-z:() =+-]/", "", brnm_session('options_office_phone_main'));
		if($label != '') { $label = ( $label == 'true' ? $label = '<i class="inside-ic">Office:</i> ' : $label = '<i class="inside-ic">'. $label .':</i> '); }
		if($icon == 'true') { $icon_open = '<span class="icon-phone ic-show">'; $icon_close = '</span>'; } else { $icon_open = $icon_close = ''; }
		return $icon_open . $label . $icon_close .'<a href="tel:'. $stripoffice .'">'. brnm_session('options_office_phone_main') .'</a>';
	} else {
		return show_error('Add your main phone number on the Options page');
	}
}

function brnm_alt_phone($label = '', $icon = '') {
	if(brnm_session('options_office_phone_alt')) {
		$stripalternate = preg_replace("/[A-z:() =+-]/", "", brnm_session('options_office_phone_alt'));
		if($label != '') { $label = ( $label == 'true' ? $label = '<i class="inside-ic">Alternate:</i> ' : $label = '<i class="inside-ic">'. $label.':</i> '); }
		if($icon == 'true') { $icon_open = '<span class="icon-phone ic-show">'; $icon_close = '</span>'; } else { $icon_open = $icon_close = ''; }
		return $icon_open . $label . $icon_close .'<a href="tel:'. $stripalternate .'">'. brnm_session('options_office_phone_alt') .'</a>';
	} else {
		return show_error('Add your alternate phone number on the Options page');
	}
}

function brnm_fax_phone($label = '', $icon = '') {
	if(brnm_session('options_office_phone_fax')) {
		$stripfax = preg_replace("/[A-z:() =+-]/", "", brnm_session('options_office_phone_fax'));
		if($label != '') { $label = ( $label == 'true' ? $label = '<i class="inside-ic">Fax:</i> ' : $label = '<i class="inside-ic">'. $label.':</i> '); }
		if($icon == 'true') { $icon_open = '<span class="icon-phone ic-show">'; $icon_close = '</span>'; } else { $icon_open = $icon_close = ''; }
		return $icon_open . $label . $icon_close .'<a href="tel:'. $stripfax .'">'. brnm_session('options_office_phone_fax') .'</a>';
	} else {
		return show_error('Add your fax phone number on the Options page');
	}
}

function brnm_email($label = '', $icon = '') {
	if(brnm_session('options_office_email')) {
		if($label != '') { $label = ( $label == 'true' ? $label = '<i class="inside-ic">Email:</i> ' : $label = '<i class="inside-ic">'. $label.':</i> '); }
		if($icon == 'true') { $icon_open = '<span class="icon-envelope ic-show">'; $icon_close = '</span>'; } else { $icon_open = $icon_close = ''; }
		return $icon_open . $label . $icon_close .'<a href="mailto:'. sanitize_email(brnm_session('options_office_email')) .'">'. sanitize_email(brnm_session('options_office_email')) .'</a>';
	} else {
		return show_error('Add your email on the Options page');
	}
}

function brnm_address($label = '', $icon = '') {
	if(brnm_session('options_office_address')) {
		if($label != '') { $label = ( $label == 'true' ? $label = '<i class="inside-ic">Address:</i> ' : $label = '<i class="inside-ic">'. $label.':</i> '); }
		if($icon == 'true') { $icon_open = '<span class="icon-location ic-show">'; $icon_close = '</span>'; } else { $icon_open = $icon_close = ''; }
		return $icon_open . $label . $icon_close .'<div class="office-address">'. apply_filters('the_content', brnm_session('options_office_address')) .'</div>';
	} else {
		return show_error('Add your address on the Options page');
	}
}

function brnm_hours($label = false) {
	if(brnm_session('options_office_hours')) {
		$output .= '<dl class="office-hours">';

		if($label != '') { $label = ( $label == 'true' ? $label = '<i class="inside-ic">Hours of Operation:</i> ' : $label = '<i class="inside-ic">' .$label.':</i> '); }
		if($icon == 'true') { $icon_open = '<span class="icon-office ic-show">'; $icon_close = '</span>'; } else { $icon_open = $icon_close = ''; }

		$output .= $icon_open . $label . $icon_close;
		$hours = brnm_session('options_office_hours');
		for($c = 0; $c < $hours; $c ++) :
			$output .= '<dt>'. brnm_session('options_office_hours_'.$c.'_office_day') .'<span class="hours-divider">:</span></dt><dd>'. brnm_session('options_office_hours_'.$c.'_office_time') .'</dd>';
		endfor;
		$output .= '</dl>';

		return $output;

	} else {
		return show_error('Add your office hours on the Options page');
	}
}

/* Shortcut function for displaying office fields
 * @since brnm-framework 2.5
 * @lastmodified brnm-framework 2.5.4
 *
 * Note :: DO NOT use these functions directly
 *	Use brnm_the_office($item) instead
-------------------------------------------------------- */
function brnm_office_fields_switch($field, $label = '', $icon = '') {
	switch($field) {
		case 'main-phone' : $output .= brnm_main_phone($label, $icon); break;
		case 'alternate-phone': $output .= brnm_alt_phone($label, $icon); break;
		case 'fax-phone': $output .= brnm_fax_phone($label, $icon); break;
		case 'email': $output .= brnm_email($label, $icon); break;
		case 'address': $output .= brnm_address($label, $icon); break;
		case 'office-hours': $output .= brnm_hours($label, $icon); break;
		default: $output .= show_error('"'. $field .'"' .' is not a valid label.'); break;
	}

	return $output;
}


/* Widgets based on Theme Preset
 * @since brnm-framework 2.4
-------------------------------------------------------- */
if(function_exists('has_sub_field')) {
	function brnm_theme_widget_presets() {
		global $wp_meta_boxes, $theme_preset;

		switch($theme_preset) {
			case 'blog' : // Blogger dashboard setup
				unregister_widget('WP_Widget_Pages');
				break;

			case 'site' : // Website admin dashboard setup
				unregister_widget('WP_Widget_Calendar');
				unregister_widget('WP_Widget_Archives');
				unregister_widget('WP_Widget_Categories');
				unregister_widget('WP_Widget_Recent_Posts');
				unregister_widget('WP_Widget_Recent_Comments');
				unregister_widget('WP_Widget_RSS');
				unregister_widget('WP_Widget_Tag_Cloud');
				break;

			case 'blogsite' : // Website + admin dashboard setup
				break;

			case 'full' : // Developer dashboard setup
				break;

			default :// Don't unset anything
				break;
		}
	}
	add_action('widgets_init', 'brnm_theme_widget_presets', 11);
}


/* Dashboard items based on Theme Preset
 * @since brnm-framework 2.4
-------------------------------------------------------- */
if(function_exists('has_sub_field')) {
	function brnm_theme_dashboard_presets() {
		global $wp_meta_boxes, $theme_preset;

		switch($theme_preset) {
			case 'blog' : // Blogger dashboard setup
				unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress News
				break;

			case 'site' : // Website admin dashboard setup
				unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress News
				unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Draft
				unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts
				unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments
				break;

			case 'blogsite' : // Website + admin dashboard setup
				unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress News
				break;

			case 'full' : // Developer dashboard setup
				break;

			default :// Don't unset anything
				break;
		}
	}
	add_action('wp_dashboard_setup', 'brnm_theme_dashboard_presets');
}


/* Default remove these Admin Menu items
 * @since brnm-framework 2.4
-------------------------------------------------------- */
if(!function_exists('brnm_unneeded_admin_menus')) {
	function brnm_unneeded_admin_menus() {
		remove_submenu_page('themes.php', 'theme-editor.php'); // code editor
		remove_submenu_page('plugins.php', 'plugin-editor.php'); // plugin code editor
		remove_submenu_page('themes.php', 'customize.php?return=%2Fwp-admin%2Fthemes.php'); // remove customize option
		remove_submenu_page('themes.php', 'customize.php?return=%2Fwp-admin%2Findex.php'); // also removes customize option
	}
	add_action('admin_menu', 'brnm_unneeded_admin_menus', 102);
}


/* Remove additional items based on theme setup
 * @since brnm-framework 2.4
 * @lastmodified brnm-framework 2.6.2
-------------------------------------------------------- */
if(function_exists('has_sub_field')) {
	function brnm_developer_menu_presets() {
		global $theme_preset;

		// remove these pages no matter the setup as long as debug mode is off.
		function brnm_remove_from_all_presets() {
			global $submenu;
			unset($submenu['themes.php'][6]); // customize.php

			remove_menu_page('edit.php?post_type=acf', 999); //acf custom fields
			remove_submenu_page('tools.php', 'wp-db-backup'); // wp backup plugin
			remove_submenu_page('options-general.php', 'rvg_odb_admin'); //optimize db general settings
			remove_submenu_page('tools.php', 'rvg-optimize-db.php'); //optimize db core
			remove_submenu_page('tools.php', 'force-regenerate-thumbnails'); // force regenerate thumbnails
			remove_submenu_page('tools.php', 'edit.php?post_type=redirect_rule'); // safe redirect manager
			remove_submenu_page('options-general.php', 'options-permalink.php'); // permalink settings
		}

		// remove these pages for all except blog setup
		if(!BRNM_FRAMEWORK::debug_mode() && $theme_preset == 'blog') {
			brnm_remove_from_all_presets();
			remove_menu_page('edit.php?post_type=page'); // Pages
			remove_submenu_page('options-general.php', 'options-reading.php'); // reading settings
		}
		// remove these pages for all except site setup
		elseif(!BRNM_FRAMEWORK::debug_mode() && $theme_preset == 'site') {
			brnm_remove_from_all_presets();
			remove_menu_page('edit.php'); // Posts
			remove_menu_page('edit-comments.php'); // Comments
			remove_submenu_page('options-general.php', 'options-writing.php'); // writing settings
			remove_submenu_page('options-general.php', 'options-reading.php'); // reading settings
			remove_submenu_page('options-general.php', 'options-discussion.php'); // post comment settings
		}
		// remove these pages for all except blog site setup
		elseif(!BRNM_FRAMEWORK::debug_mode() && $theme_preset == 'blogsite') {
			brnm_remove_from_all_presets();
		}

	}
	add_action('admin_menu', 'brnm_developer_menu_presets', 9999);
}


/* Remove unnecessary meta boxes from Post and Page Screens
 * @since brnm-framework 2.4
-------------------------------------------------------- */
if( !function_exists('brnm_remove_meta_boxes')) {
	function brnm_remove_meta_boxes() {
		/* These remove meta boxes from POSTS */
		remove_post_type_support('post','excerpt'); //Remove Excerpt Support
		remove_post_type_support('post','custom-fields'); //Remove custom-fields Support

		/* These remove meta boxes from PAGES */
		remove_post_type_support('page', 'comments'); //Remove Comments Support
		remove_post_type_support('page', 'trackbacks'); //Remove trackbacks Support
		remove_post_type_support('page', 'custom-fields'); //Remove custom-fields Support
	}
	add_action('admin_init','brnm_remove_meta_boxes');
}


/* Sidebars: Setup initial widget areas & addt'l sidebars
 * @since brnm-framework 2.4
 * @lastmodified brnm-framework 2.4
-------------------------------------------------------- */
if(!function_exists('brnm_get_widget_areas')) {
	function brnm_get_widget_areas($areas = null) {

		//Setup initial sidebars
		global $theme_preset;
		if($areas) {
			$brnm_sidebars = array_merge($areas, array('Default Sidebar'));
		} else {
			$brnm_sidebars = array('Default Sidebar');
		}

		switch($theme_preset) {
			case 'blog' : // Blogger dashboard setup
				array_push($brnm_sidebars, 'Blog Sidebar');
				break;

			case 'site' : // Website admin dashboard setup
				break;

			case 'blogsite' : // Website + admin dashboard setup
				array_push($brnm_sidebars, 'Blog Sidebar');
				break;

			case 'full' : // Developer dashboard setup
				array_push($brnm_sidebars, 'Blog Sidebar');
				break;

			default : // Don't unset anything
				break;
		}

		return $brnm_sidebars;
	}
}


/* Sidebars: Create widget areas based on the sidebars entered
 * @since brnm-framework 2.4
 * @lastmodified brnm-framework 2.4
-------------------------------------------------------- */
// function called from functions.php
function brnm_build_widgets($areas = null) {

$widget_areas = brnm_get_widget_areas($areas);
foreach($widget_areas as $widget) {

	register_sidebar(
		array (
			'name' => $widget,
			'id' =>	'widget-' . str_replace(' ', '-', strtolower($widget)),
			'before_widget' => '<div id="%1$s" class="widget sidebar-'.str_replace(' ', '-', strtolower($widget)).' %2$s cf">',
			'before_title' => '<h4 class="widget-title"><span>',
			'after_title' => '</span></h4><div class="widget-content cf">',
			'after_widget' => '</div><!-- .widget-content --></div><!-- .widget -->',
			)
		);
	}

}