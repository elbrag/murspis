<?php
/*
 * Template Name: Spisar
 */

get_header(); ?>


<?php
if( have_posts() ) {
   while ( have_posts() ) {
     the_post();

     ?>


     <section id='murspisar_1' class='topsection'>

       <h1><?php the_field('rubrik_spisar') ?></h1>
       <p><?php the_field('introtext_spisar') ?></p>

     </section>



  <?php
    }
  }
?>


<!--här börjar spisarna-->

<?php

$args = array(
  'post_type' => 'murspis',
  'posts_per_page' => -1
);

$query = new WP_Query( $args );
?>

<section id='murspisar_2'>

<?php
if( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>

    <a href='<?php the_permalink(); ?>'>
      <div class='murspis'>

          <?php
          $spisbild = get_field('single_bild');
          $resized = $spisbild['sizes'][ 'grid_thumbnail' ];
          $bildid = $spisbild['id'];
            ?>

          <img src='<?php echo $resized ?>'>

          <h2><?php the_field('single_rubrik') ?></h2>
          <p><?php the_field('single_short') ?></p>

      </div>
    </a>


    <?php }
   } ?>

</section>

<?php require("partials/about.php"); ?>

<?php get_footer(); ?>
