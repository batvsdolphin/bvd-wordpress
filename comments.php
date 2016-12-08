<div id="comment-section">

<?php // Do not delete these lines

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->


<?php if ($comments) : ?>

	<ol id="comment-list">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">

			
			<div class="comment-meta"><?php comment_date('F jS, Y') ?> at <?php comment_time() ?> </div>
			<h4><?php comment_author_link() ?> said</h4>
		
			<?php if ($comment->comment_approved == '0') : ?>
				<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
					
			<?php comment_text() ?>

			<div class="clearboth"></div>

		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>

		<p class="no-comments">No comments yet.</p>
	
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>

<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

	<div id="response-form">
	
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

			<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

		<?php else : ?>
		
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			
			<ul>
		
		<?php if ( $user_ID ) : ?>
	
			<li>	
	
				<p class="loggedin-in-as">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
			</li>
	
		<?php else : ?>
		
				<li>
					<label>Name</label>
					<input type="text" name="author" value="<?php echo $comment_author; ?>" />
				</li>
				
				<li>
					<label>Email</label>
					<input type="text" name="email" value="<?php echo $comment_author_email; ?>" />
				</li>
	
	<?php endif; ?>
	
				<li>
					<label>Comment</label>
					<textarea name="comment"></textarea>
				</li>
				
				<li>
					<input name="submit" type="submit" value="submit" />
					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				</li>
	
			</ul>
	
	<?php do_action('comment_form', $post->ID); ?>
	
		</form>

	
	<?php endif; // If registration required and not logged in ?>

	</div><!-- #response-form -->
	
<?php endif; // if you delete this the sky will fall on your head ?>

</div><!-- #comment-section -->