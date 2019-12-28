<header>
    <nav id='main-nav'>
        <div id='menu-top'>
            <div id='logocontainer'>
              <a href="<?php echo home_url();?>"><div id='logo'></div></a>
            </div>

            <div id='menu-symb' title="Menu">
                <span class='bar'>
                    <span class='segment1'></span>
                    <span class='segment2'></span>
                    <span class='segment1'></span>
                </span>
                <span class='bar'>
                    <span class='segment3'></span>
                    <span class='segment3'></span>
                </span>
                <span class='bar'>
                    <span class='segment1'></span>
                    <span class='segment2'></span>
                    <span class='segment1'></span>
                </span>
                <span class='bar'></span>
            </div>
        </div>

        <div id='menu-items'>
            <div class='lang-items'>
              <?php $languages = pll_the_languages(array('raw'=>1));
                foreach($languages as $lang) {
                  ?>
                  <?php

                  if ($lang[slug] == 'en') {
                    $setlang = 'en_GB';
                  } elseif ($lang[slug] == 'sv') {
                    $setlang = 'sv_SE';
                  }

                   ?>

                      <a class='<?php
                      if (get_locale() == $setlang) {
                        echo 'active';
                      } ?>'
                      href='<?php echo $lang[url]; ?>' id='<?php echo $lang[slug]; ?>'>
                        <button class='lang-item <?php echo $lang[slug]; ?> '>

                        </button>
                      </a>

                  <?php
                }
                ?>
            </div>

            <?php
            $args =
                array(
                    'link_before' => '', 'after' => '', 'items_wrap' => '<li>%1$s</li>'
                );

            if (get_locale() == 'sv_SE') {
              $menuitems = wp_get_nav_menu_items('Huvudmeny');
              $omlabel = 'Om';
            } elseif(get_locale() == 'en_GB') {
              $menuitems = wp_get_nav_menu_items('Main menu');
              $omlabel = 'About';
            }


            ?>
            <ul id='main-ul'>
              <li class='menu-item'>
                <?php
                if ((is_page('Hem')) || (is_page('Home'))) { ?>
                  <span id='a-om'><?php echo $omlabel ?></span>
                  <?php
                } else { ?>
                  <a href='<?php echo home_url() . '#om'; ?>'>
                    <?php echo $omlabel ?>
                  </a>
                <?php
                }
                ?>

              </li>
            <?php
              foreach($menuitems as $item) {


                ?>
                <li class='menu-item'>
                  <a
                  <?php
                  if (is_page($item->title)) {
                    echo "class='active'";
                  }
                   ?>
                  href='<?php echo $item->url; ?>'>
                  <?php
                  echo $item->title;
                  ?>
                  </a>
                </li>

                <?php
              }
              ?>
            </ul>


        </div>


    </nav>

</header>

<main>
