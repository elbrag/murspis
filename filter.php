<?php


$args = array(
  'post_type' => 'galleripost',
  'posts_per_page' => -1
);

$query = new WP_Query( $args );
?>

<?php
if( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();


       $typer = get_terms(array('taxonomy' => 'typ', 'hide_empty' => true));
       $modeller = get_terms(array('taxonomy' => 'modell', 'hide_empty' => true));

       foreach ($typer as $typ) {

       }
       foreach ($modeller as $modell) {

       }

      $galleribild = get_field('galleribild');
      $resized = $galleribild['sizes'][ 'grid_thumbnail' ];
      $bildid = $galleribild['id'];

      ?>

      <div class='galleripost <?php echo $modell->name . " " ?><?php echo $typ->name ?>' id='<?php echo $bildid ?>'>
          <div class='galleribild' style='background-image:url(<?php echo $resized ?>)'></div>
      </div>

      <?php
       $typer = get_terms(array('taxonomy' => 'typ', 'hide_empty' => true));
       $modeller = get_terms(array('taxonomy' => 'modell', 'hide_empty' => true));
       ?>


<?php
    }
}

 ?>
