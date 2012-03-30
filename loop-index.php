<!-- The loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<!-- Blog post -->
	<article class="post">
	
		<h2 class="title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo _e('Permanent Link to '); the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>
		
		<div class="info">
			<?php $time = get_the_time('U'); ?>
			<time class="time" datetime="<?php echo date('c', $time); ?>"><?php echo date('F jS, Y', $time) ?></time>
			by <span class="author"><?php the_author_posts_link() ?></span>
			- <span class="comments"><?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?></span>
			<span class="edit-link"><?php edit_post_link('Edit this post', ' - ', ''); ?></span>
		</div>
		
		<div class="entry">
			<?php the_content(__('Read more &raquo;')); ?>
		</div>
		
		<p class="meta">
			<span class="category"><?php _e('Filed under'); ?> <?php the_category(', '); ?></span>
			<span class="tags"><?php _e('Tagged with'); ?> <?php the_tags(', '); ?></span>
		</p>
		
	</article>
	
<?php endwhile; else: ?>
	<p>Sorry, no posts match your criteria.</p>
<?php endif; ?>

<!-- Pagination -->
<?php if (function_exists("emm_paginate")) emm_paginate(); ?>
