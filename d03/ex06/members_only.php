
<?php
if (!($_SERVER['PHP_AUTH_USER'] === 'zaz') && !($_SERVER['PHP_AUTH_PW'] === 'Ilovemylittleponey'))
{
	header('WWW-Authenticate: Basic realm="Member area"');
	header('HTTP/1.0 401 Unauthorized');
	echo "<html><body>That area is accessible for members only</body></html>";
}
else {
	$imagePath = '../img/42.png';
	$data = file_get_contents($imagePath);
	$dataEncoded = base64_encode($data);
	echo "<html><body>Hello {$_SERVER['PHP_AUTH_USER']}.<br />";
	echo "<img src='data:image/png;base64,{$dataEncoded}'>";
	echo "</body></html>";
}
?>