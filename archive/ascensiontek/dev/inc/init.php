<?php
// init.php

session_start();
//
//debug($_SERVER);

$local = strpos($_SERVER['HTTP_HOST'], 'local') !== FALSE;
if ($local)
{
	$baseUrl = "http://localhost/solsys/www/dev";
	$baseDir = "C:/Projects/solsys/www/dev";
}
else
{
	$baseUrl = "http://dev.solsys.net.au";
	$baseDir = "/home/ascen4/public_html/dev";
}

include("$baseDir/lib/strings.php");
