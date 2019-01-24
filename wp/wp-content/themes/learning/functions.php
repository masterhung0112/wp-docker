<?php

function learning_assets() {
  wp_enqueue_style( 'learning-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), 'all' );
}

add_action( 'wp_enqueue_scripts', 'learning_assets');