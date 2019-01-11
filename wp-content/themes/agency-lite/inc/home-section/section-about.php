<?php 

/**
 * About Section
*/
function agency_lite_home_section(){
    $agency_lite_home_about_us_enable = get_theme_mod('agency_lite_home_about_us_enable','on');
    if( $agency_lite_home_about_us_enable == 'on' ){
        $agency_lite_about_page = get_theme_mod('agency_lite_about_page');
        $agency_lite_about_args = new WP_Query(array(
            'post_type' => 'page', 
            'post_status' => 'publish',
            'post__in' => array($agency_lite_about_page)));
        ?>
            <section class ="agency-lite-about-us-section agency-lite-home-section" id = "agency-lite-scroll-about">
            	<div class="agency-lite-container">
                    <?php if($agency_lite_about_args->have_posts()):
                        while($agency_lite_about_args->have_posts()) : 
                            $agency_lite_about_args->the_post(); ?>
                                <div class="about-content-wrap clearfix">
                                    <div class="left-about-content wow fadeInLeft">
                                            <div class="section-title-sub-wrap">
                                                <div class="section-title"><h2><?php echo the_title(); ?></h2></div>
                                            </div>
                                        <?php if(get_the_content()){ ?>
                                            <div class="about-posts">
                                                <?php if(get_the_content()){ ?><div class="about-post-content"><?php echo esc_html(wp_trim_words(get_the_content(),'50','...')) ?></div><?php } ?>
                                                <span class="about-button"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','agency-lite'); ?></a></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php
                                        $agency_lite_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'agency-lite-about-image');
                                        if($agency_lite_image_src){
                                    ?>
                                        <div class="right-about-content wow fadeInRight">
                                            <div class="about-image-wrap"><img src="<?php echo esc_url($agency_lite_image_src[0]); ?>" title="<?php the_title_attribute() ?>" alt="<?php the_title_attribute() ?>"/></div>
                                        </div>
                                        <?php } ?>
                                </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php
    }
}


 add_action('agency_lite_home_section','agency_lite_home_section');

