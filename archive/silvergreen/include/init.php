<?php
// init.php
// Set configuration options for the Silvergreen site, and load standard libraries.

session_start();

// find base url and directory:
$local = strpos($_SERVER['HTTP_HOST'], 'local') !== FALSE;
if ($local) {
  $smUrl = "http://shaunmoss.local";
  $smDir = "/Users/shaun2/Dropbox/SITES/shaunmoss.com/htdocs";

  $dbHost = "localhost";
  $dbUsername = "shaun";
  $dbPassword = "freedom";
  $dbName = "ascensiontek";
}
else {
  $smUrl = "http://shaunmoss.com";
  $smDir = "/var/www/shaunmoss.com/htdocs";

  $dbHost = "localhost";
  $dbUsername = "ascen4_shaun";
  $dbPassword = "freedom";
  $dbName = "ascen4_ascensiontek";
}

$ascensionTekUrl = "$smUrl/archive/ascensiontek";
$ascensionTekDir = "$smDir/archive/ascensiontek";

$SilvergreenUrl = "$smUrl/archive/silvergreen";
$SilvergreenDir = "$smDir/archive/silvergreen";

$baseUrl = $SilvergreenUrl;
$baseDir = $SilvergreenDir;

$EcovillagesUrl = "$ascensionTekUrl/bizplan/pe";

// standard include:
include "$ascensionTekDir/lib/strings.php";
