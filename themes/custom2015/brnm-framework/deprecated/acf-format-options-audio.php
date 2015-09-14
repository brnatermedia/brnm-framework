<?php
/**
  * Format Options Audio ACF setup
  *
  * Sets up options for post formats where the 
  * selection is audio.
  * @since brnm 2.4.1
  * @lastmodified brnm 2.4.2
 **/


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_format-options-audio',
		'title' => 'Format Options - Audio',
		'fields' => array (
			array (
				'key' => 'field_542220467b6fe',
				'label' => 'Audio Message',
				'name' => '',
				'type' => 'message',
				'message' => 'Uploading different formats of your audio clip will ensure that it\'s playable to all your site visitors even on their different browsers. Use <a href="http://zamzar.com" target="_blank">Zamzar</a> to convert photos from .mov and .wmv videos into the formats you need.',
			),
			array (
				'key' => 'field_54221fd07b6fb',
				'label' => 'Audio Link (mp3)',
				'name' => 'format_audio_link_mp3',
				'type' => 'file',
				'instructions' => 'Upload an <strong>mp3</strong> version of your audio file',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_542220177b6fc',
				'label' => 'Audio Link (wav)',
				'name' => 'format_audio_link_wav',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_542220317b6fd',
				'label' => 'Audio Link (ogg)',
				'name' => 'format_audio_link_ogg',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'audio',
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