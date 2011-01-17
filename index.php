<?php get_header(); ?>

<div class="container_12">
  <?php
    # I can haz post?
    if ( have_posts() ) :
      while ( have_posts() ) :
        the_post();
        echo '<div class="grid_12">';
        the_content();
        echo '</div>';
      endwhile;
    else:
      # No posts.
    endif;
  ?>
</div>

<?php get_footer(); ?>
