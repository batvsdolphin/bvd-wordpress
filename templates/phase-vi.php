<?php
/*
Template Name: Phase VI
*/

function play_button($color)
{
?>

  <svg width="44px" height="44px" viewBox="0 0 44 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <path d="M22,0.5 C33.8741221,0.5 43.5,10.1258779 43.5,22 C43.5,33.8741221 33.8741221,43.5 22,43.5 C10.1258779,43.5 0.5,33.8741221 0.5,22 C0.5,10.1258779 10.1258779,0.5 22,0.5 Z M22,3.5 C11.7827321,3.5 3.5,11.7827321 3.5,22 C3.5,32.2172679 11.7827321,40.5 22,40.5 C32.2172679,40.5 40.5,32.2172679 40.5,22 C40.5,11.7827321 32.2172679,3.5 22,3.5 Z M16.5,35 L16.5,10 L32.1421356,22.5 L16.5,35 Z M19.5,16 L19.5,29 L27.5,22.5003869 L19.5,16 Z" id="Oval-2" fill="<?= $color; ?>" fill-rule="nonzero"></path>
    </g>
  </svg>

<?php
}

function get_response($name, $color, $slug)
{
  // Create ID
  global $post;
  $slug = $post->post_name;
?>
  <div class="Response__Header">
    <h3 class="Response__Title"><?php the_field($name . "_title"); ?></h3>
    <h3 class="Response__Author"><?= $name ?></h3>
  </div>

  <div class="Player" data-src="<?php echo get_field($name . '_audio_file')['url']; ?>">
    <div class="Waveform" id="<?= "$name-$slug-waveform" ?>"></div>
    <div class="Button" style="color:<?= $color; ?>"> PLAY </div>
  </div>

  <div class="Entry__Description">
    <?php the_field($name . '_description'); ?>
  </div>

<?php
}
?>

<?php get_header(); ?>

<main class="center Phase-VI">

  <div class="Title">
    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/phase-vi/phase-header.png" />
  </div>

  <?php query_posts(array(
    'category_name'  => 'phase-vi-the-anthemic-pandemic',
    'posts_per_page' => -1
  ));
  ?>
  <?php while (have_posts()) : the_post(); ?>

    <?php
    // Create ID
    global $post;
    $slug = $post->post_name;
    ?>

    <div class="Entry">

      <div class="Entry__Header">
        <span style="color:<?php the_field('adjective_color'); ?>"><?php the_field('adjective'); ?></span>
        <span style="color:<?php the_field('noun_color'); ?>"><?php the_field('noun'); ?></span>
      </div>

      <div class="Entry__Responses">
        <div class="Entry__Response">
          <?php get_response('sanju', get_field('noun_color'), $slug) ?>
        </div>
        <div class="Entry__Response">
          <?php get_response('nate', get_field('adjective_color'), $slug) ?>
        </div>
      </div>
    <?php endwhile; ?>

</main>

<?php get_footer(); ?>