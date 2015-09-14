<?php
/**
  * Advanced Custom Fields Setup
  *
  * Sets up Advanced Custom Fields Plugin
  * Designed to set up multiple Options Pages and Widget Areas page
  * @since brnm 1.3
  * @lastmodified brnm 2.5
 **/


/* Register acf options pages
 * @lastmodified brnm 2.5
 * @param $custom_pages => from functions-custom.php
 * @param $options_pages => array
-------------------------------------------------------- */
// function called from functions-custom.php
function brnm_register_options_pages($custom_pages) {
	if(function_exists('acf_add_options_sub_page')) {
		global $custom_options_page;
		
		$custom_options_page = (brnm_session('options_clientname') != '' ? brnm_session('options_clientname') : 'Custom Options');
		$options_pages = array('General', $custom_options_page);
		$all_pages = array_merge($options_pages, $custom_pages);
		
		// Comment-uncomment below after setup/install.
		array_push($all_pages, 'Developer');
		//if(dev_mode()) { array_push($all_pages, 'Developer'); }
		
		foreach( $all_pages as $page ) {
			acf_add_options_sub_page( $page ); 
		}
	}
}
?>