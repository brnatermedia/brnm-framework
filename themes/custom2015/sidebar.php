<?php 
/**
  * Sidebar
  *
  * Displays chosen sidebar as per
  * the page metadata
  * @package custom2014
 **/
?>


<div id="secondary" class="widget-area">
	<?php
	// show a blog sidebar for blog pages, and regular for the rest
	if(is_home() || is_singular('post')) {
		$chosen_sidebar = 'blog-sidebar';
	} else {
		$chosen_sidebar = 'default-sidebar';
	}

	echo '<aside class="widget-section '. $chosen_sidebar .'">';
	dynamic_sidebar( $chosen_sidebar );
	echo '</aside><!-- .'. $chosen_sidebar .' -->';
	?>
</div><!-- #secondary .widget-section -->