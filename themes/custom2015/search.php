<?php 
/**
  * Search
  *
  * Displays search results
  * @package custom2014
 **/


get_header(); ?>

<div id="main">
	<main id="main-content" class="cf">

	<?php if ( have_posts() ) : ?>

		<header class="entry-header">
			<h1 class="entry-title"><?php printf( __( brnm_var('archivesearch') . '%s', 'brnm' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header>

		<?php get_template_part( 'loop', 'search' ); ?>

	<?php else : ?>

		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found Matching Your Search', 'brnm' ); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'brnm' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->

	<?php endif; ?>

	</main><!-- #main-content -->
</div><!-- #main -->

<?php get_footer(); ?>