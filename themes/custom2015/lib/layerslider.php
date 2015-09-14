<?php 
/**
  * LayerSlider
  * 
  * Setup for the layerslider to be used in
  * the stage and hero areas.
  * @package custom2014
  * @since brnatermedia 2.1
 **/
 ?>
 
 
<div id="layerslider" style="width: 100%; height: 390px;">
	<?php
	$slides = get_option('options_ls_slides');
	for($s = 0; $s < $slides; $s++) {
		$slide_image = wp_get_attachment_image_src(get_option('options_ls_slides_'.$s.'_slide_image'), 'layerslider');
		$slide_title = get_option('options_ls_slides_'.$s.'_slide_title');
		$slide_content = get_option('options_ls_slides_'.$s.'_slide_content');
		$slide_link = get_option('options_ls_slides_'.$s.'_slide_link');
		$slide_anchor = get_option('options_ls_slides_'.$s.'_slide_anchor');
		?>
		<div class="ls-slide" data-ls="slidedelay: <?php echo get_option('options_ls_delay'); ?>; transition2d: <?php echo get_option('options_ls_transition'); ?>;">
			<img src="<?php echo $slide_image[0]; ?>" class="ls-bg" alt="<?php echo $slide_title; ?>" />
			<div class="ls-l slide-caption" data-ls="" style=""><?php // <!-- edit the data-ls and styling as needed and delete this --> ?>
				<h3 class="slide-title"><?php echo $slide_title; ?></h3>
				<p class="slide-content"><?php echo $slide_content; ?></p>
				<?php if($slide_link) { ?>
					<a class="slide-link" href="<?php echo $slide_link; ?>"><span><?php echo $slide_anchor; ?></span></a>
				<?php } ?>
			</div><!-- .slide-caption -->
		</div><!-- .ls-slide -->
		<?php
	}
	?>
</div><!-- #layerslider -->
 
<?php if($slides = get_option('options_ls_slides')) { ?>
	<script>
	jQuery(document).ready(function($) {
		$('#layerslider').layerSlider({
			skinsPath : '<?php echo BRNM_FRAME_INCLUDE_URI; ?>js/layerslider/skins/',
			skin : 'noskin',
			showBarTimer : false,
			showCircleTimer : false
		});
	});
	</script>
<?php } ?>
