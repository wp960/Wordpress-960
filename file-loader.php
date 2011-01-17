<?php
header('Content-type: text/plain');
require_once( '../../../wp-load.php');
define('THEME_PATH', trailingslashit(TEMPLATEPATH));

if (!$_GET['image_dir']) die("No image dir defined");
$image_dir = $_GET['image_dir'];
$path = THEME_PATH . "images/" . $image_dir;
$dir_handle = @opendir($path) or die("Unable to open $path");
$files = array();

while ($file = readdir($dir_handle)) {
  if (substr($file,0,1) == '.') continue;
  $files[] = get_bloginfo('template_directory')."/images/$image_dir/$file";
}

echo json_encode($files);

closedir($dir_handle);

?>
