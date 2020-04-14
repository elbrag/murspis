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

         //if no slider, let's do a video
         $topvid = get_field('toppvideo');

         //if no slider and no video, let's do a top image instead
         $topimg = get_field('toppbild');

         // echo do_shortcode( '[masterslider id="'.$sliderid.'' );
         if ($sliderid) {
           nivo_slider( $sliderid );
         }
         elseif($topvid) { ?>

           <div class='video-wrapper'>

             <video autoplay muted loop id="myVideo">
              <source src="<?php echo $topvid ?>" type="video/mp4">
              Your browser does not support HTML5 video.
             </video>
           </div>

           <?php
         }
         elseif ($topimg) {
           $resized = $topimg['sizes'][ 'huge_thumbnail' ];
           $bildid = $topimg['id'];
           ?>
           <div class='crop'>
             <img class='single_hero' src='<?php echo $resized ?>'>
           </div>

        <?php
         }
        ?>

          <div class='textbox'>
            <img class='hero-logo' src='<?php echo get_template_directory_uri() . "/img/radig-2-white-2.png" ?>'/>
           <h1><?php the_field('rubrik_sektion_1') ?></h1>
           <div class='tagline'>
             <?php if (get_field('underrubrik_sektion_1')) {

                  ?><p><?php the_field('underrubrik_sektion_1');?></p><?php

                } ?>
                <i class='home_down'></i>
           </div>

          </div>

     </section>

     <?php
       }
     }
   ?>

     <!-- <section id='home_2'>
       <div class='margins'> -->
         <!-- <h2><?php the_field('rubrik_sektion_2') ?></h2> -->
       <?php /*

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
     */ ?>

     <section id='home_3'>
       <div class='margins'>

         <h2><?php the_field('rubrik_sektion_3'); ?></h2>
         <?php the_field('text_sektion_3'); ?>

       </div>
     </section>

<?php require("partials/about.php"); ?>

<?php get_footer(); ?>
