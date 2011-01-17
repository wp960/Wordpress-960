<div class="wrap">
  <div id="icon-options-general" class="icon32"><br /></div>
  <h2>wp960 Theme Settings</h2>
  <form method="post">
    <table width="100%" border="0" style="padding:10px;">
      <!-- Theme -->
      <tr>
        <td width="20%" valign="top">
          <strong style="font-size:11px;">Saved Themes</strong>
        </td>
        <td width="80%">
          <?php
          $wp960_theme_settings = unserialize(get_option('wp960_theme_settings'));
          if (!is_array($wp960_theme_settings)) $wp960_theme_settings = array();

          if (count($wp960_theme_settings > 1))
            ksort($wp960_theme_settings);
          ?>
          <script type="text/javascript" charset="utf-8">
          //<![CDATA[
            var theme_data = Array();
            <?php
            foreach($wp960_theme_settings as $theme => $settings) {
              if (empty($theme) or empty($settings)) continue;
              print "theme_data['$theme'] = ".json_encode($settings).";\n";
            }
          ?>
          //]]>
          </script>
          <select name="theme" id="theme" size="1">
            <option value="">Select A Theme</option>
            <?php
            foreach($wp960_theme_settings as $theme=>$settings) {
              if ($theme == false) continue;
              print "<option value='$theme'>$theme</option>";
            }
            ?>
          </select>
          <br/>
          <small>Selecting a theme will replace the settings below with the theme settings.</small>
        </td>
      </tr>
      <tr>
        <td colspan="2"><br/>&nbsp;</td>
      </tr>

      <!-- Background Image -->
      <tr>
        <td width="20%" valign="top">
          <strong style="font-size:11px;">Background Image</strong>
        </td>
        <td width="80%">
          <input id="wp960_background_image" style="width:400px;" name="wp960_background_image" type="text" value="<?php echo get_option('wp960_background_image');?>" /><br/>
          <small>Type in the URL to the Background Image.</small><br/>
          <span style="display:inline-block;padding-right:10px;"><input type="radio" name="wp960_background_image_repeat" value="no-repeat" <?php  if (get_option('wp960_background_image_repeat')=='no-repeat')  echo 'checked="selected"'; ?>/> No Repeat</span>
          <span style="display:inline-block;padding-right:10px;"><input type="radio" name="wp960_background_image_repeat" value="repeat-x" <?php if (get_option('wp960_background_image_repeat')=='repeat-x') echo 'checked="selected"'; ?>/> Repeat Across</span>
          <span style="display:inline-block;padding-right:10px;"><input type="radio" name="wp960_background_image_repeat" value="repeat-y" <?php if (get_option('wp960_background_image_repeat')=='repeat-y') echo 'checked="selected"'; ?>/> Repeat Down</span>
          <span style="display:inline-block;padding-right:10px;"><input type="radio" name="wp960_background_image_repeat" value="" <?php if (get_option('wp960_background_image_repeat')=='tile') echo 'checked="selected"'; ?>/> Tile</span>
          <br/><br/>
        </td>
      </tr>
      <!-- Header Background Image -->
      <tr>
        <td width="20%" valign="top">
          <strong style="font-size:11px;">Header Background Image</strong>
        </td>
        <td width="80%">
          <input style="width:400px;" name="wp960_header_background_image" type="text" value="<?php echo get_option('wp960_header_background_image');?>" /><br/>
          <small>Type in the URL to the Header Background Image. No wider than 940px.</small>
          <br/><br/>
        </td>
      </tr>
      <!-- Header Image -->
      <tr>
        <td width="20%" valign="top">
          <strong style="font-size:11px;">Header Image</strong>
        </td>
        <td width="80%">
          <input style="width:400px;" name="wp960_header_image" type="text" value="<?php echo get_option('wp960_header_image');?>" /><br/>
          <small>Type in the URL to the Header Image. 940px wide.</small><br/>
          <br/>
          Display Blog Title / Tag Line from Wordpress?
          <span style="display:inline-block;padding-left:10px;"><input type="radio" name="wp960_header_show_text" value="t" <?php  if (get_option('wp960_header_show_text')=='t') echo 'checked="selected"'; ?>/> Show Text</span>
          <span style="display:inline-block;padding-left:10px;"><input type="radio" name="wp960_header_show_text" value="f" <?php if (get_option('wp960_header_show_text')=='f') echo 'checked="selected"'; ?>/> Hide Text</span><br/>
          <small>If you show Wordpress Blog Title and Tag Line then you probably don't want a Header Image.</small>
          <br/><br/>
        </td>
      </tr>
      <!-- Top Menubar Image -->
      <tr>
        <td width="20%" valign="top">
          <strong style="font-size:11px;">Menubar Background Image</strong>
        </td>
        <td width="80%">
          <input style="width:400px;" name="wp960_menubar_background_image" type="text" value="<?php echo get_option('wp960_menubar_background_image');?>" /><br/>
          <small>Type in the URL to the Menu Background Image. No wider than 940px.</small>
          <br/><br/>
        </td>
      </tr>
      <!-- Footer Background Image -->
      <tr>
        <td width="20%" valign="top">
          <strong style="font-size:11px;">Footer Background Image</strong>
        </td>
        <td width="80%">
          <input style="width:400px;" name="wp960_footer_background_image" type="text" value="<?php echo get_option('wp960_footer_background_image');?>" /><br/>
          <small>Type in the URL to the Footer Background Image. No wider than 940px.</small>
          <br/><br/>
        </td>
      </tr>
      <tr>
        <td colspan="2"><br/>&nbsp;</td>
      </tr>

      <!-- Stylesheet Includes -->
      <tr>
        <td width="20%" valign="top">
          <strong style="font-size:11px;">Stylesheet Includes</strong>
        </td>
        <td width="80%">
          <textarea name="wp960_stylesheet_includes" style="width:100%;height:4em;"><?php echo get_option('wp960_stylesheet_includes');?></textarea><br/>
          <small>List of Stylesheet URL's to include. (one per line)</small>
          <br/><br/>
        </td>
      </tr>
      <!-- Javascript Includes -->
      <tr>
        <td width="20%" valign="top">
          <strong style="font-size:11px;">Javascript Includes</strong>
        </td>
        <td width="80%">
          <textarea name="wp960_javascript_includes" style="width:100%;height:4em;"><?php echo get_option('wp960_javascript_includes');?></textarea><br/>
          <small>List of Javascript URL's to include. (one per line)</small>
          <br/><br/>
        </td>
      </tr>
      <tr>
        <td colspan="2"><br/>&nbsp;</td>
      </tr>

      <!-- Custom CSS -->
      <tr>
        <td width="20%" valign="top">
          <strong style="font-size:11px;">Custom CSS</strong>
        </td>
        <td width="80%">
          <textarea class="expand-box" name="wp960_custom_css" style="width:100%;height:8em;"><?php echo stripslashes(get_option('wp960_custom_css'));?></textarea>
          <br/><br/>
        </td>
      </tr>

      <!-- Custom Javascript -->
      <tr>
        <td width="20%" valign="top">
          <strong style="font-size:11px;">Custom Javascript</strong>
        </td>
        <td width="80%">
          <textarea class="expand-box" name="wp960_custom_javascript" style="width:100%;height:8em;"><?php echo stripslashes(get_option('wp960_custom_javascript'));?></textarea>
          <br/><br/>
        </td>
      </tr>
      <tr>
        <td colspan="2"><br/>&nbsp;</td>
      </tr>
    </table>
    <!-- Save Button -->
    <div id="save-button-background" style="">
      <div id="save-button" style="">
        <input name="save" type="submit" value="Save Changes" class="button-primary" onclick="jQuery('#save_action').attr('value','save');"/>
        <div style="display:inline-block;width:50px;"></div>
        <input name="theme_name" type="text" site="20" value="New Theme Name" onfocus="if(this.value=='New Theme Name'){this.value='';this.style.color='#000';}" style="color:#999;"/>
        <input name="make_theme" type="submit" value="Save Theme" class="button" onclick="jQuery('#save_action').attr('value','save');"/>
        <input id="save_action" type="hidden" name="action" value="" />
      </div>
    </div>
  </form>

  <script type="text/javascript" charset="utf-8">
  //<![CDATA[
    var THEME_PATH = "<?php echo get_bloginfo('template_directory'); ?>";
  //]]>
  </script>
</div>
