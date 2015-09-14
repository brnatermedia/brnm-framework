<?php
/**
  * Tag
  *
  * The template used to display Tag Archive pages
  * @package custom2014
 **/


get_header(); ?>

<div id="main">
	<main id="main-content" class="cf">

		<?php the_post(); ?>

		<header class="entry-header">
			<h1 class="page-title"><?php
				printf( __( brnm_var('archivetags') . '%s', 'brnm' ), '<span>' . single_tag_title( '', false ) . '</span>' );
			?></h1>
		</header>

		<?php rewind_posts(); ?>

		<?php get_template_part( 'loop', 'tag' ); ?>

	</main><!-- #main-content -->
</div><!-- #main -->

<?php get_footer(); ?>