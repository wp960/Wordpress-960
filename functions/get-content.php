<?php 

/**
 * Gets the appropriate template based on the post format.
 * Note: Needs to be called after the_post()
 *
 * @param string $default (optional) The default template name to get
 * @package WordPress-960
 * @author Michael Enger <mike@thelonelycoder.com>
 */

if ( !function_exists( 'wp960_get_content' ) ) {
	function wp960_get_content( $default = 'single' ) {
		if ( get_post_format() ) {
			get_template_part( 'content', get_post_format() );
		} else {
			get_template_part( 'content', $default );
		}
	}
}
