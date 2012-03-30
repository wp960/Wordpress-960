<?php
/**
* @package WordPress
* @subpackage wp960
* Template Name: Widget Page
*/
get_header(); ?>

<div id="wp960-page-content">
	<div class="wp960-widget-zones-top" id="wp960-home-page-top"></div>
	<div class="wp960-widget-zones" id="wp960-home-page">
		<?php dynamic_sidebar("home-page"); ?>
		<div class="clear"></div>
	</div>
	<div class="widget-zones-bottom" id="home-page-bottom"></div>
<div class="clear"></div>
</div>

<?php get_footer(); ?>
