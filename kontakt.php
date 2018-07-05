<?php
/*
 * Template Name: Kontakt
 */

get_header(); ?>


<?php
if( have_posts() ) {
   while ( have_posts() ) {
     the_post();

     ?>


     <section id='kontakt_1' class='topsection'>

       <h1>Kontakt</h1>

     </section>



  <?php
    }
  }
?>

<?php get_footer(); ?>
