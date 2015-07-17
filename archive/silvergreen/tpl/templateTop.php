<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Silvergreen</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="<?= $baseUrl ?>/tpl/silvergreen.css">
</head>

<body <?php
if (substr($_SERVER['PHP_SELF'], -8)== "Maps.php")
{
	print("onload='load()' onunload='GUnload()'");
}
?>>

<div id="outer">

<div id="header">
	<div id="banner"><img src="<?= $baseUrl ?>/images/Silvergreen-banner.png" alt="Silvergreen" width="491" height="112"></div>
	<div id="logo"><img src="<?= $baseUrl ?>/images/Silvergreen-logo.jpg" alt="Silvergreen" width="126" height="133"></div>
</div> <!-- header -->

<div id="main">
<div id="menu">
<ul class='menu'>
<li><a href="index.php">Home</a></li>
<li><a href="Calendar.php">Calendar</a></li>
<li><a href="Maps.php">Maps</a></li>
<li><a href="Groups.php">Task Groups</a> </li>
<li><a href="Process.php">Process</a></li>
<li><a href="Design.php">Design Overview</a>
	<ul class='submenu'>
	<li><a href="Energy.php">Energy</a></li>
	<li><a href="Water.php">Water and Wastewater</a></li>
	<li><a href="Food.php">Food</a></li>
	<li><a href="Recycling.php">Recycling</a></li>
	<li><a href="Homes.php">Homes</a></li>
	<li><a href="CommunityBuildings.php">Community Buildings</a> </li>
	</ul>
</li>
<li><a href="Philosophy.php">Philosophy</a></li>
<li><a href="BizModel.php">Business Model</a></li>
<li><a href="SignupForm.php">Subscribe for Updates</a></li>
<li><a href="Contact.php">Contact</a></li>
</ul>
</div> <!-- menu -->
