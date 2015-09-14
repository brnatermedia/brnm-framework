brnatermedia Theme Framework
latest vers. 2.6.4
@author BRNater Media
@url http://www.brnatermedia.com


/* When Updating the changelog:
	Copy formatting from latest changelog below.
	Update files as necessary, then notate here.
	For any updated files, change their "@since" to latest version.
	Update latest version (top) and version # in parent stylesheet.

	Under "Files Changed", "+" sign means file was edited and renamed,
	not just renamed. Otherwise it was just edited.
*/


CHANGELOG -------

/* 2.6.4 - 13 Sept 2015
--------------------------------------------------- */
Framework wrapped into plugin
	-- each page developed into its own class as necessary
	-- brnm_register_options_pages() renamed to register_options_pages()
	-- developer page setup updated to automatically show correct page once super user is set
	-- paths to files updated as result of move to plugin
	-- google fonts removed from admin
	-- icomoon fonts included in plugin

	FILES CHANGED
		advanced-custom-fields-setup.php
		browsers.php
		debug.php
		enqueues.php
		head.php
		helpers.php
		includes/css/base.css

		custom2015/functions.php
		custom2015/header.php

	FILES REMOVED
		changelog.txt
		
		custom2015/functions-custom.php
		custom2015/fonts/icomoon*
		
	FILES ADDED
		readme.md


/* 2.6.2 - 17 July 2015
--------------------------------------------------- */
Security Fixes & Improvements
	-- New window link functionality added as option in customizations
	-- Media queries perfected for smaller desktops and tablets
	-- Notes added to better understanding of Dev and Debug modes
	-- Dev and Debug classes added to html class for debugging & live site improvement purposes
	-- Detection added to show error when 'debug' class is being used outside of debug mode (hiding certain elements from public view)
	-- Maintenance functionality moved from head.php to its own file
	-- Fix in maintenance to unset sessions causing logged out users to be stuck on the Maintenance Page
	-- Maintenance mode updated to only run when in debug mode.
	-- Customize.php page removed from all menu views
	-- Removed deprecated code calling to remove "New+" content button from admin bar
	-- Shortcut link to Developer options added to admin menu
	-- Removed duplicate div.entry-meta tag
	-- content-* files updated with session functions and updated footer.entry-meta tags

	FILES ADDED
		brnm-framework/maintenance.php

	FILES CHANGED
		brnm-framework/customizations.txt
		brnm-framework/browsers.txt
		brnm-framework/head.php
		brnm-framework/helpers.php
		content.php
		content-audio.php
		content-quote.php
		content-video.php
		functions.php
		loop.php
		style.css


/* 2.6.1 - 05 July 2015
--------------------------------------------------- */
Security Fixes
	-- Basic and developer options uncommented
	-- Secured/sanitized input on brnm_the_excerpt(), brnm_sharing_buttons()
	-- new function for finding even numbers: brnm_is_even()
	-- brnm_print_meta() updated to accept arguments on displaying the date and author
	-- interior static header image simplified
	-- brnm_sharing_buttons() css glitch fixed
	-- glitch fixed where sidebar wasn't showing on post singles, archives, and search pages
	-- css media query glitch affecting tablets and mobile devices fixed
	-- float and text align default styling added

	FILES CHANGED
		brnm-framework/acf/basic.php
		brnm-framework/acf/developer.php
		footer.php
		functions.php
		functions-custom.php
		header.php
		sidebar.php
		style.php
		theme-functions.php


/* 2.6 - 01 July 2015
--------------------------------------------------- */
Feature Enhancements
	-- sharable icons added to General options
	-- nav toggle for mobile menus included by default
	-- responsive youtube videos included by default
	-- uniform static header area added
	-- custom google map functionality added
	-- contact page map w/o need for MapPress added
	-- more flexible way of displaying excerpts includes switch bt 'more' and excerpt concepts
	-- error fixed that was breaking the custom post type shortcode function
	-- media queries simplified
	-- maintenance mode now available

	FILES ADDED
		brnm-framework/acf/acf-basic-2.6.xml
		brnm-framework/acf/acf-developer-2.6.xml
		lib/static.php

	FILES CHANGED
		brnm-framework/acf/acf-basic.php
		brnm-framework/acf/acf-developer.php
		brnm-framework/head.php
		brnm-framework/theme-functions.php
		functions.php
		functions-custom.php
		lib/cpt-EXAMPLE.php
		lib/custom-js.php
		style.php


/* 2.5.41 - 11 Jun 2015
--------------------------------------------------- */
Stability Improvements
	-- corrected font enqueue error to show only on front-facing pages, not admin
	-- re-enabled basic acf settings page
	-- removed default floats across footers and comments box

	FILES CHANGED
		functions.php
		helpers.php
		style.css


/* 2.5.4 - 22 Apr 2015
--------------------------------------------------- */
Feature Enhancements & Stability Improvements
	-- button short-code moved to functions-custom.php for easier updating per theme
	-- Shortcut button added to the tinyMCE editor for easier access
	-- Size and color attributes removed from button shortcode
	-- Disabled crop from logo; now just resizes w/o cropping
	-- icomoon fonts updated: vine, apple, foursquare added
	-- office short-code setup html optimized for greater flexibility; also uses
		brnm_session() over get_option() now
	-- brnm_the_office() and brnm_office_fields_switch() updated to include option to
		show/hide related icon
	-- following functions deprecated: brnm_sc_button1, brnm_sc_button2, brnm_sc_office,
		brnm_c_main_phone,, brnm_c_alt_phone, brnm_c_fax_phone, brnm_c_email, brnm_c_address,
		brnm_c_hours, brnm_display_page_titles
	-- default template no longer shows sidebar; switched with page-with-sidebar.php
	-- slider updated to take session functions

	FILES CHANGED
		acf/acf-developer.php
		deprecated.php
		footer.php
		fonts/*
		functions.php
		functions-custom.php
		head.php
		helpers.php
		layerslider.php
		shortcodes.php
		style.css
		theme-functions.php
		theme-setup.php

	FILES ADDED
		acf/acf-developer-2.5.4.xml
		includes/js/base/wysiwyg-buttons.js
		page-width-sidebar.php

	FILES REMOVED
		page-fullwidth.php


/* 2.5.3 - 10 Feb 2015
--------------------------------------------------- */
Feature Enhancements & Stability Improvements
	-- colors added to buttons
	-- analytics enhanced
	-- added back "body_close()" action incorrectly removed from footer
	-- tightened loopholes in collecting session data
	-- js file now PHP dynamic

	FILES CHANGED
		analytics.php
		enqueues.php
		footer.php
		lib/custom.js (changed to custom-js.php)
		sessions.php
		shortcodes.php
		theme-functions.php


/* 2.5.2 - 20 Jan 2015
--------------------------------------------------- */
Feature Enhancements & Stability Improvements
	-- Functions for displaying post titles across different post types enhanced
	-- Enabled post titles for Page for Posts and Single template
	-- Used better variable names on the admin bar introduction
	-- Ability to show errors with "show_errors()"
	-- Functions used directly in theme template files included in a separate file
	-- HTML title now shows name + description on home page and page title on interior pages
	-- Standardized the format for entry meta, which can be altered per theme
	-- Logo responsive functionality enhanced; function added to framework
	-- Google Event tracking now works
	-- Button and Office short codes now work
	-- All Options and PostMeta save to sessions for quicker page querying
	-- buttons, styling and color added to anchor tags for styling
	-- social media icons list expanded
	-- Help tabs for shotcodes added to post and page in admin
	-- base level font icons added
	-- Deprecated folder moved up one level
	-- brnm_get_ga_event() deprecated
	-- brnm_the_ga_event() deprecated
	-- brnm_enqueue_styles() deprecated
	-- brnm_ie6_style() deprecated
	-- dev_print() deprecated

	FILES ADDED
		brnm-framework/theme-functions.php

	FILES CHANGED
		advanced-custom-fields-setup.php
		analytics.php
		content-none.php => content.php
		deprecated.php
		functions-custom.php
		functions.php
		head.php
		helpers.php
		index.php
		login.php
		shortcodes.php
		single.php
		style.css


/* 2.5.1 - 17 Dec 2014
--------------------------------------------------- */
Stability improvements
	-- removed limitation on enabling post titles to only the 'post' and 'page' post-type; now covers custom post-types, too.
	-- front page template enabled to utilize both the default and full-width layouts
	-- more found instances of 'brnm_var()' removed
	-- deprecated functions will be moved to deprecated file from now on. Functions not used at all will be deleted.
	-- base styles removed from enqueue process
	-- framework version added to the "Right Now" dashboard widget

	FILES ADDED
		brnm-framework/deprecated/ (folder)
		brnm-framework/deprecated/deprecated.php

	FILES CHANGED
		brnm-framework/activations.php
		brnm-framework/customizations.txt
		brnm-framework/enqueues.php
		brnm-framework/helpers.php
		functions.php
		part-front.php


/* 2.5 - 5 Dec 2014
--------------------------------------------------- */
Stability improvements and bug fixes to the framework
	-- instances referencing the framework renamed from 'brnatermedia' to 'brnm'
	-- custom post types will now have an individual file for each
	-- REMOVED Filtered Variables function
	-- recommendation made for google fonts to be loaded all in 1 url, instead of 1 call for each font
	-- clean up acf setup -- smarter variable names; allow for unlimited options pages to be added from custom functions
	-- google fonts can be now be arranged as an array or string, depending on site needs
	-- JS files moved from footer to external script
	-- mobile menu markup stability improvements
	-- CSS classes and IDs updated on markup for navigation
	-- base consolidated to theme CSS; base CSS now only used as reference
	-- added ability to create custom widget areas from custom functions
	-- added ability to toggle display of widgets per post or page
	-- google map now replaces header image by default on contact page

	FILES ADDED
		lib/custom.js
		brnm-framework/includes/plugins/display-widgets

	FILES CHANGED
		footer.php
		functions.php
		functions-custom.php
		header.php
		brnm-framework/advanced-custom-fields-setup.php
		brnm-framework/debug.php
		brnm-framework/enqueues.php
		brnm-framework/helpers.php
		brnm-framework/includes/css/base.css
		brnm-framework/theme-setup.php
		style.css

	FILES REMOVED


/* 2.4.4 - 16 Nov 2014
--------------------------------------------------- */
ACF fixes & improvements
	-- added xml files for each set of static acf functions for easy upgrading in the future
	-- upgraded the slider to be further controllable within Dev options
	-- removed "Pages" tab from developer acf, as this section isn't aptly configurable as-is, and doesn't apply to all projects (can be added on a per project basis)
	-- added function for easily pulling general options
	-- updated functions for dev and debug modes; cleaner now
	-- streamlined CSS entry-header classes
	-- site-description moved within the logo
	-- client logo added to dashboard

	FILES ADDED
		brnm-framework/acf/acf-developer.php
		brnm-framework/acf/acf-developer-2.4.4.xml
		brnm-framework/acf/acf-slider-options.php
		brnm-framework/acf/acf-slider-options-2.4.4.xml

	FILES CHANGED
		brnm-framework/advanced-custom-fields-setup.php
		brnm-framework/debug.php
		brnm-framework/helpers.php
		brnm-framework/shortcodes.php
		brnm-framework/theme-setup.php
		404.php
		author.php
		functions.php
		header.php
		image.php
		search.php
		tag.php

	FILES DEPRECIATED
		brnm-framework/acf/front-slider-options.php

	FUTURE EDITS
		-- export acf post-format options and save as xml file in brnm-framework/acf folder


/* 2.4.3 - 27 Oct 2014
--------------------------------------------------- */
Minor fixes and improvements
	-- corrected issue where footer wasn't calling the correct full-width template file.

	FILES CHANGED
		footer.php


/* 2.4.2 - 30 Sep 2014
--------------------------------------------------- */
Improved content handling for post formats and content parts.
Now there is distinction between whole template layouts and
parts to be included into a given page.
	-- custom 'parts' can now be created for each project
	-- default 'page' and 'page-fullwidth' now include functionality for accepting 'parts'
	-- post formats better acclimated to receive the single post
	-- found no use for the aside post format
	-- corrected a default value for video post format options

	FILES CHANGED
		brnm-framework/acf/format-options-video.php
		content-audio.php
		content-none.php
		content-quote.php
		content-video.php
		page.php
		page-fullwidth.php (renamed from 'page-full-width.php')
		part-front.php (renamed from 'content-front.php')

	FILES REMOVED
		content-aside.php

	FILES ADDED
		brnm-framework/acf/global-items.php
		brnm-framework/acf/acf-format-options-video-2.4.2.xml
		brnm-framework/acf/acf-global-items-2.4.2.xml

	FUTURE NOTES:
		-- export acf options and save as xml file in brnm-framework/acf folder


/* 2.4.1 - 25 Sep 2014
--------------------------------------------------- */
Developer and certain other acf options are now built directly into
the theme. Responsiveness updated.
	-- developer options
	-- post formating options
	-- slider / header image options
	-- permalink options shown only in full and debug modes
	-- responsive enabled by default
	-- 'interior' class added to html, opposite of 'front'

	FILES CHANGED
		brnm-framework/browsers.php
		brnm-framework/head.php
		brnm-framework/theme-setup.php
		functions.php

	FILES ADDED
		brnm-framework/acf/developer.php
		brnm-framework/acf/format-options-audio.php
		brnm-framework/acf/format-options-quote.php
		brnm-framework/acf/format-options-video.php
		brnm-framework/acf/front-slider-options.php


/* 2.4 - 23 Sep 2014
--------------------------------------------------- */
Enhancements to the admin, improve on styling,
and empower Google Analytics and SEO efforts.
	-- developer admin hidden from general users; this user is changed under Developer options
	-- added blockquote styling
	-- added shortcut for enqueuing layerslider into Customizations
	-- added custom ga event tracking function
	-- added custom rel attribute generator, helpful for SEO
	-- sidebar div renamed from #sidebar1 to #secondary
	-- responsive design switch removed from dev options; now included by default on all browsers
	-- added new responsive design classes for displaying items only on desktop, tablet, or mobile
	-- cpt.php renamed to custom-post-types.php
	-- custom post type switch removed from dev options; now included via functions-custom.php
	-- social media display function moved from footer.php to functions-custom.php for easier access and editing
	-- added ability show Agency credits on white label projects.
	-- simplified sidebar to only 2 sidebars included in every project: default and blog, consolidated from sidebars.php to theme-presets.php
	-- cleaned up theme presets to hide certain plugin pages
	-- gravity forms placeholder add-on included in default plugin setup
	-- logo from options now shows on front and admin login pages
	-- simplified header image by using core featured image instead of acf
	-- simplified front slider options by including only LayerSlider and Owl Carousel
	-- removed filters for page headers to use wp_title() instead; title will depend more on WordPress SEO plugin now
	-- certain functions redistributed between helpers and theme-setup files
	-- added shortcode content button that can be customized via custom CSS
	-- improved support for enabling titles on pages and different post types
	-- improved support for post formats, including acf functionality and better front-end displays

	FILES CHANGED:
		brnm-framework/advanced-custom-fields-setup.php
		brnm-framework/cpt.php
		brnm-framework/customizations.txt
		brnm-framework/head.php
		brnm-framework/helpers.php
		brnm-framework/includes/css/base.css
		brnm-framework/includes/css/debug.css
		brnm-framework/lib/base.css
		brnm-framework/theme-setup.php
		brnm-framework/sidebars.php
		content-aside.php
		footer.php
		functions-custom.php
		header.php
		sidebar.php

	FILES ADDED:
		brnm-framework/analytics.php
		brnm-framework/shortcodes.php
		content-aside.php
		content-front-page.php
		content-none.php
		content-quote.php
		content-video.php

	FILES REMOVED:
		brnm-framework/sidebars.php
		lib/static-image.php


/* 2.3 - 4 Aug 2014
--------------------------------------------------- */
Bug fixes from last significant update.
	-- enable enqueue functionality on front and !front pages
	-- new ability to add google analytics via dev options
	-- responsive design option enable for dev options
	-- new default, overwrittable styles added
	-- stage/hero area structure updated

	FILES MODIFIED:
		enqueues.php
		head.php
		header.php
		login.php
		style.css

	FILES ADDED:
		cpt.php


/* 2.2 - 23 July 2014
--------------------------------------------------- */
Overall more files differentiated between what's meant to be editable
per website dev, and what's supposed to stay within the framework untouched.
	-- moved all preset options to its own file frome theme presets so they're more easily editable.
	-- moved register menus to functions-custom.php for easier editing.
	-- debug admin styling consolidated to admin.css
	-- Cleanup functions distributed to other files; cleanup.php removed
	-- more setup styling added to style.css, meant to be altered if necessary
	-- updated the generator from a meta to HTML5 base tag
	-- theme files updated to be HTML5 compliant (as best as possible)
	-- removed actions functionality
	-- created file of refrence functions which can be added as needed

	FILES MODIFIED:
		all theme files
		admin.css
		advanced-custom-fields-setup.php
		debug.php
		enqueues.php
		menus.php
		sidebars.php
		theme-setup.php

	FILES REMOVED:
		actions.php
		cleanup.php
		debug-admin.css
		functions-actions.php

	FILES ADDED:
		customizations.txt
		login.php


/* 2.1 - 15 May 2014 (Plower)
--------------------------------------------------- */
Removed child theme framework; framing is solely based on template directory
	-- all option tree files removed
	-- obsolete and inactive styling files & folders
	-- sidebar switcher and sidebar framework
	-- .js class now loads without a blink
	-- some 'redcm' classes renamed to 'brnm'
	-- new framework and theme support constants defined
	-- most files from old /lib/ folder moved to /brnm-framework/ folder, some deleted
	-- consolidated custom js into separate file, rather than attaching to footer
	-- helpers.php file now serves as an extension to the functions.php file as
		functions that are too small and random to include in individual files
	-- functions-custom.php now only holds functions and variables meant to be
		overwritten or modified

	FILES REMOVED:
		parent/css/editor-style.css
		parent/css/rtl-editor-style.css
		parent/images
		parent/js/admin-sidebar-switcher.js
		parent/rtl.css
		parent/search.php

	FILES ADDED:
		js/custom.js
		js/browserdetect.js
		js/redcm-android-nav-fix.js

	FILES CHANGED:
		functions.php
		js/redcm.js ( + renamed: brnm-framework/js/base.js )
		lib/browsers.js ( + renamed: brnm-framework/browsers.js )
		lib/cleanup.js ( + renamed: brnm-framework/admin-cleanup.js )
		lib/enqueue_scripts.php ( + renamed: brnm-framework/enqueue_scripts.php )
		lib/enqueue_styles.php ( + renamed: brnm-framework/enqueue_styles.php )
		lib/sidebars.php ( + renamed: brnm-framework/sidebars.php )
		loop.php
		sidebar.php


/* 1.3.1 - 24 Oct 2013
--------------------------------------------------- */
	--	enabled custom post types to accept plural and singular labels using variables


/* 1.3.0 - 24 Oct 2013
--------------------------------------------------- */
	--	updated browser.php file to be more affective towards browser sniffing


/* 1.2.1 - 22 Oct 2013
--------------------------------------------------- */
	--	included 2 slider files in child framework: one for moving captions and the other for clickable selectors


/* 1.2.0 - 13 Oct 2013
--------------------------------------------------- */
	--	updated theme framework name to "BRNater Media Theme Framework"
	--	corrected grammatical errors, established consistency among headers in child theme
	--	style-admin.css moved from parent to child theme
	--	admin-display.php and enclosed functions moved from parent to child
	--  meta-boxes-default.php consolidated to cleanup.php, removed from functions.php


/* 1.1.0 - 3 Oct 2013
--------------------------------------------------- */
	--	admin-display.php: set to run by default
	--	style-admin.css: set to run by default
	--	Advanced Custom Fields: styling added for displaying spans in messages in admin