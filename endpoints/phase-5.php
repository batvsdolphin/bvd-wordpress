<?php

add_action('rest_api_init', function () {
  register_rest_route(
    "batvsdolphin/v1",
    'phase/5',
    array (
      'methods' => 'GET',
      'callback' => 'phase_5'
    )
  );
});

function phase_5()
{
  $query = new WP_Query(
    array(
      'category_name' => 'phase-v-bar-none',
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
    $returnArray[] = package_phase5_post($post);
  endforeach;


  return $returnArray;
}

function package_phase5_post($post)
{

  $packaged = array();
  $packaged["audio_file"] = get_field('audio_file', $post->ID)["url"];
  $packaged["description"] = get_field('description', $post->ID);
  $packaged["title"] = $post->post_title;
  $packaged["author"] = ucfirst(get_the_author_meta('user_nicename', $post->post_author));

  return $packaged;

}