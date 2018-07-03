<?php

function custom_navigation_menus() {

	$locations = array(
		'header_nav' => __( 'Main menu', 'ellenbrage' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'custom_navigation_menus' );

 ?>
