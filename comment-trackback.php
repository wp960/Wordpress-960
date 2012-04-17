<?php
/**
 * Template for displaying a trackback comment.
 *
 * @package WordPress-960
 */
?>

<li class="post pingback">
	<p><?php _e( 'Pingback:', 'wp960' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'wp960' ), '<span class="edit-link">', '</span>' ); ?></p>
