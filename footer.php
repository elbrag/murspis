          </main>
          <footer>
            <div class='margins'>

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


    if (get_the_title() == 'Footer sve' OR get_the_title() == 'Footer eng') {
      ?>

          <div id="footer-1">
            <h2>Kontakt</h2>

            <p>
              <img class="kontakt-ikon" src="<?php the_field('ikon_telefon') ?>" alt="telefonnummer" width="30" height="30" />
              <?php the_field('telefonnummer') ?>
            </p>
            <p>
              <img class="kontakt-ikon" src="<?php the_field('ikon_email') ?>" alt="email" width="30" height="30" />
              <?php the_field('emailadress') ?>
            </p>
            <p>
              <img class="kontakt-ikon" src="<?php the_field('ikon_adress') ?>" alt="adress" width="30" height="30" />
              <?php the_field('adress') ?>
            </p>

          </div>
          <div id="footer-2">

            <h2>Sociala media</h2>
            <a href="<?php the_field('lank_sociala_media_1') ?>" target="_blank" rel="noopener"><img src="<?php the_field('ikon_sociala_media_1') ?>" alt="" width="50" height="50" /></a>

          </div>
          <div id="footer-3">

            <h2>Länkar</h2>

            <?php $linkikon = get_template_directory_uri() . "/img/link.png";

            if (get_field('lank')) {?>

            <div class="link-desc">
              <img src="<?php echo $linkikon ?>" width="18" height="24" />
              <?php the_field('rubrik_lank'); ?>
            </div>
            <a href="<?php the_field('lank'); ?>" target="_blank" rel="noopener"><?php the_field('lank'); ?></a>
            </div>

          <?php } ?>

                <?php
            }
          }
        } ?>


            </div>
          </footer>
          <div id='foot'>
            © Rådig Murspis <?php echo date('Y') ?>. Design av <a target="_blank" href='http://ellenbrage.com'>Ellen Brage</a>
          </div>

          <?php
          $scripts = get_template_directory_uri() . "/js/scripts.js";
          ?>

          <script type="text/javascript" src="<?php echo $scripts;?>"></script>

          <?php wp_footer() ?>
      </body>

</html>
