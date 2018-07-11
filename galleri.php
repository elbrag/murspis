<?php
/*
 * Template Name: Galleri
 */

get_header(); ?>


<?php
if( have_posts() ) {
   while ( have_posts() ) {
     the_post();

     ?>


     <section id='galleri_1' class='topsection'>

       <h1>Galleri</h1>

     </section>



  <?php
    }
  }
?>

<!--här börjar galleriposterna-->

<?php

$args = array(
  'post_type' => 'galleripost',
  'posts_per_page' => -1
);

$query = new WP_Query( $args );
?>

<section id='galleri_2'>

<?php
if( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();

      $galleribild = get_field('galleribild');
      $resized = $galleribild['sizes'][ 'large_thumbnail' ];

?>

    <a href='<?php the_permalink(); ?>'>
      <div class='galleripost'>
          <div class='galleribild' style='background-image:url(<?php echo $resized ?>)'></div>
      </div>
    </a>


    <?php }
   } ?>

</section>


<?php get_footer(); ?>
