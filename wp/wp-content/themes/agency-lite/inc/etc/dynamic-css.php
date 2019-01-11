<?php
/**
* Dynamic style file for the theme 
*/
function agency_lite_hex2rgba($color, $opacity = false) {
     $default = 'rgb(0,0,0)';
     //Return default if no color provided
     if(empty($color))
              return $default;
     //Sanitize $color if "#" is provided
        if ($color[0] == '#' ) {
         $color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
         if(abs($opacity) > 1)
         $opacity = 1.0;
         $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
         $output = 'rgb('.implode(",",$rgb).')';
        }
        return $output;
}

function agency_lite_dynamic_style(){
    
    $custom_css = "";
        
    $agency_lite_faq_background_image = get_theme_mod('agency_lite_faq_background_image');
    if( $agency_lite_faq_background_image ){
         $custom_css .="
         .agency-lite-faq-wrap{
            background-image: url(".esc_url($agency_lite_faq_background_image).");
            background-position:center;
            background-repeat:no-repeat;
            background-size: cover;
         }";
    }

    if( get_header_image() ){
    $custom_css .="
         .header-banner-container{
            background-image: url(".esc_url(get_header_image()).");
            background-position:center;
            background-repeat:no-repeat;
            background-size: cover;
         }";

    }

    $agency_lite_skin_color = get_theme_mod('agency_lite_skin_color','#cba14c');
    $agency_lite_rgba_bg_color = agency_lite_hex2rgba($agency_lite_skin_color,0.6);
    if($agency_lite_skin_color != '#cba14c'){
        $custom_css .="
           .info-wrapper,.agency-lite-counter-wrap,.blog-bttn a,.agency-lite-contact-form-wrap + p input[type=submit],.woocommerce .agency-lite-container ul.products li.product .onsale,.agency-lite-container ul.products li.product .button,article a.read-more,.nav-links span, .nav-links a,.widget_search input[type='submit'], .widget_product_search button[type='submit'],.about-content-wrap .left-about-content .about-posts span a:hover,.slider-content-wrap .slider-btn a:hover,.member-social-profile a:hover,.navigation.post-navigation .nav-links .nav-previous a, .navigation.post-navigation .nav-links .nav-next a,.navigation.post-navigation .nav-links .nav-previous a:hover, .navigation.post-navigation .nav-links .nav-next a:hover{
                background-color:$agency_lite_skin_color
            }";

        $custom_css .= 
                    ".header-banner-container .img-overlay,.agency-lite-team-wrap .widget_agency_lite_team  .agency-lite-team-logo-icon:before{
                            background: {$agency_lite_rgba_bg_color}
                }";

        $custom_css .= 
                    ".site-header .main-navigation .primary-menu li.current_page_item > a, .site-header .main-navigation .primary-menu li > a:hover,.agency-lite-footer-nav-menu .menu li a:hover, .agency-lite-social-icons a:hover, .site-footer .team-members-contents a:hover, .agency-lite-footer-copyright a:hover,.blog-title a:hover,.blog-bttn a:hover,.blog-author a:hover,.widget_tag_cloud a:hover,.recent-post-widget .recent-post-date,.woocommerce ul.products li.product .price,.recent-post-widget .date-title-recent-post .recent-post-title a:hover,.agency-lite-contact-form-wrap + p input[type=submit]:hover,.woocommerce.woocommerce-page .content-area ul.products li.product .add_to_cart_button:hover, .woocommerce.woocommerce-page .content-area ul.products li.product .product_type_simple:hover, .woocommerce .cart .coupon input.button[type='submit']:hover, .woocommerce .place-order .button.alt:hover, .widget_shopping_cart_content a.button:hover, .widget_price_filter .price_slider_amount button[type=submit]:hover, .woocommerce .cart button[type=submit].single_add_to_cart_button:hover, .woocommerce #review_form #respond .form-submit input:hover,h1.blog-wrap-title a,.comment-author-date span a:hover,footer.entry-footer a:hover,header.entry-header a:hover,a.woocommerce-LoopProduct-link.woocommerce-loop-product__link:hover .woocommerce-loop-product__title,.widget ul li a:hover,.comment-respond .form-submit input:hover,.woocommerce div.product p.price, .woocommerce div.product span.price,.agency-lite-container div.product form.cart .button:hover,.agency-lite-contact-info a:hover,p.logged-in-as a:hover,a.added_to_cart.wc-forward:hover,span.posted_in a:hover,p.stars.selected a:hover,.woocommerce-info a:hover,a:hover, a:active{
                            color: {$agency_lite_skin_color}
                }"; 

        $custom_css .= 
                    ".blog-bttn a,.about-content-wrap .left-about-content .about-posts span a:hover,.serv-btn a:hover, .feat-btn a:hover,.header-banner-container .page-title-wrap .breadcrumb-trail,.widget_tag_cloud a:hover,.agency-lite-container div.product form.cart .button,.navigation.post-navigation .nav-links .nav-previous a, .navigation.post-navigation .nav-links .nav-next a{
                            border-color: {$agency_lite_skin_color}
                }"; 

        $custom_css .= 
                    ".agency-lite-container span.onsale:before,.comment-respond .form-submit input:hover,.woocommerce .cart .coupon input.button[type='submit'], .woocommerce .place-order .button.alt, .widget_shopping_cart_content a.button, .widget_price_filter .price_slider_amount button[type=submit], .woocommerce .cart button[type=submit].single_add_to_cart_button,.comment-respond .form-submit input,.woocommerce #review_form #respond .form-submit input{
                            border-color:{$agency_lite_skin_color}
                }"; 

        $custom_css .= ".agency-lite-container ul.products li.product .button,.agency-lite-contact-form-wrap + p input[type=submit]{
                    border: 2px solid {$agency_lite_skin_color};
                }";

         $custom_css .= "article a.read-more:hover,.error-404 input[type=submit], .search-no-results .no-results form input[type=submit],.serv-btn a:hover, .feat-btn a:hover,.agency-lite-container div.product form.cart .button,.woocommerce .wc-proceed-to-checkout a.button.alt,.woocommerce .cart .coupon input.button[type='submit'], .woocommerce .place-order .button.alt, .widget_shopping_cart_content a.button, .widget_price_filter .price_slider_amount button[type=submit], .woocommerce .cart button[type=submit].single_add_to_cart_button, .woocommerce #review_form #respond .form-submit input,.comment-respond .form-submit input{
                    background:{$agency_lite_skin_color};
                }";

        $custom_css .= "
            @media only screen and (max-width: 768px){ .main-navigation button {
                background: {$agency_lite_skin_color};
            }";
    }

        
wp_add_inline_style( 'agency-lite-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'agency_lite_dynamic_style' );

