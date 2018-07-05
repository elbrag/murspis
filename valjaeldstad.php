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

       <h1>Välja eldstad</h1>

     </section>



  <?php
    }
  }
?>

<?php get_footer(); ?>
