<?php
/**
  * Menus
  *
  * Adjust the walker classes and cleanup
  * for easier styling.
  * @since brnm-framework 0.1
  * @lastmodified brnm-framework 2.2
 **/


/* Adds 'menu-parent-item' class to menu items with sub nav
 * @since brnm-framework 0.1
-------------------------------------------------------- */
function brnm_add_menu_parent_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'menu-item-parent';
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'brnm_add_menu_parent_class' );


/* Cleanup Menu Classes
 * @since brnm-framework 0.1
 * @lastmodified brnm-framework 2.2
-------------------------------------------------------- */
function brnm_menu_class_cleanup($output) {
    // Add first-menu-item class
	$output= preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
    // Consistent menu class name conventions ( underscores to dashes )
	$output= preg_replace('/_/', '-', $output);
	// Remove class never used
    $output= preg_replace('/menu-item-type-post-type /', '', $output);
    return $output;
}
add_filter('wp_nav_menu', 'brnm_menu_class_cleanup');
add_filter('wp_list_pages', 'brnm_menu_class_cleanup');