<?php

add_action('rest_api_init', function () {
  register_rest_route(
    "batvsdolphin/v1",
    'phase/6',
    array(
      'methods' => 'GET',
      'callback' => 'phase_6'
    )
  );
});

function phase_6()
{
  $query = new WP_Query(
    array(
      'category_name' => 'phase-vi-vegetable-revue',
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
    $returnArray[] = package_phase6_post($post);
  endforeach;

  return $returnArray;
}

function package_phase6_post($post)
{

  $packaged = array();
  $packaged["emoji"] = get_field('emoji', $post->ID);
  $packaged["nate"] = package_phase6_contribution('nate', $post->ID);
  $packaged["sanju"] = package_phase6_contribution('sanju', $post->ID);
  return $packaged;

}

function package_phase6_contribution($name, $id)
{
  $contribution_attributes = ['_title', '_audio_file', '_description'];
  $contribution = [];

  foreach ($contribution_attributes as $attribute) {
    if ($attribute == "_audio_file") {
      $audioObj = get_field($name . $attribute, $id);
      $contribution[$name . $attribute] = $audioObj["url"];
    } else {
      $contribution[$name . $attribute] = get_field($name . $attribute, $id);
    }
  }

  return $contribution;
}