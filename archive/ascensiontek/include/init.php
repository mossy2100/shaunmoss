<?php
// init.php
// Set configuration options for the site, and load standard libraries.

session_start();

// find base url and directory:
$local = strpos($_SERVER['HTTP_HOST'], 'local') !== FALSE;
if ($local) {
  $smUrl = "http://shaunmoss.local";
  $smDir = "/Users/shaun2/Dropbox/SITES/shaunmoss.com/htdocs";

  // Database settings:
  $dbHost = "localhost";
  $dbUsername = "shaun";
  $dbPassword = "freedom";
  $dbName = "ascensiontek";
}
else {
  $smUrl = "https://shaunmoss.com";
  $smDir = "/var/www/shaunmoss.com/htdocs";

  // Database settings:
  $dbHost = "localhost";
  $dbUsername = "ascensiontek";
  $dbPassword = "terraform";
  $dbName = "ascensiontek";
}

$ascensionTekUrl = "$smUrl/archive/ascensiontek";
$ascensionTekDir = "$smDir/archive/ascensiontek";

$baseUrl = $ascensionTekUrl;
$baseDir = $ascensionTekDir;

$SilvergreenUrl = "$smUrl/archive/silvergreen";
$SilvergreenDir = "$smDir/archive/silvergreen";

function subdomainUrl($subdomain) {
  global $local, $baseUrl;
  if ($local) {
    return "$baseUrl/$subdomain";
  }
  else {
    return "http://$subdomain.tek.ac";
  }
}

function subdomainDir($subdomain) {
  global $baseDir;
  return "$baseDir/$subdomain";
}

// standard include:
include("$baseDir/lib/strings.php");
