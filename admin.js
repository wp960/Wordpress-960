/* Add centering if it's not available. */
if (!jQuery.center) {
  jQuery.fn.center = function () {
    this.css("position", "fixed");
    this.css("top",  (( jQuery(window).height() - this.height() ) / 2) + "px");
    this.css("left", (( jQuery(window).width()  - this.width() )  / 2) + "px");
    return this;
  }
}

/* Selected field for image picker */
var selected_field = false;

/* Make large texts boxes expand so they don't take too much space */
jQuery('textarea.expand-box').focus(function(){
  jQuery(this).css('height','40em');
});
jQuery('textarea.expand-box').blur(function(){
  jQuery(this).css('height','8em');
});

function stripslashes(str) {
  if (str) {
    str = str.replace(/\\'/g, '\'');
    str = str.replace(/\\"/g, '"');
    str = str.replace(/\\0/g, '\0');
    str = str.replace(/\\\\/g, '\\');
    str = str.replace(/\\\\\\/g, '');
  }
  return str;
}

/* Theme selector */
jQuery('#theme').change(function(){
  var current_theme = jQuery('#theme').attr('value');
  if (confirm('Are you sure you want to replace ALL your settings with this theme set, "'+current_theme+'"?')) {
    for (option_setting in theme_data[current_theme]) {
      jQuery(':input').each(function(){
        if (jQuery(this).attr('name') == option_setting) {
          jQuery(this).css('border', 'solid 1px green');
          value = stripslashes(theme_data[current_theme][option_setting]);
          if (value == false) value = '';
          jQuery(this).attr('value', value);
        }
      });

      jQuery(':radio').each(function(){
        if (jQuery(this).attr('name') == option_setting) {
          if (jQuery(this).attr('value') == theme_data[current_theme][option_setting])
            jQuery(this).attr('checked', 'checked');
          else
            jQuery(this).attr('checked', false);
        }
      });
    }
    alert("Don't forget to Save Changes");
  }
});

Array.prototype.in_array = function(p_val) {
  for(var i = 0, l = this.length; i < l; i++) {
    if(this[i] == p_val) {
      return true;
    }
  }
  return false;
}

/* Center the image selector */
jQuery('#image-browser').center();

/* Activate the tabs for the image selector */
jQuery('#image-browser .images').hide();
jQuery('#image-browser .images:first').show();
jQuery('#image-browser #tabs a').click(function(){
  jQuery('#image-browser .images').hide();
  jQuery('#image-browser .images#' + jQuery(this).attr('href')).show();
  jQuery('#image-browser #tabs a').removeClass('current');
  jQuery(this).addClass('current');
  return false;
});

/* Open the image selector */
jQuery('.image-select').each(function(){
  jQuery(this).click(function(){
    images_tab = jQuery(this).attr('rel');
    selected_field = jQuery(this).next('input');
    jQuery('#image-browser').css('display','block');
    return false;
  });
});

/* Close the image selector */
jQuery('#image-browser #tabs li a.close').click(function(){
  jQuery("#image-browser").css('display','none');
  return false;
});

/* Select files in image-select */
jQuery('.images .image').click(function(){
  selected_field.attr('value', jQuery(this).attr('rel').replace(/(.*)\/(.*)-thumb\.(.*)$/,'$1/fullsize/$2.$3'));
  jQuery("#image-browser").css('display','none');
  return false;
});
