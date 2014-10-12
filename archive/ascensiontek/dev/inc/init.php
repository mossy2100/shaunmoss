<?php
// init.php

session_start();
//
//debug($_SERVER);

if ($_SERVER['HTTP_HOST'] == 'localhost')
{
	$local = true;
	$baseUrl = "http://localhost/solsys/www/dev";
	$baseDir = "C:/Projects/solsys/www/dev";
}
else
{
	$local = false;
	$baseUrl = "http://dev.solsys.net.au";
	$baseDir = "/home/ascen4/public_html/dev";
}


include("$baseDir/lib/strings.php");

?>