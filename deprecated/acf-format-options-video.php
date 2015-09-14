<?php
/**
  * Format Options Video ACF setup
  *
  * Sets up options for post formats where the 
  * selection is video.
  * @since brnm 2.4.1
 **/


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_format-options-video',
		'title' => 'Format Options - Video',
		'fields' => array (
			array (
				'key' => 'field_542b2dc856978',
				'label' => 'Video Type',
				'name' => 'format_video_type',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'embed' => 'Embed a video from YouTube or Vimeo',
					'upload' => 'Upload my own video',
				),
				'default_value' => 'embed',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_542b2e9656979',
				'label' => 'Video Embed',
				'name' => 'format_video_embed',
				'type' => 'text',
				'instructions' => 'Paste in your URL from YouTube or Vimeo',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_542b2dc856978',
							'operator' => '==',
							'value' => 'embed',
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
				'key' => 'field_542b2ef05697a',
				'label' => 'Video Message',
				'name' => '',
				'type' => 'message',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_542b2dc856978',
							'operator' => '==',
							'value' => 'upload',
						),
					),
					'allorany' => 'all',
				),
				'message' => 'Uploading different formats of your video clip will ensure that it\'s playable to all your site visitors even on their different browsers. Use <a href="http://zamzar.com" target="_blank">Zamzar</a> to convert photos from .mov and .wmv videos into the formats you need.',
			),
			array (
				'key' => 'field_542b2f095697b',
				'label' => 'Upload Video (mp4)',
				'name' => 'format_video_mp4',
				'type' => 'text',
				'instructions' => 'Upload an <strong>mp4</strong> version of your video.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_542b2dc856978',
							'operator' => '==',
							'value' => 'upload',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'http://',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_542b2f3c5697c',
				'label' => 'Upload Video (ogg)',
				'name' => 'format_video_ogg',
				'type' => 'text',
				'instructions' => 'Upload an <strong>ogg</strong> version of your video.',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_542b2dc856978',
							'operator' => '==',
							'value' => 'upload',
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
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'video',
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