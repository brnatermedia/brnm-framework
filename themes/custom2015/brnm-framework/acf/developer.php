<?php
/**
  * Developer ACF setup
  *
  * Sets up Developer options for advanced custom fields
  * @since brnatermedia 2.4.1
 **/


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_developer',
		'title' => 'Developer',
		'fields' => array (
			array (
				'key' => 'field_53d17fd589eb3',
				'label' => 'General',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53d17fdf89eb4',
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
				'key' => 'field_53d17ffc89eb5',
				'label' => 'Debug Mode',
				'name' => 'dev_debug_mode',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'off' => 'Off',
					'on' => 'On',
				),
				'default_value' => 'off',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5421f185c9bed',
				'label' => 'White label project?',
				'name' => 'dev_white_label',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5421f1a6c9bee',
				'label' => 'Agency Name',
				'name' => 'dev_wl_agency_name',
				'type' => 'text',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5421f185c9bed',
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
				'key' => 'field_5421f1c2c9bef',
				'label' => 'Agency Link',
				'name' => 'dev_wl_agency_link',
				'type' => 'text',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5421f185c9bed',
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
				'key' => 'field_5421f1eac9bf0',
				'label' => 'Agency Support Link',
				'name' => 'dev_wl_agency_support',
				'type' => 'text',
				'instructions' => 'A website or email link where the client can receive support.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5421f185c9bed',
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
				'key' => 'field_53d1815b89eb6',
				'label' => 'Theme Setup',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53d1816a89eb7',
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
				'key' => 'field_53d1818289eb8',
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
				'key' => 'field_53dfbb4224c61',
				'label' => 'Enable Google Analytics',
				'name' => 'dev_ga',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_53dfbb5d24c62',
				'label' => 'Google Analytics Code',
				'name' => 'dev_ga_use',
				'type' => 'textarea',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53dfbb4224c61',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 4,
				'formatting' => 'html',
			),
			array (
				'key' => 'field_5421dda523e30',
				'label' => 'Enable Event Tracking',
				'name' => 'dev_ga_event_tracking',
				'type' => 'true_false',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53dfbb4224c61',
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
				'key' => 'field_53d181bb89eba',
				'label' => 'Login',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_53d181c889ebb',
				'label' => 'Logo',
				'name' => 'login_logo',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'logo',
				'library' => 'all',
			),
			array (
				'key' => 'field_53d181e389ebc',
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
				'key' => 'field_53d181f989ebd',
				'label' => 'Background Color',
				'name' => 'login_color',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53d181e389ebc',
							'operator' => '==',
							'value' => 'color',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
			),
			array (
				'key' => 'field_53d1821589ebe',
				'label' => 'Background Image',
				'name' => 'login_image',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53d181e389ebc',
							'operator' => '==',
							'value' => 'image',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'object',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_53d1823989ebf',
				'label' => 'Background Position',
				'name' => 'login_image_position',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53d181e389ebc',
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
			array (
				'key' => 'field_54103884f12e7',
				'label' => 'Pages',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54221b00865c0',
				'label' => 'Pages message',
				'name' => '',
				'type' => 'message',
				'message' => 'Add custom pages (page link) via custom fields editor page to control content in the page.php file.',
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
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
