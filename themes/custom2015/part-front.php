<?php
/**
  * Front page Content
  *
  * Specific, customizable content for the front page
  * @package custom2014
 **/


get_header();
if(is_page_template('page-fullwidth.php')) $class = 'full-width'; ?>
	
<div id="main" class="<?php echo $class; ?>">
	<main id="main-content" class="cf <?php echo $class; ?>">

		<?php the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
			<?php if( brnm_display_page_titles() ): ?>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->
			<?php endif; ?>
	
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'brnm' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->

		</article><!-- #post-<?php the_ID(); ?> -->


	</main><!-- #main-content -->
</div><!-- #main -->

<?php get_footer(); ?>