<?php 


/**
* Top Header Function
*/
if( ! function_exists('agency_lite_top_header') ){
	function agency_lite_top_header(){
		$agency_lite_email_header_control = get_theme_mod('agency_lite_email_header_control');
		$agency_lite_phone_header_control = get_theme_mod('agency_lite_phone_header_control');
		$agency_lite_header_icon_enable = agency_lite_sanitize_textarea( get_theme_mod('agency_lite_header_icon_enable','on') );
		?>
		<?php if( $agency_lite_email_header_control || $agency_lite_phone_header_control || ($agency_lite_header_icon_enable == 'on') ) : ?>
			<div class="info-wrapper">
				<div class="agency-lite-container clearfix">

					<?php if( $agency_lite_email_header_control ) { ?>
						<div class="email">
							<a href="mailto:<?php echo esc_attr($agency_lite_email_header_control);?>">
								<i class="fa fa-envelope-o"></i>
								<span><?php echo esc_html($agency_lite_email_header_control);?></span>
							</a>
						</div>
					<?php } ?>
					<?php if( $agency_lite_phone_header_control ) { ?>
						<div class="phone">
							<a href="tel:<?php echo esc_attr($agency_lite_phone_header_control);  ?>">
								<i class="fa fa-mobile"></i>
								<span><?php echo esc_html($agency_lite_phone_header_control); ?></span>
							</a>
						</div>
					<?php } ?>
					<?php if( $agency_lite_header_icon_enable == 'on' ) : ?>
						<div class = "social-icons">
							<?php /**  Social Icons **/
			                    do_action('agenscy_after_header'); ?>
						</div>
					<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
	<?php 	
	}
}
add_action( 'agency_lite_top_header','agency_lite_top_header' );


// Social Icons
if( ! function_exists('agency_lite_header_social_icons')){

  function agency_lite_header_social_icons(){
        $agency_lite_header_icon_enable = agency_lite_sanitize_textarea( get_theme_mod('agency_lite_header_icon_enable','on') );
        if( $agency_lite_header_icon_enable == 'on' ){
          agency_lite_social_icons();
        }
    }
} add_action( 'agenscy_after_header', 'agency_lite_header_social_icons');

				
