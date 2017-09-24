<?php
/*
Template Name: Phase I
*/
?>

<?php get_header(); ?>

	<main class="center AudioSwap Phase-I">

		<ul class="Entries">

	<?php query_posts( array(
    'category_name'  => 'phase-i-10-seconds',
    'posts_per_page' => -1
    ) );
 ?>
	<?php while (have_posts()) : the_post(); ?>

			<?php
        //
				// $thisMonth = get_the_date('F');
        //
				// if ( $thisMonth != $lastMonth ) {
				// 	echo "<h3 class='archive-month'>$thisMonth</h3>";
				// } else { }
        //
				// $lastMonth = $thisMonth;

			?>


			<li class="Entry">
        <div class="EntryContent">

          <div class="Hidden">
            <div class="EntryTitle"><?php the_title(); ?></div>
          </div>

          <div class="EntryLeft">
            <?php get_audio_entry('sanju'); ?>
          </div> <!-- EntryLeft -->

          <div class="EntryRight">
            <?php get_audio_entry('nate'); ?>
          </div> <!-- EntryLeft -->

        </div> <!-- EntryContent -->

        <div class="EntryShim"></div>

			</li>

	<?php endwhile; ?>

		</ul>
	</main>

<?php get_footer(); ?>
