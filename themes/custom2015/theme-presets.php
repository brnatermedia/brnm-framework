<?php 
/**
  * Theme Setup
  *
  * Activations to customize the theme
  * per client needs and specs
  * @package custom2014
  * @since brnatermedia 2.2
 **/


add_action('init', 'brnm_theme_setup');
function brnm_theme_setup() {
	/* Sidebar widgets
	-------------------------------------------------------- */
	//unregister_widget('WP_Widget_Pages');
	//unregister_widget('WP_Widget_Calendar');
	//unregister_widget('WP_Widget_Archives');
	//unregister_widget('WP_Widget_Links');
	//unregister_widget('WP_Widget_Meta');
	//unregister_widget('WP_Widget_Search');
	//unregister_widget('WP_Widget_Text');
	//unregister_widget('WP_Widget_Categories');
	//unregister_widget('WP_Widget_Recent_Posts');
	//unregister_widget('WP_Widget_Recent_Comments');
	//unregister_widget('WP_Widget_RSS');
	//unregister_widget('WP_Widget_Tag_Cloud');
	//unregister_widget('WP_Nav_Menu_Widget');
	//unregister_widget('Twenty_Eleven_Ephemera_Widget');
	
	
	/* Dashboard widgets
	-------------------------------------------------------- */
	global $wp_meta_boxes;
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Blog widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Right Now widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Press widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments
	
	
	/* Pages and subpages
	-------------------------------------------------------- */
	//remove_menu_page('index.php'); // Dashboard
	//remove_menu_page('edit.php'); // Posts
	//remove_menu_page('upload.php'); // Media
	//remove_menu_page('edit.php?post_type=page'); // Pages
	//remove_menu_page('edit-comments.php'); // Comments	
	//remove_menu_page('themes.php'); // Appearance
	//remove_menu_page('plugins.php'); // Plugins
	//remove_menu_page('users.php'); // Users
	//remove_menu_page('tools.php'); // Tools
	//remove_menu_page('options-general.php'); // Settings
	//remove_submenu_page('index.php', 'update-core.php'); // Update wordpress
	//remove_submenu_page('edit.php', 'post-new.php'); // add new post
	//remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category'); // post categories
	//remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); // post tags
	//remove_submenu_page('upload.php', 'upload.php'); // media library
	//remove_submenu_page('upload.php', 'media-new.php'); // add new media library item
	//remove_submenu_page('edit.php?post_type=page', 'edit.php?post_type=page'); // edit pages
	//remove_submenu_page('edit.php?post_type=page', 'post-new.php?post_type=page'); // add new page
	//remove_submenu_page('themes.php', 'themes.php'); // select theme
	//remove_submenu_page('themes.php', 'widgets.php'); // widgets
	//remove_submenu_page('themes.php', 'nav-menus.php'); // navigation menus
	//remove_submenu_page('themes.php', 'theme-editor.php'); // code editor
	//remove_submenu_page('plugins.php', 'plugins.php'); // plugins list
	//remove_submenu_page('plugins.php', 'plugin-install.php'); // plugin installer
	//remove_submenu_page('plugins.php', 'plugin-editor.php'); // plugin code editor
	//remove_submenu_page('users.php', 'users.php'); // users list
	//remove_submenu_page('users.php', 'user-new.php'); // add new user
	//remove_submenu_page('users.php', 'profile.php'); // view logged in user profile
	//remove_submenu_page('tools.php', 'tools.php'); // available tools
	//emove_submenu_page('tools.php', 'import.php'); // import wordpress post data
	//remove_submenu_page('tools.php', 'export.php'); // export wordpress post data
	//remove_submenu_page('options-general.php', 'options-general.php'); // general options
	//remove_submenu_page('options-general.php', 'options-writing.php'); // writing settings
	//remove_submenu_page('options-general.php', 'options-reading.php'); // post reading settings
	//remove_submenu_page('options-general.php', 'options-discussion.php'); // post comment settings
	//remove_submenu_page('options-general.php', 'options-privacy.php'); // privacy options
	//remove_submenu_page('options-general.php', 'options-media.php'); // default media display options
	//remove_submenu_page('options-general.php', 'options-permalink.php'); // permalink settings
	
	
	/* Post fields to be removed from posts and pages
	-------------------------------------------------------- */
	/* --- POSTS --- */
	//remove_post_type_support('post', 'excerpt'); //Remove Excerpt Support
	//remove_post_type_support('post', 'custom-fields'); //Remove custom-fields Support
	//remove_post_type_support('post', 'author'); //Remove Author Support
	//remove_post_type_support('post', 'revisions'); //Remove Revision Support
	//remove_post_type_support('post', 'comments'); //Remove Comments Support
	//remove_post_type_support('post', 'trackbacks'); //Remove trackbacks Support
	//remove_post_type_support('post', 'editor'); //Remove Editor Support
	//remove_post_type_support('post', 'title'); //Remove Title Support
	
	/* --- PAGES --- */
	//remove_post_type_support('page', 'comments'); //Remove Comments Support
	//remove_post_type_support('page', 'trackbacks'); //Remove trackbacks Support
	//remove_post_type_support('page', 'custom-fields'); //Remove custom-fields Support
	//remove_post_type_support('page', 'revisions'); //Remove Revision Support
	//remove_post_type_support('page', 'author'); //Remove Author Support
}