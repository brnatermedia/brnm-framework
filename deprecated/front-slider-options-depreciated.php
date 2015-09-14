<?php
/**
  * Front Slider Options ACF setup
  *
  * Sets up options for the front slider
  * @since brnm 2.4.1
 **/


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_front-slider-options',
		'title' => 'Front Slider Options',
		'fields' => array (
			array (
				'key' => 'field_54220dfade6b5',
				'label' => 'Select Media Type',
				'name' => 'media_type',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'layerslider' => 'LayerSlider',
					'owlcarousel' => 'Owl Carousel',
					'none' => 'None',
				),
				'default_value' => 'none',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53d184bd40aa1',
				'label' => 'LayerSlider Message',
				'name' => '',
				'type' => 'message',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54220dfade6b5',
							'operator' => '==',
							'value' => 'layerslider',
						),
					),
					'allorany' => 'all',
				),
				'message' => '<h2>Slide Options</h2>',
			),
			array (
				'key' => 'field_53d1853c9cbd8',
				'label' => 'Delay',
				'name' => 'ls_delay',
				'type' => 'number',
				'instructions' => 'How long each slide displays before moving to the next.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54220dfade6b5',
							'operator' => '==',
							'value' => 'layerslider',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 4500,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1000,
				'max' => 10000,
				'step' => 250,
			),
			array (
				'key' => 'field_53d185669cbd9',
				'label' => 'Transition',
				'name' => 'ls_transition',
				'type' => 'select',
				'instructions' => 'The type of transition between slides',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54220dfade6b5',
							'operator' => '==',
							'value' => 'layerslider',
						),
					),
					'allorany' => 'all',
				),
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
				'key' => 'field_53d185869cbda',
				'label' => 'LayerSlider Message',
				'name' => '',
				'type' => 'message',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54220dfade6b5',
							'operator' => '==',
							'value' => 'layerslider',
						),
					),
					'allorany' => 'all',
				),
				'message' => '<h2>Individual Slides</h2>',
			),
			array (
				'key' => 'field_53d185b29cbdb',
				'label' => 'Slides',
				'name' => 'ls_slides',
				'type' => 'repeater',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54220dfade6b5',
							'operator' => '==',
							'value' => 'layerslider',
						),
					),
					'allorany' => 'all',
				),
				'sub_fields' => array (
					array (
						'key' => 'field_53d185c99cbdc',
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
						'key' => 'field_53d185ed9cbdd',
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
						'key' => 'field_53d185fa9cbde',
						'label' => 'Link (optional)',
						'name' => 'slide_link',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => 'http://',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_53d186219cbdf',
						'label' => 'Link Anchor',
						'name' => 'slide_anchor',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
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
			array (
				'key' => 'field_53d187a29cbe1',
				'label' => 'OwlSlider Message',
				'name' => '',
				'type' => 'message',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54220dfade6b5',
							'operator' => '==',
							'value' => 'owlcarousel',
						),
					),
					'allorany' => 'all',
				),
				'message' => '<h2>Carousel Options</h2>',
			),
			array (
				'key' => 'field_53d187b09cbe2',
				'label' => 'Delay',
				'name' => 'oc_delay',
				'type' => 'number',
				'instructions' => 'How long each slide displays before moving to the next.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54220dfade6b5',
							'operator' => '==',
							'value' => 'owlcarousel',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 4500,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1000,
				'max' => 10000,
				'step' => 250,
			),
			array (
				'key' => 'field_53d1885c9cbe3',
				'label' => 'OwlSlider Message',
				'name' => '',
				'type' => 'message',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54220dfade6b5',
							'operator' => '==',
							'value' => 'owlcarousel',
						),
					),
					'allorany' => 'all',
				),
				'message' => '<h2>Individual Slides</h2>',
			),
			array (
				'key' => 'field_53d188689cbe4',
				'label' => 'Slides',
				'name' => 'oc_slides',
				'type' => 'repeater',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54220dfade6b5',
							'operator' => '==',
							'value' => 'owlcarousel',
						),
					),
					'allorany' => 'all',
				),
				'sub_fields' => array (
					array (
						'key' => 'field_53d188e49cbe5',
						'label' => 'Image',
						'name' => 'oc_image',
						'type' => 'image',
						'required' => 1,
						'column_width' => '',
						'save_format' => 'id',
						'preview_size' => 'owlcarousel',
						'library' => 'all',
					),
					array (
						'key' => 'field_53d188f89cbe6',
						'label' => 'Title',
						'name' => 'oc_title',
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
						'key' => 'field_53d189639cbe7',
						'label' => 'Link',
						'name' => 'oc_link',
						'type' => 'text',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => 'http://',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_53d191f79cbe8',
						'label' => 'Anchor',
						'name' => 'oc_anchor',
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
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-front-slider-options',
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