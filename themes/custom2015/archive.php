<?php
/**
  * Archive Template
  *
  * Blog roll of archived posts
  * @package custom2014
 **/


get_header(); ?>

<div id="main">
	<main id="main-content" class="cf">

		<?php the_post(); ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php if ( is_day() ) : ?>
					<?php printf( __( brnm_var('archivedaily') . '<span>%s</span>', 'brnm' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( brnm_var('archivemonthly') . '<span>%s</span>', 'brnm' ), get_the_date( 'F Y' ) ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( brnm_var('archiveyearly') . '<span>%s</span>', 'brnm' ), get_the_date( 'Y' ) ); ?>
				<?php else : ?>
					<?php _e( brnm_var('blogtitle'), 'brnm' ); ?>
				<?php endif; ?>
			</h1>
		</header>

		<?php rewind_posts(); ?>

		<?php get_template_part( 'loop', 'archive' ); ?>

	</main><!-- #main-content -->
</div><!-- #main -->

<?php get_footer(); ?>