<?php 

function agency_lite_blog_page(){

    $agency_lite_blog_page_enable = get_theme_mod('agency_lite_blog_page_enable','on');
    if($agency_lite_blog_page_enable == 'on'){
        $agency_lite_blog_title = get_theme_mod('agency_lite_blog_title');
        $agency_lite_blog_description = get_theme_mod('agency_lite_blog_description');
        ?>
        <section class = "agency-lite-blog-main agency-lite-home-section" id = "agency-lite-scroll-blog">
        <?php 
        if($agency_lite_blog_title || $agency_lite_blog_description){
            ?>
            <div class = "agency-lite-container">
                <div class = "agency-lite-wrap-content">
                    <?php if($agency_lite_blog_title || $agency_lite_blog_description){?>
                    <div class="section-title-sub-wrap wow fadeInUp">
                        <?php if($agency_lite_blog_title){ ?>
                            <div class="section-title">
                                <h2><?php echo esc_html($agency_lite_blog_title); ?></h2>
                            </div>
                        <?php } ?>
                        <?php if($agency_lite_blog_description) { ?>
                            <div class="section-description">
                                <?php echo esc_html($agency_lite_blog_description); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php
                            $agency_lite_blog_args = array(
                                'post_type' => 'post',
                                'order'     => 'DESC',
                                'posts_per_page' => 2,
                                'post_status' => 'publish',
                            );
                            $agency_lite_blog_query = new WP_Query($agency_lite_blog_args);
                            if($agency_lite_blog_query->have_posts()):
                  
                            ?>
                            <div class="blogs-contents clearfix">
                                <div id="blog-content-wrap" class="blog-content-wrap-main">
                                <?php while($agency_lite_blog_query->have_posts()):
                                    $agency_lite_blog_query->the_post();
                                    $agency_lite_blog_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'agency-lite-blog-image', true);
                                    $agency_lite_blog_image_url = $agency_lite_blog_image_src[0]; 
                                    if($agency_lite_blog_image_url || get_the_title() || get_the_content()){?>
                                        <div class="blogs-loop wow fadeInUp">
                                            <?php if($agency_lite_blog_image_url){ ?>
                                                <div class="image-wrap-blog">
                                                    <a href="<?php the_permalink() ?>">
                                                        <img src="<?php echo esc_url($agency_lite_blog_image_url); ?>" title="<?php the_title_attribute() ?>" alt="<?php the_title_attribute() ?>" />
                                                    </a>
                                                </div>
                                            <?php } ?>
                                            <?php if(get_the_title() || get_the_content()){ ?>
                                                <div class="blog-content">
                                                    <div class="wrap-date-comment">
                                                    <div class="blog-date">
                                                        <?php echo get_the_date(); ?>
                                                    </div>
                                                    <div class="author-comment">
                                                        <span class="blog-author"><?php echo esc_url(the_author_posts_link()); ?></span>
                                                    </div>
                                                </div>
                                                    <?php if(get_the_title()){ ?>
                                                        <div class="blog-title">
                                                            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                                        </div>
                                                    <?php } ?>
                                                    
                                                    <?php if(get_the_content()){ ?>
                                                        <div class="blog-content-contain">
                                                            <?php
                                                            echo esc_attr(wp_trim_words( get_the_content(), 30, '...' ));
                                                            ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                                </div>

                                <?php 
                            endif;
                        ?>

                </div>
            </div>

        <?php 
        }
            $blog_id = get_option('page_for_posts');
            if( $blog_id ):
                $view_all       = get_theme_mod('agency_lite_blog_view','Go to Blog');
                $archive_link = get_permalink(get_option('page_for_posts')); ?>

                <div class="blog-bttn">
                    <a href="<?php echo esc_url($archive_link ); ?>" class="view-all-btn">
                        <?php echo esc_attr($view_all);?>
                    </a>
                </div>
            <?php endif; ?>

        </section>
    <?php 
    }
}
add_action('agency_lite_blog_page','agency_lite_blog_page');
