<?php get_header(); ?>

<div id="blog-content" class="container_24">
	<div id="wp960-blog-content" class="grid_16">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post">
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="post-info"><span title="<?php the_time('F j, Y'); ?>" class="date time published"><?php the_time('F j, Y'); ?></span>&nbsp;By&nbsp;<span class="author"><?php the_author_posts_link(); ?></span><span class="post-comments"><a rel="nofollow" href="<?php the_permalink(); ?>#respond"><?php comments_number('Leave a Comment', '1 Comment', '% Comments'); ?></a></span><?php edit_post_link('Edit this post', ' - ', ''); ?></div>
				<?php the_content(__('Read more'));?><div class="clear"></div>
				<!--
				<?php trackback_rdf(); ?>
				-->
				<div class="post-meta"><span class="categories">Filed&nbsp;Under:&nbsp;<?php the_category(', ') ?></span>&nbsp;&nbsp;<span class="tags">Tagged&nbsp;With:&nbsp;<?php the_tags('') ?></span> </div>
				<div class="postcomments">
				<?php comments_template(); ?>
				</div>
			</div>
		<?php endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
		<?php endif; ?>		
		<div style="text-align:center;">
			<?php posts_nav_link(' &#183; ', '&laquo; previous page', 'next page &raquo;'); ?>
		</div>
	</div>

	<div id="sidebar-blog" class="grid_8">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar-blog") ) : ?><?php endif; ?>
	</div>
	<div class="clear"></div>
</div>

<?php get_footer(); ?>
