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

            <div class='kontakt-ikoner'>
              <?php
              if (get_field('telefonnummer')) {
                ?>
                <p id='tel'>
                  <img src='<?php the_field('ikon_telefon') ?>' />
                  <?php the_field('telefonnummer') ?>
                </p>
              <?php
              }
              ?>

              <?php
              if (get_field('emailadress')) {
                ?>
                <a href='mailto:<?php the_field('emailadress') ?>'>
                  <p id='email'>
                    <img src='<?php the_field('ikon_email') ?>' />
                    <?php the_field('emailadress') ?>
                  </p>
                </a>
              <?php
              }
              ?>

              <?php
              if (get_field('adress')) {
                ?>
                <p id='adress'>
                  <img src='<?php the_field('ikon_adress') ?>' />
                  <?php the_field('adress') ?>
                </p>
                <?php
                }
                ?>

              <?php
              if (get_field('lank_sociala_media_1')) {
              ?>
              <a href='<?php the_field('lank_sociala_media_1') ?>'>
                <p id='facebook'>
                    <img src='<?php the_field('ikon_sociala_media_1') ?>' />
                </p>
              </a>
              <?php
              }
              ?>
            </div>


          </div>
          <div id="footer-2">

            <h2>Länkar</h2>

            <?php $linkikon = get_template_directory_uri() . "/img/link.png";

            $links = array(1, 2, 3, 4, 5);

            foreach($links as $link) {
              $lank = 'lank' . $link;
              $rubrik = 'rubrik_lank' . $link;

              if (get_field($lank)) {?>

              <div class="link-desc">
                <img src="<?php echo $linkikon ?>" width="18" height="24" />
                <a href="<?php the_field($lank); ?>" target="_blank" rel="noopener"><?php the_field($rubrik); ?></a>
              </div>
              <br  />


            <?php } ?>
          <?php }?>
          </div>
          <?php
            }
          }
        } ?>


            </div>
          </footer>
          <div id='foot'>
            <!-- <div id='foot_logo'></div> -->
            © Rådig Murspis <?php echo date('Y') ?>. Hemsida av <a target="_blank" href='http://ellenbrage.com'>Ellen Brage</a>
          </div>

          <?php
          $scripts = get_template_directory_uri() . "/js/scripts.js";
          ?>

          <script type="text/javascript" src="<?php echo $scripts;?>"></script>

          <?php wp_footer() ?>
      </body>

</html>
