<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agency Lite_cat_lists 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php

        $agency_lite_post_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'agency-lite');
        if($agency_lite_post_image){
            ?>
            <img src="<?php echo esc_url($agency_lite_post_image[0]) ?>" alt="<?php the_title_attribute()?>" title="<?php the_title_attribute()?>" />
            <?php
        }
        ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="blog-wrap">
			<div class="entry-meta">
				<div class="comment-author-date">
	                <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>

	                <span class="post-author"><?php  echo esc_url(the_author_posts_link()); ?> </span>

	            </div>
			</div><!-- .entry-meta -->
            <h2 class = "blog-wrap-title">
    		 <a href="<?php the_permalink()?>">
    		 	<?php the_title(); ?>
    		 </a>	
    		</h2>
    		
		<div class='expert-content'>
        	<?php echo apply_filters('the_content' , wp_kses_post(wp_trim_words(get_the_content(),70,'...'))); //WPCS: XSS OK.?>
        </div>
        <a class="read-more" href="<?php the_permalink() ?>">
        	<?php esc_html_e('Read More','agency-lite'); ?>
        </a>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->