<?php
/*
Template Name: Phase VI
*/
?>

<?php get_header(); ?>


	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:300,400" rel="stylesheet">


	<script src="https://d3js.org/d3.v5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

	<main class="Phase-VI u-innerWidth">

		<div class="Title">
	    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/phase-vi/visualized-title.png" />
	  </div>

		<ul class="Entries">

	<?php

		$postCount = 1;

		query_posts( array(
    'category_name'  => 'phase-vi-visualized',
    'posts_per_page' => -1
    ) );
	 ?>

	<?php while (have_posts()) : the_post(); ?>

			<li>
        <div class="EntryContent">
					<div class="EntryTitle">
						<p>Episode <?php echo $postCount; ?>
						<h2><?php the_title() ?></h2>
						<p>Wherein</p>
						<h3><?php the_field('wherein') ?></h3>

					</div>
					<div class="SectionOpener">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/phase-vi/section-opener.png" />
					</div>

					<div class="Sanju Viz">
						<style>
							<?php the_field('sanju_css') ?>
						</style>

						<?php the_field('sanju_html') ?>

						<script>
							var sanjuDataURL = "<?php echo(get_field('sanju_data')['url']); ?>";
							<?php the_field('sanju_js') ?>
						</script>
						<div class="Description">
							<?php the_field("sanju_description")?>
						</div>

					</div> <!-- Sanju-Viz -->

					<div class="Nate Viz">

						<style>
							<?php the_field('nate_css') ?>
						</style>

						<?php the_field('nate_html') ?>

						<script>
							var nateDataURL = "<?php echo(get_field('nate_data')['url']); ?>";
							<?php the_field('nate_js') ?>
						</script>
						<div class="Description">
							<?php the_field("nate_description")?> <span>- nate</span>
						</div>
					</div> <!-- Nate-Viz -->

				</div>

				<div class="SectionCloser">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/phase-vi/section-closer.png" />
				</div>

			</li>

	<?php
		$postCount++;
	 endwhile; ?>

		</ul>
	</main>

<?php get_footer(); ?>
