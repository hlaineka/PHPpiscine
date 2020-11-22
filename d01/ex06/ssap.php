#!/usr/bin/php
<?php
array_shift($argv);
$str = implode(" ", $argv);
$arr = preg_split('/\s+/', $str);
sort($arr);
$i = 0;
while ($arr[$i])
{
	echo("$arr[$i]\n");
	$i++;
}
?>