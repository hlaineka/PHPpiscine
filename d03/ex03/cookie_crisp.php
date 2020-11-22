<?php
if ($_GET['action'] === 'set' && $_GET['name'] && $_GET['value'])
{
		$cookie_name = $_GET['name'];
		$cookie_value = $_GET['value'];
		setcookie($cookie_name, $cookie_value, time() + (24 *3600));
}
else if ($_GET['action'] === 'get' && $_GET['name']) 
{
	$cookie_name = $_GET['name'];
	if ($cookie_value = $_COOKIE[$cookie_name])
	{	
		echo("$cookie_value\n");
	}
}
else if ($_GET['action'] === 'del' && $_GET['name'])
{
	setcookie($_GET['name'], "", time() - 3600);
}
?>