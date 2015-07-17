<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<?php
if ($title == "")
{
	$title = "AscensionTek";
}
?>
<title><?= $title ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?= $ascensionTekUrl ?>/tpl/common.css" rel="stylesheet" type="text/css" />

<!--[if lt IE 7]>
<link href="<?= $ascensionTekUrl ?>/tpl/sub_ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lt IE 6]>
<link href="<?= $ascensionTekUrl ?>/tpl/sub_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript" src="<?= $ascensionTekUrl ?>/lib/ajax.js"></script>
<script type="text/javascript" src="<?= $ascensionTekUrl ?>/lib/validate.js"></script>
<script type="text/javascript">

var ascensionTekUrl = '<?= $ascensionTekUrl ?>';

function subscribe()
{
	// see if Ajax is supported:
	var xmlHttp = getXmlHttpObject();
	if (xmlHttp)
	{
		// looks good.
		// get the email address;
		var tbEmail = document.getElementById('tbEmail');
		var email = tbEmail.value;
		// check the email address is valid:
		if (!validEmail(email))
		{
			alert("Please enter a valid email address.");
			return false;
		}
		// hide the email address box and the subscribe button until the ajax request is completed:
		var divSubscribe = document.getElementById('divSubscribe');
		divSubscribe.style.display = 'none';
		var divWait = document.getElementById('divWait');
		divWait.style.display = 'block';
		// set up the xmlHttp object:
		xmlHttp.onreadystatechange = function()
		{
			if (xmlHttp.readyState == 4)
				afterSubscribe(xmlHttp.responseText);
		}
		// call the server function:
		xmlHttp.open("GET", ascensionTekUrl + "/subscribe.php?email_address=" + tbEmail.value, true);
		xmlHttp.send(null);
	}
}


function afterSubscribe(responseText)
{
	alert(responseText);
	// re-display the email address box and the subscribe button:
	var divSubscribe = document.getElementById('divSubscribe');
	divSubscribe.style.display = 'block';
	var divWait = document.getElementById('divWait');
	divWait.style.display = 'none';
	// clear the email address box:
	var tbEmail = document.getElementById('tbEmail');
	tbEmail.value = "";
}

</script>

</head>

<body>
<div id="logo"><a href="<?= $ascensionTekUrl ?>" ><img src="<?= $ascensionTekUrl ?>/tpl/badge.png" alt="AscensionTek - Advancing the Triplanetary System" width="193" height="151" /></a></div>
<div id="header">
<form method="post" action="" onSubmit="return false;">
<h1>- Advancing the Triplanetary System -</h1>
<!--
<div id="divSubscribe">
<p>Enter your email address to subscribe to our newsletter:</p>
<fieldset>
<input type="text" id="tbEmail" title="Enter your email address to subscribe"/>
<a href="javascript:subscribe()">Subscribe</a>
</fieldset>
</div>--> <!-- ends #divSubscribe -->
<div id="divWait">
Please wait...
</div> <!-- ends #divWait -->
</form>
</div> <!-- ends #header -->
<div id="stars">
<?php
function menuItem($link, $text)
{
	global $menuItem;
	if ($menuItem == $text)
	{
		println("<li><a href='$link' class='current'>$text</a></li>");
	}
	else
	{
		println("<li><a href='$link'>$text</a></li>");
	}
}
?>
<div id="left_column">
	<ul id="nav">
		<?php include("$ascensionTekDir/menu.php"); ?>
	</ul>
</div><!-- ends #left_column -->

<div id="container">

<?php
if ($menuItem == "Home")
{
//	include("$ascensionTekDir/updates.php");
}
elseif ($menuItem == "Business Plan")
{
	include("$ascensionTekDir/bizplan/Submenu.php");
}
elseif ($menuItem == "Ecovillages")
{
	include("$ascensionTekDir/EcovillagesSubmenu.php");
}
?>

<div id="content">
