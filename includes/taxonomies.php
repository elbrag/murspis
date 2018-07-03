<?php

//TAXONOMY: Typ (för galleripost)////////////////////////////

function create_gallerypost_type() {
  $labels = array(
    'name'                       => _x( 'Typer', 'Taxonomy General Name', 'murspis' ),
    'singular_name'              => _x( 'Typ', 'Taxonomy Singular Name', 'murspis' ),
    'menu_name'                  => __( 'Typer', 'murspis' ),
    'all_items'                  => __( 'Alla typer', 'murspis' ),
    'new_item_name'              => __( 'Ny typ', 'murspis' ),
    'add_new_item'               => __( 'Lägg till ny typ', 'murspis' ),
    'edit_item'                  => __( 'Redigera typ', 'murspis' ),
    'update_item'                => __( 'Uppdatera typ', 'murspis' ),
    'add_or_remove_items'        => __( 'Lägg till eller radera Typer', 'murspis' ),
    'popular_items'              => __( 'Populära typer', 'murspis' ),
	);
	$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'query_var'                  => 'typ',
  );

  #the thing that adds it to Wordpress
  register_taxonomy( 'typ', array('galleripost'), $args );
}


add_action( 'init', 'create_gallerypost_type' );


//TAXONOMY: Modell (för galleripost)////////////////////////////

function create_gallerypost_model() {
  $labels = array(
    'name'                       => _x( 'Modeller', 'Taxonomy General Name', 'murspis' ),
    'singular_name'              => _x( 'Modell', 'Taxonomy Singular Name', 'murspis' ),
    'menu_name'                  => __( 'Modeller', 'murspis' ),
    'all_items'                  => __( 'Alla modeller', 'murspis' ),
    'new_item_name'              => __( 'Ny modell', 'murspis' ),
    'add_new_item'               => __( 'Lägg till ny modell', 'murspis' ),
    'edit_item'                  => __( 'Redigera modell', 'murspis' ),
    'update_item'                => __( 'Uppdatera modell', 'murspis' ),
    'add_or_remove_items'        => __( 'Lägg till eller radera modeller', 'murspis' ),
    'popular_items'              => __( 'Populära modeller', 'murspis' ),
	);
	$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'query_var'                  => 'modell',
  );

  #the thing that adds it to Wordpress
  register_taxonomy( 'modell', array('galleripost'), $args );
}


add_action( 'init', 'create_gallerypost_model' );


  ?>
