<?php
/**
 * Loop template for a single post.
 *
 * @package WordPress-960
 */
?>

<!-- The loop -->
<?php if ( have_posts() ) :
while ( have_posts() ) {
	the_post();
	wp960_get_content( 'single' );
	comments_template( '', true );
}
else: ?>
	<p>Sorry, no posts match your criteria.</p>
<?php endif; ?>
