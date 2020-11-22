<?PHP
if (!($_POST["submit"] === 'OK') || !($_POST["newpw"]))
{
	echo "ERROR\n";
	exit();
}
if (!file_exists("../private"))
	mkdir("../private");
if (file_exists("../private/passwd"))
{
	$i = 0;
	$file_content = file_get_contents("../private/passwd");
	$content_array = unserialize($file_content);
	$login = NULL;
	foreach ($content_array as $elem)
	{
		if ($elem["login"] === $_POST["login"])
		{
			$login = $_POST["login"];
			if ($elem["passwd"] === hash("sha3-512", $_POST["oldpw"]))
			{
				$content_array[$i]["passwd"] = hash("sha3-512", $_POST["newpw"]);
				$file_content = serialize($content_array);
				file_put_contents("../private/passwd", $file_content);
				echo "OK\n";
				exit();
			}
			else
			{
				echo "ERROR\n";
				exit ();
			}
			$i++;
		}
	}
	if (!$login)
	{	
		echo "ERROR\n";
		exit ();
	}
}
echo "ERROR\n";
?>