<?php get_header(); ?>

<script>
document.getElementById('menu-item-94').className += ' active';
</script>

<?php


if( have_posts() ) {
   while ( have_posts() ) {
     the_post();

      $spisbild = get_field('single_bild');
      $resized = $spisbild['sizes'][ 'grid_thumbnail' ];
      $bildid = $spisbild['id'];
        ?>

        <div class='crop'>
          <img class='single_hero' src='<?php echo $resized ?>'>
        </div>

        <?php
          }
        }
?>
<section id='single_1'>
  <div class='margins'>
<?php

  if( have_posts() ) {
    while ( have_posts() ) {
      the_post();
      ?>
        <h1><?php the_field('single_rubrik') ?></h1>
        <p><?php the_field('single_brodtext') ?></p>

        <?php if( get_field('mer_info') ) { ?>
            <?php the_field('rubrik_mer_info'); ?>
	         <a href="<?php the_field('mer_info'); ?>" download >Download File</a>
        <?php } ?>

        <div id='single-icons'>
          <ul>
            <?php
              $funktionfield = get_field_object('funktioner_spis');
              $funktioner = $funktionfield['value'];
              //ikoner till funktioner
              $stekikon = get_template_directory_uri() . "/img/stekhall.png";
              $ugnikon = get_template_directory_uri() . "/img/bakugn.png";
              $vattenikon = get_template_directory_uri() . "/img/vattenvarme.png";
              $rokikon = get_template_directory_uri() . "/img/rok.png";
              //
              if ($funktioner) {
                ?>
                  <?php foreach ($funktioner as $funktion) { ?>
                    <li>

                      <?php if ($funktion == 'stekhall') {?>
                        <img class='single-ikon' src='<?php echo $stekikon ?>' alt='Stekhäll'>
                      <?php } elseif ($funktion == 'bakugn') {
                        ?>
                        <img class='single-ikon' src='<?php echo $ugnikon ?>' alt='Bakugn'>
                      <?php } elseif ($funktion == 'vattenvarme') {
                        ?>
                        <img class='single-ikon' src='<?php echo $vattenikon ?>' alt='Vattenvärme'>
                      <?php } elseif ($funktion == 'rok') {
                        ?>
                        <img class='single-ikon' src='<?php echo $rokikon ?>' alt='Rök'>
                      <?php } ?>

                      <?php echo $funktionfield['choices'][ $funktion ]; ?>
                    </li>
                    <?php } ?>
                <?php } ?>

                <?php
                  $ved = get_field('vedlangd');
                  $vedikon = get_template_directory_uri() . "/img/ved.png";

                  if ($ved) {
                    ?>
                        <li>
                          <img class='single-ikon' src='<?php echo $vedikon ?>' alt='Vedlängd'>
                          <?php echo $ved; ?> cm
                        </li>
                    <?php } ?>


                    <?php
                      $stlfield = get_field_object('storlek');
                      $stl = $stlfield['value'];
                      $stlikon = get_template_directory_uri() . "/img/storlek.png";

                      if ($stl) {
                        ?>
                            <li>
                              <img class='single-ikon' src='<?php echo $stlikon ?>' alt='Storlek'>
                              <?php echo $stlfield['choices'][ $stl ]; ?>
                            </li>
                        <?php } ?>

          </ul>
        </div>
    </div>
</section>
<section id='single_2'>
  <div class='margins'>

  <?php
      //Get the images ids from the post_metadata
      $images = acf_photo_gallery('minigalleri', $post->ID);
      //Check if return array has anything in it
      if( count($images) ) {
          //Cool, we got some data so now let's loop over it
          foreach($images as $image) {
              $id = $image['id']; // The attachment id of the media
              $title = $image['title']; //The title
              $caption = $image['caption']; //The caption
              $full_image_url = $image['full_image_url']; //Full size image url
              $thumbnail_image_url = acf_photo_gallery_resize_image($full_image_url, 400, 400, true); //Get the thumbnail size image url 150px by 150px
              ?>
              <div class='single_galleribild'>
                <img src='<?php echo $thumbnail_image_url ?>'>
              </div>
              <?php
            }
          }
  ?>
  </div>
</section>

        <div id='single-postlinks'>
          <span class='prev-post'>
            <?php if ( get_previous_post() ) {
              ?>Föregående <br/><?php
              previous_post_link();
            } ?>
          </span>
          <span class='next-post'>
            <?php if ( get_next_post() ) {
              ?>Nästa <br/><?php
              next_post_link();
            } ?>
          </span>
        </div>

    <?php
        }
      }
?>


<?php require("partials/about.php"); ?>

<?php get_footer(); ?>
