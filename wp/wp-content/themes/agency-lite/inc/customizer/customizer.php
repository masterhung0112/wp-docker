<?php
/**
 * Agency Lite Theme Customizer
 *
 * @package Agency Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function agency_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_section( 'background_image' )->panel = 'agency_lite_general_setting';
	$wp_customize->remove_control( 'display_header_text' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'agency_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'agency_lite_customize_partial_blogdescription',
		) );
	}

	/**
	 * Upgrade to Agensy-pro
	*/
	// Register custom section types.
	$wp_customize->register_section_type( 'Agency_Lite_Customize_Section_Pro' );

	// Register sections.
	$wp_customize->add_section(
	    new Agency_Lite_Customize_Section_Pro(
	        $wp_customize,
	        'agency-pro',
	        array(
	            'title'    => esc_html__( 'Upgrade To Premium', 'agency-lite' ),
	            'pro_text' => esc_html__( 'Buy Now','agency-lite' ),
	            'pro_text1' => esc_html__( 'Compare','agency-lite' ),
	            'pro_url'  => 'https://accesspressthemes.com/wordpress-themes/agency-pro/',
	            'priority' => 0,
	        )
	    )
	);
	$wp_customize->add_setting(
		'agensy_pro_upbuton',
		array(
			'section' => 'agency-pro',
			'sanitize_callback' => 'esc_attr',
		)
	);

	$wp_customize->add_control(
		'agensy_pro_upbuton',
		array(
			'section' => 'agency-pro'
		)
	);
/**
 * Theme Customizer.
 */
require get_template_directory() . '/inc/customizer/agency-lite-customizer.php';
}
add_action( 'customize_register', 'agency_lite_customize_register' );



/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function agency_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function agency_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function agency_lite_customize_preview_js() {
	wp_enqueue_script( 'agency-lite-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'agency_lite_customize_preview_js' );



