<?php
/*
Template Name: Phase IV
*/
?>

<?php get_header(); ?>


<main class="IV-Content u-innerWidth">


</main>


<!-- ::::::::::::::: GRID ::::::::::::::: -->

<script type="text/template" id="template-post">

	<div class="IV-Grid js-grid">
		<ul>
	    <% _.each( posts, function( post ){ %>
				<li data-id="<%= post.id %>">
					<div class="image" style="background:url(<%= post.img %>) center center no-repeat;"></div>

            <h2><%= post.title %></h2>
            <h3><%= post.author %></h3>
            <div class="content"><%= post.story %></div>
				</li>
	    <% }); %>
		</ul>

	</div>

</script>



<?php get_footer(); ?>
