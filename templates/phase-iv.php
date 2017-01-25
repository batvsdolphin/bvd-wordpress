<?php
/*
Template Name: Phase III
*/
?>

<?php get_header(); ?>


<main class="IV-Content u-innerWidth">


</main>


<!-- ::::::::::::::: GRID ::::::::::::::: -->

<script type="text/template" id="template-grid">

	<div class="III-Grid js-grid">
		<ul>
	    <% _.each( posts, function( post ){ %>
				<li data-id="<%= post.id %>">
					<div class="image" style="background:url(<%= post.thumb %>) center center no-repeat;"><div>
				</li>
	    <% }); %>
		</ul>

	</div>

</script>

<!-- ::::::::::::::: SINGLE ::::::::::::::: -->

<script type="text/template" id="template-single">


	<div class="III-Single III-Single-Width">

    <div class="III-Entry-Buttons">

      <button class="js-show-response" data-show="show_sanju">
        <small>Sanju</small>
        <h4><%= post.sanju_title %></h4>
      </button>

      <button class="js-show-response" data-show="show_nate">
        <small>Nate</small>
        <h4><%= post.nate_title %></h4>
      </button>

			<div class="u-clearboth"></div>
    </div>

    <div class="III-Response III-Response-Sanju">
			<small>Sanju</small>
			<h2><%= post.sanju_title %></h2>
			<div class="ResponseText js-responseText"><%= post.sanju_response %></div>
		</div>
    <div class="III-Response III-Response-Nate">
			<small>Nate</small>
			<h2><%= post.nate_title %></h2>
			<div class="ResponseText"><%= post.nate_response %></div>
		</div>

    <img class="js-postImage" src="<%= post.img %>" data-id="<%= post.id %>" title="This one's a <%= post.credit %>-Blot" >

    <div class="u-clearboth"></div>

	</div>

	<div class="u-clearboth"></div>

<div class="III-Nav">
	<div class="III-Single-Width">

		<% if ( post.prev_id ) { %>
			<button class="III-Nav-NextPrev III-Nav-Previous js-nav" data-id="<%= post.prev_id %>"></button>
			<% } else { %>
				<div class="III-Nav-NextPrev III-Nav-HoldPrevious"></div>
			<% }  %>

		<% if ( post.next_id ) { %>
			<button class="III-Nav-NextPrev III-Nav-Next js-nav" data-id="<%= post.next_id %>"></button>
		<% } else { %>
			<div class="III-Nav-NextPrev III-Nav-HoldNext"></div>
		<% }  %>

		<button class="III-Nav-Grid js-show-grid"></button>

	</div>

</div>



</script>


<?php get_footer(); ?>
