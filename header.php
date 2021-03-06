<!DOCTYPE html>
<html>

  <head>
    <title>
      <?php
      if ( ! is_page( array( 'Hem', 'Home' ) ) ) {
        the_title();
        echo " | ";
      }
      ?>
      Rådig Murspis | Din trygghet i kylan
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Rådig, Murspis">
    <meta name="description" content="Rådig Murspis tillverkar spisar anpassade efter behov och förutsättningar. Rådig är med dig från idé till första eldningen.">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">
    <link href="https://fonts.googleapis.com/css?family=Trirong:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap|Bree+Serif:400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <?php
    $src = get_template_directory_uri() . "/js/masonry.pkgd.min.js";
    ?>

    <script src="<?php echo $src ?>"></script>

    <?php wp_head(); ?>
  </head>

  <body>

    <?php require("partials/sitehead.php"); ?>
