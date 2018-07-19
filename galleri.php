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

         <?php
          $kategorier = get_terms(array('taxonomy' => 'kategori', 'hide_empty' => true));

          ?>

          <!-- https://stackoverflow.com/questions/17714705/how-to-use-checkbox-inside-select-option -->

          <form id='categories' method='POST' action=''>
            <div class="multiselect">
              <div class="selectBox">
                <label>Välj spis</label>
                <select>
                  <option>Spis</option>
                </select>
                <div class="overSelect"></div>
              </div>

              <div class="checkboxes">

                  <?php
                  foreach ($kategorier as $kat) { ?>
                    <label for="<?php echo $kat->name ?>">
                      <input type="checkbox" name='checkbox[]'
                      <?php
                      if ((in_array($kat->name, $_POST['checkbox']))) echo "checked='checked'";
                      ?> id="<?php echo $kat->name ?>" value='<?php echo $kat->name ?>' /><?php echo $kat->name ?>
                    </label>
                    <?php } ?>
              </div>
            </div>

            <input type='submit' value='Filtrera'>

          </form>

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
