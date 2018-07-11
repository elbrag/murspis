          </main>
          <footer>

            <h2>Kontakt</h2>
                <?php dynamic_sidebar('footer-1'); ?>

            <h2>Sociala media</h2>
                <?php dynamic_sidebar('footer-2'); ?>

            <h2>Länkar</h2>
                <?php
                    if (get_locale() == 'sv_SE') {
                      dynamic_sidebar('footer-3-sve');
                    } else {
                      dynamic_sidebar('footer-3-eng');
                    }

                ?>



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
