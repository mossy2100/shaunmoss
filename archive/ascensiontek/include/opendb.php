<?php
// open a database connection:
// (note that init.php must be included first)

//print("ok, $dbHost, $dbUsername, $dbPassword");
$dbLink = mysql_connect($dbHost, $dbUsername, $dbPassword);
if (!$dbLink)
{
    exit("Database connect failed: ".mysql_error()." (Error ".mysql_errno().")");
}

$db = mysql_select_db($dbName);
if (!$db)
{
    exit("Could not use database $dbName: ".mysql_error()." (Error ".mysql_errno().")");
}
?>
