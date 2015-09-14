<?php
/**
  * Header
  *
  * Page header
  * @package custom2015
 **/

include_once(BRNM_FRAME .'/head.php');	
?>
<body <?php body_class(); ?>>
<?php do_action('body_open'); ?>

<div id="outer">
<div id="inner">
<div id="container" class="hfeed cf">
	<header id="page-header" role="banner">
		<div class="header-top">
			<div class="page-header-wrap wrap cf">
	
				<div id="branding">
					<div id="site-title"><?php brnm_the_logo(0.8); ?></div><!-- .site-title -->
				</div><!-- #branding -->
				
				<?php if( has_nav_menu( 'utility' ) ) : ?> 
				<nav id="nav-utility1" class="nav-utility">
					<?php wp_nav_menu( array( 'theme_location' => 'utility', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				</nav><!-- #nav-utility -->
				<?php endif; ?>
	
				<nav id="nav-primary1" class="nav-primary">
					<div class="tablet mobile"><div id="nav-click"><a href="#"><span class="ir">close</span></a></div></div><!-- .tablet mobile -->
					<div class="section-heading visuallyhidden"><?php _e( 'Main menu', 'brnm' ); ?></div>
					<div class="skip-link visuallyhidden"><a href="#main" title="<?php esc_attr_e( 'Skip to content', 'brnm' ); ?>"><?php _e( 'Skip to content', 'brnm' ); ?></a></div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				</nav><!-- #nav-primary -->
			</div><!-- .page-header-wrap -->
		</div><!-- .header-top -->
		
		
		<div class="header-bottom wrap">
			<?php
			if(is_front_page()) {
				?><div class="stage stage-front"><?php
					$slider_options = brnm_session('options_media_type');
					switch($slider_options) {
						case 'layerslider': include_once(get_template_directory().'/lib/layerslider.php'); break;
						case 'owlcarousel': include_once(get_template_directory().'/lib/owlcarousel.php'); break;
						case 'mosaic': include_once(get_template_directory().'/lib/mosaic.php'); break;
					}
				?></div><!-- .stage stage-front --><?php
			} else {
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
				if(get_the_ID() == brnm_session('options_page_contact') /* && is_plugin_active('MapPress') */) {
					echo do_shortcode('[mappress mapid="1"]');
				}
				elseif(has_post_thumbnail()) { ?>
					<div class="stage stage-interior">
						<div class="post-image"><?php the_post_thumbnail('header-image'); ?></div><!-- .post-image -->
					</div><!-- .stage stage-interior -->
				<?php }
			}
			?>
		</div><!-- .header-bottom -->
	</header><!-- #page-header -->

	<div id="content">
	<div id="content-wrap" class="wrap cf">