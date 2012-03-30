<!-- The loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- Blog post -->
	<article class="post">

		<h2 class="title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo _e('Permanent Link to '); the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>

		<div class="entry">
			<?php the_content(); ?>
		</div>

	</article>

<?php endwhile; else: ?>
	<p>Sorry, no posts match your criteria.</p>
<?php endif; ?>
