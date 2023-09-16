<?php

add_action('rest_api_init', function () {
  register_rest_route(
    "batvsdolphin/v1",
    'phase/4',
    array(
      'methods' => 'GET',
      'callback' => 'phase_4'
    )
  );
});

function phase_4()
{
  $query = new WP_Query(
    array(
      'category_name' => 'phase-iv-object-stories',
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
    $returnArray[] = package_phase4_post($post);
  endforeach;


  return $returnArray;
}

function package_phase4_post($post)
{

  $packaged = array();
  $packaged["title"] = $post->post_title;
  $packaged["author"] = ucfirst(get_the_author_meta( 'user_nicename', $post->post_author ));
  $packaged["object_photo"] = get_field('object_photo', $post->ID)["sizes"];
  $packaged["highlight_color"] = get_field('highlightColor', $post->ID);
  $packaged["story"] = get_field('story', $post->ID);

  return $packaged;

}