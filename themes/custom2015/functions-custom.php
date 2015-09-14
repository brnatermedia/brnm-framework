<?php
/**
  * Helper Functions
  *
  * General Functions to help the Framework
  * @Package custom2015
  * @lastmodified brnm 2.5
 **/


/* Include Custom post types
 * @since brnm 2.3
 * @lastmodified brnm 2.5
-------------------------------------------------------- */
//include_once('lib/cpt-name.php');
//include_once('lib/cpt-name.php');


/* Update the content width
 * @since brnm 2.3
-------------------------------------------------------- */
//$content_width = 640;


/* Post Thumbnails
 * @since brnm 2.4
-------------------------------------------------------- */
// Control which post types can support this. Add any specific custom post types you want to allow 
// ( remember commas & no comma on last )
global $brnm_thumbnail_support;
if(!$brnm_thumbnail_support ) {
	$brnm_thumbnail_support = array( 
		'post', 
		'page'
	);
}
add_theme_support('post-thumbnails', $brnm_thumbnail_support);


/* Add Google Fonts, as desired
 * @lastmodified brnm 2.5
/* @param $google_fonts => string, array
-------------------------------------------------------- */
// Add URL from the Google Font <link> method into the array below ( *** use https in URL )
// Adding too many can slow down the load time of the website
$google_fonts = "https://fonts.googleapis.com/css?family=Open+Sans:400,700|Oswald:400,700";  // Remember, no comma at the end of the last one!
brnm_add_google_fonts($google_fonts);


/* More acf options pages
 * @since brnm 2.5
-------------------------------------------------------- */
$custom_pages = array(); // Add page titles as strings to this array
brnm_register_options_pages($custom_pages);


/* More widget areas
 * @since brnm 2.5
 * @param $more_widget_areas => array
-------------------------------------------------------- */
$more_widget_areas = array(); // Add widget area names as strings to this array
brnm_build_widgets($more_widget_areas);


/* Register desired menus
-------------------------------------------------------- */
function brnm_register_menus() {
	register_nav_menus( array(
		'primary'	=> 'Primary Menu',
		'utility'	=> 'Utility Menu',
		'footer'	=> 'Footer Menu',
	) );
}
add_action( 'init', 'brnm_register_menus' );	


/* Custom image sizes
-------------------------------------------------------- */
add_image_size( 'logo-front', 1000, 190, true );
add_image_size( 'layerslider', 1000, 390, true );
//add_image_size( 'owlcarousel', 250, 190, true );
//add_image_size( 'header-image', 1000, 190, true );


/* Register additional sidebars
-------------------------------------------------------- */
// in development. create new array w/new variable name and push those items
// to the original array in lib/sidebars.php, then run those functions to register
// any needed sidebars. Step 2: enable theme file sidebar.php to take a chosen sidebar
// and add a switch for a meta box in the edit page that shows up when new sidebars are added here.
/*
global $brnm_default_sidebars;
$brnm_default_sidebars = array(); // add custom sidebar areas here
brnm_create_widget_areas(); // do not delete
*/


/* Change Excerpt Length and ending
 *
 * @param $length - int => the original word count
 * @param $more - string => content that proceeds the excerpt
-------------------------------------------------------- */
function brnm_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'brnm_excerpt_length', 999 );

function brnm_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'brnm_excerpt_more');


/* Entry meta
 * @since brnm 2.5.2
-------------------------------------------------------- */
function brnm_print_meta() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s" pubdate>%3$s</time></a> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span>', 'redcm' ),
		get_permalink(),
		get_the_date( 'c' ),
		get_the_date(),
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'redcm' ), get_the_author() ),
		get_the_author()
	);
}

?>