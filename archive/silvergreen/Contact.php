<?php
include("include/init.php");
$title = "Silvergreen - Contact Info";
$menuItem = "Contact";
include("tpl/templateTop.php");
?>

<h1>Contact Info </h1>

<table id='contact' border="0" cellspacing="0" cellpadding="5">
	<tr>
		<th valign="top"><div align="right">Email</div></th>
		<td valign="top"><a class='int' href="<?= htmlEntitiesAll("mailto:shaun@ascensiontek.com") ?>"><?= htmlEntitiesAll("shaun@ascensiontek.com") ?></a></td>
	</tr>
	<tr>
		<th valign='top'><div align="right">Telephone</div></th>
		<td valign="top"><strong>(07) 3892 1501</strong></td>
	</tr>
	<tr>
		<th valign="top"><div align="right">Mobile/SMS</div></th>
		<td valign="top"><strong>0405 478912</strong></td>
	</tr>
	<tr>
		<th valign="top"><div align="right">Address </div></th>
		<td valign="top"> 4/105 Waverley St,
			Annerley, QLD 4103,
			AUSTRALIA		</td>
	</tr>
	<tr>
		<th valign="top"><div align="right">Yahoo Messenger </div></th>
		<td valign="top">shaunmoss</td>
	</tr>
	<tr>
		<th valign="top"><div align="right">MSN Messenger </div></th>
		<td valign="top"><?= htmlEntitiesAll("shaunmoss@yahoo.com.au") ?></td>
	</tr>
	<tr>
		<th valign="top"><div align="right">Skype</div></th>
		<td valign="top">shaun.moss1</td>
	</tr>
</table>


<p>&nbsp;</p>
<p>&nbsp;</p>


<?php
include("tpl/templateBottom.php");
?>
