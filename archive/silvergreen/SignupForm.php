<?php
include("include/init.php");
$title = "AscensionTek - Silvergreen Sign-up Form";
$menuItem = "Ecovillages";
include("tpl/templateTop.php");
?>

<h1>Silvergreen Sign-up Form </h1>
<p>Please use this form if you would like to
	join the Silvergreen interest group.&nbsp; You will
	receive news about how the ecovillage is progressing,
	and invitations to meetings.&nbsp; Your email address
	will not be used for any other purpose, I promise! </p>
<p>&nbsp;</p>
<form name="form1" id="form1" method="post" action="SignupFormSubmit.php">
<table border="0" cellspacing="0" cellpadding="5">
	<tr>
		<th width="150" align="right"><span class='reqdField'>*</span> <label for="name">Name:</label></th>
		<td width="250"><input type="text" name="name" id="name" style="width:250px"></td>
	</tr>
	<tr>
		<th align="right"><span class='reqdField'>*</span> <label for="email_address">Email address:</label></th>
		<td><input type="text" name="email_address" id="email_address" style="width:250px"></td>
	</tr>
	<tr>
		<th align="right" valign="top"><label for="message">Message:</label></th>
		<td><textarea name="message" id="message" style="width:250px; height:125px"></textarea></td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td align="right"><a href="javascript:checkForm();">Send</a></td>
	</tr>
</table>
</form>
<p>&nbsp;</p>

<script type="text/javascript" src="lib/validate.js"></script>
<script type="text/javascript">

function checkForm()
{
	var name = document.getElementById("name").value;
	if (name == "")
	{
		alert("Please enter your name.");
		return;
	}

	var email_address = document.getElementById("email_address").value;
	if (!validEmail(email_address))
	{
		alert("Please enter a valid email address.");
		return;
	}

	// all good, submit the form:
	document.getElementById('form1').submit();
}

</script>


<?php
include("tpl/templateBottom.php");
?>
