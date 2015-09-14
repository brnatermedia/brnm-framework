<?php 
/**
  * Post Format - audio
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

<div class="entry-content content-audio">
	<?php
	global $is_chrome, $is_safari, $is_firefox, $is_IE, $is_opera;
	$meta = get_post_custom();
	if($is_chrome || $is_firefox) {
		// chrome accepts mp3 and ogg
		$audio = ($meta['format_audio_link_mp3'][0] != '' ? $meta['format_audio_link_mp3'][0] : $meta['format_audio_link_ogg'][0]);
		$format = ($meta['format_audio_link_mp3'][0] != '' ? 'mp3' : 'ogg');
	}
	elseif($is_safari) {
		// safari accepts mp3 and wav
		$audio = ($meta['format_audio_link_mp3'][0] != '' ? $meta['format_audio_link_mp3'][0] : $meta['format_audio_link_wav'][0]);
		$format = ($meta['format_audio_link_mp3'][0] != '' ? 'mp3' : 'wav');
	}
	elseif($is_opera) {
		// opera accepts wav and ogg
		$audio = ($meta['format_audio_link_wav'][0] != '' ? $meta['format_audio_link_ogg'][0] : $meta['format_audio_link_ogg'][0]);
		$format = ($meta['format_audio_link_wav'][0] != '' ? 'wav' : 'ogg');
	}
	else {
		// catch all for the rest, including IE. mp3 only
		$audio = $meta['format_audio_link_mp3'][0];
	}
	$audio = wp_get_attachment_url($audio);
	?>
	<audio controls="true" autoplay="true">
		<source src="<?php echo $audio; ?>" type="audio/<?php echo $format; ?>">
		<i>Your browser does not support HTML5 audio.<br />You may wish to upgrade your browser.</i>
	</audio>
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
