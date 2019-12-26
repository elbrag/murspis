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
       <div class='margins'>

       <h1><?php the_field('rubrik_kontakt') ?></h1>
       <p><?php the_field('introtext_kontakt') ?></p>

       <div class='kontakt-ikoner'>
         <?php
           if (get_field('telefonnummer')) {?>
             <p id='tel'>
               <img src='<?php the_field('telefonikon') ?>' />
               <?php the_field('telefonnummer') ?>
             </p>
           <?php } ?>

           <?php
             if (get_field('email')) {?>
             <p id='email'>
               <img src='<?php the_field('emailikon') ?>' />
               <?php the_field('email') ?>
             </p>
           <?php } ?>

           <?php
             if (get_field('adress')) {?>
             <p id='adress'>
               <img src='<?php the_field('adressikon') ?>' />
               <?php the_field('adress') ?>
             </p>
           <?php } ?>
       </div>
      </div>
     </section>
     <section id='kontakt_2'>
       <div class='margins'>

       <h2><?php the_field('rubrik_formular') ?></h2>
       <?php

       if (get_locale() == 'sv_SE') {
          echo do_shortcode( '[contact-form-7 id="4" title="Kontaktformulär sve"]' );
      } elseif (get_locale() == 'en_GB') {
           echo do_shortcode( '[contact-form-7 id="126" title="Kontaktformulär eng"]' );
       }

       ?>
      </div>
     </section>

  <?php
    }
  }
?>

<?php get_footer(); ?>
