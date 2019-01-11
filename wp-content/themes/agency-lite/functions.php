<?php
/**
 * Agency Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Agency Lite
 */

if ( ! function_exists( 'agency_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function agency_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Agency Lite, use a find and replace
		 * to change 'agency-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'agency-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		*Woocommerce add function
		*/
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		*define image size
		**/
		add_image_size('agency-lite-slider-image', 1920, 928, true);
		add_image_size('agency-lite-team-image', 370, 490, true);
		add_image_size('agency-lite-blog-image', 571, 353, true);
		add_image_size('agency-lite-about-image', 440, 440, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'agency-lite-primary-menu' => esc_html__( 'Primary', 'agency-lite' ),
			'agency-lite-footer-menu' => esc_html__('Footer Menu', 'agency-lite'),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
	
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'agency_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'agency_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function agency_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'agency_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'agency_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function agency_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'agency-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'agency-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'agency-lite' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'agency-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'agency-lite' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'agency-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar(array(
		'name'			=>esc_html__('Home Team Area','agency-lite'),
		'id'            => 'home-team-area',
		'description'   => esc_html__( 'Add Team Widgets here.', 'agency-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'			=>esc_html__('Footer Widget Area One','agency-lite'),
		'id'            => 'footer-widget-area-one',
		'description'   => esc_html__( 'Add Footer Widgets One here.', 'agency-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'			=>esc_html__('Footer Widget Area Two','agency-lite'),
		'id'            => 'footer-widget-area-two',
		'description'   => esc_html__( 'Add Footer Widgets Two here.', 'agency-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'			=>esc_html__('Footer Widget Area Three','agency-lite'),
		'id'            => 'footer-widget-area-three',
		'description'   => esc_html__( 'Add Footer Widgets Three here.', 'agency-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'			=>esc_html__('Footer Widget Area Four','agency-lite'),
		'id'            => 'footer-widget-area-four',
		'description'   => esc_html__( 'Add Footer Widgets Four here.', 'agency-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action( 'widgets_init', 'agency_lite_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function agency_lite_scripts() {

	$query_args = array('family' => 'Playfair+Display:400,300,700|Hind:400,500,600,700');

  	wp_enqueue_style('agency-lite-google-fonts', add_query_arg($query_args, "//fonts.googleapis.com/css"));
	wp_enqueue_style( 'agency-lite-style', get_stylesheet_uri());
	wp_enqueue_style( 'agency-lite-font-awesome', get_template_directory_uri() . '/assets/externals/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'agency-lite-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );


	wp_enqueue_script( 'agency-lite-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0', true );
	wp_enqueue_script( 'agency-lite-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'agency-lite-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'agency_lite_scripts' );


/**
*enqueue scripts and styles in backend
*/
function agency_lite_admin_scripts() {
	wp_enqueue_style( 'agency-lite-customizer-style', get_template_directory_uri() . '/inc/customizer/assets/customizer-style.css' );
	wp_enqueue_script( 'agency-lite-customizer-scripts', get_template_directory_uri() . '/inc/customizer/assets/customizer-scripts.js', array(), '1.0', true );
}
add_action( 'admin_enqueue_scripts', 'agency_lite_admin_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 */
function agency_lite_editor_styles() {
	
	$query_args = array('family' => 'Playfair+Display:400,300,700|Hind:400,500,600,700');

  	wp_enqueue_style('agency-lite-google-fonts', add_query_arg($query_args, "//fonts.googleapis.com/css"));

    wp_enqueue_style( 'agency-lite-editor-style', get_template_directory_uri() . '/assets/css/style-editor.css' );
}
add_action( 'enqueue_block_editor_assets', 'agency_lite_editor_styles' );

/**
 * Calling the init file
 */
require get_template_directory() . '/inc/init.php';

/*removing breadcrumb header*/
add_action( 'wp_head', 'agency_lite_remove_wc_breadcrumbs' );
function agency_lite_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'agency_lite_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function agency_lite_woocommerce_wrapper_before() {
		?>
        <div class="agency-lite-container">
        	<div class="agency-lite-shop-wrap">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'agency_lite_woocommerce_wrapper_before' );

if ( ! function_exists( 'agency_lite_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function agency_lite_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar('shop'); ?>
	</div>
        </div><!-- #container -->    
<?php
	}
}
add_action( 'woocommerce_after_main_content', 'agency_lite_woocommerce_wrapper_after' );

/** remove woocommerce breadcrumb **/
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);



function agency_lite_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'agency_lite_woocommerce_loop_columns' );

/** Adding Editor Styles **/
function agency_lite_add_editor_styles() {
    add_editor_style( get_template_directory_uri().'assets/css/custom-editor-style.css' );
}

add_action( 'admin_init', 'agency_lite_add_editor_styles' );
