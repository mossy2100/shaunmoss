<?php
// init.php
// Set configuration options for the Silvergreen site, and load standard libraries.

session_start();

// find base url and directory:
$localSite = strpos($_SERVER['HTTP_HOST'], '.local') !== false;
if ($localSite)
{
	$baseUrl = "http://silvergreen.local";
	$baseDir = "/Users/shaun/Dropbox/Projects/archive/Silvergreen/www";
	$dbHost = "localhost";
	$dbUsername = "shaun";
	$dbPassword = "freedom";
	$dbName = "ascensiontek";
	$AscensionTekUrl = "http://localhost/ascensiontek/www";
	$AscensionTekDir = "/Users/shaun/Dropbox/Projects/archive/AscensionTek/www";
}
else
{
	$baseUrl = "http://shaunmoss.com/archive/silvergreen";
	$baseDir = "/var/aegir/platforms/shaunmoss.com/archive/silvergreen";
	$dbHost = "localhost";
	$dbUsername = "ascen4_shaun";
	$dbPassword = "freedom";
	$dbName = "ascen4_ascensiontek";
	$AscensionTekUrl = "http://shaunmoss.com/archive/ascensiontek";
  $AscensionTekDir = "/var/aegir/platforms/shaunmoss.com/archive/ascensiontek";
}
$EcovillagesUrl = "$AscensionTekUrl/bizplan/pe";

// standard include:
include "$AscensionTekDir/lib/strings.php";
