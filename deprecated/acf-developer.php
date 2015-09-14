<?php
/**
  * Developer ACF setup
  *
  * Sets up Developer options for advanced custom fields
  * @since brnm 2.4.1
 **/


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_developer-options',
		'title' => 'Developer Options',
		'fields' => array (
			array (
				'key' => 'field_5469375de9d58',
				'label' => 'General',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54693769e9d59',
				'label' => 'Super Admins',
				'name' => 'dev_super_admins',
				'type' => 'user',
				'instructions' => 'Select which admin has developer capability',
				'required' => 1,
				'role' => array (
					0 => 'administrator',
				),
				'field_type' => 'select',
				'allow_null' => 0,
			),
			array (
				'key' => 'field_54693785e9d5a',
				'label' => 'Debug Mode',
				'name' => 'dev_debug_mode',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'off' => 'off',
					'on' => 'on',
				),
				'default_value' => 'on',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_546937a6e9d5b',
				'label' => 'White label project?',
				'name' => 'dev_white_label',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_546937c2e9d5c',
				'label' => 'Agency Name',
				'name' => 'dev_wl_agency_name',
				'type' => 'text',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_546937a6e9d5b',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_546937d7e9d5d',
				'label' => 'Agency Link',
				'name' => 'dev_wl_agency_link',
				'type' => 'text',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_546937a6e9d5b',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'http://',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5469380be9d5e',
				'label' => 'Agency Support Link',
				'name' => 'dev_wl_agency_support',
				'type' => 'text',
				'instructions' => 'A website or email link where the client can receive support.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_546937a6e9d5b',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'http://',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54693844e9d5f',
				'label' => 'Theme Setup',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5469384ee9d60',
				'label' => 'Theme Preset',
				'name' => 'dev_theme_presets',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'blog' => 'Blog',
					'site' => 'Website',
					'blogsite' => 'Website + Blog',
					'full' => 'All admin menus except Developer',
				),
				'default_value' => 'site',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5469389be9d61',
				'label' => 'Show Page Title',
				'name' => 'dev_page_titles',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'none' => 'Don\'t show Titles',
					'enable_pages' => 'Show titles on Pages',
					'enable_posts' => 'Show titles on Blog Posts',
					'enable_all' => 'Show titles on Posts and Pages',
				),
				'default_value' => 'enable_pages',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_546938dae9d62',
				'label' => 'Enable Google Analytics',
				'name' => 'dev_ga',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_546938ece9d63',
				'label' => 'Google Analytics Code',
				'name' => 'dev_ga_use',
				'type' => 'textarea',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_546938dae9d62',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_54693918e9d64',
				'label' => 'Enable Event Tracking',
				'name' => 'dev_ga_event_tracking',
				'type' => 'true_false',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_546938dae9d62',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5469392ee9d65',
				'label' => 'Login',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5469393ae9d66',
				'label' => 'Logo',
				'name' => 'login_logo',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'logo',
				'library' => 'all',
			),
			array (
				'key' => 'field_5469394ee9d67',
				'label' => 'Login Background',
				'name' => 'login_bg_type',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'color' => 'Background Color',
					'image' => 'Background Image',
				),
				'default_value' => 'color',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_54693978e9d68',
				'label' => 'Background Color',
				'name' => 'login_color',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5469394ee9d67',
							'operator' => '==',
							'value' => 'color',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
			),
			array (
				'key' => 'field_54693990e9d69',
				'label' => 'Background Image',
				'name' => 'login_image',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5469394ee9d67',
							'operator' => '==',
							'value' => 'image',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'id',
				'preview_size' => 'logo',
				'library' => 'all',
			),
			array (
				'key' => 'field_546939bce9d6a',
				'label' => 'Background Position',
				'name' => 'login_image_position',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5469394ee9d67',
							'operator' => '==',
							'value' => 'image',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'center' => 'center',
					'left_top' => 'top-left',
					'left_bottom' => 'bottom-left',
					'right_top' => 'top-right',
					'right_bottom' => 'bottom-right',
				),
				'default_value' => 'left_bottom',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-developer',
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