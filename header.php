<!DOCTYPE html>
<html>

  <head>
    <title>Rådig Murspis</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Rådig, Murspis">
    <meta name="description" content="">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif:400|Nunito+Sans:300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    <?php
    $src = get_template_directory_uri() . "/js/masonry.pkgd.min.js";
    ?>

    <script src="<?php echo $src ?>"></script>

    <?php wp_head(); ?>
  </head>

  <body>

    <?php require("partials/sitehead.php"); ?>
