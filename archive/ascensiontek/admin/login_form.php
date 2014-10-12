<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<h1>AscensionTek Administration Extranet</h1>
<form name="form1" method="post" action="login.php">
<table width="300" border="0" cellspacing="0" cellpadding="5">
	<tr>
		<td align="right">
			<label>Username 
			<input type="text" name="username">
			</label>
		</td>
	</tr>
	<tr>
		<td align="right">
			<label>Password 
			<input type="password" name="pwd">
			</label>
		</td>
	</tr>
	<tr>
		<td align="right">
			<input type="submit" name="Submit" value="Submit">
		</td>
	</tr>
</table>
<input type='hidden' name='request_uri' value='<?= $_GET['request_uri'] ?>'>
</form>
<p>&nbsp;</p>
</body>
</html>
