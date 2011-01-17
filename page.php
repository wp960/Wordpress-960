<?php get_header(); ?>
        <div id="wp960-content" class="grid_24">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
              <?php the_content(''); ?>
            </div><!-- #post-<?php the_ID(); ?> -->
          <?php endwhile; else: ?>
            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>
          <?php endif; ?>
          <div class="clear"></div>
        </div><!-- #wp960-content -->
<?php get_footer(); ?>
