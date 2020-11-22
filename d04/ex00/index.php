<?PHP
session_start();
if ($_SESSION["login"])
	$login = $_SESSION["login"];
else if ($_GET["login"])
	$login = $_GET["login"];
else
	$login = "";
if ($_GET["submit"] === 'OK')
{
	$_SESSION["login"] = $_GET["login"];
}
?>
<html><body>
<form action="index.php" method="get" accept-charset="UTF-8">
	Playername: <input type="text" name="login" value="<?php echo $login; ?>" />
	<br />
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>