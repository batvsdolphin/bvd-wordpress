<?php
/*
Template Name: Phase V
*/
?>

<?php get_header(); ?>

<main class="center Phase-V">

  <div class="Title">
    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/Phase-V/bar-none-title.png" />
  </div>

  <ul class="Entries">

    <?php query_posts(array(
      'category_name'  => 'phase-v-bar-none',
      'posts_per_page' => -1
    ));
    ?>
    <?php while (have_posts()) : the_post(); ?>


      <div class="Entry">

          <div class="Entry__Title">
            <?php the_title(); ?>
          </div>
          <div class="Entry__Author">
            <?php echo get_the_author_meta( 'first_name' ); ?>
          </div>
          <div class="Entry__Description">
            <?php the_field('description'); ?>
          </div>

          <?php
          // Create ID
          global $post;
          $slug = $post->post_name;
          ?>

          <div class="Player" data-src="<?php echo get_field('audio_file')['url']; ?>">
            <div class="Waveform" id="<?="$slug-waveform"?>"></div>
            <div class="Button"> Play </div>
          </div>

      </div>

    <?php endwhile; ?>

  </ul>
</main>

<?php get_footer(); ?>