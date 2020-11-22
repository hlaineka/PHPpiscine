<?PHP
if (!$_POST["passwd"])
{	
	echo "ERROR\n";
	exit ();
}
if (!file_exists("../private"))
	mkdir("../private");
if (file_exists("../private/passwd"))
{
	$file_content = file_get_contents("../private/passwd");
	$content_array = unserialize($file_content);
	$login = NULL;
	foreach ($content_array as $elem)
	{
		if ($elem["login"] === $_POST["login"])
		{
			$login = $_POST["login"];
		}
	}
	if ($login)
	{	
		echo "ERROR\n";
		exit ();
	}
}
echo "OK\n";
$newelem["login"] = $_POST["login"];
$newelem["passwd"] = hash("sha3-512", $_POST["passwd"]);
$content_array[] = $newelem;
$file_content = serialize($content_array);
file_put_contents("../private/passwd", $file_content);
?>