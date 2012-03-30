<?php

// Register the menus
add_theme_support('nav-menus');
register_nav_menus( array(
	'header' => __( 'Header Navigation', 'wp960' ),
	'footer' => __( 'Footer Navigation', 'wp960' )
) );
