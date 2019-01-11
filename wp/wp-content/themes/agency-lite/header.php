<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agency Lite
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebPage">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<?php do_action('agency_lite_top_header'); ?>
	
	<header id="masthead" class="site-header">
		<div class = "agency-lite-container">
		<div class="site-branding">
			<?php
			if(has_custom_logo()){
				the_custom_logo();
			}else{
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
			endif; 
			}
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-align-justify"></i></button>
			<?php
				wp_nav_menu( array(
					'theme_location' 		=> 'agency-lite-primary-menu',
					'menu_id'        		=> 'primary-menu',
					'container_class'		=> 'primary-menu',
					'fallback_cb'			=> false
				) );
			?>
		</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<?php 
	  if(!is_front_page() ){
            do_action('agency_lite_header_banner'); 
        }


