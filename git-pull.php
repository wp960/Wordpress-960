<?php
header('Content-Type: text/plain');
touch(dirname(__FILE__).'/git-pull.txt');
echo "Pull request received.";
?>
