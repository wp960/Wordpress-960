<!-- Custom Title -->
<?php if ( is_category() ) : ?>
	<h2><?php _e('Category: '); single_cat_title(); ?></h2>
<?php elseif ( is_tag() ) : ?>
	<h2><?php _e('Tag: '); single_tag_title(); ?></h2>
<?php elseif ( is_author() ) : ?>
	<h2><?php 
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	_e('Author: '); echo $curauth->nickname; ?></h2>
<?php endif; ?>

<!-- The loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<!-- Blog post -->
	<article class="post">
	
		<h2 class="title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo __('Permanent Link to') . ' '; the_title_attribute(); ?>"><?php the_title(); ?></a>
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
			<span class="category"><?php __('Filed under'); ?> <?php the_category(', '); ?></span>
			<span class="tags"><?php __('Tagged with'); ?> <?php the_tags(', '); ?></span>
		</p>
		
	</article>
	
<?php endwhile; else: ?>
	<p>Sorry, no posts match your criteria.</p>
<?php endif; ?>
