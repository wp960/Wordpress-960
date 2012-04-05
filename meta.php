<?php
/**
 * Generic meta template.
 *
 * @package WordPress-960
 */
?>

<ul class="post-meta">
	<!-- Tags -->
	<li class="tags"><?php _e( 'Tagged with', 'wp960' ); ?> <?php the_tags(', '); ?></li>
	<!-- Categories -->
	<li class="category"><?php _e( 'Filed under', 'wp960' ); ?> <?php the_category(', '); ?></li>
	<!-- Date/Time -->
	<?php $time = get_the_time('U'); ?>
	<li class="time">Posted on <time datetime="<?php echo date('c', $time); ?>"><?php echo date('F jS, Y', $time) ?></time></li>
	<!-- Author -->
	<li class="author">Written by <?php the_author_posts_link() ?></li>
	<!-- Comments -->
	<li class="comments"><?php comments_popup_link( __( 'Leave a comment', 'wp960' ), __( '1 Comment', 'wp960' ), __( '% Comments', 'wp960' ) ); ?></li>
</ul>
