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
       <div class='margins'>

         <h1><?php the_field('rubrik_spisar') ?></h1>
         <p><?php the_field('introtext_spisar') ?></p>

       </div>
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
  <div class='margins'>

<?php
if( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>


      <div class='murspis'>
        <a href='<?php the_permalink(); ?>'>

          <?php
          $spisbild = get_field('single_bild');
          $resized = $spisbild['sizes'][ 'grid_thumbnail' ];
          $bildid = $spisbild['id'];
            ?>

          <img src='<?php echo $resized ?>'>

          <div class='texts'>
            <h2><?php the_field('single_rubrik') ?></h2>
            <p><?php the_field('single_brodtext') ?></p>
          </div>

        </a>
      </div>

    <?php }
   } ?>

 </div>
</section>

<?php require("partials/about.php"); ?>

<?php get_footer(); ?>
