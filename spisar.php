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

       <h1>Murspisar</h1>

     </section>



  <?php
    }
  }
?>

<?php get_footer(); ?>
