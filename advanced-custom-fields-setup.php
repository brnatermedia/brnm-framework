<?php
/**
  * Advanced Custom Fields Setup
  *
  * Sets up Advanced Custom Fields Plugin
  * Designed to set up multiple Options Pages and Widget Areas page
  * @since brnm-framework 1.3
  * @lastmodified brnm-framework 2.6.4
 **/


class BRNM_ACF_SETUP {

	/* Register acf options pages
	 * @lastmodified brnm 2.6.4
	 *
	 * All we're doing here is giving each options page
	 * a name and registering it.
	 * @param $custom_pages => from functions-custom.php
	 * @param $options_pages => array
	 *
	 * @updated 2.6.4 function renamed from brnm_register_options_pages
	 *	to register_options_pages().
	 *
	 * @updated 2.6.4 developer page setup updated to automatically
	 *	show correct page once super user is set.
	-------------------------------------------------------- */
	// function called from functions.php

	//var $custom_pages = array();

	public static function register_options_pages($custom_pages) {
		if(function_exists('acf_add_options_sub_page')) {

			$custom_options_page = (brnm_session('options_clientname') != '' ? brnm_session('options_clientname') : 'Custom Options');
			$options_pages = array('General', $custom_options_page);
			$all_pages = array_merge($options_pages, $custom_pages);

			/**
			 * Setup the Developer Page
			 **/
			// initially show developer page universally when no user has been set as the super user
			if(!brnm_session('options_dev_super_admins')) {
				array_push($all_pages, 'Developer');
			}
			// otherwise show developer page only when the super user is logged in
			elseif(BRNM_FRAMEWORK::dev_mode()) {
				array_push($all_pages, 'Developer');
			}

			foreach( $all_pages as $page ) {
				acf_add_options_sub_page( $page );
			}
		}
	}

}