<?php

  # TODO: Stop using spaces -> http://codex.wordpress.org/WordPress_Coding_Standards
  # TODO: Implement dynamic base width for the 960 Grid System.
  # TODO: Implement dynamic column amounts.
  # TODO: Add custom menus.
  # TODO: Add widget zones.
  # TODO: Implement updating system for 960 Grid System.

  # Sanity check.
  if ( !class_exists( 'wordpress_960' ) ) {

    class wordpress_960 {

      public $header_menu = array(
        'container'       => 'div',
        'container_class' => 'grid_12'
      );

      public $footer_menu = array(
        'container'       => 'div',
        'container_class' => 'grid_12'
      );

      # PHP 4 Constructor
      function wordpress_960() {

      } # End Constructor

    }

  } # Does the class exist?

  if ( class_exists( 'wordpress_960' ) and !isset( $wordpress_960 ) ) {
    $wordpress_960 = new wordpress_960();
  }

?>
