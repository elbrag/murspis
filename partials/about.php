
<?php
    if (get_locale() == 'sv_SE') {
      dynamic_sidebar('om');
      ?>
        <div class='btn_container'>
          <a href='/kontakt'>
            <button class='btn_1'>Be om en offert</button>
          </a>
        </div>
      
      <?php
    } else {
      dynamic_sidebar('about');
      ?>
        <div class='btn_container'>
          <a href='/contact'>
            <button class='btn_1'>Ask for a price suggestion</button>
          </a>
        </div>

      <?php
    }
?>

</section></div><!--finishing the starting tags (see add_widgets file)-->
