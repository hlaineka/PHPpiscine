#!/usr/bin/php
<?php
array_shift($argv);
$i = 0;
$str = implode(" ", $argv);
$arr = preg_split('/\s+/', $str);
$str = implode(" ", $arr);
$str = trim($str);
echo("$str\n");
?>