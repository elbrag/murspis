<?php

$handle = "murspis";
$src = get_template_directory_uri() . "/css/main.css";
$deps = null;
$ver = null;
$media = "all";
wp_register_style( $handle, $src, $deps, $ver, $media );

require('includes/post_types.php');
require('includes/taxonomies.php');
require('includes/add_widgets.php');
require('includes/add_menu.php');


function addthemesupport(){
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'link' ) );
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails' );
    require('includes/media_size.php');
}


add_action( 'after_setup_theme', 'addthemesupport' );

function mytheme_enqueue_style() {
    wp_enqueue_style( 'murspis', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_style' );


//to make menu items change when active

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

add_filter('show_admin_bar', '__return_false');

?>
