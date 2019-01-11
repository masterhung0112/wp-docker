<?php
/**
 *
 * @package construction lite
 */
 if(!function_exists('agency_lite_recent_post_widget')){
add_action('widgets_init', 'agency_lite_recent_post_widget');

function agency_lite_recent_post_widget() {
    register_widget('agency_lite_recent_post');
}
}
if(!class_exists('agency_lite_recent_post')){
class agency_lite_recent_post extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'agency_lite_recent_post', esc_html__('Agency Lite : Recent Post', 'agency-lite'), array(
            'description' => esc_html__('Recent Posts', 'agency-lite')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $agency_lite_cat_list = agency_lite_cat_lists();
        $fields = array(
            'agency_lite_recent_post_title' => array(
                'agency_lite_widgets_name' => 'agency_lite_recent_post_title',
                'agency_lite_widgets_title' => esc_html__('Title', 'agency-lite'),
                'agency_lite_widgets_field_type' => 'text',
            ),
            'agency_lite_recent_post_cat' => array(
                'agency_lite_widgets_name' => 'agency_lite_recent_post_cat',
                'agency_lite_widgets_title' => esc_html__('Recent Post Category', 'agency-lite'),
                'agency_lite_widgets_field_type' => 'select',
                'agency_lite_widgets_field_options' => $agency_lite_cat_list,
            ),
            'agency_lite_recent_post_per_page' => array(
                'agency_lite_widgets_name' => 'agency_lite_recent_post_per_page',
                'agency_lite_widgets_title' => esc_html__('Posts Per Page', 'agency-lite'),
                'agency_lite_widgets_field_type' => 'number',
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
        $agency_lite_recent_post_title = isset($instance['agency_lite_recent_post_title']) ? $instance['agency_lite_recent_post_title'] : '';
        $agency_lite_recent_post_cat = isset($instance['agency_lite_recent_post_cat']) ? $instance['agency_lite_recent_post_cat'] : '';
        $agency_lite_recent_post_per_page = isset($instance['agency_lite_recent_post_per_page']) ? $instance['agency_lite_recent_post_per_page'] : '-1';
        echo wp_kses_post($before_widget);
            if($agency_lite_recent_post_title || $agency_lite_recent_post_cat){
                if($agency_lite_recent_post_title){
                    ?>
                        <h2 class="widget-title"><?php echo esc_html($agency_lite_recent_post_title); ?></h2>
                    <?php
                }
                $agency_lite_recent_post_args = array(
                        'post_type' => 'post',
                        'order' => 'DESC',
                        'posts_per_page' => $agency_lite_recent_post_per_page,
                        'post_status' => 'publish',
                        'category_name' => $agency_lite_recent_post_cat
                    );
                $agency_lite_recent_post_query = new WP_Query($agency_lite_recent_post_args);
                if($agency_lite_recent_post_query->have_posts()):
                    ?>
                    <div class="recent-post-widget">
                        <?php
                        while($agency_lite_recent_post_query->have_posts()):
                            $agency_lite_recent_post_query->the_post();
                            $agency_lite_recent_post_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'construction-recent-post-image');
                            $agency_lite_recent_post_image_url = $agency_lite_recent_post_image[0];
                            if($agency_lite_recent_post_image_url || get_the_title()){
                                ?>
                                    <div class="recent-posts-content clearfix">
                                        <?php if($agency_lite_recent_post_image_url){ ?><div class="image-recent-post"><img src="<?php echo esc_url($agency_lite_recent_post_image_url) ?>" alt="<?php the_title_attribute() ?>" title="<?php the_title_attribute() ?>" /></div><?php } ?>
                                        <div class="date-title-recent-post">
                                            <?php if(get_the_title()){ ?><span class="recent-post-title"><a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words(get_the_title(),'10','...')); ?></a></span><?php } ?>
                                            <span class="recent-post-date"><?php echo esc_html(get_the_date('d,F,Y')); ?></span>
                                        </div>
                                    </div>
                                <?php
                            }
                        endwhile;
                        //wp_reset_postdata();
                        ?>
                    </div>
                    <?php
                endif;
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
     * @param   array $instance Previously saved values from database.
     *
     * @uses    agency_lite_widgets_show_widget_field()      defined in widget-fields.php
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