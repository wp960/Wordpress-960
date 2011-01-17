<?php
# FIXME: Use settings instead of options
#   http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/

# DT Option Settings
$option_names = array(
  'wp960_header_image',
  'wp960_background_image',
  'wp960_background_image_repeat',
  'wp960_header_background_image',
  'wp960_menubar_background_image',
  'wp960_header_show_text',
  'wp960_footer_background_image',
  'wp960_custom_css',
  'wp960_stylesheet_includes',
  'wp960_custom_javascript',
  'wp960_javascript_includes',
  'wp960_theme_columns'
);

# Defaults
function wp960_setup_defaults() {
  global $option_names;
  foreach($option_names as $name) {
    $option = get_option($name);
    if (empty($option)) add_option($name, '');
  }
}

# Settings Page Functions
function wp960_theme_admin() {
  global $option_names, $current_themes;
  $current_themes = (array) unserialize(get_option('wp960_theme_settings'));

  $myPage = isset($_GET['page']) ? $_GET['page'] : null;

  if ($myPage == basename(__FILE__) ) {
    /* Save Settings */
    if ('save' == $_POST['action'] ) {
      foreach ($option_names as $value) {
        if (isset($_POST[$value]) && !empty($_POST[$value])) {
          update_option($value, stripslashes($_POST[$value]), '', 'yes');
        } else {
          delete_option($value);
        }
      }

      $_REQUEST['saved'] = true;
    }

    /* Save Theme */
    if ($_POST['make_theme'] == 'Save Theme' and !empty($_POST['theme_name'])) {
      foreach ($option_names as $option_name) {
        if ($option_name == 'wp960_theme_settings') continue;
        $wp960_theme_settings[$_POST['theme_name']][$option_name] = stripslashes(get_option($option_name));
      }

      if (is_array($current_themes)) {
        $wp960_theme_settings = array_merge($current_themes, $wp960_theme_settings);
      }

      update_option('wp960_theme_settings', serialize($wp960_theme_settings));

      $_REQUEST['saved_theme'] = $_POST['theme_name'];
    }
  }

  add_theme_page("wp960 Theme Settings", "wp960 Options", "manage_options", basename(__FILE__), 'wp960_theme_admin_page');
}

/* Render Settings Page */
function wp960_theme_admin_page() {
  if ($_REQUEST['saved']) {
    echo '<div id="message" class="updated fade"><p><strong>wp960 Theme settings saved.</strong></p></div>';
  }
  if ($_REQUEST['saved_theme']) {
    echo '<div id="message" class="updated fade"><p><strong>Saved new theme: '.$_REQUEST['saved_theme'].'</strong></p></div>';
  }
  include_once(THEME_PATH.'options_page.php');
}


#
# Do the magic
#
wp960_setup_defaults();
add_action('admin_menu', 'wp960_theme_admin');
?>
