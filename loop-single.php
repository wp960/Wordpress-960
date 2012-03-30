<!-- The loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- Blog post -->
	<article class="post">
	
		<h2 class="title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo _e( 'Permanent Link to', 'wp960' ); the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>
		
		<div class="info">
			<?php $time = get_the_time('U'); ?>
			<time class="time" datetime="<?php echo date('c', $time); ?>"><?php echo date('F jS, Y', $time) ?></time>
			by <span class="author"><?php the_author_posts_link() ?></span>
			- <span class="comments"><?php comments_popup_link( __( 'Leave a comment', 'wp960' ), __( '1 Comment', 'wp960' ), __( '% Comments', 'wp960' ) ); ?></span>
			<span class="edit-link"><?php edit_post_link( __( 'Edit this post', 'wp960' ), ' - ', '' ); ?></span>
		</div>
		
		<div class="entry">
			<?php the_content(); ?>
		</div>
		
		<p class="meta">
			<span class="category"><?php _e( 'Filed under', 'wp960' ); ?> <?php the_category(', '); ?></span>
			<span class="tags"><?php _e( 'Tagged with', 'wp960' ); ?> <?php the_tags(', '); ?></span>
		</p>
		
	</article>
	
	<!-- Comments -->
	<?php comments_template( '', true ); ?>
	
<?php endwhile; else: ?>
	<p>Sorry, no posts match your criteria.</p>
<?php endif; ?>
