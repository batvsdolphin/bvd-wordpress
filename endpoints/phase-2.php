<?php

add_action('rest_api_init', function () {
  register_rest_route(
    "batvsdolphin/v1",
    'phase/2',
    array(
      'methods' => 'GET',
      'callback' => 'phase_2'
    )
  );
});

function phase_2()
{
  $query = new WP_Query(
    array(
      'category_name' => 'phase-ii-panels',
      'posts_per_page' => -1
    )
  );

  if (!$query->have_posts()) {
    return new WP_REST_Response('No posts found', 404);
  }

  $posts = $query->get_posts();
  $response = new WP_REST_Response($posts);
  $response->set_status(200);

  $returnArray = [];


  foreach ($posts as $post):
    $returnArray[] = package_phase2_post($post);
  endforeach;


  return $returnArray;
}

function package_phase2_post($post)
{

  $packaged = array();

  if (have_rows('panels', $post->ID)) {

    while (have_rows('panels', $post->ID)) {
    $row = array();
      the_row();
      $row['img'] = get_sub_field('image')['sizes'];
      $row['credit'] = get_sub_field('credit')['user_firstname'];
    $packaged[] = $row;
    }
  }

  return $packaged;

}
