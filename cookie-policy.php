<?php
/*
 * Template Name: Cookies
 */
?>

<?php get_header(); ?>


<?php
if( have_posts() ) {
   while ( have_posts() ) {
     the_post(); ?>

     <section class='topsection'>
       <div class='margins'>
         <h1>Cookie policy</h1>
         <?php the_content(); ?>
       </div>
     </section>
     <?php
    }
  }
?>


<?php get_footer(); ?>
