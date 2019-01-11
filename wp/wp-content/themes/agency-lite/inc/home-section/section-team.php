<?php 

	function agency_lite_team_page(){
		$agency_lite_team_page_enable = get_theme_mod('agency_lite_team_page_enable','on');
			if($agency_lite_team_page_enable == 'on'){
			?>
				<section class = "agency-lite-team-wrap agency-lite-home-section" id = "agency-lite-scroll-team">
					<div class = "agency-lite-container">
					<?php 
						$agency_lite_team_title = get_theme_mod('agency_lite_team_title');
						$agency_lite_team_description = get_theme_mod('agency_lite_team_description');
						
						if($agency_lite_team_title || $agency_lite_team_description){ ?>
					        <div class="section-title-sub-wrap wow fadeInUp">
					            <?php if($agency_lite_team_title){ ?>
					            	<div class="section-title">
					            		<h2><?php echo esc_html($agency_lite_team_title); ?></h2>
					            	</div>
					            <?php } ?>
					            <?php if($agency_lite_team_description) { ?>
					            	<div class="section-description">
					            		<?php echo esc_html($agency_lite_team_description); ?>
					            	</div>
					            <?php } ?>
					        </div>
		   				 <?php } ?>
					    <?php if(is_active_sidebar('home-team-area')){ ?>
					            <div class="team-members-contents  clearfix">
					                <?php
					                    dynamic_sidebar('home-team-area');
					                ?>
					            </div>
					    <?php } ?>
					</div>
				</section>
			<?php 
		}
	}

	add_action('agency_lite_team_page','agency_lite_team_page');

