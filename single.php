<?php get_header(); ?>

<?php


if( have_posts() ) {
   while ( have_posts() ) {
     the_post();

      $spisbild = get_field('single_bild');
      $resized = $spisbild['sizes'][ 'grid_thumbnail' ];
      $bildid = $spisbild['id'];
        ?>

      <img src='<?php echo $resized ?>'>

        <?php
          }
        }
?>
<section id='single_1'>
<?php

  if( have_posts() ) {
    while ( have_posts() ) {
      the_post();
      ?>
        <h2><?php the_field('single_rubrik') ?></h2>
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

</section>

        <?php
        $sliderid = get_field('single_slider');
        echo do_shortcode( '[masterslider id="'.$sliderid.'' );
        ?>

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
