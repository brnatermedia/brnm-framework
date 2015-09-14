(function() {
	tinymce.create('tinymce.plugins.BRNMbuttons', {
		/**
		* Initializes the plugin, this will be excecuted after the plugin is created.
		* This call is done before the editor instance has finished its initialization so use the onInit event
		* of the editor instance to intecept that event.
		*
		* @param {tinymce.editor} ed Editor instance that the plugin is initialized in.
		* @param {string} url Absolute URL where the plugin is located
		*/
		init : function(ed, url) {
			//call to action button
			ed.addButton('ctabutton', {
				title : 'Add a CTA button',
				cmd : 'ctabutton',
				image : url + '/ic_action_process_save.png'
			});
			
			ed.addCommand('ctabutton', function() {
				var href = prompt('Paste in the desired URL'),
					color,
					shortcode;
				
				if(href != null) {
					color = prompt('Enter a color or hex color code for the button, or leave blank and press "Ok".');

						shortcode = '[button href="' + href +'" color="'+ color +'"]';
						ed.execCommand('mceInsertContent', 0, shortcode);
				}
				else {
					alert('You must enter a valid URL.');
				}
			});

			// phone shortcode
			ed.addButton('brnmphone', {
				title : 'Insert Phone Shortcode',
				cmd : 'brnmphone',
				image : url + '/ic_action_phone_start.png'
			});

			ed.addCommand('brnmphone', function() {
				var label = prompt('Write "true", give a custom label, or leave blank'),
					icon = confirm('Include the icon? Hit "OK" or "Cancel"'),
					shortcode,
					labeltext = '';
				
				if(label !== '') {
					labeltext = 'label="'+ label + '"';
				}
				shortcode = '[contact field="main-phone" '+ labeltext +' icon="'+ icon +'"]';
				ed.execCommand('mceInsertContent', 0, shortcode);
			});

			// email shortcode
			ed.addButton('brnmemail', {
				title : 'Insert Email Shortcode',
				cmd : 'brnmemail',
				image : url + '/ic_action_mail.png'
			});

			ed.addCommand('brnmemail', function() {
				var label = prompt('Write "true", give a custom label, or leave blank'),
					icon = confirm('Include the icon? Hit "OK" or "Cancel"'),
					shortcode,
					labeltext = '';
				
				if(label !== '') {
					labeltext = 'label="'+ label + '"';
				}
				shortcode = '[contact field="email" '+ labeltext +' icon="'+ icon +'"]';
				ed.execCommand('mceInsertContent', 0, shortcode);
			});

			// address shortcode
			ed.addButton('brnmaddress', {
				title : 'Insert Address Shortcode',
				cmd : 'brnmaddress',
				image : url + '/ic_action_location.png'
			});

			ed.addCommand('brnmaddress', function() {
				var label = prompt('Write "true", give a custom label, or leave blank'),
					icon = confirm('Include the icon? Hit "OK" or "Cancel"'),
					shortcode,
					labeltext = '';
					
				if(label !== '') {
					labeltext = 'label="'+ label + '"';
				}
				shortcode = '[contact field="address" '+ labeltext +' icon="'+ icon +'"]';
				ed.execCommand('mceInsertContent', 0, shortcode);
			});

			// hours shortcode
			ed.addButton('brnmhours', {
				title : 'Insert Hours Shortcode',
				cmd : 'brnmhours',
				image : url + '/ic_action_clock.png'
			});

			ed.addCommand('brnmhours', function() {
				var label = prompt('Write "true", give a custom label, or leave blank'),
					icon = confirm('Include the icon? Hit "OK" or "Cancel"'),
					shortcode,
					labeltext = '';
				
				if(label !== '') {
					labeltext = 'label="'+ label + '"';
				}
				shortcode = '[contact field="office-hours" '+ labeltext +' icon="'+ icon +'"]';
				ed.execCommand('mceInsertContent', 0, shortcode);
			});
		},
		
		/**
		* Creates control instances based on the incoming name. This method is normally not
		* needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
		* but you sometimes need to create more complex controls like listboxes, split boxes, etc..., then this
		* method can be used to create those.
		*
		* @param {string} n Name of the control to create
		* @param {tinymce.ControlManager} cm Control manager to use in order to create new control.
		* @param return {tinymce.ui.Control} New control instance of null if no control was created.
		*/
		createControl : function(n, cm) {
			return null;
		},
		
		/**
		* Returns information about the plugin as a name/value array.
		* The current keys are longname, author, authorurl, infourl, and version.
		*
		* @return {object} Name/value array containing information about the plugin.
		*/
		getInfo : function() {
			return {
				longname : 'BRNM WYSIWYG Editor Buttons',
				author : 'brnatermedia',
				authorurl : 'http://brnatermedia.com',
				infourl : 'http://brnatermedia.com',
				version : '0.1'
			};
		}
	});
	
	// Register plugin
	tinymce.PluginManager.add('brnmbuttons', tinymce.plugins.BRNMbuttons);
})();