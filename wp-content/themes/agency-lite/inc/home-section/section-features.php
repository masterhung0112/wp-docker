<?php 

function agency_lite_home_features(){

	$agency_lite_enable_features_control = get_theme_mod('agency_lite_enable_features_control','on');

	if($agency_lite_enable_features_control == 'on'){
	?>
		<section class = "agency-lite-home-features agency-lite-home-section" id = "agency-lite-scroll-features">
			<?php 
			$agency_lite_features_title_control = get_theme_mod('agency_lite_features_title_control');
			$agency_lite_features_description_control = get_theme_mod('agency_lite_features_description_control');
			?>
				
				<div class = "agency-lite-container clearfix">
					<div class="section-title">
						<h2>
						<?php echo esc_html($agency_lite_features_title_control); ?>
						</h2>
					</div>
					<div class="section-description">
						<?php echo esc_html($agency_lite_features_description_control); ?>
					</div>
					<div class = "agency-lite-feature-wrap clearfix ">
					<?php 
					$features_pages = array('one','two', 'three' );
					foreach( $features_pages as $features_page ){
						$agency_lite_features_pages = get_theme_mod('agency_lite_'.$features_page.'_features_pages');

						if($agency_lite_features_pages){
							$agency_lite_features_args = array(
					            'post_type' => 'page',
					            'post_status' => 'publish',
					            'p' => absint($agency_lite_features_pages)
					      		  );
						
							$agency_lite_features_query = new WP_Query($agency_lite_features_args);
							if($agency_lite_features_query->have_posts()):
								while($agency_lite_features_query->have_posts()):
									$agency_lite_features_query->the_post();
				                    $agency_lite_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'');?>
				                    
				                    <div class=" agency-lite-features-page">
										<?php
					                    if($agency_lite_image_src){
					                      ?>
					                        <div class="features-image-wrap"><img src="<?php echo esc_url($agency_lite_image_src[0]); ?>" title="<?php the_title_attribute() ?>" alt="<?php the_title_attribute() ?>" />
					                        </div>
				                        <?php } ?>
											 <div class = "agency-lite-feature-title">
				                            	 <?php the_title();?>
				                    		 </div>
				                    		 <div class = "agency-lite-feature-description">
				                    		 	<?php echo esc_attr(wp_trim_words( get_the_content(), 15, '...' )); ?>
				                   			 </div>
				                   			 <div class = "feat-btn">
                                                <a href="<?php the_permalink(); ?>">Read More</a>
                                            </div>
			                   		</div>
				        		<?php 
				    			endwhile;
				            wp_reset_postdata();
				    		endif;
				    	}
					}
					?>
				</div>
			</div>
		</section>
	<?php
	}
}
	add_action('agency_lite_home_features','agency_lite_home_features');
	