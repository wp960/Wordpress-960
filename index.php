<?php
/**
 * Generic template used when no other template is available.
 *
 * @package WordPress-960
 */

get_header();
wp960_get_columns( 'index' );
get_template_part( 'pagination', 'index' );
get_footer();
