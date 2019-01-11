<?php 

function agency_lite_footer_section_page(){

	if( is_active_sidebar('footer-widget-area-one') || is_active_sidebar('footer-widget-area-two') || is_active_sidebar('footer-widget-area-three') || is_active_sidebar('footer-widget-area-four') ){
		?>
		<section id = "agency-lite-section-footer-wrap" class="agency-lite-section-footer-wrap-main clearfix">
			<?php if(is_active_sidebar('footer-widget-area-one')){ ?>
	            <div class="team-members-contents  clearfix">
	                <?php
	                    dynamic_sidebar('footer-widget-area-one');
	                ?>
	            </div>
   			 <?php } ?>
   			 <?php if(is_active_sidebar('footer-widget-area-two')){ ?>
	            <div class="team-members-contents  clearfix">
	                <?php
	                    dynamic_sidebar('footer-widget-area-two');
	                ?>
	            </div>
   			 <?php } ?>
   			 <?php if(is_active_sidebar('footer-widget-area-three')){ ?>
	            <div class="team-members-contents  clearfix">
	                <?php
	                    dynamic_sidebar('footer-widget-area-three');
	                ?>
	            </div>
   			 <?php } ?>
   			 <?php if(is_active_sidebar('footer-widget-area-four')){ ?>
	            <div class="team-members-contents  clearfix">
	                <?php
	                    dynamic_sidebar('footer-widget-area-four');
	                ?>
	            </div>
   			 <?php } ?>
		</section>
	<?php 
	}
}

add_action('agency_lite_footer_section_page','agency_lite_footer_section_page');

function agency_lite_footer_nav_menu()
{?>	
	<div class = "agency-lite-footer-nav-menu">
		<?php 
			wp_nav_menu( array(
				'theme_location' => 'agency-lite-footer-menu',
				'menu_id'        => 'footer-menu',
				'fallback_cb' => false
			));
		?>
	</div>
	<?php 
}
add_action('agency_lite_footer_nav_menu','agency_lite_footer_nav_menu');

// Social Icons

if( ! function_exists('agency_lite_footer_social_icons')){

  function agency_lite_footer_social_icons(){
        $agency_lite_footer_icon_enable = esc_attr( get_theme_mod('agency_lite_footer_icon_enable','on') );
        if( $agency_lite_footer_icon_enable == 'on' ){
        	?>
        	<div class = "agency-lite-social-icons">
        		<?php agency_lite_social_icons(); ?>
        	</div>
        	<?php 
        }
    }
} 
add_action( 'agency_lite_after_footer', 'agency_lite_footer_social_icons');

function agency_lite_footer_copyright_fn()
{
	$agency_lite_footer_copyright = get_theme_mod('agency_lite_footer_copyright');
	$agency_lite_footer_image_control = get_theme_mod('agency_lite_footer_image_control');
	?>
	<div class = "agency-lite-footer-wrap ">
		<div class="agency-lite-container clearfix">
			<div class = "agency-lite-footer-copyright">
				<?php
				  if( !empty($agency_lite_footer_copyright)){
	                        echo wp_kses_post($agency_lite_footer_copyright) . " | "; 
		            } ?>
		            WordPress Theme : <a href="https://accesspressthemes.com/wordpress-themes/agency-lite" target="_blank">Agency Lite</a> 
			</div>

			<div class = "agency-lite-footer-image-control"> 
			<?php if($agency_lite_footer_image_control){ ?>
				<img src="<?php echo esc_url($agency_lite_footer_image_control); ?>" />
			<?php } ?>
			</div>
		</div>
	</div>
	<?php 

}
add_action('agency_lite_footer_copyright_fn','agency_lite_footer_copyright_fn');


                   