<?php
/**
  * Loop
  *
  * Basic WordPress loop
  * @package custom2014
 **/ 


/* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-above">
		<div class="section-heading visuallyhidden"><?php _e( 'Post navigation', 'brnm' ); ?></div>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'brnm' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'brnm' ) ); ?></div>
	</nav><!-- #nav-above -->
<?php endif; ?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'brnm' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</header><!-- .entry-header -->

		<div class="entry-content entry-summary cf">
			<?php
			if ( is_archive() || is_search() ) : // Only display Excerpts for archives & search
				the_excerpt();
			else : ?>
				<div class="entry-summary">
				<?php if(has_post_thumbnail()) { ?><div class="post-image"><?php the_post_thumbnail('blog'); ?></div><!-- .post-image --><?php } ?>
				<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>
		</div><!-- .entry-summary -->

		<footer class="entry-meta">
			<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'brnm' ); ?></span><?php the_category( ', ' ); ?></span>
			<span class="meta-sep"> | </span>
			<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'brnm' ) . '</span>', ', ', '<span class="meta-sep"> | </span>' ); ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'brnm' ), __( '1 Comment', 'brnm' ), __( '% Comments', 'brnm' ) ); ?></span>
			
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->

	<?php comments_template( '', true ); ?>

<?php endwhile; ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-below">
		<div class="section-heading visuallyhidden"><?php _e( 'Post navigation', 'brnm' ); ?></div>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'brnm' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'brnm' ) ); ?></div>
	</nav><!-- #nav-below -->
<?php endif; ?>
