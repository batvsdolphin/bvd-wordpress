<?php

add_action('rest_api_init', function () {
  register_rest_route("batvsdolphin/v1", 'phase/3', array(
    'methods' => 'GET',
    'callback' => 'phase_3'
  )
  );
});

function phase_3()
{
  $query = new WP_Query(
    array(
      'category_name' => 'phase-iii-rorschach',
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
    $returnArray[] = package_phase3_post($post);
  endforeach;

  return $returnArray;
}

function package_phase3_post($post)
{

  $packaged = array();
  // $packaged["post"] = $post;
  $packaged["image"] = get_field('image', $post->ID)["sizes"];
  $packaged["image_credit"] = get_field('image_credit', $post->ID)["user_firstname"];
  $packaged["nate"] = package_phase3_contribution('nate', $post->ID);
  $packaged["sanju"] = package_phase3_contribution('sanju', $post->ID);
  return $packaged;

}

function package_phase3_contribution($name, $id)
{
  $contribution_attributes = ['_title', '_response'];
  $contribution = [];

  foreach ($contribution_attributes as $attribute) {
    $contribution[$name . $attribute] = get_field($name . $attribute, $id);
  }

  return $contribution;
}