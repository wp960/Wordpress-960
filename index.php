<?php
  # I can haz post?
  if ( have_posts() ) :
    while ( have_posts() ) :
      the_post();
      the_content();
    endwhile;
  else:
    # No posts.
  endif;
?>
