
<?php get_sidebar(); ?>

<div class="internal col-2-3">

		<?php if ( have_posts() ) :

// - - - - - - - -  BEGIN POST TYPES

			while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID( ); ?>" <?php post_class( ); ?>>


					<?php
// - - - - - - - - // single post
					if ( is_single( ) ): ?>

					<div class="entry">

						<h2><?php the_title( ); ?></h2>

						<div class="entry-content">

              <?php the_field('sanju_sound_title'); ?>
              ody>

              <div id="init" class="init">
                <div class="loader"></div>
              </div><!-- /init -->

              <svg id="visualization" class="visualization" width="100%" height="100%"></svg>

              <audio id="audioElement" src="<?php echo get_field('sanju_audio')['url']; ?>"></audio>
              <div>
                <button onclick="document.getElementById('audioElement').play()">Play the Audio</button>
                <button onclick="document.getElementById('audioElement').pause()">Pause the Audio</button>
              </div>


							<div class="clearboth"></div>

						</div><!-- .entry-content -->


					</div><!-- entry -->


					<?php
// - - - - - - - - // page
					elseif ( is_page( ) ): ?>

					<div class="entry">

						<h2> <?php the_title( ); ?></h2>


						<div class="entry-content">
							<?php the_content(); ?>
						</div>

					<?php
// - - - - - - - -  regular listing of posts (home)
					else: ?>


					<div class="entry">

						<h2>
							<a href="<?php the_permalink( ); ?>" title="<?php echo esc_attr__( 'Permalink to ' . the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
								<?php the_title( ); ?>
							</a>
						</h2>

						<div class="entry-content">

              <?php the_field('sanju_sound_title'); ?>


              <audio id="audioElement" src="<?php echo get_field('sanju_audio')['url']; ?>"></audio>
              <div>
                <button onclick="document.getElementById('audioElement').play()">Play the Audio</button>
                <button onclick="document.getElementById('audioElement').pause()">Pause the Audio</button>
              </div>


							<p class="meta">Posted on <?php the_time('l, F jS, Y') ?> in</p> <?php the_category(); ?>
							<div class="clearboth"></div>

						</div><!-- .entry-content -->

					</div><!-- .entry -->

					<?php
// - - - - - - - -  END OF TYPES

					 endif; ?>

					</div><!-- post-whatever -->

			<?php endwhile; ?>

		<?php else : ?>

			<div id="post-0" class="post no-results not-found">

					<h1>Nothing found .... want to head back home?</h1>

			</div><!-- .post -->

		<?php endif; ?>

		<?php kriesi_pagination(5); ?>

</div><!-- .internal -->
