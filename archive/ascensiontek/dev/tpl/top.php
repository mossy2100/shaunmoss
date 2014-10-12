<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>SolSys Developers Site<?php if ($title) echo " > $title"; ?></title>
<link rel='stylesheet' href='<?php echo $baseUrl; ?>/tpl/SolSys.css' />
</head>
<body>
<table cellspacing='3' cellpadding='0' border='0' width='100%'>
<tr>
<td height='100' align='center'><img src='<?php echo $baseUrl; ?>/images/SolSys-website1-top.jpg' height='100' width='1000' /></td>
</tr>
<tr>
<td id='header' height='20' align='right'>
	<div id='msg'>SolSys Developer's Website - Welcome to the greatest space adventure in the Solar System!</div>
	<?php
	require "$baseDir/tpl/topMenu.php";
	?>
</td>
</tr>
<tr>
<td>
	<table width='100%' border='0' cellspacing='0' cellpadding='0'>
	<tr>
	<td width='200' valign='top' id='leftCol'>
	<?php
	require "$baseDir/tpl/leftMenu.php";
	?>
	</td>	
	<td valign='top' id='content'>
		<!-- content area -->