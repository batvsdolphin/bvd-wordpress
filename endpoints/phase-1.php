<?php

add_action('rest_api_init', function () {
  register_rest_route("batvsdolphin/v1", 'phase/1', array(
    'methods'  => 'GET',
    'callback' => 'phase_1'
  ));
});

function phase_1()
{
  $query = new WP_Query(
    array(
      'category_name' => 'phase-i-10-seconds',
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
    $returnArray[] = package_phase1_post($post);
  endforeach;


  return $returnArray;
}

function package_phase1_post($post)
{

  $packaged = array();
  $packaged["nate"] = package_phase1_contribution('nate', $post->ID);
  $packaged["sanju"] = package_phase1_contribution('sanju', $post->ID);
  return $packaged;

}

function package_phase1_contribution($name, $id)
{
  $contribution_attributes = ['_sound_title', '_audio', '_color', '_description'];
  $contribution = [];

  foreach ($contribution_attributes as $attribute) {

    if ($attribute == "_audio") {
      $audioObj = get_field($name . $attribute, $id);
      $contribution[$name . $attribute] = $audioObj["url"];
    } else {
      $contribution[$name . $attribute] = get_field($name . $attribute, $id);
    }
  }

  return $contribution;
}