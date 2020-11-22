#!/usr/bin/php
<?php
$arr = preg_split('/\s+/', $argv[1]);
$str = array_shift($arr);
array_push($arr, $str);
$str = implode(" ", $arr);
$str = trim($str);
echo("$str\n");
?>