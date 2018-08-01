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

     <section id='home_1' class='topsection'>

       <?php
         $sliderid = get_field('slider-id');
         // echo do_shortcode( '[masterslider id="'.$sliderid.'' );
          nivo_slider( $sliderid );
          ?>

          <div class='textbox'>
           <h1><?php the_field('rubrik_sektion_1') ?></h1>
           <?php if (get_field('underrubrik_sektion_1')) {
              ?><a href='<?php the_field('lank_underrubrik'); ?>'><?php
                the_field('underrubrik_sektion_1');
                ?></a><?php
              } ?>
          </div>

     </section>

     <?php
       }
     }
   ?>

     <section id='home_2'>
       <div class='margins'>
         <h2><?php the_field('rubrik_sektion_2') ?></h2>
       <?php

$args = array(
 'post_type' => 'galleripost',
 'posts_per_page' => 3
);

$query = new WP_Query( $args );

if( $query->have_posts() ) {

  ?><div class='home-galleriposter'><?php

    while ( $query->have_posts() ) {
      $query->the_post();
      ?>

        <div class='home-galleripost'>

            <?php
            $galleribild = get_field('galleribild');
            $resized = $galleribild['sizes'][ 'grid_thumbnail' ];
            $bildid = $galleribild['id'];
              ?>

            <img src='<?php echo $resized ?>'>

            <h3>
              <?php the_field('galleripost_rubrik') ?>
            </h3>
            <p class="caption">
                <?php the_field('galleripost_bildtext') ?>
            </p>

        </div>

  <?php
} ?>
    </div>
<?php  }
?>


        <?php
          if (get_locale() == 'sv_SE') {
            ?>
            <a href='/galleri'>
              <div class='btn_container'>
                  <button class='btn_2'>Gå till galleriet</button>
              </div>
            </a>
            <?php
          } elseif (get_locale() == 'en_GB') {
            ?>
            <a href='/galleri'>
              <div class='btn_container'>
                  <button class='btn_2'>Go to the gallery</button>
              </div>
            </a>
            <?php
          }
          ?>

        </div>
     </section>

<?php require("partials/about.php"); ?>

<?php get_footer(); ?>
