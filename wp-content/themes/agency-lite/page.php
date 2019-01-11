<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Agency Lite
 */

get_header(); 
$page_sidebars = get_theme_mod('agency_lite_single_page_sidebar','right-sidebar-enabled');  
?>
	<div class = "agency-lite-container clearfix">
		<div class="agency-lite-page-wrap <?php echo esc_attr($page_sidebars); ?>">

			<div id="primary" class="content-area">
				<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
			<?php 
		 	// sidebar options
		    $page_sidebar_explode  =  (explode("-",$page_sidebars));
		    $page_sidebar          = $page_sidebar_explode[0];
		    if( $page_sidebar == 'both'){
		        get_sidebar('left');
		        get_sidebar('right');
		    }elseif( $page_sidebar != 'no'){
		        get_sidebar( $page_sidebar );
		    } ?>
		</div>
	</div>
	<?php 
	get_footer();
