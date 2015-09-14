<?php
/**
  * Index
  *
  * Default page that loads on blogroll items
  * @package custom2015
 **/
 

get_header(); ?>

<div id="main">
	<main id="main-content" class="cf">

		<?php if( brnm_display_page_titles() ): ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php echo get_the_title(brnm_session('page_for_posts')); ?></h1>
			</header><!-- .entry-header -->
		<?php endif; ?>

		<?php get_template_part( 'loop', 'index' ); ?>

	</main><!-- #main-content -->
</div><!-- #main -->

<?php get_footer(); ?>