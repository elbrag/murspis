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
       <div class='margins'>

       <h1>Galleri</h1>

       <button id='filterbutton'>
           <?php
           //changing text depending on set language
                     if (get_locale() == 'sv_SE') {
                       echo 'Filter';
                     }//end of swe language check
                     if (get_locale() == 'en_GB') {
                       echo 'Filters';
                      }//end of eng language check
           /////////////////////////////////////////////////?>
           <i class="down"></i>
       </button>
       <span id='filter-info'><p>Visar
         <?php if (isset($_POST['checkbox']) && !empty($_POST['checkbox'])) {
           echo count($_POST['checkbox']);
         } else {
           echo wp_count_terms( 'kategori', array('hide_empty' => true,) );
         }
         ?>
         av <?php echo wp_count_terms( 'kategori', array('hide_empty' => true,) ); ?> kategorier</p></span>
       <div class='filters'>
         <form method='POST' action=''>
          <?php
            $terms = get_terms(array('taxonomy' => 'kategori', 'hide_empty' => true));
                    foreach ($terms as $value) { ?>
                    <label class="categories">

                     <input type="checkbox" name="checkbox[]"
                       <?php
                       if ((in_array($value->name, $_POST['checkbox'])) || (!isset($_POST['checkbox']))) echo "checked='checked'";
                       ?>
                       value='<?php echo $value->name ?>'>
                    </input>
                    <span class='checkbox'></span>
                    <?php echo $value->name ?>
                    </label>
                  <?php }

        //changing text of button depending on set language
                  if (get_locale() == 'sv_SE') {
                    $filtervalue = 'Filtrera';
                  }//end of swe language check
                  if (get_locale() == 'en_GB') {
                    $filtervalue = 'Filter';
                   }//end of eng language check
        /////////////////////////////////////////////////
                  ?>
                  <div class='btn_container'>
                    <input type='submit' id='submit' value=<?php echo $filtervalue ?>></input>
                  </div>
        </form>
       </div>
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
  <div class='margins'>

    <div class='thumbnails'>
        <?php
        if( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();

              foreach (get_the_terms(get_the_ID(), 'kategori') as $cat) {
                 $category = $cat->name;
               }


                $galleribild = get_field('galleribild');
                $resized = $galleribild['sizes'][ 'grid_thumbnail' ];
                $bildid = $galleribild['id'];


                  if (isset($_POST['checkbox']) && !empty($_POST['checkbox'])) {

                   foreach ($_POST['checkbox'] as $check) {
                      if ($check == $category) {?>

                            <img class='galleripost' src='<?php echo $resized ?>' alt='<?php echo $category ?>' id='<?php echo $bildid?>'>

                        <?php
                      }
                    }
                  } elseif (!isset($_POST['checkbox'])) {?>

                    <img class='galleripost' src='<?php echo $resized ?>' alt='<?php echo $category ?>' id='<?php echo $bildid?>'>

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

             foreach (get_the_terms(get_the_ID(), 'kategori') as $cat) {
                 $category = $cat->name;
               }

               $galleribild = get_field('galleribild');
               $resized = $galleribild['sizes'][ 'huge_thumbnail' ];
               $bildid = $galleribild['id'];


         if (isset($_POST['checkbox']) && !empty($_POST['checkbox'])) {

          foreach ($_POST['checkbox'] as $check) {
             if ($check == $category) {?>

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
          } elseif (!isset($_POST['checkbox'])) {?>

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
      </div>
</section>

<?php require("partials/about.php"); ?>

<?php get_footer(); ?>
