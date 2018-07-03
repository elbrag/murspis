<?php
function create_project_category() {
  $labels = array(
    'name'                       => _x( 'Project categories', 'Taxonomy General Name', 'ellenbrage' ),
    'singular_name'              => _x( 'Project category', 'Taxonomy Singular Name', 'ellenbrage' ),
    'menu_name'                  => __( 'Project categories', 'ellenbrage' ),
    'all_items'                  => __( 'All categories', 'ellenbrage' ),
    'new_item_name'              => __( 'New Category Name', 'ellenbrage' ),
    'add_new_item'               => __( 'Add New Project Category', 'ellenbrage' ),
    'edit_item'                  => __( 'Edit Project Category', 'ellenbrage' ),
    'update_item'                => __( 'Update Project Category', 'ellenbrage' ),
    'add_or_remove_items'        => __( 'Add or remove Project Categories', 'ellenbrage' ),
    'popular_items'              => __( 'Popular Categories', 'ellenbrage' ),
	);
	$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'query_var'                  => 'project-category',
  );

  #the thing that adds it to Wordpress
  register_taxonomy( 'project-category', array('project'), $args );
}


add_action( 'init', 'create_project_category' );


  ?>
