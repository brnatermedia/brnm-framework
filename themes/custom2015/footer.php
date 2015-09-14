<?php 
/**
  * Footer
  *
  * Shows page footer
  * @package custom2015
 **/


if( !is_page_template( 'page-fullwidth.php' ) ) get_sidebar(); ?>
</div><!-- #content-wrap -->
</div><!-- #content  -->

<footer id="page-footer" role="contentinfo">

	<div class="footer-top">
		<div class="page-footer-wrap wrap cf">
		
			<div class="footer-left">
				<?php if( has_nav_menu( 'footer' ) ) : ?>
				<nav id="nav-footer1" class="nav-footer">
					<?php wp_nav_menu( array( 'theme_location' => 'footer', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				</nav>
				<?php endif; ?>
			</div><!-- .footer-left -->
			
			<div class="footer-right">
				<?php brnm_the_social_icons(); ?>
			</div><!-- .footer-right -->
			
		</div><!-- .page-footer-wrap -->
	</div><!-- .footer-top -->
	
	<div class="footer-bottom cf">
		<div class="page-footer-wrap wrap">
			<div id="copyright">&copy; <?php echo date('Y') . " " . get_bloginfo('name'); ?>. <span class="rights-reserved">All rights reserved.</span></div><!-- .copyright -->
			
			<?php global $agency_name, $agency_url, $agency_title; ?>
			<div id="developer">site powered by <a <?php echo brnm_the_follow('nofollow', 'interior'); ?> href="<?php echo $agency_url; ?>" target="_blank" title="<?php echo $agency_title; ?>"><?php echo $agency_name; ?></a></div>
		</div><!-- .page-footer-wrap -->
	</div><!-- .footer-bottom -->

</footer><!-- #page-footer -->
	
</div><!-- #container -->
</div><!-- #inner -->
</div><!-- #outer -->

<?php wp_footer(); ?>
<?php do_action('body_close'); ?>
</body>
</html>