<?php get_header(); ?>

<?php get_sidebar(); ?>
		
<div class="internal col-2-3" id="search">
	
<?php 
	
	if (have_posts()) : 

	$allsearch = &new WP_Query("s=$s&showposts=-1");
	$key = wp_specialchars($s, 1);
	$count = $allsearch->post_count;
	echo "</h2>$count posts contain $key</h2>";
	wp_reset_query();
	
	query_posts($query_string . '&showposts=99');

?>
	<ul>
	<?php while (have_posts()) : the_post(); ?>
	
		<li>	
			<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">
			
			<h3 class="blog-entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			
			<p><?php the_excerpt(); ?></p> 
		
		</li>
	
	<?php endwhile; ?>
	<?php else : ?>
	
		<li id="search-fail">
			<p>There don't seem to be any posts that match that term. <br />Would you like to try again?</p>
		</li>
	
	<?php endif; ?>
	
	</ul>
	
	<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

</div><!-- internal -->

<?php get_footer(); ?>