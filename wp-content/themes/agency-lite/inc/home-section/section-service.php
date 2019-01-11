<?php 

function agency_lite_services_pages(){
    $agency_lite_enable_service_slider_control = get_theme_mod('agency_lite_enable_service_slider_control','on');
    if($agency_lite_enable_service_slider_control == 'on'){
        ?>
        <section class = "agency-lite-service-page-wrap agency-lite-home-section" id ="agency-lite-scroll-service">
            <div class="agency-lite-container-full">
                <div class = "agency-lite-service-slider owl-carousel">
                    <?php

                    $services_pages = array('one','two', 'three','four','five' );
                    $count = 0;
                    foreach ($services_pages as $services_page) {
                        $agency_lite_service_slider_page = get_theme_mod('agency_lite_'.$services_page.'_slider_pages');
                        if($agency_lite_service_slider_page){
                            $count++;
                            $agency_lite_service_slider_args = array(
                                'post_type' => 'page',
                                'post_status' => 'publish',
                                'p' => absint($agency_lite_service_slider_page));
                            $agenscy_lite_service_query = new WP_Query($agency_lite_service_slider_args);
                            if($agenscy_lite_service_query->have_posts()){?>
                                <?php 
                                while($agenscy_lite_service_query->have_posts()){
                                    $agenscy_lite_service_query->the_post();
                                    $agency_lite_service_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
                                    $agency_lite_service_image_url = $agency_lite_service_image_src[0];
                                   
                                    ?>
                                    <div class = "agency-lite-service-slidder-wrapper clearfix">
                                        <div class = "agency-lite-featured-image" style="background-image:url('<?php echo esc_url($agency_lite_service_image_url); ?>'); background-size:cover; background-repeat: no-repeat; background-position: center;">
                                        </div>
                                        <div class = "agency_lite_featured-content">
                                            <div class = "agency-lite-service-num">
                                                 <?php 
                                                    echo esc_html('0'.$count);
                                                 ?>
                                            </div>
                                            <div class="agency_lite_featured-content-main">
                                                <a class="agency-lite-feature-title" href="<?php the_permalink(); ?>">
                                                    <h2><?php the_title(); ?></h2>
                                                </a>
                                                <p><?php echo esc_attr(wp_trim_words( get_the_content(), 15, '...' )); ?></p>
                                                <div class = "serv-btn">
                                                    <a href="<?php the_permalink(); ?>">Read More</a>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>        
                                <?php 
                                }
                                ?>
                        <?php 

                        wp_reset_postdata();
                        }
                        }

                    }
                    ?>
                </div>
            </div>
        </section>
<?php }
}


add_action('agency_lite_services_pages','agency_lite_services_pages');