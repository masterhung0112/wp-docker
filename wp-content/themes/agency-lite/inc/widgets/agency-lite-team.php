<?php
/**
 *
 * @package construction
 */
 if(!function_exists('agency_lite_team_widget')){
add_action('widgets_init', 'agency_lite_team_widget');

function agency_lite_team_widget() {
    register_widget('agency_lite_team');
}
}
if(!class_exists('agency_lite_team')){
class agency_lite_team extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'agency_lite_team', 'Agency Lite : Team',
             array(
                'description' => esc_html__('Team Members', 'agency-lite')
                )
            );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $agency_lite_page_lists = agency_lite_page_lists();
        $fields = array(
            'agency_lite_team_member_page' => array(
                'agency_lite_widgets_name' => 'agency_lite_team_member_page',
                'agency_lite_widgets_title' => esc_html__('Team Member Page', 'agency-lite'),
                'agency_lite_widgets_field_type' => 'select',
                'agency_lite_widgets_field_options' => $agency_lite_page_lists,

            ),
            'agency_lite_team_member_designation' => array(
                'agency_lite_widgets_name' => 'agency_lite_team_member_designation',
                'agency_lite_widgets_title' => esc_html__('Member Designation', 'agency-lite'),
                'agency_lite_widgets_field_type' => 'text',
            ),
            'agency_lite_team_member_facebook' => array(
                'agency_lite_widgets_name' => 'agency_lite_team_member_facebook',
                'agency_lite_widgets_title' => esc_html__('Facebook Link', 'agency-lite'),
                'agency_lite_widgets_field_type' => 'url',
            ),
            'agency_lite_team_member_twitter' => array(
                'agency_lite_widgets_name' => 'agency_lite_team_member_twitter',
                'agency_lite_widgets_title' => esc_html__('Twitter Link', 'agency-lite'),
                'agency_lite_widgets_field_type' => 'url',
            ),
            'agency_lite_team_member_google' => array(
                'agency_lite_widgets_name' => 'agency_lite_team_member_google',
                'agency_lite_widgets_title' => esc_html__('Google Plus Link', 'agency-lite'),
                'agency_lite_widgets_field_type' => 'url',
            ),
            'agency_lite_team_member_youtube' => array(
                'agency_lite_widgets_name' => 'agency_lite_team_member_youtube',
                'agency_lite_widgets_title' => esc_html__('Youtube Link', 'agency-lite'),
                'agency_lite_widgets_field_type' => 'url',
            ),
            'agency_lite_team_member_instagram' => array(
                'agency_lite_widgets_name' => 'agency_lite_team_member_instagram',
                'agency_lite_widgets_title' => esc_html__('Instagram Link', 'agency-lite'),
                'agency_lite_widgets_field_type' => 'url',
            ),
            'agency_lite_team_member_linkedin' => array(
                'agency_lite_widgets_name' => 'agency_lite_team_member_linkedin',
                'agency_lite_widgets_title' => esc_html__('LinkedIn', 'agency-lite'),
                'agency_lite_widgets_field_type' => 'url',
            ),
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        $agency_lite_team_member_page = $instance['agency_lite_team_member_page'];
        $agency_lite_member_designatoin = $instance['agency_lite_team_member_designation'];
        
        $agency_lite_facebook_link = $instance['agency_lite_team_member_facebook'];
        $agency_lite_twitter_link = $instance['agency_lite_team_member_twitter'];
        $agency_lite_google_link = $instance['agency_lite_team_member_google'];
        $agency_lite_youtube_link = $instance['agency_lite_team_member_youtube'];
        $agency_lite_instagram_link = $instance['agency_lite_team_member_instagram'];
        $agency_lite_linkedin_link = $instance['agency_lite_team_member_linkedin'];
        
        echo wp_kses_post($before_widget);
        if($agency_lite_team_member_page ||  $agency_lite_member_designatoin ||  $agency_lite_google_link || $agency_lite_twitter_link ||  $agency_lite_facebook_link || $agency_lite_youtube_link || $agency_lite_instagram_link ||  $agency_lite_linkedin_link){
            
            $agency_lite_team_pages = new WP_Query(array('post_type' => 'page', 'p' => ($agency_lite_team_member_page)));
            if($agency_lite_team_pages->have_posts()){
                while($agency_lite_team_pages->have_posts()){
                    $agency_lite_team_pages->the_post();
                    $agency_lite_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'agency-lite-team-image');
                ?>
                    <div class="team-members wow fadeInUp">
                        <?php if($agency_lite_image_src[0]){ ?>
                        <div class="member-image">
                            <img src="<?php echo esc_url($agency_lite_image_src[0]); ?>" title="<?php the_title_attribute();?>" alt="<?php the_title_attribute();?>" />
                        <div class = "agency-lite-team-logo-icon"></div>   
                            
                            <div class="team-desc-social-wrap">
                                <?php if(get_the_content()){ ?>
                                    <div class="member-description">
                                        <?php echo esc_html(wp_trim_words(get_the_content(),'20','...')); ?>
                                    </div>
                                <?php } ?>

                                <?php if($agency_lite_google_link || 
                                        $agency_lite_twitter_link || 
                                        $agency_lite_facebook_link || 
                                        $agency_lite_youtube_link || 
                                        $agency_lite_instagram_link || 
                                        $agency_lite_linkedin_link){ ?>
                                            <div class="member-social-profile">
                                                <?php if($agency_lite_facebook_link){ ?><a target="_blank" href="<?php echo esc_url($agency_lite_facebook_link); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a><?php } ?>
                                                <?php if($agency_lite_twitter_link){ ?><a target="_blank" href="<?php echo esc_url($agency_lite_twitter_link); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a><?php } ?>
                                                <?php if($agency_lite_google_link){ ?><a target="_blank" href="<?php echo esc_url($agency_lite_google_link); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a><?php } ?>
                                                <?php if($agency_lite_youtube_link){ ?><a target="_blank" href="<?php echo esc_url($agency_lite_youtube_link); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a><?php } ?>
                                                <?php if($agency_lite_instagram_link){ ?><a target="_blank" href="<?php echo esc_url($agency_lite_instagram_link); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a><?php } ?>
                                                <?php if($agency_lite_linkedin_link){ ?><a target="_blank" href="<?php echo esc_url($agency_lite_linkedin_link); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a><?php } ?>
                                            </div>
                                <?php } ?>
                            </div><!-- .team-desc-social-wrap -->
                        </div>
                        <?php } ?>
                        <div class="team-sub-wrap">
                            <div class="member-name-designation">
                                <?php if(get_the_title()){ ?>
                                    <div class="member-name">
                                        <h5><?php the_title(); ?></h5>
                                    </div>
                                <?php } ?>
                                <?php if($agency_lite_member_designatoin){ ?>
                                    <div class="member-designation">
                                        <?php echo esc_html($agency_lite_member_designatoin); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                         
                    </div>
            <?php
                }
            }
        }
        
        echo wp_kses_post($after_widget);
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$agency_lite_widgets_name] = agency_lite_widgets_updated_field_value($widget_field, $new_instance[$agency_lite_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	agency_lite_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $agency_lite_widgets_field_value = !empty($instance[$agency_lite_widgets_name]) ? esc_html($instance[$agency_lite_widgets_name]) : '';
            agency_lite_widgets_show_widget_field($this, $widget_field, $agency_lite_widgets_field_value);
        }
    }

}
}