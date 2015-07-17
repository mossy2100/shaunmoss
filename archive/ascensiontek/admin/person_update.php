<?php
include("../include/init.php");
include("check_login.php");

include("$baseDir/include/opendb.php");

import_request_variables("p");
if (!get_magic_quotes_gpc())
{
	$name = mysql_escape_string($name);
	$email_address = mysql_escape_string($email_address);
	$ph_home = mysql_escape_string($ph_home);
	$ph_mobile = mysql_escape_string($ph_mobile);
}

$new_person = $person_id == 0 || $person_id == '';
if (!$new_person)
{
	$sql = "update person set name='$name', email_address='$email_address', ph_home='$ph_home', ph_mobile='$ph_mobile' where person_id=$person_id";
	mysql_query($sql);
}
else
{
	$sql = "insert into person (name, email_address, ph_home, ph_mobile) values ('$name', '$email_address', '$ph_home', '$ph_mobile')";
	mysql_query($sql);
	$person_id = mysql_insert_id();
}


// update the mailing lists:
$sql = "select * from mailing_list";
$rs2 = mysql_query($sql);
while ($rec2 = mysql_fetch_assoc($rs2))
{
	$mailing_list_id = $rec2['mailing_list_id'];
	$checked = ${"cb_mailing_list{$mailing_list_id}"};
	if ($checked)
	{
		// is the person subscribed to this mailing list?
		$sql = "select * from person_mailing_list where person_id=$person_id and mailing_list_id=$mailing_list_id";
		$rs3 = mysql_query($sql);
		if (mysql_num_rows($rs3) == 0)
		{
			// insert a record:
			$sql = "insert into person_mailing_list (person_id, mailing_list_id) values ($person_id, $mailing_list_id)";
			mysql_query($sql);
		}
	}
	else
	{
		// delete a record:
		$sql = "delete from person_mailing_list where person_id=$person_id and mailing_list_id=$mailing_list_id";
		mysql_query($sql);
	}
}

header("Location:person_list.php");
?>
