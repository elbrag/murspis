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
          $typer = get_terms(array('taxonomy' => 'typ', 'hide_empty' => true));
          $modeller = get_terms(array('taxonomy' => 'modell', 'hide_empty' => true));
          ?>

          <!-- https://stackoverflow.com/questions/17714705/how-to-use-checkbox-inside-select-option -->

          <form id='form-typer' method='POST' action=''>
            <div class="multiselect">
              <div class="selectBox">
                <label>Typ</label>
                <select>
                  <option>Typ</option>
                </select>
                <div class="overSelect"></div>
              </div>

              <div class="checkboxes">
                <label class='markera-alla' for="alla-typer">
                  <input type="checkbox" name='checkbox' id="alla-typer" value='Markera alla typer' />Markera alla
                </label>
                  <?php
                  foreach ($typer as $typ) { ?>
                    <label for="<?php echo $typ->name ?>">
                      <input type="checkbox" id="<?php echo $typ->name ?>" value='<?php echo $typ->name ?>' /><?php echo $typ->name ?>
                    </label>
                    <?php } ?>
              </div>
            </div>
          </form>

          <form id='form-modeller' method='POST' action=''>
            <div class="multiselect">
              <div class="selectBox">
                <label>Modell</label>
                <select>
                  <option>Modell</option>
                </select>
                <div class="overSelect"></div>
              </div>

              <div class="checkboxes">
                <label class='markera-alla' for="alla-modeller">
                  <input type="checkbox" id="alla-modeller" value='Markera alla modeller' />Markera alla
                </label>
                  <?php
                  foreach ($modeller as $modell) { ?>
                    <label for="<?php echo $modell->name ?>">
                      <input type="checkbox" id="<?php echo $modell->name ?>" value='<?php echo $modell->name ?>'/><?php echo $modell->name ?></input>
                    </label>
                  <?php } ?>
              </div>
            </div>
          </form>

          <?php



          if (isset($_POST['checkbox']) && !empty($_POST['checkbox'])) {

          }

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

              $galleribild = get_field('galleribild');
              $resized = $galleribild['sizes'][ 'grid_thumbnail' ];
              $bildid = $galleribild['id'];

              ?>

              <div class='galleripost' id='<?php echo $bildid ?>'>
                  <div class='galleribild' style='background-image:url(<?php echo $resized ?>)'></div>
              </div>

            <?php }
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

             $galleribild = get_field('galleribild');
             $resized = $galleribild['sizes'][ 'grid_thumbnail' ];
             $bildid = $galleribild['id'];

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
          } ?>

                <!-- Next/previous controls -->
                <a class="prev">&#10094;</a>
                <a class="next">&#10095;</a>


            </div>
        </div>

</section>


<?php get_footer(); ?>
