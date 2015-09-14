<?php 
/**
  * Post Format - video
  *
  * Used to show individual posts
  * @package custom2014
 **/


if( brnm_display_page_titles() ): ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php
			printf( __( '<span class="meta-prep meta-prep-author">Posted on </span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a> <span class="meta-sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span>', 'brnm' ),
				get_permalink(),
				get_the_date( 'c' ),
				get_the_date(),
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				sprintf( esc_attr__( 'View all posts by %s', 'brnm' ), get_the_author() ),
				get_the_author()
			);
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
<?php endif; ?>

<div class="entry-content content-video">
	<?php
	$meta = get_post_custom();
	$video_type = $meta['format_video_type'][0]; // embed or upload

	if($video_type == 'embed') {
		$video = apply_filters('the_content', $meta['format_video_embed'][0]);
	} else { //otherwise, it's upload
		global $is_firefox, $is_opera;
		$video_file = null;
		if($is_firefox || $is_opera) { $video_file = wp_get_attachment_url($meta['format_video_ogg'][0]); }
		else { $video_file = wp_get_attachment_url($meta['format_video_mp4'][0]); }

		$video = '<video src="'.$video_file.'" controls="true" height="360"></video>';
	}
	
	echo $video;
	
	// finish building the output here
	?>
</div><!-- .entry-content -->

<div class="entry-content">
	<?php the_content(); ?>
</div><!-- .entry-content -->

<footer class="entry-meta">
	<?php
	$tag_list = get_the_tag_list( '', ', ' );
	if ( '' != $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brnm' );
	} else {
		$utility_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brnm' );
	}
	printf(
		$utility_text,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
	?>
</footer><!-- .entry-meta -->
