<?php

// Register the menus
# This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'header' => __( 'Header Navigation', 'wp960' ),
	'footer' => __( 'Footer Navigation', 'wp960' )
) );
