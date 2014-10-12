<?
// Add an email address to the subscriber database.
// ================================================

include("include/init.php");
include("include/opendb.php");

// AscensionTek Newsletter:
$mailing_list_id = 1;

// get the email address from the querystring:
$email_address = $_GET['email_address'];
if (!get_magic_quotes_gpc())
	$email_address = mysql_escape_string($email_address);

// check and see if this email address is already in the subscribers table:
$sql = "select * from person where email_address='$email_address'";
$rs = mysql_query($sql);
$subscribeThem = false;
if (mysql_num_rows($rs) == 0)
{
//	print("email not found; ");
	// this email address is not in the database yet, insert it:
	$sql = "insert into person (email_address) values ('$email_address')";
	mysql_query($sql);
	$person_id = mysql_insert_id();
	$subscribeThem = true;
//	print("email added person_id=$person_id; ");
}
else
{
	// this email address is already in the db - let's see if they're subscribed to this newsletter:
//	print("email found; ");
	$rec = mysql_fetch_assoc($rs);
	$person_id = $rec['person_id'];
	$sql = "select * from person_mailing_list where person_id=$person_id and mailing_list_id=$mailing_list_id";
	$rs = mysql_query($sql);
	if (mysql_num_rows($rs) == 0)
	{
//		print("not subscribed; ");
		// they aren't subscribed to this newsletter yet:
		$subscribeThem = true;
//		print("subscribeThem = true; ");
	}
}

$subscribedOk = false;
if ($subscribeThem)
{
//	print("subscribing user; ");
	// enter the new subscriber:
	$sql = "insert into person_mailing_list (person_id, mailing_list_id) values ($person_id, $mailing_list_id)";
	if (mysql_query($sql))
	{
		$subscribedOk = true;
//		print("subscribedOk; ");
	}
}
else // already subscribed:
{
	print("You're already subscribed :)");
	exit();
}

if ($subscribedOk)
{
	// tell user:	
	print("$email_address subscribed ok.");
	// tell me:
	mail("shaun@ascensiontek.com", "$email_address has subscribed to the AscensionTek Newsletter.", "");
}
else
{
	print("Subscription failed.");
}

// clean up:
mysql_close();
?>