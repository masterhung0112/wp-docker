<?php 
/**
*
*Template Name:Home Page
**/
get_header();

do_action('agency_lite_slider_control');
do_action('agency_lite_home_section');
do_action('agency_lite_faq_home_page');
do_action('agency_lite_home_features');
do_action('agency_lite_services_pages');
do_action('agency_lite_team_page');
do_action('agency_lite_counter_page');
do_action('agency_lite_blog_page');
do_action('agency_lite_logo_page');

get_footer(); ?>