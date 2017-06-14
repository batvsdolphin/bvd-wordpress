<?php header('Access-Control-Allow-Origin: *');

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );


$data = array();

query_posts( array(
  'category_name'  => 'phase-iv-object-stories',
  'posts_per_page' => 100,
  'order'	=> ASC
  ) );

 while (have_posts()) : the_post();

 $data[] = array(
   'id'	=>	get_the_ID(),
   'title'	=>	get_the_title(),
   'author'	=>	get_the_author_meta('first_name'),
   'img'	=>	get_field('object_photo')[sizes][large],
   'story'	=>	get_field('story'),
 );

 endwhile;

 wp_reset_postdata();

 echo json_encode( $data );

?>
