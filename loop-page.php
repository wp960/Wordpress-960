<!-- The loop -->
<?php if ( have_posts() ) :
while ( have_posts() ) {
	the_post();
	wp960_get_content( 'page' );
}
else: ?>
	<p>Sorry, no posts match your criteria.</p>
<?php endif; ?>
