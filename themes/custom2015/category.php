<?php
/**
  * Category Template
  *
  * Displays category blog roll posts
  * @package custom2014
 **/


get_header(); ?>

<div id="main">
	<main id="main-content" class="cf">

		<header class="page-header">
			<h1 class="page-title"><?php
				printf( __( 'Category Archives: %s', 'brnm' ), '<span>' . single_cat_title( '', false ) . '</span>' );
			?></h1>
			<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
		</header>

		<?php get_template_part( 'loop', 'category' ); ?>

	</main><!-- #main-content -->
</div><!-- #main -->

<?php get_footer(); ?>