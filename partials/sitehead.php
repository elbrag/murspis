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

            <?php wp_nav_menu( array('menu' => 'Menu', 'container' => '', 'items_wrap' => '<ul id="main-ul">%3$s</ul>' )); ?>

        </div>


    </nav>

</header>

<main>
