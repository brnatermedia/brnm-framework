<?php 
/**
  * Single
  *
  * Used to show individual posts
  * @package custom2015
 **/


get_header(); ?>

<div id="main">
	<main id="main-content" class="cf">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<nav id="nav-above">
			<div class="section-heading visuallyhidden"><?php _e( 'Post navigation', 'brnm' ); ?></div>
			<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'brnm' ) . '</span> %title' ); ?></div>
			<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'brnm' ) . '</span>' ); ?></div>
		</nav><!-- #nav-above -->

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php get_template_part( 'content', get_post_format() ); ?>
		</article><!-- #post-<?php the_ID(); ?> -->

		<nav id="nav-below">
			<div class="section-heading visuallyhidden"><?php _e( 'Post navigation', 'brnm' ); ?></div>
			<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'brnm' ) . '</span> %title' ); ?></div>
			<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'brnm' ) . '</span>' ); ?></div>
		</nav><!-- #nav-below -->

		<?php comments_template( '', true ); ?>

	<?php endwhile; // end of the loop. ?>

	</main><!-- #main-content -->
</div><!-- #main -->

<?php get_footer(); ?>