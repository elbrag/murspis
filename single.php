<?php get_header(); ?>

<?php


if( have_posts() ) {
   while ( have_posts() ) {
     the_post();

      $spisbild = get_field('single_bild');
      $resized = $spisbild['sizes'][ 'grid_thumbnail' ];
      $bildid = $spisbild['id'];
        ?>

      <img src='<?php echo $resized ?>'>

        <?php
          }
        }
?>
<section id='single_1'>
<?php

  if( have_posts() ) {
    while ( have_posts() ) {
      the_post();
      ?>
        <h2><?php the_field('single_rubrik') ?></h2>
        <p><?php the_field('single_brodtext') ?></p>

        <?php
        $sliderid = get_field('single_slider');
        echo do_shortcode( '[masterslider id="'.$sliderid.'' );
        ?>

    <?php
        }
      }
?>
</section>

<?php require("partials/about.php"); ?>

<?php get_footer(); ?>
