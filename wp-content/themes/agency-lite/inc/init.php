<?php
/**
* Require of functions and files for the theme
*
*/

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/etc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/etc/template-tags.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/agency-lite-functions.php';

/**
 * BreadCrumb
 */
require get_template_directory() . '/inc/etc/breadcrumbs.php';

/**
 * Header hoooks
 */
require get_template_directory() . '/inc/hooks/header.php';

/**
* Footer hooks
*/
require get_template_directory() . '/inc/hooks/footer.php';


/**
 * Customizer functions.
 */
require get_template_directory() . '/inc/customizer/customizer-class.php';

/**
 * Implement the Section About Page
 */
require get_template_directory() . '/inc/home-section/section-about.php';

/**
 * Implement the FAW Section  Page
 */
require get_template_directory() . '/inc/home-section/section-faq.php';

/**
 * Implement the Features Section Page
 */
require get_template_directory() . '/inc/home-section/section-features.php';

/**
 * Implement the Service Section Page
 */
require get_template_directory() . '/inc/home-section/section-service.php';

/**
 * Implement the team widget
 **/
require get_template_directory() . '/inc/widgets/agency-lite-widget.php';
require get_template_directory() . '/inc/widgets/agency-lite-team.php';
require get_template_directory() . '/inc/home-section/section-team.php';

/**
 * Implement the Team Section Page
 */
require get_template_directory() . '/inc/home-section/section-counter.php';

/**
 * Implement the Blog Section Page
 */
require get_template_directory() . '/inc/home-section/section-blog.php';

/**
 * Implement the Logo  Section Page
 */
require get_template_directory() . '/inc/home-section/section-logo.php';

/**
 * Implement the Agency Lite Recent Post Widgets
 */
require get_template_directory() . '/inc/widgets/agency-lite-recent-posts.php';

/**
 * Agency Lite Info Widgets
 */
require get_template_directory() . '/inc/widgets/agency-lite-info.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/etc/jetpack.php';
}

require get_template_directory() . '/inc/etc/dynamic-css.php';

require get_template_directory() . '/inc/customizer/repeater-controller/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';


require get_template_directory() . '/inc/welcome/welcome.php';

/**
 * Custom Customizer Controls
 */
require get_template_directory() . '/inc/customizer-controls.php';