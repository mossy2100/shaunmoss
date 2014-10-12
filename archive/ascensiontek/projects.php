<?
include("include/init.php");
$title = "AscensionTek - Projects";
$menuItem = "Projects";
include("tpl/templateTop.php");
?>

<h1>Projects</h1>

<table width="100%" border="0" cellspacing="0" cellpadding="20">
<!--
	<tr>
		<th width="25%" scope="row" align="left"><a href="<?= $SilvergreenUrl ?>"><img src="images/Silvergreen300.jpg" alt="Silvergreen" width="300" height="69" border="0"></a></th>
		<td width="75%">Silvergreen will be located just
			west of Brisbane, in Queensland, Australia,
			and is the first of many ecovillages to
			be constructed over the next 100 years.&nbsp; <a href="<?= $SilvergreenUrl ?>">More...</a> </td>
	</tr> -->
	<tr>
		<th scope="row" align="left"><a href="<?php echo $smUrl; ?>/articles/ICE.php"><img
			src="images/ICE300.jpg" alt="ICE" width="300" height="146" border="0"></a></th>
		<td>ICE - &quot;The Institute for Colonisation and
			Exploration&quot;
			- is a space-age facility in Antarctica,
			designed as both a moonbase and marsbase
			analogue, and also as a 21st century educational
			and research facility dedicated to space
			development and global Earth environmental
			management.&nbsp; <a href="<?php echo $smUrl; ?>/articles/ICE.php">More...</a> </td>
	</tr>
	<tr>
		<th scope="row" align="left"><a href="<?php echo $smUrl; ?>/articles/Billabong.php"><img
			src="images/Billabong300.jpg" alt="Billabong" border="0"></a></th>
		<td>Billabong will be our first moonbase, located
			at Malapert Mountain at the lunar south
			pole.&nbsp; It is a combination of tourist
			resort, mining community and scientific
			research station.&nbsp; <a href="<?php echo $smUrl; ?>/articles/Billabong.php">More...</a> </td>
	</tr>
	<!--
	<tr>
		<th scope="row"><div align="left"><img src="images/Valhalla300.jpg" alt="Billabong" width="300" height="67"></div></th>
		<td>Valhalla is an ambitious marsbase and small-scale
			terraforming project, to be located at Olympus Mons.</td>
	</tr> -->
</table>
<h3>&nbsp;</h3>
<p>&nbsp;</p>
<?
include("tpl/templateBottom.php");
?>