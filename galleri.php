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

       <div class='filters'>

         <span class='kat-parent active' id='alla-kat'>
           <button class='kat-heading'>
             <span class='kat-title'>Visa alla</span>
           </button>
         </span>

         <?php
         $parents = get_terms(array('taxonomy' => 'kategori', 'hide_empty' => true, 'parent' => 0));
         foreach ($parents as $parent) { ?>

               <span class='kat-parent'>
                 <button class='kat-heading'>
                 <span class='kat-title'><?php echo $parent->name ?></span>
                 <span class='kat-more'>&or;</span>
                </button>

                 <?php $children = get_term_children( $parent->term_id, 'kategori' );

                 foreach ($children as $child) {

                        $term = get_term_by( 'id', $child, 'kategori' );

                        ?>
                       <button class='kat-child'>
                         <?php echo $term->name ?>
                       </button>
                  <?php
                 } ?>
               </span>

          <?php }

         ?>

       </div>

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

    <div class='thumbnails'>
        <?php
        if( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();

              foreach (get_the_terms(get_the_ID(), 'kategori') as $category) {
                  $cat = $category->name;
                }


                $galleribild = get_field('galleribild');
                $resized = $galleribild['sizes'][ 'grid_thumbnail' ];
                $bildid = $galleribild['id'];


                  if (isset($_POST['checkbox']) && !empty($_POST['checkbox'])) {
                    foreach ($_POST['checkbox'] as $check) {
                      if ($check == $cat) {

                          ?>
                          <div class='galleripost' id='<?php echo $bildid ?>'>
                              <div class='galleribild' style='background-image:url(<?php echo $resized ?>)'></div>
                          </div>

                    <?php
                  }
                }
              } elseif (!isset($_POST['checkbox'])) {

                  ?>
                  <div class='galleripost' id='<?php echo $bildid ?>'>
                      <div class='galleribild' style='background-image:url(<?php echo $resized ?>)'></div>
                  </div>
                  <?php
              }


             }
           } ?>
        </div>

     <!--LIGHTBOX TERRITORY-->

       <div id="gallery-lb" class="lightbox">
          <span class="close cursor" id='closelb'>&times;</span>
          <div class="modal-content">

       <?php
       if( $query->have_posts() ) {
           while ( $query->have_posts() ) {
             $query->the_post();

             foreach (get_the_terms(get_the_ID(), 'kategori') as $category) {
                 $cat = $category->name;
               }

               $galleribild = get_field('galleribild');
               $resized = $galleribild['sizes'][ 'grid_thumbnail' ];
               $bildid = $galleribild['id'];

             if (isset($_POST['checkbox']) && !empty($_POST['checkbox'])) {
               foreach ($_POST['checkbox'] as $check) {
                 if ($check == $cat) {

       ?>

             <div class='galleripost-lb' id='<?php echo $bildid ?>'>
                 <div class='galleribild-lb' style='background-image:url(<?php echo $resized ?>)'></div>

                 <div class="caption-container">
                     <h2 id='<?php echo $bildid ?>'>
                       <?php the_field('galleripost_rubrik') ?>
                     </h2>
                     <p class="caption" id='<?php echo $bildid ?>'>
                         <?php the_field('galleripost_bildtext') ?>
                     </p>
                 </div>
             </div>

             <?php
           }
         }
       } elseif (!isset($_POST['checkbox'])) {
         ?>

         <div class='galleripost-lb' id='<?php echo $bildid ?>'>
             <div class='galleribild-lb' style='background-image:url(<?php echo $resized ?>)'></div>

             <div class="caption-container">
                 <h2 id='<?php echo $bildid ?>'>
                   <?php the_field('galleripost_rubrik') ?>
                 </h2>
                 <p class="caption" id='<?php echo $bildid ?>'>
                     <?php the_field('galleripost_bildtext') ?>
                 </p>
             </div>
         </div>

       <?php }
            }
          } ?>

                <!-- Next/previous controls -->
                <a class="prev">&#10094;</a>
                <a class="next">&#10095;</a>


            </div>
        </div>

</section>


<?php get_footer(); ?>
