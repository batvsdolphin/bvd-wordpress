<?php header('Access-Control-Allow-Origin: *');

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

$data = array();

query_posts( array(
  'category_name'  => 'phase-iii-rorschach',
  'posts_per_page' => 100,
  'order'	=> ASC
  ) );

 while (have_posts()) : the_post();

 $data[] = array(
   'id'	=>	get_the_ID(),
   'img'	=>	get_field('image')[sizes][large],
   'thumb'	=>	get_field('image')[sizes][medium],
   'sanju_title'	=>	get_field('sanju_title'),
   'nate_title'	=>	get_field('nate_title'),
   'nate_title'	=>	get_field('nate_title'),
   'sanju_response'	=>	get_field('sanju_response'),
   'nate_response'	=>	get_field('nate_response'),
   'credit'	=>	get_field('image_credit')['user_firstname']
 );

 endwhile;

 wp_reset_postdata();

 echo json_encode( $data );

?>
