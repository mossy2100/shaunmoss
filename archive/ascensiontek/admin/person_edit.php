<?
include("../include/init.php");
include("check_login.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//Dth HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dth">
<html>
<head>
<title>AscensionTek Administration Extranet</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>

<body>
<?
// list subscribers:
include("$baseDir/include/opendb.php");
$person_id = $_GET['person_id'];
$new_person = $person_id == 0 || $person_id == '';
if (!$new_person)
{
	$sql = "select * from person where person_id=$person_id";
	$rs = mysql_query($sql);
	$rec = mysql_fetch_assoc($rs);
	extract($rec);
}
?>
<h1><?= $new_person ? "Add" : "Edit" ?> Person</h1>
<form name="form1" method="post" action="person_update.php">
<table cellspacing='0' cellpadding='3' border='1' style='border-collapse:collapse'>
<tr>
<td>Name</td>
<td><input type="text" name="name" style='width:200px' value='<?= $name ?>'></td>
</tr>
<tr>
<td>Email address</td>
<td><input type="text" name="email_address" style='width:200px' value='<?= $email_address ?>'>
</td>
</tr>
<tr>
<td>Home phone</td>
<td><input type="text" name="ph_home" style='width:200px' value='<?= $ph_home ?>'></td>
</tr>
<tr>
<td>Mobile phone</td>
<td><input type="text" name="ph_mobile" style='width:200px' value='<?= $ph_mobile ?>'></td>
</tr>
<tr>
<td valign="top">Mailing lists</td>
<td>
<?
	$sql = "select * from mailing_list";
	$rs2 = mysql_query($sql);
	while ($rec2 = mysql_fetch_assoc($rs2))
	{
		// is the person subscribed to this mailing list?
		$sql = "select * from person_mailing_list where person_id=$person_id and mailing_list_id={$rec2['mailing_list_id']}";
		$rs3 = mysql_query($sql);
		print("<input type='checkbox' name='cb_mailing_list{$rec2['mailing_list_id']}'");
		if ($rs3 != null && mysql_num_rows($rs3) > 0)
		{
			print(" checked");
		}
		printbr("> {$rec2['name']}");
	}
?>
</td>
</tr>
<tr>
<td colspan=2 align=right><input type='button' value='Cancel' onclick="window.location.href='person_list.php'"> <input type='submit' value='Save'></td>
</tr>
</table>
<input type='hidden' name='person_id' value='<?= $person_id ?>'>
</form>
<p>&nbsp;</p>
</body>
</html>
