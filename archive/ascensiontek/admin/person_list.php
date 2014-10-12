<?
include("../include/init.php");
include("check_login.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//Dth HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dth">
<html>
<head>
<title>AscensionTek Administration Extranet</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script type='text/javascript'>

function confirm_delete(person_id)
{
	if (confirm("Are you sure you want to delete this person?"))
	{
		location.href = "person_delete.php?person_id=" + person_id;
	}
}

</script>

</head>

<body>
<h1>AscensionTek Administration Extranet</h1>
<p><a href="person_edit.php">Add a new person</a></p>
<?
// list subscribers:
include("$baseDir/include/opendb.php");
$sql = "select * from person order by name";
$rs = mysql_query($sql);
?>
<table cellspacing='0' cellpadding='3' border='1' style='border-collapse:collapse'>
<tr>
<th>Name</th>
<th>Email Address</th>
<th>Home phone</th>
<th>Mobile phone</th>
<?
// mailing lists:
$sql = "select * from mailing_list";
$rs_ml = mysql_query($sql);
while ($rec_ml = mysql_fetch_assoc($rs_ml))
{
	println("<th>{$rec_ml['name']}</th>");
}
?>
<th>Action</th>
</tr>
<?
while ($rec = mysql_fetch_assoc($rs))
{
	$person_id = $rec['person_id'];
	println("<tr>");
	println("<td>".stripslashes($rec['name'])."</td>");
	println("<td>".stripslashes($rec['email_address'])."</td>");
	println("<td>".stripslashes($rec['ph_home'])."</td>");
	println("<td>".stripslashes($rec['ph_mobile'])."</td>");

	// mailing lists:
	$sql = "select * from mailing_list";
	$rs_ml = mysql_query($sql);
	while ($rec_ml = mysql_fetch_assoc($rs_ml))
	{
		print("<td><input type='checkbox'");
		$sql = "select * from person_mailing_list where person_id=$person_id and mailing_list_id={$rec_ml['mailing_list_id']}";
		$rs3 = mysql_query($sql);
		if (mysql_num_rows($rs3) == 1)
		{
			print(" checked");
		}
		println(" onclick='this.checked=!this.checked'></td>");
	}
	
	println("<td><a href='person_edit.php?person_id=$person_id'>Edit</a> &nbsp; <a href='javascript:confirm_delete($person_id)'>Delete</a></td>");
	println("</tr>");
}
?>
</table>
<p>&nbsp;</p>

<?
// mailing lists:
$sql = "select * from mailing_list";
$rs_ml = mysql_query($sql);
while ($rec_ml = mysql_fetch_assoc($rs_ml))
{
	$sql = "select email_address from person_mailing_list left join person on person_mailing_list.person_id=person.person_id where mailing_list_id={$rec_ml['mailing_list_id']} and email_address is not null";
	$rs3 = mysql_query($sql);
	$subscribers = array();
	while ($rec3 = mysql_fetch_assoc($rs3))
	{
		$subscribers[] = $rec3['email_address'];
	}
	printbr("Email addresses for mailing list '{$rec_ml['name']}': ".implode('; ', $subscribers)."<br/>");
}
?>
<p>&nbsp;</p>
</body>
</html>
