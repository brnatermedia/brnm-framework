<?php
/**
  * Page Template
  *
  * Basic page setup
  * @package custom2014
 **/


get_header();

if(is_front_page()) { 
	include_once('part-front.php');
} else { ?>
	
	<div id="main">
		<main id="main-content" class="cf">
	
			<?php the_post(); ?>
	
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
				<?php if( brnm_display_page_titles() ): ?>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
				<?php endif; ?>
		
				<div class="entry-content">
					<?php
					// includes for custom template parts
					// manipulate as needed
					
					if(get_the_ID() == get_option('page-example1')) {
						include_once('part-'.$example1);
					}
					elseif(get_the_ID() == get_option('page-example2')) {
						include_once('part-'.$example2);
					}
					else {
						the_content();
					}
					?>
				</div><!-- .entry-content -->
	
			</article><!-- #post-<?php the_ID(); ?> -->
	
		</main><!-- #main-content -->
	</div><!-- #main -->
	
	<?php get_footer();
} ?>