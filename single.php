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

        <div id='single-icons'>
          <ul>
            <?php
              $funktionfield = get_field_object('funktioner_spis');
              $funktioner = $funktionfield['value'];
              //ikoner till funktioner
              $stekikon = get_field('ikon_stek');
              $ugnikon = get_field('ikon_bakugn');
              $vattenikon = get_field('ikon_vattenvarme');
              $rokikon = get_field('ikon_rok');
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
                  $vedikon = get_field('ikon_vedlangd');

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
                      $stlikon = get_field('ikon_storlek');

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
            Föregående <br/>
            <?php previous_post_link(); ?>
          </span>
          <span class='next-post'>
            Nästa <br/>
            <?php next_post_link(); ?>
          </span>
        </div>

    <?php
        }
      }
?>


<?php require("partials/about.php"); ?>

<?php get_footer(); ?>
