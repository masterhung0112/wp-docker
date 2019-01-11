<?php 

function agency_lite_counter_page(){
	$agency_lite_enable_counter_section = get_theme_mod('agency_lite_enable_counter_section','on');
	if($agency_lite_enable_counter_section == 'on'){
		?>
		<section class = "agency-lite-counter-wrap agency-lite-home-section" id = "agency-lite-scroll-counter">
			<div class = "agency-lite-container">
				<div class="counter-of-agency clearfix">
				<?php 
					$t_counters = array('one','two', 'three' );
					foreach( $t_counters as $t_counter ){
						$agency_lite_counter_value = get_theme_mod('agency_lite_'.$t_counter.'_counter_value');
						if($agency_lite_counter_value){
							?>
							<div class="counter-inner-wrapper">
								<div class = "agency-lite-counter-scroll">
									<div class = "agency-lite-counter-scroll-value" data-count="<?php echo absint($agency_lite_counter_value) ?>">0</div>
								</div>
							 	<?php 	
								$agency_lite_counter_pages = get_theme_mod('agency_lite_'.$t_counter.'_counter_pages');
								if($agency_lite_counter_pages){
									$agency_lite_counter_args = array(
							            'post_type' => 'page',
							            'post_status' => 'publish',
							            'p' => $agency_lite_counter_pages
							      		  );
									$agency_lite_counter_query = new WP_Query($agency_lite_counter_args);
									if($agency_lite_counter_query->have_posts()):
										while($agency_lite_counter_query->have_posts()):
											$agency_lite_counter_query->the_post();
										?>
						                <div class="agency-lite-counter-page">
											 <div class = "agency-lite-feature-title">
						                         <?php the_title();?>
						                	 </div>

						            		 <div class = "agency-lite-feature-description">
						                 		<?php the_content(); ?>
						           			 </div>
						               	 </div>
										<?php 
										endwhile;
								    wp_reset_postdata();
									endif; 
								}?>
							</div>
			<?php 	} 	}?>
			</div>
			</div>
		</section>
	<?php 
	}
}

add_action('agency_lite_counter_page','agency_lite_counter_page');

