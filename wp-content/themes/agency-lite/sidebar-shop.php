<?php
/**
* Shop Sidebar for the theme
*
* @package Agensy Lite
*/ 

if ( ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
} 
?>
<div class="sidebar-right">
    <aside id="right-sidebar" class="widget-area">
        <?php dynamic_sidebar( 'sidebar-3' ); ?>
    </aside><!-- #right-sidebar -->
</div><!-- .sidebar-right -->  