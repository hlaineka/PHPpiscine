#!/usr/bin/php
<?php
$str = $argv[1];
$new = preg_replace('/\s+/', ' ', $str);
$new = trim($new);
echo("$new\n");
?>