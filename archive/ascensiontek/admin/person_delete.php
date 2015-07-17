<?php
include("../include/init.php");
include("check_login.php");

$person_id = $_GET['person_id'];
if ($person_id != "" && $person_id != 0)
{
	include("$baseDir/include/opendb.php");
	$sql = "delete from person where person_id=$person_id";
	mysql_query($sql);
	$sql = "delete from person_mailing_list where person_id=$person_id";
	mysql_query($sql);
}

header("Location:person_list.php");
?>
