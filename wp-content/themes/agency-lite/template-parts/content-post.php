<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agency Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php

        $agency_lite_post_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'agency-lite');
        if($agency_lite_post_image){
            ?>
            <a href="<?php the_permalink() ?>">
            	<img src="<?php echo esc_url($agency_lite_post_image[0]) ?>" alt="<?php the_title_attribute()?>" title="<?php the_title_attribute()?>" /> 
            </a>
            <?php
        }
        
        ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="blog-wrap">
		
    		<div class="entry-meta">
    			<div class="comment-author-date">
                    <span class="post-date"> <?php echo esc_html(get_the_date()); ?></span>

                    <span class="post-author"><?php  echo esc_url(the_author_posts_link()); ?> </span>

                </div>
    		</div><!-- .entry-meta -->

    		<h2 class = "blog-wrap-title">
                <?php the_title(); ?>
            </h2>
            
            <div class='expert-content'>
            	<?php the_content();?>
            </div>
            
	   </div>
    </div><!-- .entry-content -->
</article><!-- #post-## -->