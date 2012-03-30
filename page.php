<?php get_header(); ?>

<div id="wp960-blog-content" class="grid_8">
	<?php get_template_part( 'loop', 'page' ); ?>	
</div>

<div id="sidebar-blog" class="grid_4">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar-blog") ) : ?><?php endif; ?>
</div>

<div class="clear"></div>

<?php get_footer(); ?>
