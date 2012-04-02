<?php if ( is_search() ) : ?>
	<!-- Search form -->
	<h2><?php _e( 'Search' ); ?></h2>
	<?php get_search_form(); ?>
<?php endif; ?>

<!-- The loop -->
<?php if ( have_posts() ) :
while ( have_posts() ) {
	the_post();
	get_template_part( 'content', 'index' );
}
else : ?>
	<p>Sorry, no posts match your criteria.</p>
<?php endif; ?>

<!-- Pagination -->
<?php if (function_exists("emm_paginate")) emm_paginate(); ?>
