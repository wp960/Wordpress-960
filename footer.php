      <div class="clear"></div>
    </div><!-- #wp960-inner-wrapper -->
    <div id="wp960-inner-wrapper-bottom"></div><!-- #wp960-inner-wrapper-bottom -->
    <div id="wp960-bottom-banner">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("bottom-banner-ad") ) : ?><?php endif; ?>
      <div class="clear"></div>
    </div><!-- #wp960-bottom-banner -->
    <div id="wp960-footer" class="grid_24">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer") ) : ?><?php endif; ?>
      <div id="wp960-footer-access">
        <?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer', 'menu_class' => 'sf-menu' ) ); ?>
      </div><!-- #wp960-footer-access -->
      <div class="clear"></div>
    </div><!-- #wp960-footer -->
    <div class="clear"></div>
  </div><!-- #wp960-wrapper -->
  <?php wp_footer(); ?>
</body>
