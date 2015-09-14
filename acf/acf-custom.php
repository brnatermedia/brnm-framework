<?php
/**
  * Custom Options ACF setup
  *
  * Sets up Developer options for advanced custom fields
  * @since brnm 2.4.5
 **/


$custom_options_page = (get_option('options_clientname') != '' ? get_option('options_clientname') : 'Custom Options');

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_custom-options',
		'title' => 'Custom Options',
		'fields' => array (
			array (
				'key' => 'field_5474e718cf13b',
				'label' => 'Message',
				'name' => '',
				'type' => 'message',
				'message' => '<p>The following options are custom-built to your theme to give you the most flexibility in managing your website content.</p>',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => "acf-options-$custom_options_page",
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}