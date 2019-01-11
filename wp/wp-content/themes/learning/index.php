<?php

get_header();

if (have_posts()): while (have_posts()): the_post();
?>
  <h2>
    <a href="<?= get_permalink() ?>" title="<?= the_title_attribute() ?>"><?= get_the_title() ?></a>
  </h2>
  <div>
    Posted on
    <a href="<?= get_permalink() ?>">
      <time datetime="<?= get_the_date('c') ?>"><?= get_the_date() ?></time>
    </a>
    By <a href="<?= get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>"><?= get_the_author() ?></a>
  </div>
  <div>
    <?php the_excerpt() ?>
  </div>
  <a href="<?= get_permalink() ?>" title="<?= the_title_attribute() ?>">
  Read more
  </a>
  <?php the_posts_pagination(); ?>
  <?php
endwhile; else:
  echo "<h1>There is no post</h1>";
endif;

get_footer();