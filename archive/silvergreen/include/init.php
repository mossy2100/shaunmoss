<?php
// init.php
// Set configuration options for the Silvergreen site, and load standard libraries.

session_start();

// find base url and directory:
$local = strpos($_SERVER['HTTP_HOST'], 'local') !== FALSE;
if ($local)
{
  $smUrl = "http://local.shaunmoss.com";
  $smDir = "/Users/shaun/Dropbox/PROJECTS/shaunmoss.com/shaunmoss6";

  $ascensionTekUrl = "$smUrl/archive/ascensiontek";
  $ascensionTekDir = "$smDir/archive/ascensiontek";

  $SilvergreenUrl = "$smUrl/archive/silvergreen";
  $SilvergreenDir = "$smDir/archive/silvergreen";

  $baseUrl = $SilvergreenUrl;
  $baseDir = $SilvergreenDir;

	$dbHost = "localhost";
	$dbUsername = "shaun";
	$dbPassword = "freedom";
	$dbName = "ascensiontek";
}
else
{
  $smUrl = "http://shaunmoss.com";
  $smDir = "/var/www/shaunmoss.com";

  $ascensionTekUrl = "$smUrl/archive/ascensiontek";
  $ascensionTekDir = "$smDir/archive/ascensiontek";

  $SilvergreenUrl = "$smUrl/archive/silvergreen";
  $SilvergreenDir = "$smDir/archive/silvergreen";

  $baseUrl = $SilvergreenUrl;
  $baseDir = $SilvergreenDir;

	$dbHost = "localhost";
	$dbUsername = "ascen4_shaun";
	$dbPassword = "freedom";
	$dbName = "ascen4_ascensiontek";
}

$EcovillagesUrl = "$ascensionTekUrl/bizplan/pe";

// standard include:
include "$ascensionTekDir/lib/strings.php";
