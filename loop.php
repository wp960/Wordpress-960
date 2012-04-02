<?php
/**
 * Generic loop template, used when no other loop template is available.
 *
 * @package WordPress-960
 */
?>

<?php if ( is_search() ) : ?>
	<!-- Search form -->
	<h2><?php _e( 'Search' ); ?></h2>
	<?php get_search_form(); ?>
<?php endif; ?>

<!-- The loop -->
<?php if ( have_posts() ) :
while ( have_posts() ) {
	the_post();
	wp960_get_content( 'index' );
}
else : ?>
	<p>Sorry, no posts match your criteria.</p>
<?php endif; ?>

<!-- Pagination -->
<?php if (function_exists("emm_paginate")) emm_paginate(); ?>
