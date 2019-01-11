<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Agency Lite
 */

get_header();
$agency_lite_archive_post_sidebar = get_theme_mod('agency_lite_archive_post_sidebar','right-sidebar-enabled'); 

 ?>

	<div class = "agency-lite-container clearfix">
		<div class="agency-lite-archive-wrapper <?php echo esc_attr($agency_lite_archive_post_sidebar); ?>">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

				<?php
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'archive' );

					endwhile;

					the_posts_pagination();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->
			<?php
	        // sidebar options
	        $archive_sidebar_explode  =  (explode("-",$agency_lite_archive_post_sidebar));
	        $archive_sidebar          = $archive_sidebar_explode[0];
	        if( $archive_sidebar == 'both'){
	            get_sidebar('left');
	            get_sidebar('right');
	        }elseif( $archive_sidebar != 'no'){
	            get_sidebar( $archive_sidebar );
	        }   
	        ?>
	</div>
	<?php 
	get_footer();
