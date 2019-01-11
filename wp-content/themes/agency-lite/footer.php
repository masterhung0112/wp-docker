<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agency Lite
 */

?>

	</div><!-- #content -->
	<?php $agency_lite_footer_icon_enable = esc_attr( get_theme_mod('agency_lite_footer_icon_enable','on') ); ?>
	<?php if( is_active_sidebar('footer-widget-area-one') || is_active_sidebar('footer-widget-area-two') || is_active_sidebar('footer-widget-area-three') || is_active_sidebar('footer-widget-area-four') || has_nav_menu( 'agency-lite-footer-menu' ) || $agency_lite_footer_icon_enable == 'on' ) : ?>

		<footer id="colophon" class="site-footer clear">
			<div class="agency-lite-container">
				<?php do_action('agency_lite_footer_section_page'); ?>
			<div class = "agency-lite-footer-all clear">
			<?php 
				do_action('agency_lite_footer_nav_menu');
				do_action('agency_lite_after_footer');
			?>
			</div>
		</div>
		<?php 
		do_action('agency_lite_footer_copyright_fn');
		 ?>
		
		</footer><!-- #colophon -->
	<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
