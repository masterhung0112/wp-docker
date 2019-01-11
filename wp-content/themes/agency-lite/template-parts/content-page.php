<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Agency Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post_content_article single_page_wrap'); ?>>
  <div class="entry-content">
    <?php
    $agency_lite_img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'agency-lite-post-image-withsidebar', false );
    if($agency_lite_img_src){ 
    ?>
    <div class="agency_lite_img_wrap">
      <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($agency_lite_img_src[0]); ?>" /></a>
    </div>
    <?php } ?>
    <div class="excerpt_post_content"><?php
     the_content(); 
     wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'agency-lite' ),
        'after' => '</div>',
    ) );
     ?>
     </div>
   </div><!-- .entry-content -->
</article>
