

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

          <h2><?php the_field('rubrik_om'); ?></h2>
          <?php the_field('text_om'); ?>
          <h3><?php the_field('karnvarde_rubrik'); ?></h3>
          <?php
          foreach(range(1,3) as $i) {

            if(get_field('karnvarde_' . $i)) {
              ?>
              <div class='karnvarde'>
                <img src='<?php the_field('varde_ikon_' . $i); ?>'>
                <?php
                the_field('karnvarde_' . $i);
                ?>
              </div>
              <?php
            }
          }
          ?>
          <div class='cta'>
            <?php the_field('cta-text'); ?>
            <?php
            if (get_locale() == 'sv_SE') {
              ?>

                  <a href='<?php home_url()?>/kontakt'>
                    <button class='btn_1'>Ta kontakt</button>
                  </a>

              <?php
            } else {
              ?>
                  <a href='<?php home_url()?>/contact'>
                    <button class='btn_1'>Contact</button>
                  </a>

              <?php
            }
            ?>
          </div>


          <div class="om-ikoner">



          </div>

          </div>
        </section></div><!--finishing the starting tags-->
          <?php
      }
?>

<?php
    }
  } ?>
