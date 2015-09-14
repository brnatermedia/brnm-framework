<?php 
/**
  * Sessions
  * 
  * Saving meta and options data to sessions
  * for quicker page loading
  *
  * @since brnm 2.5.2
  * @lastmodified brnm 2.5.3
 **/


session_start();


/* Save item to session
 * @since 2.5.2
 * @lastmodified brnm 2.5.3
 *
 * @param $item -- string -- label of the metadata
 * @param $type -- string -- takes only 1 of 2 strings
 * @param $post -- object -- query data retrieved for the loop
-------------------------------------------------------- */
function brnm_session($item, $type = 'options', $id = null) {

	if($type == 'options' || $type == 'postmeta') {
		// item is in the options table
		if($type == 'options') {
			if(isset($_SESSION['options'][$item])) {
				return $_SESSION['options'][$item];
			} else {
				return $_SESSION['options'][$item] = get_option($item);
			}
		}
		// item is in the postmeta table
		elseif($type == 'postmeta') {
			
			if($id == null) { global $post; $id = $post->ID; }
			
			if(isset($_SESSION['post-'.$id][$item])) {
				return $_SESSION['post-'.$id][$item];
			} else {
				$meta = get_post_custom($id);
				$_SESSION['post-'.$id][$item] = $meta[$item][0];
				return $_SESSION['post-'.$id][$item];
			}
		}
	}
	else {
		die(show_error('Incorrect "$type" variable entered'));
	}
}


/* Reset sessions on ACF data save
 * @since 2.5.2
-------------------------------------------------------- */
add_action('acf/save_post', 'brnm_reset_session', 20);
function brnm_reset_session() {
	session_unset();
}