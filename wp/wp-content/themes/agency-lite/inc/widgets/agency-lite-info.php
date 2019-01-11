<?php
/**
Agency Lite Contact Info
*/

add_action('widgets_init', 'agency_lite_contact_details');
    
function agency_lite_contact_details(){
    register_widget('agency_lite_pro_contact_info_widget');
}

   /**
   * 
   */
   class agency_lite_Pro_Contact_Info_Widget extends WP_Widget
   {
   			public function __construct()
		   	{
			   		parent::__construct(
	                'agency_lite_contact_info',
	                esc_html__('Agency: Contact Information', 'agency-lite'),
	                array(
	                    'description' => __('A widget that shows contact information', 'agency-lite')
	                )
	           	 );
		   	}

		   	private function widget_fields() 
		   	{
		   		$fields = array(
		   			'gmap_contact_title' => array(
                    'agency_lite_widgets_name' => 'gmap_contact_title',
                    'agency_lite_widgets_title' => __('Title', 'agency-lite'),
                    'agency_lite_widgets_field_type' => 'text',
                ),
            'gmap_phone' => array(
            'agency_lite_widgets_name' => 'gmap_phone',
            'agency_lite_widgets_title' => __(' Phone', 'agency-lite'),
            'agency_lite_widgets_field_type' => 'text',
              
              ),

            'gmap_support_email' => array(
            'agency_lite_widgets_name' => 'gmap_support_email',
            'agency_lite_widgets_title' => __('Support', 'agency-lite'),
            'agency_lite_widgets_field_type' => 'text',
               ),

            'gmap_contact_email' => array(
            'agency_lite_widgets_name' => 'gmap_contact_email',
            'agency_lite_widgets_title' => __('Email', 'agency-lite'),
            'agency_lite_widgets_field_type' => 'text',
               ),

           'gmap_location' => array(
            'agency_lite_widgets_name' => 'gmap_location',
            'agency_lite_widgets_title' => __('Address', 'agency-lite'),
            'agency_lite_widgets_field_type' => 'text',
               ),
		   			);
		   		return $fields;
		   	}	

        /**
   * Front-end display of widget.
   *
   */

    public function widget($args, $instance) 
    {
              extract($args);
          if($instance!=null){   

              $gmap_contact_title = isset($instance['gmap_contact_title']) ? $instance['gmap_contact_title'] : '';
              $gmap_phone = isset($instance['gmap_phone']) ? $instance['gmap_phone'] : '';
              $gmap_support_email = isset($instance['gmap_support_email']) ? $instance['gmap_support_email'] : '';
              $gmap_contact_email = isset($instance['gmap_contact_email']) ? $instance['gmap_contact_email'] : '';
              $gmap_location = isset($instance['gmap_location']) ? $instance['gmap_location'] : '';

               echo $before_widget; // WPCS: XSS OK.
               ?>
               <div class = "agency-lite-contact-info-warp">
                <?php 
               //Show title
              if(!empty($gmap_contact_title)){
                   echo $before_title . esc_html($gmap_contact_title) . $after_title; // WPCS: XSS OK.
               }

              if( $gmap_phone || $gmap_support_email || $gmap_contact_email || $gmap_location ){ ?>
                <div class="agency-lite-contact-info">
                  <span class="contact_phone">
                   <i class="fa fa-mobile" aria-hidden="true"></i>
                  <a href="tel:<?php echo esc_html($gmap_phone); ?>">
                  <?php esc_html_e('Phone:','agency-lite'); ?><?php echo esc_html($gmap_phone); ?>
                  </a>
                  </span>
                  <span class="contact_email">
                     <i class="fa fa-headphones" aria-hidden="true"></i>
                    <a href="mailto:<?php echo esc_attr($gmap_support_email); ?>">
                   <?php esc_html_e('Support:','agency-lite'); ?><?php echo esc_attr($gmap_support_email); ?>
                    </a>
                  </span>
                  <span class="contact_web">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <a href="<?php echo esc_attr($gmap_contact_email); ?>" target="_blank">
                    <?php esc_html_e('Email:','agency-lite'); ?><?php echo esc_attr($gmap_contact_email); ?>
                    </a>  
                  </span>
                  <span class="contact_address">
                    <i class="fa fa-map-marker" aria-hidden="true"></i><?php esc_html_e('Location:','agency-lite'); ?><?php echo esc_attr($gmap_location); ?>
                  </span>
                </div>
          <?php } ?>
        </div>
        <?php 
       echo $after_widget; // WPCS: XSS OK.
      }
    }


    public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    $widget_fields = $this->widget_fields();

    // Loop through fields
    foreach( $widget_fields as $widget_field ) {

      extract( $widget_field );
  
      // Use helper function to get updated field values
      $instance[$agency_lite_widgets_name] = agency_lite_widgets_updated_field_value( $widget_field, $new_instance[$agency_lite_widgets_name] );
      
    }
        
    return $instance;
  }



  public function form( $instance ) {
    $widget_fields = $this->widget_fields();

    // Loop through fields
    foreach( $widget_fields as $widget_field ) {
      // Make array elements available as variables 
      extract( $widget_field );
      $agency_lite_widgets_field_value = isset( $instance[$agency_lite_widgets_name] ) ? esc_attr( $instance[$agency_lite_widgets_name] ) : '';
      agency_lite_widgets_show_widget_field( $this, $widget_field, $agency_lite_widgets_field_value );
    } 
  }
   }