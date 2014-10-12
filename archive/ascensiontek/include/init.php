<?
// init.php
// Set configuration options for the site, and load standard libraries.

session_start();

// find base url and directory:
$local = $_SERVER['HTTP_HOST'] == 'localhost';
if ($local)
{
  $baseUrl = "http://ascensiontek.local";
  $baseDir = "/Users/shaun/Dropbox/Business/old/AscensionTek/www";

  $ascensionTekUrl = $baseUrl;
  $ascensionTekDir = $baseDir;

  $smUrl = "http://localhost/shaunmoss/www";
  $smDir = "$projectDir/shaunmoss/www";

  $a2Url = "http://localhost/australia2/www"; // @todo incorrect, update
  $a2Dir = "$projectDir/australia2/www"; // @todo incorrect, update

  $marsEngineeringUrl = "http://localhost/old/marsengineering/website"; // @todo incorrect, update
  $marsEngineeringDir = "$projectDir/old/marsengineering/website"; // @todo incorrect, update

  $solsysUrl = "$baseUrl/solsys"; // @todo incorrect, update
  $solsysDir = "$baseDir/solsys"; // @todo incorrect, update

  $SilvergreenDir = "$baseUrl/silvergreen";
  $SilvergreenUrl = "$baseUrl/silvergreen";

  // Database settings:
  $dbHost = "localhost";
  $dbUsername = "shaun";
  $dbPassword = "freedom";
  $dbName = "ascensiontek";
}
else
{
  $smUrl = "http://shaunmoss.com";
  $smDir = "/var/aegir/platforms/shaunmoss.com";

  $ascensionTekUrl = "$smUrl/archive/ascensiontek";
  $ascensionTekDir = "$smDir/archive/ascensiontek";

  $baseUrl = $ascensionTekUrl;
  $baseDir = $ascensionTekDir;

  $marsEngineeringUrl = "$smUrl/archive/marsengineering";
  $marsEngineeringDir = "$smDir/archive/marsengineering";

  $solsysUrl = "$smUrl/archive/solsys";
  $solsysDir = "$smDir/archive/solsys";

  $martiansUrl = "$smUrl/archive/martians";
  $martiansDir = "$smDir/archive/martians";

  $a2Url = "$smUrl/archive/australia2";
  $a2Dir = "$smDir/archive/australia2";

  $SilvergreenUrl = "$smUrl/archive/silvergreen";
  $SilvergreenDir = "$smDir/archive/silvergreen";

  // Database settings:
  $dbHost = "localhost";
  $dbUsername = "ascensiontek";
  $dbPassword = "terraform";
  $dbName = "ascensiontek";
}


function subdomainUrl($subdomain)
{
  global $localSite, $baseUrl;
  if ($localSite)
    return "$baseUrl/$subdomain";
  else
    return "http://$subdomain.tek.ac";
}


function subdomainDir($subdomain)
{
  global $baseDir;
  return "$baseDir/$subdomain";
}


// standard include:
include("$baseDir/lib/strings.php");
?>