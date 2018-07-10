<?php
/*
 * Template Name: Home
 */

get_header(); ?>


<?php
if( have_posts() ) {
   while ( have_posts() ) {
     the_post();

     ?>

     <?php
     $section1bg = get_field('bild_sektion_1');
     $resized = $section1bg['sizes'][ 'max_screenwidth' ];


      ?>

     <section id='home_1' class='topsection' style='background-image:url(<?php echo $resized ?>)'>

       <h1><?php the_field('rubrik_sektion_1') ?></h1>
       <?php
          if (get_field('underrubrik_sektion_1')) {
            the_field('underrubrik_sektion_1');
          }

        ?>

     </section>

     <section id='home_2'>
        <?php
          $sliderid = get_field('slider-id_sektion_2');
          echo do_shortcode( '[masterslider id="'.$sliderid.'' );

        ?>
     </section>



  <?php
    }
  }
?>

<?php require("partials/about.php"); ?>

<?php get_footer(); ?>
