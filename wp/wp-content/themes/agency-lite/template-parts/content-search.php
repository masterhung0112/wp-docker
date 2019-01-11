<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Agency Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php agency_lite_post_thumbnail(); ?>
	<div class="entry-summary">
		<header class="entry-header">
		<div class="entry-meta">
			<?php agency_lite_posted_on(); ?>
		</div><!-- .entry-meta -->
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php agency_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article>
</article>