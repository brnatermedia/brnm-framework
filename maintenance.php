<?php
/**
  * Maintenance Message & Redirects
  *
  * Displays maintenance messages and options based on items
  * selected in the Developer options.
  * @compatiblity PHP v5.4
  *
  * @since brnm-framework 2.6
  * @lastmodified brnm-framework 2.6.4
 **/


$maintenance_status = brnm_session('options_dev_maintenance');


/* Show notice @page top & allow site
 * @since brnm-framework 2.6
 * @lastmodified brnm-framework 2.6.4
 *
 * @update 2.6.4 set function backwards compaitble with
 *	PHP 5.2
-------------------------------------------------------- */
if($maintenance_status == 'maintenance_msg' && brnm_session('options_dev_debug_mode') == 'on') {
	add_action('body_open', 'brnm_maintenance_banner', 99);
	function brnm_maintenance_banner() {
		echo '<div id="maintenance">'. brnm_session('options_dev_maintenance_banner_msg') .'</div><!-- #maintenance -->';
	}
}


/* Redirect to new url
 * @since brnm-framework 2.6
 * @lastmodified brnm-framework 2.6.4
 *
 * @update 2.6.4 set function backwards compaitble with
 *	PHP 5.2
-------------------------------------------------------- */
if($maintenance_status == 'redirect' && brnm_session('options_dev_debug_mode') == 'on') {
	if(!debug_mode()) {
		header('location: '. esc_url(brnm_session('options_dev_maintenance_redirect')));
		exit;
	} else {
		add_action('body_open', 'brnm_maintenance_redirect', 99);
		function brnm_maintenance_redirect() {
			echo '<div id="maintenance">Maintenance Enabled: REDIRECT</div><!-- #maintenance -->';
		}
	}
}


/* Show maintenance page
 * @since brnm-framework 2.6
 * @lastmodified brnm-framework 2.6.4
 *
 * @update 2.6.4 set function backwards compaitble with
 *	PHP 5.2
-------------------------------------------------------- */
if($maintenance_status == 'maintenance_pg' && brnm_session('options_dev_debug_mode') == 'on') {
	session_unset();

	remove_filter('the_content', 'brnm_sharing_buttons');

	if(!BRNM_FRAMEWORK::debug_mode()) {
		$maintenance_message = (
			!brnm_session('options_dev_maintenance_page_msg') ?
			brnm_session('blogname') .' is currently unavailable.<br />We will be back soon!.' :
			brnm_session('options_dev_maintenance_page_msg')
		);

		header('HTTP/1.1 503 Service Unavailable');
		header('Status: 503 Service Unavailable');
		header('Retry-After: 3600');
		?><!DOCTYPE html>
			<html>
				<head>
					<title><?php echo brnm_session('blogname'); ?> - Temporarily Unavailable</title>
					<meta name="robots" content="none" />
					<style>
						html,body { height: 100%; }
						body { position: relative; text-align: center; font-family: 'Georgia', 'sans-serif'; }
						.maintenance-msg { position: absolute; width: 100%; top: 30%; font-size: 1.5em; line-height: 1.2em; }<?php

						if(brnm_session('options_dev_maintenance_splash_image')) {
							$image = wp_get_attachment_image_src(brnm_session('options_dev_maintenance_splash_image'), 'full'); ?>
							body { background-image: url('<?php echo $image[0]; ?>'); background-repeat: no-repeat; background-position: center; background-size: 100% auto; }
							.maintenance-msg { color: #fff; text-shadow: 1px 2px 3px #333; }<?php
						} ?>
					</style>
					<?php if(brnm_session('options_dev_ga') == true) { echo brnm_session('options_dev_ga_use'); } ?>
				</head>
				<body>
					<div class="maintenance-msg"><?php
						if(brnm_session('options_dev_maintenance_logo_show') == 'yes') {
							echo wp_get_attachment_image(brnm_session('options_login_logo'), 'full');
							echo '&nbsp;&nbsp;';
						}
						echo apply_filters('the_content', $maintenance_message); ?>
					</div><!-- .maintenance-msg -->
				</body>
			</html><?php
		die();
	} else {
		add_action('body_open', 'brnm_maintenance_page', 99);
		function brnm_maintenance_page() {
			echo '<div id="maintenance">Maintenance Enabled: PAGE</div><!-- #maintenance -->';
		}
	}
}