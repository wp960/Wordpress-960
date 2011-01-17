<?php
/**
* @package WordPress
* @subpackage wp960
* Template Name: Side Bar [Right]
*/
get_header(); ?>
        <div id="wp960-content" class="grid_16">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
              <div class="entry">
                <?php the_content(''); ?>
              </div><!-- .entry -->
            </div><!-- #post-<?php the_ID(); ?> -->
          <?php endwhile; else: ?>
            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>
            <?php get_search_form(); ?>
          <?php endif; ?>
        </div><!-- #wp960-content -->
        <div id="wp960-sidebar" class="grid_8">
            <div>
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("page-sidebar") ) : ?><?php endif; ?>
            </div>
        </div><!-- #wp960-sidebar -->
        <div class="clear"></div>
<?php get_footer(); ?>
