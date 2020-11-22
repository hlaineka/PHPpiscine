#!/usr/bin/php
<?php
$str = $argv[1];
$str = strtolower($str);
$str = substr(strstr($str," "), 1);
$months = array("janvier"=>"jan","février"=>"feb","mars"=>"march","avril"=>"apr","mai"=>"may","juin"=>"jun","juillet"=>"jul","août"=>"aug","septembre"=>"sep","octobre"=>"oct","novembre"=>"nov","décembre"=>"dec");
$str = strtr($str, $months);
if ($str = strtotime($str))
{
	$str = $str - 3600;
	echo("$str\n");
}
else
	echo("Wrong Format\n");
?>