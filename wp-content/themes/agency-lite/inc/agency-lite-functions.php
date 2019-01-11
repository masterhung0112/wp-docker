<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Agency Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function agency_lite_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'agency_lite_body_classes' );

/**
* Social Icons
*/
if( ! function_exists('agency_lite_social_icons')){
	function agency_lite_social_icons(){
		
		$social_icons = array('facebook','twitter','googlePlus','dribbble','youtube','linkedin');
            foreach( $social_icons as $social_icon){
                $agency_lite_social_icons = get_theme_mod ('agency_lite_'.$social_icon.'_url');
                if( $agency_lite_social_icons ){
                    echo '<a href="'. esc_url($agency_lite_social_icons).'" target="_blank">';
                    if( $social_icon == 'googlePlus' ){
                        echo '<i class ="fa fa-google-plus"></i>'; 
                    }else{
                        echo '<i class ="fa fa-'. esc_attr($social_icon).'"></i>';    
                    }
                    echo '</a>';
                }
            }
    }
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function agency_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'agency_lite_pingback_header' );


/**
*to display post in custom
**/

function agency_lite_post_lists(){
    $agency_lite_post_list = 
        array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        );
        $posts_lists = array();
        $posts_lists[] = esc_html__('--Choose--','agency-lite');
        $agency_lite_post = new WP_Query ($agency_lite_post_list);
        while( $agency_lite_post->have_posts() ):
            $agency_lite_post->the_post();
        $posts_lists[ get_the_ID() ] = get_the_title();   
        endwhile;    
        return $posts_lists;
}

//display page in custom
function agency_lite_page_lists(){
    $agency_lite_page_lists = 
        array(
            'post_type' => 'page',
            'posts_per_page' => -1,
        );
        $pages_lists = array();
        $pages_lists[] = esc_html__('--Choose--','agency-lite');
        $agency_lite_page = new WP_Query ($agency_lite_page_lists);
        while( $agency_lite_page->have_posts() ):
            $agency_lite_page->the_post();
        $pages_lists[ get_the_ID() ] = get_the_title();   
        endwhile;    
        return $pages_lists;
}
/**
*image display function
*
**/

function agency_lite_slider_control(){
?>
<div class="mail-slider-header-wrap container">
    <div id="header-slider-wrap" class="carousel-main-slider owl-carousel">
    <?php 
        $home_sliders = array('one','two', 'three' );
        foreach ($home_sliders as $home_slider) {
     
            $my_slider_cat = get_theme_mod('agency_lite_slider_page_'.$home_slider.'_control');
            $agency_lite_slider_btn_control = get_theme_mod('agency_lite_slider_'.$home_slider.'_btn_control');
            $agency_lite_slider_url_control = get_theme_mod('agency_lite_slider_'.$home_slider.'_url_control');

            if($my_slider_cat){
                $my_slider_args = array(
                    'post_type' => 'page',
                    'post_status' => 'publish',
                    'p' => absint($my_slider_cat)
                );

                $my_slider_query = new WP_Query($my_slider_args);
                if($my_slider_query->have_posts()):
                    ?>
                    <?php
                        while($my_slider_query->have_posts()):
                            $my_slider_query->the_post();
                            $agency_slider_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
                            $agency_image_url = $agency_slider_image_src[0];
                            if($agency_image_url || get_the_title() || get_the_content()){
                                ?>
                                <div class="content-slider">
                                    <?php if($agency_image_url){ ?>
                                        <img src="<?php echo esc_url($agency_image_url); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                    <?php } ?>
                                    <div class="slider-content-wrap">
                                        <div class="title">
                                            <?php the_title(); ?>
                                        </div>
                                        <div class="desc">
                                            <?php if(get_the_content()){ ?>
                                            <div class="about-post-content">
                                                <?php the_content(); ?>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php if($agency_lite_slider_url_control) {?>
                                        <div class="slider-btn">
                                            <a href="<?php echo esc_url($agency_lite_slider_url_control); ?>">
                                                <?php echo esc_html($agency_lite_slider_btn_control); ?>
                                            </a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                            }
                        endwhile;
                        wp_reset_postdata();
                    ?>
            <?php
        endif;
            }
        }
    ?>
    </div>
</div>
<?php
}


add_action('agency_lite_slider_control','agency_lite_slider_control');

//for service section slider

function agency_lite_cat_lists()
{
    $agency_lite_services_cat_lists = get_categories(
        array(
            'hide_empty' => '0',
            'exclude' => '1',
        )
    );
    $agency_lite_services_cat_array = array();
    $agency_lite_services_cat_array[] = esc_html__('-- Choose --','agency-lite');
    foreach($agency_lite_services_cat_lists as $agency_lite_services_cat_list){
        $agency_lite_services_cat_array[$agency_lite_services_cat_list->slug] = $agency_lite_services_cat_list->name;
    }
    return $agency_lite_services_cat_array;
}

/**
* display breadcrumbs
*
*/
function agency_lite_header_banner_x() {   
   if( get_header_image() ){
     
        $overlay = '<div class="img-overlay"></div>';
    }else{
    
        $overlay = '' ;
    }

    $agency_lite_breadcrumb_image_enable  = get_theme_mod('agency_lite_breadcrumb_image_enable'); 
    
    if( $agency_lite_breadcrumb_image_enable == 'on' ){
  ?>

    <div class="header-banner-container">
        <?php echo $overlay;  // WPCS: XSS OK. ?>
            <div class="agency-lite-container">
                <div class="page-title-wrap">
                        <?php
                            if(is_archive()) {
                                echo agency_lite_cat_title(); // WPCS: XSS OK.
                            }elseif( is_home() ){ ?>
                              <h1 class="page-title"> <?php single_post_title(); ?></h1>
                            <?php
                            } elseif(is_single() || is_singular('page')) {
                                the_title('<h1 class="page-title">', '</h1>');
                            } elseif(is_search()) {
                                ?>
                                <h1 class="page-title"><?php printf( 
                                    /* translators: Search Title */
                                    esc_html__( 'Search Results for: %s', 'agency-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                                <?php
                            } elseif(is_404()) {
                                ?>
                                <h1 class="page-title"><?php esc_html_e( '404 Error', 'agency-lite' ); ?></h1>
                                <?php
                            }
                        ?>
                        <?php 
                        $breadcrumb_args = array(
                            'container'   => 'div',
                            'show_browse' => false,
                        );
                        breadcrumb_trail( $breadcrumb_args );
                        ?>
                </div>
            </div>
    </div>
<?php
    }
    
}
add_action('agency_lite_header_banner', 'agency_lite_header_banner_x');

function agency_lite_sanitize_breadcrumb($input){
    $all_tags = array(
        'a'=>array(
            'href'=>array()
        )
     );
    return wp_kses($input,$all_tags);
}

function agency_lite_cat_title(){
    $archive_title = get_the_archive_title(); 
    $explod        =  (explode(":",$archive_title));
    $cat_name      = end($explod);
    ?>
    <h1 class="page-title">
        <?php echo wp_kses_post($cat_name); ?>
    </h1>
<?php
}

/** Exclude Categories from Blog Page **/
function agency_lite_exclude_category_from_blogpost($query) {
   $exclude_category = get_theme_mod('agency_lite_exclude_cat'); 
   $ex_cats = explode(',', $exclude_category);
   array_pop($ex_cats);
   
   if ( $query->is_home() ) {
       $query->set('category__not_in', $ex_cats);
   }
   return $query;
}
add_filter('pre_get_posts', 'agency_lite_exclude_category_from_blogpost');

/**
 * Change comment form textarea to use placeholder
 *
 * @param  array $args
 * @return array
 */
function agency_lite_comment_textarea_placeholder( $args ) {
    $args['comment_field']  = str_replace( 'textarea', 'textarea placeholder="Your Comment"', $args['comment_field'] );
    return $args;
}
add_filter( 'comment_form_defaults', 'agency_lite_comment_textarea_placeholder' );

/**
 * Comment Form Fields Placeholder
 *
 */
function agency_lite_comment_form_fields( $fields ) {
     
    foreach( $fields as &$field ) {
        $field = str_replace( 'id="author"', 'id="author" placeholder="Your Name*"', $field );
        $field = str_replace( 'id="email"', 'id="email" placeholder="Your Email Address*"', $field );
        $field = str_replace( 'id="url"', 'id="url" placeholder="Your Website Address*"', $field );

    }
    return $fields;
}
add_filter( 'comment_form_default_fields', 'agency_lite_comment_form_fields' );

/*
* Customizer sanitization
*/
function agency_lite_sanitize_textarea($input){
    return wp_kses_post(force_balance_tags($input));
}

/**
* Move comment fields at bottom
*/
function agency_lite_move_comment_field_to_bottom( $fields ) {
   $comment_field = $fields['comment'];
   unset( $fields['comment'] );
   $fields['comment'] = $comment_field;
   return $fields;
}
add_filter( 'comment_form_fields', 'agency_lite_move_comment_field_to_bottom' );