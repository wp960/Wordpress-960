<?php
/**
 * Template for the contents of a page.
 *
 * @package WordPress-960
 */
?>

<!-- Page -->
<article class="post">

	<h2 class="title">
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo _e( 'Permanent Link to ', 'wp960' ); the_title_attribute(); ?>"><?php the_title(); ?></a>
	</h2>

	<div class="entry">
		<?php the_content(); ?>
	</div>

</article>
