<?php 

function agency_lite_faq_home_page(){

	$agency_lite_home_faq_enable = get_theme_mod('agency_lite_home_faq_enable','on');
	if($agency_lite_home_faq_enable == 'on'){
		?>
		<section class ="agency-lite-faq-wrap agency-lite-home-section" id = "agency-lite-scroll-faq" > 
			<div class="agency-lite-container" id="faq-home-page">
				<div class="agency-lite-faq-wrapper">
					<?php 
					$agency_lite_faq_title  	 = get_theme_mod('agency_lite_faq_title');
					$agency_lite_faq_description = get_theme_mod('agency_lite_faq_description');


					if( $agency_lite_faq_title ){ ?>
						<div class="section-title">
							<h2><?php echo esc_html($agency_lite_faq_title);  ?></h2>
						</div>
					<?php 
					}
					if( $agency_lite_faq_description ){ ?>
						<div class="section-description">
							<?php echo esc_html($agency_lite_faq_description); ?>
						</div>
					<?php } 
					
					$faq_pages = array('one','two', 'three' );
					foreach( $faq_pages as $faq_page ){

						$agency_lite_faq_page = get_theme_mod('agency_lite_'.$faq_page.'_faq_pages');
						if($agency_lite_faq_page){
							 $agency_lite_faq_args = array(
					        'post_type' => 'page',
					        'post_status' => 'publish',
					        'p' => absint($agency_lite_faq_page));
							 $agency_lite_faq_query = new WP_Query($agency_lite_faq_args);
						if($agency_lite_faq_query ->have_posts()):
						 	while($agency_lite_faq_query->have_posts()):
						 		$agency_lite_faq_query->the_post();
				                ?>
				                <div class="tab-title">
				                     <h3 data-tab="tab-<?php the_ID();?>">
				                         <?php the_title();?>
				                     </h3>
				                 </div>
				                 <div class="tab-contents" id="tab-<?php the_ID();?>">
				                     <?php the_content(); ?>
				                </div>
				                <?php 
						 	endwhile;
				            wp_reset_postdata();
				            ?>
				            <?php 
						endif;
						}
					}
					?>
			</div><!-- .agency-lite-faq-wrapper -->
			</div>
		</section>
	<?php 
	}
}
add_action('agency_lite_faq_home_page','agency_lite_faq_home_page');


