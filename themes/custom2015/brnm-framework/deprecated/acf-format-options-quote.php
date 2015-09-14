<?php
/**
  * Format Options Quotes ACF setup
  *
  * Sets up options for post formats where the 
  * selection is quote.
  * @since brnm 2.4.1
 **/


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_format-options-quote',
		'title' => 'Format Options - Quote',
		'fields' => array (
			array (
				'key' => 'field_5422229e4fabc',
				'label' => 'Quote',
				'name' => 'format_quote',
				'type' => 'wysiwyg',
				'required' => 1,
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'no',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'quote',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}