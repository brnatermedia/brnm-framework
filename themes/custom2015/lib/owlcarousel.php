<?php 
/**
  * OwlCarousel
  * 
  * Setup for the owlcarousel slider to be
  * used in the stage and hero areas.
  * @ @package custom2014
  * @since brnatermedia 2.1
 **/
?>


<div id="owlcarousel" class="owlcarousel">
	<?php
	$slides = get_option('options_oc_slides');
	for($s = 0; $s < $slides; $s++) {
		$slide_image = wp_get_attachment_image_src(get_option('options_oc_slides_'.$s.'_oc_image'), 'owlcarousel');
		$slide_title = get_option('options_oc_slides_'.$s.'_oc_title');
		$slide_link = get_option('options_oc_slides_'.$s.'_oc_link');
		?>

		<div class="carousel-item">
		<?php if($slide_link) { ?><a class="carousel-link" href="<?php echo $slide_link; ?>"><?php } ?>
			<img src="<?php echo $slide_image[0]; ?>" class="carousel-image" alt="<?php echo $slide_title; ?>" />
			<div class="carousel-caption">
				<h3 class="carousel-title"><?php echo $slide_title; ?></h3>
			</div><!-- .carousel-caption -->
		<?php if($slide_link) { ?></a><?php } ?>
		</div><!-- .carousel-item -->
		<?php
	}
	?>

</div><!-- #owlcarousel -->