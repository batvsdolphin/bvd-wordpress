<?php
/*
Template Name: Phase II
*/
?>

<?php get_header(); ?>


<main class="Phase-II center Panels">
  <div class="Title">
    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/phase-ii/panels-title.png" />
  </div>


  <div class="Panels-Navigation">
    <ul>
      <?php

      $myposts = get_posts(array(
        'category'  => 7
      ));

      

      foreach ($myposts as $post) :  setup_postdata($post);
        $activeClass = '';
        $currentWeek = '';

        // Get correct page
        if (isset($_GET["week"])) {
          $currentWeek = $_GET["week"];
        }
        // Set correct nav
        if (get_the_ID() == $currentWeek) {
          $activeClass = 'is-activeWeek';
        }
      ?>

        <li class="<?php echo $activeClass; ?>">
          <a href="<?php bloginfo('url') ?>/phase-ii-panels?week=<?php echo get_the_ID(); ?>"><?php the_title(); ?></a>
        </li>

      <?php endforeach;
      wp_reset_postdata(); ?>

    </ul>

    <div class="u-clearboth"></div>

  </div>


  <ul class="Entries">

    <?php
    $args = array(
      'category_name'  => 'phase-ii-panels',
      'posts_per_page'  =>  1,
      'p' => intval($currentWeek)
    );

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
      while ($the_query->have_posts()) {
        $the_query->the_post(); ?>

        <?php the_title() ?>

        <li class="Entry">
          <div class="EntryContent">
            <?php

            if (have_rows('panels')) :
              while (have_rows('panels')) : the_row(); ?>

                <div class="EntryPanel">

                  <img src="<?php echo get_sub_field('image')['url']; ?>" title="Panel by <?php echo get_sub_field('credit')['user_firstname'] ?>">

                </div>

            <?php endwhile;
            endif; // while 
            ?>
          <?php } // while 
          ?>
        <?php } // if 
        ?>

          </div> <!-- EntryContent -->
        </li>
  </ul>
</main>

<?php get_footer(); ?>