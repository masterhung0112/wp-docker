<?php
/**
 * Client Logo  Section
 */
function agency_lite_logo_page(){
    $agency_lite_client_logo_enable = get_theme_mod('agency_lite_client_logo_enable','on');
    if($agency_lite_client_logo_enable == 'on'){
    ?>
    <section class = "agency-lite-section-logo agency-lite-home-section" id = "agency-lite-scroll-logo">
        <div class = "agency-lite-container clearfix">
            <div class="agency-lite-logo-container owl-carousel">
                <?php do_action('agency_lite_client_logo');  ?>
            </div>
        </div>
    </section>
    <?php 
    }
}

add_action('agency_lite_logo_page','agency_lite_logo_page');


/*
* Client logo function
*
*/
if( ! function_exists('agency_lite_client_logo') ){
    function agency_lite_client_logo(){
        $agency_lite_client_logo_rep = get_theme_mod('agency_lite_client_logo_rep');
        $agency_lite_logos = json_decode( $agency_lite_client_logo_rep );
        
        if($agency_lite_logos){
            foreach( $agency_lite_logos as $agency_lite_logo ){ 
            $logo_url = $agency_lite_logo->cl_logo;
            $cl_link  = $agency_lite_logo->cl_url;

            $link_open = '';
            $link_close = '';
            if( $cl_link ){
              $link_open = '<a href="'.esc_url($cl_link).'" target="_blank">';
              $link_close = '</a>';
            }

            if( $logo_url ){ ?>
                <div class="client-contents wow fadeInUp">
                   <?php echo $link_open; // WPCS: XSS OK. ?>
                    <div class="client-logo-image">
                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php the_title_attribute() ?>" title="<?php the_title_attribute() ?>" />
                    </div>
                    <?php echo $link_close; // WPCS: XSS OK. ?>
                </div>
            <?php
           }
           }
    }
         }
}
add_action( 'agency_lite_client_logo', 'agency_lite_client_logo' );