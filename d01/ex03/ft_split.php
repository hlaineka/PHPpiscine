<?PHP
function ft_split($str)
{
	$returnable = preg_split('/\s+/', $str);
	sort($returnable);
	return($returnable);
}
?>