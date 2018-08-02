<?php
/*
 * Template Name: Välja eldstad
 */

get_header(); ?>


<?php
if( have_posts() ) {
   while ( have_posts() ) {
     the_post();

     ?>


     <section id='valjaeldstad_1' class='topsection'>
        <div class='margins'>
           <h1><?php the_field('rubrik_valja_eldstad') ?></h1>
           <p><?php the_field('introtext_valja_eldstad') ?></p>
           <img id='valjaeldstad_top' src='<?php the_field('bild_valja_eldstad') ?>' />
        </div>
      </section>

  <?php
    }
  }
?>

<!--här börjar artiklarna-->

<?php

$args = array(
  'post_type' => 'artikel',
  'posts_per_page' => -1
);

$query = new WP_Query( $args );
?>

<section id='valjaeldstad_2'>
  <div class='margins'>

<?php
if( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>

      <div class='artikel'>

          <h2><?php the_field('rubrik_artikel') ?></h2>
          <p><?php the_field('brodtext_artikel') ?></p>

          <ul>
            <?php the_field('egenskaper') ?>
          </ul>

      </div>

      <img src='<?php the_field('bild_artikel') ?>' />

    <?php }
   } ?>

 </div>
</section>

<?php

if (get_locale() == 'sv_SE') {
?>
  <a id='to-top' href='#'>Till toppen av sidan</a>
<?php
} elseif (get_locale() == 'en_GB') {
  ?>
    <a id='to-top' href='#'>Back to the top</a>
  <?php
}

?>

<?php require("partials/about.php"); ?>

<?php get_footer(); ?>
