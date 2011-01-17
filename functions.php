<?php
# wp960 Framework Theme Functions

# Featured Image Attributes
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150, true ); // Normal post thumbnails
add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size

$wp960_theme_data = get_theme_data(TEMPLATEPATH.'/style.css');
define('THEME_PATH', trailingslashit(TEMPLATEPATH));
define('wp960_HEME_NAME', $wp960_theme_data['Name']);
define('wp960_THEME_AUTHOR', $wp960_theme_data['Author']);
define('wp960_THEME_URI', $wp960_theme_data['URI']);
define('THEME_VERSION', trim($wp960_theme_data['Version']));
define('THEME_URL', get_bloginfo('template_url'));


# Adding a Class to the primary UL for wp_page_menu.
# This is needed for the SuckerFish menu.
function add_menu_class($ulclass) {
  return preg_replace('/<ul>/', '<ul class="sf-menu">', $ulclass, 1);
}
add_filter('wp_page_menu','add_menu_class');

# Theme Options Page (in Admin)
include_once(THEME_PATH.'options.php');

# Setup Widget Zones
if ( !function_exists('register_cp_sidebars') ) {
  function register_cp_sidebars() {
    register_sidebar(array('name' => 'header','before_widget' => '','after_widget' => '','before_title' => '<span class="header-widget-title">','after_title' => '</span>'));
    register_sidebar(array('name' => 'submenu','before_widget' => '<div class="wp960-submenu-widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widget-title">','after_title' => '</h3>'));
    register_sidebar(array('name' => 'page-sidebar','before_widget' => '<div class="wp960-sidebar-widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
    register_sidebar(array('name' => 'footer','before_widget' => '','after_widget' => '','before_title' => '','after_title' => ''));
    register_sidebar(array('name' => 'home-page','before_widget' => '<div class="wp960-home-widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widget-title">','after_title' => '</h3>'));
    register_sidebar(array('name' => 'sidebar-blog', 'before_widget' => '<div class="blog-sidebar-widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
  }
}
add_action('init', 'register_cp_sidebars', 1);

# This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
  'header' => __( 'Header Navigation', 'wp960' ),
  'footer' => __( 'Footer Navigation', 'wp960' )
) );

function wp960_page_menu_args( $args ) {
  $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'wp960_page_menu_args' );

function wp960_styles() { 
    wp_enqueue_style('wp960-styles', get_bloginfo('stylesheet_url'),1, THEME_VERSION,'all');
}
add_action('wp_print_styles', 'wp960_styles', 1);

function wp960_site_scripts() {
  wp_enqueue_script('wp960-script', THEME_URL."/site.js", 'jquery', THEME_VERSION, false);
  wp_enqueue_script('wp960-fish', THEME_URL."/superfish.js", 'jquery', THEME_VERSION, false);
}
if (!is_admin()) {
  add_action('wp_print_scripts', 'wp960_site_scripts', 5);
}

# Admin scripts and styles
function wp960_admin_scripts() {
  wp_enqueue_script('wp960-admin-script', THEME_URL."/admin.js", 'jquery', THEME_VERSION, true);
}
add_action('admin_print_scripts', 'wp960_admin_scripts', 5);

function wp960_admin_styles() {
  wp_enqueue_style('wp960-admin-style', THEME_URL."/admin.css", 5, THEME_VERSION, 'all');
}
add_action('admin_print_styles', 'wp960_admin_styles', 5);

# Header
function wp960_header() {
  $content = '';
  $wp960_header_image = get_option('wp960_header_image');
  if ($wp960_header_image) {
    $content .= "\n<img src=\"$wp960_header_image\" alt=\"\"/>";
  } elseif (get_option('wp960_header_show_text') == 't') {
    $content .= "<h1>".get_bloginfo('name')."</h1>\n";
    $content .= "<h2>".get_bloginfo('description')."</h2>";
  }
  return $content;
}

# Include CSS
function wp960_css_includes() {
  $wp960_stylesheet_includes = explode("\n", get_option('wp960_stylesheet_includes'));

  if ($wp960_stylesheet_includes) {
    $counter = 1;
    foreach ($wp960_stylesheet_includes as $stylesheet) {
      $media = 'screen';
      if (stristr($stylesheet, 'print')) $media = 'print';
      $stylesheet = trim($stylesheet);
      if (!empty($stylesheet)) {
        wp_enqueue_style('wp960-style-'.$counter, $stylesheet, array(), null, $media);
        $counter++;
      }
    }
  }
}
add_action('wp_print_styles', 'wp960_css_includes', 7);

# Include JS
function wp960_js_includes() {
  $wp960_javascript_includes = explode("\n", get_option('wp960_javascript_includes'));
  if ($wp960_javascript_includes) {
    $counter = 1;
    foreach ($wp960_javascript_includes as $javascript) {
      $javascript = trim($javascript);
      if (!empty($javascript)) {
        wp_enqueue_script('wp960-script-'.$counter, $javascript, false, null, true);
        $counter++;
      }
    }
  }
}
add_action('wp_print_scripts', 'wp960_js_includes', 7);

# Custom CSS
function wp960_custom_css() {
  $wp960_c_css = "";
  $wp960_background_image = get_option('wp960_background_image');
  $wp960_background_image_repeat = get_option('wp960_background_image_repeat');
  $wp960_header_background_image = get_option('wp960_header_background_image');
  $wp960_header_background_image_repeat = get_option('wp960_header_background_image_repeat');
  $wp960_menubar_background_image = get_option('wp960_menubar_background_image');
  $wp960_footer_background_image = get_option('wp960_footer_background_image');
  $wp960_widget_chrome = get_option('wp960_widget_chrome');

  if (empty($wp960_header_background_image_repeat)) $wp960_header_background_image_repeat = 'repeat-x';

  if ($wp960_widget_chrome) {
    $wp960_c_css .= file_get_contents($wp960_widget_chrome);
  }
  if ($wp960_background_image) {
    $wp960_c_css .= "body{background-image:url('$wp960_background_image') !important;background-repeat:$wp960_background_image_repeat !important;}\n";
  }
  if ($wp960_header_background_image) {
    $wp960_c_css .= "#wp960-header{background-image:url('$wp960_header_background_image') !important;background-repeat:$wp960_header_background_image_repeat !important;}\n";
  }
  if ($wp960_menubar_background_image) {
    $wp960_c_css .= "#wp960-header-access .menu-header, #wp960-header-access .menu { background-image:url('$wp960_menubar_background_image') !important;background-repeat:repeat-x !important;}\n";
  }
  if ($wp960_footer_background_image) {
    $wp960_c_css .= "#wp960-footer{background-image:url('$wp960_footer_background_image') !important;background-repeat:repeat-x !important;}\n";
  }

  $wp960_c_css .= get_option('wp960_custom_css');

  if ($wp960_c_css) {
    echo "\n<!-- Start wp960 Framework Theme Custom Stylesheet -->\n";
    echo "<style type=\"text/css\">\n/*<![CDATA[*/\n".stripslashes($wp960_c_css)."\n/*]]>*/\n</style>\n";
    echo "<!-- End wp960 Framework Theme Custom Stylesheet -->\n\n";
  }
}
add_action('wp_head', 'wp960_custom_css', 20);

# Custom Javascript
function wp960_custom_javascript() {
  $wp960_custom_javascript = get_option('wp960_custom_javascript');

  if ($wp960_custom_javascript) {
    echo "\n<!-- Start wp960 Framework Theme Custom Javascript -->\n";
    echo "<script type=\"text/javascript\">\n//<![CDATA[\n";
    echo stripslashes($wp960_custom_javascript);
    echo "\n//]]>\n</script>\n";
    echo "<!-- End wp960 Framework Theme Custom Javascript -->\n";
  }
}
add_action('wp_footer', 'wp960_custom_javascript', 20);

function print_wp960_widgets_css() {
  global $wp960_widgets_css;
  echo "<!-- wp960 Widgets CSS -->";
  echo $wp960_widgets_css;
}
add_action('wp_head', 'print_wp960_widgets_css', 20);

function the_breadcrumb() {
    echo '<a href="';
    echo get_option('home');
    echo '">';
    bloginfo('name');
    echo "</a> &raquo; ";
    if (is_category() || is_single()) {
      the_category('title_li=');
      if (is_single()) {
        echo " &raquo; ";
        the_title();
      }   
    } elseif (is_page()) {
      echo the_title();
    } else {
      echo the_category('title_li=');
    }   
}

/**
 * Roll overs
 * [rollover title='' href='' src='' width='' height='']
 */
function rollover_shortcode_handler($atts) {
  extract(
    shortcode_atts(
      array('href' => '','width' => '','height' => '','src' => '', 'title' => '', 'link_text' => '')
      , $atts
    )
  );

  return sprintf(
    "<a title='%s' href='%s' style='display:inline-block;position:static;overflow-y:hidden;width:%dpx;height:%dpx;background:url(%s) no-repeat top left;' onmouseover=\"$(this).css('background-position','bottom');\" onmouseout=\"$(this).css('background-position','top');\">%s</a>",
    $title, $href, $width, ($height / 2), $src, $link_text
  );
}
add_shortcode('rollover', 'rollover_shortcode_handler');
