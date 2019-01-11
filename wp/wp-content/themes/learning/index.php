<?php

get_header();

if (have_posts()): while (have_posts()): the_post();
?>
  <h1><?= the_title() ?></h1>

  <?php
endwhile; else:
  echo "<h1>There is no post</h1>";
endif;

get_footer();