<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */


function text_widget() {

	register_sidebar( array(
		'name'          => 'Footer 1: Kontakt',
		'id'            => 'footer-1',
		'before_widget' => '<section id="footer-1">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'Footer 2: Sociala media',
		'id'            => 'footer-2',
		'before_widget' => '<section id="footer-2">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'Footer 3: Länkar SVE',
		'id'            => 'footer-3-sve',
		'before_widget' => '<section id="footer-3">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'Footer 3: Links ENG',
		'id'            => 'footer-3-eng',
		'before_widget' => '<section id="footer-3">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'text_widget' );
?>
