<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Agency Lite
 */

/**
 * Set up the WordPress core custom header feature.
 *
 */
function agency_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'agency_lite_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '#000000',
		'width'                  => 1920,
		'height'                 => 350,
		'flex-height'            => true,
	) ) );
}
add_action( 'after_setup_theme', 'agency_lite_custom_header_setup' );
