#!/usr/bin/php
<?php
$myfile = fopen($argv[1], "r");
$filestr = fread($myfile,filesize($argv[1]));
fclose($myfile);
?>