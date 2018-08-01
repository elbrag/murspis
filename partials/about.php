

<?php

$args = array(
  'post_type' => 'Sektion',
  'posts_per_page' => -1
);

$query = new WP_Query( $args );
?>

<?php
if( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();

      $ombild = get_field('bakgrundsbild_om');
      $resized = $ombild['sizes'][ 'max_screenwidth' ];

      if (get_the_title() == 'Om' OR get_the_title() == 'About') {
        ?>
        <div class="om_image" style='background-image:url(<?php echo $resized ?>)'><section id='om'>

          <div class='margins'>

          <h2><?php the_field('rubrik_om') ?></h2>
          <p><?php the_field('text_om') ?></p>


          <?php
          if (get_locale() == 'sv_SE') {
            ?>
              <div class='btn_container'>
                <a href='/kontakt'>
                  <button class='btn_1'>Be om en offert</button>
                </a>
              </div>

            <?php
          } else {
            ?>
              <div class='btn_container'>
                <a href='/contact'>
                  <button class='btn_1'>Ask for a price suggestion</button>
                </a>
              </div>

            <?php
          }
          ?>

          <div class="om-ikoner">

              <?php
              $ikon1 = get_field('om_ikon_1');
              $ikon2 = get_field('om_ikon_2');
              $ikon3 = get_field('om_ikon_3');
              ?>

              <p>
                <img src='<?php echo $ikon1 ?>'>
                <?php the_field('ikon-text_1') ?>
              </p>

              <p>
                <img src='<?php echo $ikon2 ?>'>
                <?php the_field('ikon-text_2') ?>
              </p>

              <p>
                <img src='<?php echo $ikon3 ?>'>
                <?php the_field('ikon-text_3') ?>
              </p>

          </div>

          </div>
        </section></div><!--finishing the starting tags-->
          <?php
      }
?>

<?php
    }
  } ?>
