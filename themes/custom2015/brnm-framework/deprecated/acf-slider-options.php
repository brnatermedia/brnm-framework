<?php
/**
  * Slider Options ACF setup
  *
  * Sets up options for the slider
  * @since brnm 2.4.4
 **/


//$slide_status = get_option('options_dev_layerslider');
//$slide_subtitle = get_option('options_dev_ls_subtitle');
//$slide_content = get_option('options_dev_ls_content');
//$slide_link = get_option('options_dev_ls_link');
//$slide_anchor = get_option('options_dev_anchor');


function brnm_alter_slider_array($array) {
	if($slide_subtitle == 'no')
		unset( $array['fields'][4][2] );
	
	return $array;
}

$acf_slider_options = array (
	'id' => 'acf_slider-options',
	'title' => 'Slider Options',
	'fields' => array (
		array (
			'key' => 'field_54692fa36331f',
			'label' => 'Slide Options',
			'name' => '',
			'type' => 'tab',
		),
		array (
			'key' => 'field_54692feb63320',
			'label' => 'Delay',
			'name' => 'ls_delay',
			'type' => 'number',
			'instructions' => 'How long each slide displays before moving to the next.',
			'required' => 1,
			'default_value' => 4500,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1000,
			'max' => 10000,
			'step' => 250,
		),
		array (
			'key' => 'field_5469302963321',
			'label' => 'Transition',
			'name' => 'ls_transition',
			'type' => 'select',
			'instructions' => 'The type of transition between slides.',
			'required' => 1,
			'choices' => array (
				1 => 'Slide',
				5 => 'Fade',
				11 => 'Smooth Fade',
				35 => 'Columns',
				73 => 'Carousel',
				83 => 'Turning Tile',
				103 => 'Scale In',
			),
			'default_value' => 1,
			'allow_null' => 0,
			'multiple' => 0,
		),
		array (
			'key' => 'field_546930a863322',
			'label' => 'Slides',
			'name' => '',
			'type' => 'tab',
		),
		array (
			'key' => 'field_546930b463323',
			'label' => 'Slides',
			'name' => 'ls_slides',
			'type' => 'repeater',
			'required' => 1,
			'sub_fields' => array (
				array (
					'key' => 'field_546930d663324',
					'label' => 'Image',
					'name' => 'slide_image',
					'type' => 'image',
					'required' => 1,
					'column_width' => '',
					'save_format' => 'id',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				),
				array (
					'key' => 'field_546930f463325',
					'label' => 'Title',
					'name' => 'slide_title',
					'type' => 'text',
					'required' => 1,
					'column_width' => '',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5469314c63328',
					'label' => 'Subtitle',
					'name' => 'slide_subtitle',
					'type' => 'text',
					'required' => 1,
					'column_width' => '',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5469315e63329',
					'label' => 'Content',
					'name' => 'slide_content',
					'type' => 'textarea',
					'required' => 1,
					'column_width' => '',
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'formatting' => 'br',
				),
				array (
					'key' => 'field_5469310b63326',
					'label' => 'Link (optional)',
					'name' => 'slide_link',
					'type' => 'page_link',
					'column_width' => '',
					'post_type' => array (
						0 => 'page',
					),
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_5469312563327',
					'label' => 'Link Anchor',
					'name' => 'slide_anchor',
					'type' => 'text',
					'column_width' => '',
					'default_value' => 'read more',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
			),
			'row_min' => 2,
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => 'Add Slide',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page',
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
);



if(/* $slide_status === 'yes' &&  */function_exists("register_field_group") ) {
	
	brnm_alter_slider_array($acf_slider_options);
	register_field_group($acf_slider_options);
}