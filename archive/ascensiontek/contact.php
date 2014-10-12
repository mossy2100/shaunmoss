<?
include("include/init.php");
$title = "AscensionTek - Contact Info";
$menuItem = "Contact";
include("tpl/templateTop.php");
?>

<h1>Contact Info </h1>

<p>Please feel free to contact me.&nbsp;  I'm interested
	in talking to anyone who wants to make the Solar
	System a better place to live.</p>
<p>If you have any information on new developments
	in clean energy or water purification technologies,
	healing, robotics, metallurgy or new physics (i.e.
	levitational propulsion, gravity control, zero-point
	energy), I would love to hear about it.</p>
<br />
<table id='contact' width="580" border="0" cellspacing="0" cellpadding="5">
	<tr>
		<th width="130" valign="top"><div align="right">Email</div></th>
		<td width="450" valign="top"><a class='int' href="<?= htmlEntitiesAll("mailto:shaun@astromultimedia.com") ?>"><?= htmlEntitiesAll("shaun@astromultimedia.com") ?></a></td>
	</tr>
	<tr>
		<th valign="top"><div align="right">Mobile/SMS</div></th>
		<td valign="top">
		Try <strong>0403 4704596</strong> (international <strong>+61 403 4704596</strong>) if I'm in Australia,
    or <strong>0842 405437</strong> (international <strong>+66 842 405437</strong>) if I'm in Thailand.<br>
    Skype is best.
	</tr>
	<tr>
		<th valign="top"><div align="right">Skype</div></th>
		<td valign="top">mossy2100</td>
	</tr>
</table>


<p>&nbsp;</p>
<p>&nbsp;</p>


<?
include("tpl/templateBottom.php");
?>
