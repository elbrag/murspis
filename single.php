<?php get_header(); ?>

<?php


if( have_posts() ) {
   while ( have_posts() ) {
     the_post();

      ?>

<h2><?php the_field('single_rubrik') ?></h2>
<p><?php the_field('single_brodtext') ?></p>


<?php
  }
}
?>

<?php get_footer(); ?>
