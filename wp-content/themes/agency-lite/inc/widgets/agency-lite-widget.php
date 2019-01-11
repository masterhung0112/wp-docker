<?php

/**
 * @package Construction
 */
function agency_lite_widgets_show_widget_field($instance = '', $widget_field = '', $agency_lite_field_value = '') {
    // Store Posts in array
    $agency_lite_postlist[0] = array(
        'value' => 0,
        'label' => esc_html__('--choose--', 'agency-lite')
    );
    $arg = array('posts_per_page' => -1);
    $agency_lite_posts = get_posts($arg);
    foreach ($agency_lite_posts as $agency_lite_post) :
        $agency_lite_postlist[$agency_lite_post->ID] = array(
            'value' => $agency_lite_post->ID,
            'label' => $agency_lite_post->post_title
        );
    endforeach;

    extract($widget_field);

    switch ($agency_lite_widgets_field_type) {

        // Standard text field
        case 'text' : ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>"><?php echo esc_html($agency_lite_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($agency_lite_widgets_name)); ?>" type="text" value="<?php echo esc_attr($agency_lite_field_value); ?>" />

                <?php if (isset($agency_lite_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($agency_lite_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Standard url field
        case 'url' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>"><?php echo esc_html($agency_lite_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($agency_lite_widgets_name)); ?>" type="text" value="<?php echo esc_attr($agency_lite_field_value); ?>" />

                <?php if (isset($agency_lite_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($agency_lite_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Textarea field
        case 'textarea' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>"><?php echo esc_html($agency_lite_widgets_title); ?>:</label>
                <textarea class="widefat" id="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($agency_lite_widgets_name)); ?>"><?php echo esc_textarea($agency_lite_field_value); ?></textarea>
            </p>
            <?php
            break;

        // Checkbox field
        case 'checkbox' :
            ?>
            <p>
                <input id="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($agency_lite_widgets_name)); ?>" type="checkbox" value="1" <?php checked('1', $agency_lite_field_value); ?>/>
                <label for="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>"><?php echo esc_html($agency_lite_widgets_title); ?></label>

                <?php if (isset($agency_lite_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($agency_lite_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Radio fields
        case 'radio' :
            ?>
            <p>
                <?php
                echo esc_html($agency_lite_widgets_title);
                echo '<br />';
                foreach ($agency_lite_widgets_field_options as $agency_lite_option_name => $agency_lite_option_title) {
                    ?>
                    <input id="<?php echo esc_attr($instance->get_field_id($agency_lite_option_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($agency_lite_widgets_name)); ?>" type="radio" value="<?php echo esc_attr($agency_lite_option_name); ?>" <?php checked($agency_lite_option_name, $agency_lite_field_value); ?> />
                    <label for="<?php echo esc_attr($instance->get_field_id($agency_lite_option_name)); ?>"><?php echo esc_html($agency_lite_option_title); ?></label>
                    <br />
                <?php } ?>

                <?php if (isset($agency_lite_widgets_description)) { ?>
                    <small><?php echo wp_kses_post($agency_lite_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'select' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>"><?php echo esc_html($agency_lite_widgets_title); ?>:</label>
                <select name="<?php echo esc_attr($instance->get_field_name($agency_lite_widgets_name)); ?>" id="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>" class="widefat">
                    <?php foreach ($agency_lite_widgets_field_options as $agency_lite_option_name => $agency_lite_option_title) { ?>
                        <option value="<?php echo esc_attr($agency_lite_option_name); ?>" id="<?php echo esc_attr($instance->get_field_id($agency_lite_option_name)); ?>" <?php selected($agency_lite_option_name, $agency_lite_field_value); ?>><?php echo esc_html($agency_lite_option_title); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($agency_lite_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($agency_lite_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'number' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>"><?php echo esc_html($agency_lite_widgets_title); ?>:</label><br />
                <input name="<?php echo esc_attr($instance->get_field_name($agency_lite_widgets_name)); ?>" type="number" step="1" min="1" id="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>" value="<?php echo esc_attr($agency_lite_field_value); ?>" class="small-text" />

                <?php if (isset($agency_lite_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($agency_lite_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'selectpost' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>"><?php echo esc_html($agency_lite_widgets_title); ?>:</label>
                <select name="<?php echo esc_attr($instance->get_field_name($agency_lite_widgets_name)); ?>" id="<?php echo esc_attr($instance->get_field_id($agency_lite_widgets_name)); ?>" class="widefat">
                    <?php foreach ($agency_lite_postlist as $agency_lite_single_post) { ?>
                        <option value="<?php echo esc_attr($agency_lite_single_post['value']); ?>" id="<?php echo esc_attr($instance->get_field_id($agency_lite_single_post['label'])); ?>" <?php selected($agency_lite_single_post['value'], $agency_lite_field_value); ?>><?php echo esc_html($agency_lite_single_post['label']); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($agency_lite_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($agency_lite_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'upload' :

            $output = '';
            $id = esc_attr($instance->get_field_id($agency_lite_widgets_name));
            $class = '';
            $int = '';
            $value = esc_attr($agency_lite_field_value);
            $name = esc_attr($instance->get_field_name($agency_lite_widgets_name));


            if ($value) {
                $class = ' has-file';
            }
            $output .= '<div class="sub-option widget-upload">';
            $output .= '<label for="' . esc_attr($instance->get_field_id($agency_lite_widgets_name)) . '">' . $agency_lite_widgets_title . '</label><br/>';
            $output .= '<input id="' . $id . '" class="upload' . $class . '" type="text" name="' . $name . '" value="' . $value . '" placeholder="' . esc_html__('No file chosen', 'agency-lite') . '" />' . "\n";
            if (function_exists('wp_enqueue_media')) {
                
                    $output .= '<input id="upload-' . $id . '" class="upload-button button" type="button" value="' . __('Upload', 'agency-lite') . '" />' . "\n";

            } else {
                $output .= '<p><i>' . esc_html__('Upgrade your version of WordPress for full media support.', 'agency-lite') . '</i></p>';
            }

            $output .= '<div class="screenshot team-thumb" id="' . $id . '-image">' . "\n";

            if ($value != '') {
                $remove = '<a class="remove-image remove-screenshot">Remove</a>';
                $attachment_id = attachment_url_to_postid($value);

                $image_array = wp_get_attachment_image_src($attachment_id, 'medium');
                $image = preg_match('/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value);
                if ($image) {
                    $output .= '<img src="' . $image_array[0] . '" alt="" />' . $remove;
                } else {
                    $parts = explode("/", $value);
                    for ($i = 0; $i < sizeof($parts); ++$i) {
                        $title = $parts[$i];
                    }

                    // No output preview if it's not an image.
                    $output .= '';

                    // Standard generic output if it's not an image.
                    $title = esc_html__('View File', 'agency-lite');
                    $output .= '<div class="no-image"><span class="file_link"><a href="' . $value . '" target="_blank" rel="external">' . $title . '</a></span></div>';
                }
            }
            $output .= '</div></div>' . "\n";
            echo $output; // WPCS: XSS OK.
            break;
    }
}

function agency_lite_widgets_updated_field_value($widget_field, $new_field_value) {

    extract($widget_field);

    // Allow only integers in number fields
    if ($agency_lite_widgets_field_type == 'number') {
        return absint($new_field_value);

        // Allow some tags in textareas
    } elseif ($agency_lite_widgets_field_type == 'textarea') {
        // Check if field array specifed allowed tags
        if (!isset($agency_lite_widgets_allowed_tags)) {
            // If not, fallback to default tags
            $agency_lite_widgets_allowed_tags = '<p><strong><em><a>';
        }
        return strip_tags($new_field_value, $agency_lite_widgets_allowed_tags);

        // No allowed tags for all other fields
    } elseif ($agency_lite_widgets_field_type == 'url') {
        return esc_url_raw($new_field_value);
    } else {
        return strip_tags($new_field_value);
    }
}