<?php 
/**
  * Theme Setup
  * 
  * Activations to customize the theme per client
  * as well as further tailor the installation
  * @since brnatermedia 2.1
  * @lastmodified brnm 2.4.4
 **/


global $theme_preset;
$theme_preset = get_option('options_dev_theme_presets');


/* White Label Settings
 * @since brnatermedia 2.4
-------------------------------------------------------- */
global $agency_name, $agency_url, $agency_support, $agency_title;
if(get_option('options_dev_white_label') == true) {
	$agency_name = get_option('options_dev_wl_agency_name'); // name of agency
	$agency_url = esc_url(get_option('options_dev_wl_agency_link')); // home page url
	$agency_support = esc_url(get_option('dev_wl_agency_support')); // contact page url
	$agency_title = get_option('options_dev_wl_agency_name'); // label for 'a' element title attribute
} else {
	// otherwise (and by default), show BRNM credits
	$agency_name = 'BRNater Media';
	$agency_url = 'http://brnatermedia.com';
	$agency_support = 'http://brnatermedia.com/contact-us/';	
	$agency_title = 'Custom Web Development & Marketing';
}


/* Logo Custom image sizes
-------------------------------------------------------- */
add_image_size( 'logo', 320, 80 );
add_image_size( 'login-background', 400, 290 );


/* Admin footer text
 * @lastmodified brnatermedia 2.4
-------------------------------------------------------- */
function brnm_footer_text(){
	global $agency_name, $agency_url, $agency_support;
	
	$text = '<strong style="color: #000 !important; font-size: 1.1em;">'. wp_get_theme().'</strong> is a custom theme by <a rel="nofollow" href="'.$agency_url.'" target="_blank" title="'.$agency_title.'">'.$agency_name.'</a>, proudly powered on <a href="http://www.wordpress.org" target="_blank" title="Wordpress">Wordpress</a>.<br />';
	$text.= 'Do you have a question? <a target="_blank" href="'.$agency_support.'">Ask us!</a>';
	
	echo $text;
}
add_filter('admin_footer_text', 'brnm_footer_text');


/* RSS Feed Links for Posts and Comments
 * @lastmodified brnatermedia 2.4
-------------------------------------------------------- */
add_theme_support('automatic-feed-links');


/* Blog Post formats
 * @lastmodified brnatermedia 2.4
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
-------------------------------------------------------- */
if(function_exists('has_sub_field')) {
	function brnm_format_display() {
		global $theme_preset;
		if($theme_preset == 'blog' || $theme_preset == 'blogsite' || $theme_preset == 'full') {
			require_once(BRNM_FRAME.'acf/acf-format-options-audio.php');
			require_once(BRNM_FRAME.'acf/acf-format-options-quote.php');
			require_once(BRNM_FRAME.'acf/acf-format-options-video.php');
		}
	}
	brnm_format_display();
}


/* Widgets based on Theme Preset
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
 * @lastmodified brnatermedia 2.4.4
-------------------------------------------------------- */
if(function_exists('has_sub_field')) {
	function brnm_developer_menu_presets() {
		global $theme_preset;

		// remove these pages no matter the setup as long as debug mode is off.
		function brnm_remove_from_all_presets() {
			remove_menu_page('edit.php?post_type=acf', 999); //acf custom fields			
			remove_submenu_page('tools.php', 'wp-db-backup'); // wp backup plugin
			remove_submenu_page('options-general.php', 'rvg_odb_admin'); //optimize db general settings
			remove_submenu_page('tools.php', 'rvg-optimize-db.php'); //optimize db core
			remove_submenu_page('tools.php', 'force-regenerate-thumbnails'); // force regenerate thumbnails
			remove_submenu_page('tools.php', 'edit.php?post_type=redirect_rule'); // safe redirect manager
			remove_submenu_page('options-general.php', 'options-permalink.php'); // permalink settings
		}

		// remove these pages for all except blog setup
		if(!debug_mode() && $theme_preset == 'blog') {
			brnm_remove_from_all_presets();
			remove_menu_page('edit.php?post_type=page'); // Pages
			remove_submenu_page('options-general.php', 'options-reading.php'); // reading settings
		}
		// remove these pages for all except site setup
		elseif(!debug_mode() && $theme_preset == 'site') {
			brnm_remove_from_all_presets();
			remove_menu_page('edit.php'); // Posts
			remove_menu_page('edit-comments.php'); // Comments
			remove_submenu_page('options-general.php', 'options-writing.php'); // writing settings
			remove_submenu_page('options-general.php', 'options-reading.php'); // reading settings
			remove_submenu_page('options-general.php', 'options-discussion.php'); // post comment settings
		}
		// remove these pages for all except blog site setup
		elseif(!debug_mode() && $theme_preset == 'blogsite') {
			brnm_remove_from_all_presets();
		}
		
	}
	add_action('admin_menu', 'brnm_developer_menu_presets', 9999);
}


/* Remove unnecessary meta boxes from Post and Page Screens
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
 * @lastmodified brnatermedia 2.4
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
			
			default :// Don't unset anything
				break;
		}
		
		return $brnm_sidebars;	
	}
}


/* Sidebars: Create widget areas based on the sidebars entered
 * @lastmodified brnatermedia 2.4
-------------------------------------------------------- */
// function called from functions-custom.php
if(!function_exists('brnm_build_widgets')) :
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
				'after_widget' => '</div></div><!-- #%1$s -->',
				)
			);
		}
		
	} 
	//brnm_build_widgets(); // function called from functions-custom.php
endif;

?>