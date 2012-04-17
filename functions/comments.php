<?php
/**
 * Gets a specific comment template.
 *
 * @package WordPress-960
 * @author Michael Enger <mike@thelonelycoder.com>
 *
 * @param object $comment The comment object
 * @param array  $args    Arguments
 * @param int    $depth   Depth of the comment
 */

if ( !function_exists( 'wp960_comment' ) ) {
	function wp960_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		$GLOBALS['args'] = $args;
		$GLOBALS['depth'] = $depth;
		get_template_part( 'comment', $comment->comment_type );
	}
}
