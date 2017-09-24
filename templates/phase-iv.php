<?php
/*
Template Name: Phase IV
*/
?>

<?php get_header(); ?>


<main class="Phase-IV u-innerWidth">

  <h1>Object Stories</h1>
  <div class="IV-Content"></div>

</main>

<!-- ::::::::::::::: GRID ::::::::::::::: -->

<script type="text/template" id="template-post">

	<div class="IV-Grid js-grid">
		<ul>
	    <% _.each( posts, function( post ){ %>
				<li data-id="<%= post.id %>">
          <div class="circle-decoration"></div>

          <h2 style="color:<%= post.hightlightColor %>"><%= post.title %></h2>

          <div class="image">
            <img src="<%= post.img %>" alt="">
          </div>

          <div class="Post-Content">
            <%= post.story %>
            <h3>- <%= post.author %></h3>
          </div>

				</li>
	    <% }); %>
		</ul>

	</div>

</script>



<?php get_footer(); ?>
