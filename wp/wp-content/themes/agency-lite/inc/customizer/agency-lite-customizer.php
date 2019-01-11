<?php 

/** Header Settings **/

	$agency_lite_post_lists = agency_lite_page_lists(); 
	$agency_lite_cat_list   = agency_lite_cat_lists();   

	$wp_customize->add_panel( 'agency_lite_header_setting',array(
        'title' 		=>		 esc_html__('Header Setting','agency-lite'),
        'priority'	    =>	 	 1,
    ));

	$wp_customize->add_section('agency_lite_header_setting_section', array(
		'title'			=> 			esc_html__('Top Header','agency-lite'),
		'panel'			=> 			'agency_lite_header_setting'
	));


	$wp_customize->add_setting('agency_lite_email_header_control', array(
		'sanitize_callback' => 'sanitize_email',
	));

	$wp_customize->add_control( 'agency_lite_email_header_control', array(
		'label'		 => 		esc_html__('Enter Email','agency-lite'),
		'type'		 => 		'text',
		'section' 	 =>			'agency_lite_header_setting_section'
	));

	$wp_customize->add_setting('agency_lite_phone_header_control',array(
		'sanitize_callback' => 'sanitize_text_field',
	));


	$wp_customize->add_control( 'agency_lite_phone_header_control', array(
		'label'   => 		esc_html__('Enter Phone','agency-lite'),
		'type'	  => 		'text',
		'section' => 		'agency_lite_header_setting_section'
	));

	$wp_customize->add_setting( 'agency_lite_header_icon_enable',array(
        'sanitize_callback' => 'agency_lite_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agency_lite_Switch_Control( $wp_customize,'agency_lite_header_icon_enable',array(
       'label'         	=> esc_html__( 'Show social icons on header', 'agency-lite' ),
       'section'       	=> 'agency_lite_header_setting_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agency-lite' ),
         'off'         	=> esc_html__( 'Hide', 'agency-lite' ),
    ))));

	/** Social Icons **/

	$wp_customize->add_panel( 'agency_lite_general_setting',array(
        'title'			=> esc_html__('General Setting','agency-lite'),
        'description'	=> esc_html__('it shows Header setting','agency-lite'),
        'priority'		=> 1,
    ));


	$wp_customize->add_section( 'agency_lite_social_icon_section', array(
        'priority'     => 1,
        'panel'        => 'agency_lite_header_setting',
        'title'        => esc_html__('Social Icons', 'agency-lite'),
        'description'  => esc_html__('Manage social icons for your site', 'agency-lite'),
    ));

	// show social icons on header

	$social_icons = array('facebook','twitter','googlePlus','dribbble','youtube','linkedin');
	foreach( $social_icons as $social_icon){
	    
	    $wp_customize->add_setting( 'agency_lite_'.$social_icon.'_url', array(
            'sanitize_callback' => 'esc_url_raw'
        ));
	    $wp_customize->add_control( 'agency_lite_'.$social_icon.'_url', array(
            'section'       => 'agency_lite_social_icon_section',
            'label'         => esc_html__('Social Icon : ','agency-lite').ucwords($social_icon),
            'type'          => 'text'
        ));
	}

	//add slider
	$wp_customize->add_section('agency_lite_slider_section',array(
		'priority'		=>	1,
		'panel'			=>	'agency_lite_home_page_setting',
		'title'			=>	esc_html__('Slider Settings','agency-lite'),
	));

	$home_sliders = array('one','two', 'three' );
	foreach( $home_sliders as $home_slider ){

		$wp_customize->add_setting('agency_lite_banner_'.$home_slider.'_instruction',array(
			'sanitize_callback' =>	'esc_url_raw',
		));

		$wp_customize->add_control( new agency_lite_Section_Typo_Seperator($wp_customize,'agency_lite_banner_'.$home_slider.'_instruction',array(
	           'label'      => esc_html__( 'Banner Image', 'agency-lite' ). $home_slider,
	           'section'    => 'agency_lite_slider_section',
	    )));
		

		$wp_customize->add_setting('agency_lite_slider_page_'.$home_slider.'_control',array(
			'sanitize_callback' => 'absint',
			'default'			=> 0
		));

		$wp_customize->add_control('agency_lite_slider_page_'.$home_slider.'_control',array(
		 	'label'			=> esc_html__('Slider Page ','agency-lite'),
        	'description'	=> esc_html__('Choose page for Slider Section','agency-lite'),
			'type'			=> 'dropdown-pages',
			'section'		=> 'agency_lite_slider_section',
		));

		$wp_customize->add_setting('agency_lite_slider_'.$home_slider.'_btn_control',array(
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control('agency_lite_slider_'.$home_slider.'_btn_control',array(
			'label'		=> esc_html__('Button ','agency-lite').$home_slider,
			'type'		=> 'text',
			'section'	=> 'agency_lite_slider_section',
		));

		$wp_customize->add_setting('agency_lite_slider_'.$home_slider.'_url_control',array(
			'sanitize_callback' => 'esc_url',
		));

		$wp_customize->add_control('agency_lite_slider_'.$home_slider.'_url_control',array(
			'label'		=> esc_html__('Button Url','agency-lite'),
			'type'		=> 'url',
			'section'	=> 'agency_lite_slider_section',
		));
	}
	//adding image breadcrumb in general setting panel


    $wp_customize->add_setting( 'agency_lite_breadcrumb_image_enable',array(
		'sanitize_callback' => 'agency_lite_sanitize_textarea',
    ));

	$wp_customize->add_control( new agency_lite_Switch_Control( $wp_customize,'agency_lite_breadcrumb_image_enable',array(
       'section'       => 'header_image',
       'priority'	   => 1,
       'label'         => esc_html__( 'Enable Inner Page Header Image', 'agency-lite' ),
       'on_off_label'  => array(
       	'on'           => esc_html__( 'Show', 'agency-lite' ),
       	'off'          => esc_html__( 'Hide', 'agency-lite' ),
    ))));

	$wp_customize->add_section('header_image',array(
		'panel'			=> 'agency_lite_general_setting',
		'title'			=> esc_html__('Inner Page Header Image','agency-lite'),
	));

	//design settings 
	$wp_customize->add_section('agency_lite_blog_post_display_section',array(
		'panel'			=> 'agency_lite_general_setting',
		'title'			=> esc_html__('Blog Category Post','agency-lite'),
        'description' => esc_html__('Choose Categories to exclude posts in Blog Page','agency-lite'),

	));

	/** Exclude Multiple Category Control **/
       class agency_lite_Select_Mul_Cat_Control extends WP_Customize_Control {
           public function render_content() {
               $cats = $this->agency_lite_get_cat_list();
               $values = $this->value();
               
               if ( empty( $cats ) )
               return;
               ?>
               <label>
                   <?php if ( ! empty( $this->label ) ) : ?>
                       <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                   <?php endif;
                   if ( ! empty( $this->description ) ) : ?>
                       <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
                   <?php endif; ?>
                   
                   <?php if ( ! empty( $this->label ) ) : ?>
                       <div class="ex-cat-wrap">
                           <?php $cat_arr = explode(',', $values); array_pop($cat_arr); $count = 1; ?>
                           
                           <?php foreach($cats as $id => $label) : ?>
                               <div class="chk-group <?php if($count++%2 == 0){echo "right";}else{echo "left";} ?>">
                                   <input id="ex-cat-<?php echo absint($id); ?>" type="checkbox" value="<?php echo absint($id); ?>" <?php if(in_array($id,$cat_arr)){ echo "checked"; }; ?> />
                                   <label for="ex-cat-<?php echo absint($id); ?>"><?php echo esc_attr($label); ?></label>
                               </div>
                           <?php endforeach; ?>
                       </div>
                       <input type="hidden" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                   <?php endif; ?>    
               </label>
               <?php
           }
           public function agency_lite_get_cat_list() {
               $catlist = array();
               $categories = get_categories( array('hide_empty' => 0) );
               
               foreach($categories as $cat){
                   $catlist[$cat->term_id] = $cat->name;
               }
               
               return $catlist;
           }
        }


	/** Blog Exclude Category Control  **/
   $wp_customize->add_setting( 'agency_lite_exclude_cat' , array( 'default' => 0, 'sanitize_callback' => 'sanitize_text_field') );
   
   $wp_customize->add_control( new agency_lite_Select_Mul_Cat_Control( $wp_customize,'agency_lite_exclude_cat',array(
       'label'      => esc_html__( 'Exclude Category', 'agency-lite' ),
       'description' => esc_html__('Exclude categories from blog page', 'agency-lite'),
       'section'    => 'agency_lite_blog_post_display_section',
   )));



	//adding homepage setting panel

	$wp_customize->add_panel( 'agency_lite_home_page_setting',array(
        'title'			=> esc_html__('Home Section','agency-lite'),
        'description'	=> esc_html__('it shows Home Section','agency-lite'),
        'priority'		=> 3,
    ));

	$wp_customize->add_section('agency_lite_home_page_section',array(
		'panel'			=> 'agency_lite_home_page_setting',
		'title'			=> esc_html__('About Us Section','agency-lite'),
	));

	$wp_customize->add_setting( 'agency_lite_home_about_us_enable',array(
        'sanitize_callback' => 'agency_lite_sanitize_textarea',
        'default'           => 'on'
	));

	$wp_customize->add_control( new agency_lite_Switch_Control( $wp_customize,'agency_lite_home_about_us_enable',array(
       'section'       	=> 'agency_lite_home_page_section',
		'label'			=> esc_html__('Enable About Us','agency-lite'),
		'priority'		=> 1,
       	'on_off_label'  => array(
         'on'          	=> esc_html__( 'Yes', 'agency-lite' ),
         'off'          => esc_html__( 'No', 'agency-lite' ),
    ))));

    $wp_customize->add_setting( 'agency_lite_about_page', array(
	    'sanitize_callback' => 'absint',
	    'default' => 0,
	));


	$wp_customize->add_control('agency_lite_about_page', array(
        'label'			=> esc_html__('About Us Page','agency-lite'),
        'description'	=> esc_html__('Choose page for about us section','agency-lite'),
        'type'			=> 'dropdown-pages',
        'section'		=> 'agency_lite_home_page_section',
        'priority'		=> 10
	));

  //FAQ Section
 	$wp_customize->add_section('agency_lite_faq_section',array(
		'panel' => 'agency_lite_home_page_setting',
		'title' => esc_html__('FAQ Section','agency-lite'),
	));

	$wp_customize->add_setting( 'agency_lite_home_faq_enable',array(
        'sanitize_callback' => 'agency_lite_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agency_lite_Switch_Control( $wp_customize,'agency_lite_home_faq_enable',array(
       'label'         	=> esc_html__( 'Enable FAQ Section', 'agency-lite' ),
       'section'       	=> 'agency_lite_faq_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agency-lite' ),
         'off'         	=> esc_html__( 'Hide', 'agency-lite' ),
    ))));

	$wp_customize->add_setting('agency_lite_faq_title', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('agency_lite_faq_title', array(
        'label'			=> esc_html__('FAQ Section Title','agency-lite'),
        'type'			=> 'text',
        'priority'		=> 2,
        'section'		=> 'agency_lite_faq_section'
    ));

    $wp_customize->add_setting( 'agency_lite_faq_description', array(
	    'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('agency_lite_faq_description', array(
        'label'			=> esc_html__('FAQ Section Description','agency-lite'),
        'type'			=> 'text',
        'section'		=> 'agency_lite_faq_section',
        'priority'		=> 3,
	));

	$faq_pages = array('one','two', 'three' );
	foreach( $faq_pages as $faq_page ){
		$wp_customize->add_setting( 'agency_lite_'.$faq_page.'_faq_pages', array(
		    'sanitize_callback'		=> 'absint',
		    'default'				=> 0,
		));

		$wp_customize->add_control('agency_lite_'.$faq_page.'_faq_pages', array(
	        'label'			=> esc_html__('Page ','agency-lite').$faq_page,
	        'description'	=> esc_html__('Choose page for FAQ tab','agency-lite'),
	        'type'			=> 'dropdown-pages',
	        'section'		=> 'agency_lite_faq_section',
		        
		));
	}

	$wp_customize->add_setting( 'agency_lite_faq_background_image', array(
	    'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'agency_lite_faq_background_image',array(
       'label'      	=> esc_html__( 'Upload Background Image', 'agency-lite' ),
       'description'	=> esc_html__('upload a image for faq section','agency-lite'),
       'section'    	=> 'agency_lite_faq_section',
    )));

    //adding feature section

    $wp_customize->add_section('agency_lite_features_section',array(
		'panel'	=> 'agency_lite_home_page_setting',
		'title'	=> esc_html__('Features Section','agency-lite'),
	));

	$wp_customize->add_setting( 'agency_lite_enable_features_control',array(
        'sanitize_callback' => 'agency_lite_sanitize_textarea',
        'default'           => 'on'
    ));
	$wp_customize->add_control( new agency_lite_Switch_Control( $wp_customize,'agency_lite_enable_features_control',array(
       'label'         	=> esc_html__( 'Enable Features Section', 'agency-lite' ),
       'section'       	=> 'agency_lite_features_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agency-lite' ),
         'off'         	=> esc_html__( 'Hide', 'agency-lite' ),
    ))));


	$wp_customize->add_setting('agency_lite_features_title_control',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'agency_lite_features_title_control', array(
		'label'			=> esc_html__('Feature Section Title','agency-lite'),
		'priority'		=> 2,
		'type'			=> 'text',
		'section'		=> 'agency_lite_features_section'
	));

	$wp_customize->add_setting('agency_lite_features_description_control',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'agency_lite_features_description_control', array(
		'label'		=> esc_html__('Features Section Description','agency-lite'),
		'priority'	=> 3,
		'type'		=> 'text',
		'section'	=> 'agency_lite_features_section'
	));

	$features_pages = array('one','two', 'three' );

	foreach( $features_pages as $features_page ){
		

		$wp_customize->add_setting( 'agency_lite_'.$features_page.'_features_pages', array(
		    'sanitize_callback' => 'absint',
		    'default'           => 0,
		));
		$wp_customize->add_control('agency_lite_'.$features_page.'_features_pages', array(
		        'label'			=> esc_html__('Page ','agency-lite').$features_page,
		        'type'			=> 'dropdown-pages',
		        'section'		=> 'agency_lite_features_section',
		        'priority'		=> 10
		));
	}


  	$wp_customize->add_setting('agency_lite_features_notice',array(
		'sanitize_callback' =>'sanitize_text_field',
	));

	$wp_customize->add_control( new agency_lite_Notice_Instruction($wp_customize,'agency_lite_features_notice',array(
       'label'      	=> esc_html__( 'Notice', 'agency-lite' ),
       'section'    	=> 'agency_lite_features_section',
       'description' 	=>esc_html__('Choose the pages.The title, content and featured image will be displayed as featured block','agency-lite'),
     
     )));

//for service section

	$wp_customize->add_section('agency_lite_service_slider_section', array(
    'title'	=> esc_html__('Services Section','agency-lite'),
    'panel'	=> 'agency_lite_home_page_setting',

	));

	$wp_customize->add_setting( 'agency_lite_enable_service_slider_control',array(
        'sanitize_callback' => 'agency_lite_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agency_lite_Switch_Control( $wp_customize,'agency_lite_enable_service_slider_control',array(
       'label'         	=> esc_html__( 'Enable Service Section', 'agency-lite' ),
       'section'       	=> 'agency_lite_service_slider_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agency-lite' ),
         'off'         	=> esc_html__( 'Hide', 'agency-lite' ),
    ))));

	$services_pages = array('one','two', 'three','four','five' );

	foreach( $services_pages as $services_page ){
		
		$wp_customize->add_setting( 'agency_lite_'.$services_page.'_slider_pages', array(
		    'sanitize_callback' => 'absint',
		    'default'           => 0,
		));

		 $wp_customize->add_control('agency_lite_'.$services_page.'_slider_pages', array(
		        'label'			=> esc_html__('Page ','agency-lite').$services_page,
		        'type'			=> 'dropdown-pages',
		        'section'		=> 'agency_lite_service_slider_section',
		));
	}

	$wp_customize->add_setting('agency_lite_service_notice',array(
		'sanitize_callback' =>'sanitize_text_field',
	));

	$wp_customize->add_control( new agency_lite_Notice_Instruction($wp_customize,'agency_lite_service_notice',array(
       'label'			=> esc_html__( 'Notice', 'agency-lite' ),
       'section'		=> 'agency_lite_service_slider_section',
       'description'	=> esc_html__('Choose the pages. The title, content and featured image will be displayed in service slider','agency-lite'),
    )));

	//for team section
	$wp_customize->add_section('agency_lite_team_page_section', array(
	    'title' => esc_html__('Team Section','agency-lite'),
	    'panel' => 'agency_lite_home_page_setting',

	));

	$wp_customize->add_setting( 'agency_lite_team_page_enable',array(
        'sanitize_callback' => 'agency_lite_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agency_lite_Switch_Control( $wp_customize,'agency_lite_team_page_enable',array(
       'label'         	=> esc_html__( 'Enable Features Section', 'agency-lite' ),
       'section'       	=> 'agency_lite_team_page_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agency-lite' ),
         'off'         	=> esc_html__( 'Hide', 'agency-lite' ),
    ))));



 	$wp_customize->add_setting('agency_lite_team_title',array(
        'sanitize_callback'	=> 'sanitize_text_field',
    ));

 	$wp_customize->add_control('agency_lite_team_title',array(
        'label'			=> esc_html__('Team Section Title','agency-lite'),
        'type'			=> 'text',
        'priority'		=> 2,
        'section'		=> 'agency_lite_team_page_section'
    ));

	 $wp_customize->add_setting('agency_lite_team_description',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

	 $wp_customize->add_control( 'agency_lite_team_description',array(
        'label'			=> esc_html__('Team Section Sub Title','agency-lite'),
        'type'			=> 'text',
        'priority'		=> 3,
        'section'		=> 'agency_lite_team_page_section'
    ));

  	$wp_customize->add_setting('agency_lite_notice',array(
		'sanitize_callback' =>'sanitize_text_field',
	));

	$wp_customize->add_control( new agency_lite_Notice_Instruction($wp_customize,'agency_lite_notice',array(
       'label'      	=> esc_html__( 'Notice', 'agency-lite' ),
       'section'    	=> 'agency_lite_team_page_section',
       'description' 	=>esc_html__('Configure the team section from widgets','agency-lite'),
     
     )));

	//for counter section

	 $wp_customize->add_section('agency_lite_counter_section',array(
		'panel' => 'agency_lite_home_page_setting',
		'title' => esc_html__('Counter Section','agency-lite'),
	));

	$wp_customize->add_setting( 'agency_lite_enable_counter_section',array(
        'sanitize_callback' => 'agency_lite_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agency_lite_Switch_Control( $wp_customize,'agency_lite_enable_counter_section',array(
       'label'         	=> esc_html__( 'Enable Counter', 'agency-lite' ),
       'section'       	=> 'agency_lite_counter_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agency-lite' ),
         'off'         	=> esc_html__( 'Hide', 'agency-lite' ),
    ))));


	$t_counters = array('one','two', 'three' );

	foreach( $t_counters as $t_counter ){

		$wp_customize->add_setting('agency_lite_banner_'.$t_counter.'_instruction',array(
			'sanitize_callback' =>'sanitize_text_field',
		));

		$wp_customize->add_control( new agency_lite_Section_Typo_Seperator($wp_customize,'agency_lite_banner_'.$t_counter.'_instruction',array(
		       'label'      => esc_html__( 'Counter ', 'agency-lite' ). $t_counter,
		       'section'    => 'agency_lite_counter_section',
		 )));
	

		$wp_customize->add_setting('agency_lite_'.$t_counter.'_counter_value',array(
			'sanitize_callback' => 'absint',
		));


		$wp_customize->add_control('agency_lite_'.$t_counter.'_counter_value', array(
			'label'			=> esc_html__(' Counter Value','agency-lite'),
			'type'			=> 'number',
			'section'		=> 'agency_lite_counter_section'
		));

		 $wp_customize->add_setting( 'agency_lite_'.$t_counter.'_counter_pages', array(
		    'sanitize_callback' => 'absint',
		    'default'           => 0,
		));

		 $wp_customize->add_control('agency_lite_'.$t_counter.'_counter_pages', array(
		        'label'			=> esc_html__('Select Page  ','agency-lite'),
		        'description'	=>	esc_html__('Choose page for Counter ','agency-lite').$t_counter,
		        'type'			=> 'dropdown-pages',
		        'section'		=> 'agency_lite_counter_section',
		));

	}

	//for blog section

	$wp_customize->add_section('agency_lite_blog_page_section', array(
	    'title' => esc_html__('Blog Section','agency-lite'),
	    'panel' => 'agency_lite_home_page_setting',

	));

	$wp_customize->add_setting( 'agency_lite_blog_page_enable',array(
        'sanitize_callback' => 'agency_lite_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agency_lite_Switch_Control( $wp_customize,'agency_lite_blog_page_enable',array(
       'label'         	=> esc_html__( 'Enable Blog Section', 'agency-lite' ),
       'section'       	=> 'agency_lite_blog_page_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agency-lite' ),
         'off'         	=> esc_html__( 'Hide', 'agency-lite' ),
    ))));


	$wp_customize->add_setting('agency_lite_blog_title',array(
        'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('agency_lite_blog_title',array(
        'label'			=> esc_attr__('Blog  Title','agency-lite'),
        'type'			=> 'text',
        'priority'		=> 2,
        'section'		=> 'agency_lite_blog_page_section'
	));

	$wp_customize->add_setting('agency_lite_blog_description',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
	$wp_customize->add_control( 'agency_lite_blog_description',array(
        'label'			=> esc_html__('Blog Description','agency-lite'),
        'type'			=> 'text',
        'priority'		=> 3,
        'section'		=> 'agency_lite_blog_page_section'
	));

	$wp_customize->add_setting( 'agency_lite_blog_view', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__('View All','agency-lite'),
    ));
	$wp_customize->add_control( 'agency_lite_blog_view', array(
        'section'      => 'agency_lite_blog_page_section',
        'label'        => esc_html__( 'View all button text', 'agency-lite' ),
        'type'         => 'text'
    ));

	//for logo section

	$wp_customize->add_section('agency_lite_logo_section', array(
	    'title'		=> esc_html__('Logo Section','agency-lite'),
	    'panel'		=> 'agency_lite_home_page_setting',

	));

	$wp_customize->add_setting( 'agency_lite_client_logo_enable',array(
        'sanitize_callback' => 'agency_lite_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agency_lite_Switch_Control( $wp_customize,'agency_lite_client_logo_enable',array(
       'label'         	=> esc_html__( 'Show social icons on header', 'agency-lite' ),
       'section'       	=> 'agency_lite_logo_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agency-lite' ),
         'off'         	=> esc_html__( 'Hide', 'agency-lite' ),
    ))));

    $wp_customize->add_setting( 'agency_lite_client_logo_rep', array(
    'sanitize_callback' => 'agency_lite_sanitize_repeater',
    'default' => json_encode(
        array(
            array(
                'cl_logo' => '',
                'cl_url'  => '',
            )
        )
    )
	));

	$wp_customize->add_control(  new Agency_Lite_Repeater_Controler( $wp_customize, 'agency_lite_client_logo_rep', 
	    array(
	        'label'                        => esc_html__('Client Logo Options','agency-lite'),
	        'section'                      => 'agency_lite_logo_section',
	        'agency_lite_box_label'         => esc_html__('Logo','agency-lite'),
	        'agency_lite_box_add_control'   => esc_html__('Add Client Logo','agency-lite'),
	    ),
	        array(
	            'cl_logo' => array(
	            'type'        => 'upload',
	            'label'       => esc_html__( 'Client Logo', 'agency-lite' ),
	            'default'     => '',
	            'class'       => 'un-bottom-block-cat1'
	        ),
	            
		        'cl_url' => array(
		        'type'        => 'text',
		        'label'       => esc_html__( 'Client URL', 'agency-lite' ),
		        'default'     => '',
		        'class'       => 'un-bottom-block-cat1'
	    ) 
	    )
	));

	//for footer section
	$wp_customize->add_section( 'agency_lite_footer_page_section',array(
        'title' 		=>		 esc_html__('Footer Setting','agency-lite')
    ));

	$wp_customize->add_setting( 'agency_lite_footer_icon_enable',array(
		'sanitize_callback' => 'agency_lite_sanitize_textarea',
		'default'           => 'on'
    ));

	$wp_customize->add_control( new agency_lite_Switch_Control( $wp_customize,'agency_lite_footer_icon_enable',array(
       'section'       => 'agency_lite_footer_page_section',
       'label'         => esc_html__( 'Show social icons on Footer', 'agency-lite' ),
       'on_off_label'  => array(
       	'on'           => esc_html__( 'Show', 'agency-lite' ),
       	'off'          => esc_html__( 'Hide', 'agency-lite' ),
    ))));

    $wp_customize->add_setting( 'agency_lite_footer_copyright', array(
             'sanitize_callback' => 'wp_kses_post',
    ));

	$wp_customize->add_control( 'agency_lite_footer_copyright', array(
        'label'			=> esc_html__('Footer Copyright','agency-lite'),
        'type'			=> 'text',
        'section'		=> 'agency_lite_footer_page_section'
    ));

	$wp_customize->add_setting( 'agency_lite_footer_image_control',array(
		'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'agency_lite_footer_image_control', array(
       'label'      => esc_html__( 'Upload a logo', 'agency-lite' ),
       'section'    => 'agency_lite_footer_page_section',
    )));

	$wp_customize->add_setting('agency_lite_skin_color',array(
	                'default' => '#cba14c',
	                'sanitize_callback'=>'sanitize_hex_color'
	            ));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'agency_lite_skin_color', array(
	            'label' => esc_html__('Template Color','agency-lite'),
	            'description'   => esc_html__('Choose the template color','agency-lite'),
	            'section'    => 'colors',
	            'settings'   => 'agency_lite_skin_color',
	            ) ) );


	//for sidebar settings
	$wp_customize->add_section( 'agency_lite_sidebar_section',array(
        'title' 		 =>		 esc_html__('Sidebar Setting','agency-lite'),
      	'capability'     => 'edit_theme_options',
      	'priority'       => 1

    ));

    $wp_customize->add_setting('agency_lite_archive_post_sidebar', array(
        'default'  =>      'right-sidebar-enabled',
        'sanitize_callback' => 'esc_attr'
        ));

	$imagepath =  get_template_directory_uri() . '/assets/images/';

	$wp_customize->add_control( new Agency_Lite_Customize_Radioimage_Control( $wp_customize,'agency_lite_archive_post_sidebar', array(
	        'section'       =>      'agency_lite_sidebar_section',
	        'label'         =>      esc_html__('Archive Post Sidebar Option', 'agency-lite'),
	        'type'          =>      'radioimage',
	        'choices'       =>      array(
	          'left-sidebar-enabled' => $imagepath.'left-sidebar.png',
	          'right-sidebar-enabled' => $imagepath.'right-sidebar.png',
	          'both-sidebar-enabled' => $imagepath.'both-sidebar.png',
	          'no-sidebar' => $imagepath.'no-sidebar.png',
	        ))));


	$wp_customize->add_setting('agency_lite_single_post_sidebar', array(
        'default'  =>      'right-sidebar-enabled',
        'sanitize_callback' => 'esc_attr'
        ));

	$wp_customize->add_control( new Agency_Lite_Customize_Radioimage_Control( $wp_customize,'agency_lite_single_post_sidebar', array(
	        'section'       =>      'agency_lite_sidebar_section',
	        'label'         =>      esc_html__('Single Post Sidebar Option', 'agency-lite'),
	        'type'          =>      'radioimage',
	        'choices'       =>      array(
	          'left-sidebar-enabled' => $imagepath.'left-sidebar.png',
	          'right-sidebar-enabled' => $imagepath.'right-sidebar.png',
	          'both-sidebar-enabled' => $imagepath.'both-sidebar.png',
	          'no-sidebar' => $imagepath.'no-sidebar.png',
	        ))));

	$wp_customize->add_setting('agency_lite_single_page_sidebar', array(
        'default'  =>      'right-sidebar-enabled',
        'sanitize_callback' => 'esc_attr'
        ));

	$wp_customize->add_control( new Agency_Lite_Customize_Radioimage_Control( $wp_customize,'agency_lite_single_page_sidebar', array(
	        'section'       =>      'agency_lite_sidebar_section',
	        'label'         =>      esc_html__('Single Page Sidebar Option', 'agency-lite'),
	        'type'          =>      'radioimage',
	        'choices'       =>      array(
	          'left-sidebar-enabled' => $imagepath.'left-sidebar.png',
	          'right-sidebar-enabled' => $imagepath.'right-sidebar.png',
	          'both-sidebar-enabled' => $imagepath.'both-sidebar.png',
	          'no-sidebar' => $imagepath.'no-sidebar.png',
	        ))));

