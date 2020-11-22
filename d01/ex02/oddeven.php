#!/usr/bin/php
<?php
echo("Enter a number: ");
while($buffer = fgets(STDIN, 4096))
{
	$trimmed = rtrim($buffer);
	if (!is_numeric($trimmed))
	{
		echo("'$trimmed' is not a number\n");
	}
	else if ($trimmed % 2 == 0)
	{
		echo("The number $trimmed is even\n");
	}
	else
	{
		echo("The number $trimmed is odd\n");
	}
	echo("Enter a number: ");
}
?>