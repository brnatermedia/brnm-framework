<?php
/**
  * Head.php
  *
  * Initial head functions that
  * won't be chnged often
  *
  * @since brnm 1.3
  * @lastmodified brnm 2.6.4
 **/


require_once( plugin_dir_path( __FILE__ ) .'maintenance.php');

?><!DOCTYPE html><?php global $is_IE; if( $is_IE ) : ?><!--[if IE]><![endif]--><?php endif; ?>
	<html <?php language_attributes(); ?> class="<?php brnm_html_class(); ?>">
	<head>
		<title><?php wp_title(''); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<?php if(brnm_session('options_dev_mobile_friendly') != 'no') { echo '<meta name="viewport" content="width=device-width" />'; } ?>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php brnm_favicon_touch_icons(); ?>
		<?php wp_head(); ?>
		<?php if(brnm_session('options_dev_ga') == true) { echo brnm_session('options_dev_ga_use'); } ?>
	</head>