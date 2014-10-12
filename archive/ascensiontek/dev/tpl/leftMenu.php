<!-- SolSys Developers Menu -->
<div id="leftmenu">
<a href='<?php echo $baseUrl; ?>/index.php'>News/Home</a>
<a href='<?php echo $baseUrl; ?>/Volunteers.php'>Game Developers Wanted</a>
<a href='<?php echo $baseUrl; ?>/design/index.php'>Game Design</a>
<div id='DesignSubmenu' class='submenu'>
	<a href='<?php echo $baseUrl; ?>/design/index.php'>Overview</a>
	<a href='<?php echo $baseUrl; ?>/design/Characters.php'>Characters</a>
	<a href='<?php echo $baseUrl; ?>/design/Types.php'>Types and Subtypes</a>
	<a href='<?php echo $baseUrl; ?>/design/Genders.php'>Genders</a>
	<a href='<?php echo $baseUrl; ?>/design/Alignments.php'>Alignments</a>
	<a href='<?php echo $baseUrl; ?>/design/Proficiencies.php'>Proficiencies</a>
	<a href='<?php echo $baseUrl; ?>/design/Health.php'>Health</a>
	<a href='<?php echo $baseUrl; ?>/design/ExistingSettlements.php'>Existing Settlements</a>
	<a href='<?php echo $baseUrl; ?>/design/MindPowers.php'>Mind Powers</a>
	<a href='<?php echo $baseUrl; ?>/design/UI.php' class='todo'>User Interface</a>
	<a href='<?php echo $baseUrl; ?>/design/Movement.php'>Movement and Vehicles</a>
	<a href='<?php echo $baseUrl; ?>/design/Economics.php' class='todo'>Economics</a>
	<a href='<?php echo $baseUrl; ?>/design/Technology.php' class='todo'>Technology</a>
	<a href='<?php echo $baseUrl; ?>/design/Community.php' class='todo'>Community</a>
	<a href='<?php echo $baseUrl; ?>/design/Time.php' class='todo'>Time</a>
	<a href='<?php echo $baseUrl; ?>/design/History.php' class='todo'>History 2008-2158</a>
</div>
<a href='<?php echo $baseUrl; ?>/player/index.php'>The Player Experience</a>
<div id='PlayerSubmenu' class='submenu'>
	<a href='<?php echo $baseUrl; ?>/player/index.php'>Overview</a>
	<a href='<?php echo $baseUrl; ?>/player/Exploration.php' class='todo'>Exploration</a>
	<a href='<?php echo $baseUrl; ?>/player/Creativity.php' class='todo'>Creativity</a>
	<a href='<?php echo $baseUrl; ?>/player/Business.php' class='todo'>Business</a>
</div>
<a href='<?php echo $baseUrl; ?>/Gallery.php'>Gallery</a>
<a href='<?php echo $baseUrl; ?>/Education.php' class='todo'>Educational Aspects</a>
<a href='<?php echo $baseUrl; ?>/impl/index.php'>Implementation</a>
<div id='ImplementationSubmenu' class='submenu'>
	<a href='<?php echo $baseUrl; ?>/impl/index.php'>Overview</a>
	<a href='<?php echo $baseUrl; ?>/impl/Teams.php'>Teams</a>
	<a href='<?php echo $baseUrl; ?>/impl/Tech.php' class='todo'>Technologies</a>
	<a href='<?php echo $baseUrl; ?>/impl/Plan.php' class='todo'>Strategy</a>
	<a href='<?php echo $baseUrl; ?>/impl/Partners.php' class='todo'>Partners</a>
	<a href='<?php echo $baseUrl; ?>/impl/Org.php' class='todo'>Project Organisation</a>
</div>
<a href='<?php echo $baseUrl; ?>/biz/index.php' class='todo'>Business</a>
<div id='BusinessSubmenu' class='submenu'>
	<a href='<?php echo $baseUrl; ?>/biz/index.php' class='todo'>Overview</a>
	<a href='<?php echo $baseUrl; ?>/biz/Funding.php' class='todo'>Funding/Investment</a>
	<a href='<?php echo $baseUrl; ?>/biz/Payment.php' class='todo'>Compensation</a>
	<a href='<?php echo $baseUrl; ?>/biz/Marketing.php' class='todo'>Marketing</a>
</div>
<a href='<?php echo $baseUrl; ?>/Glossary.php'>Glossary</a>
<a href='<?php echo $baseUrl; ?>/Background.php'>Background</a>
</div>



<script language='JavaScript' type='text/javascript'>

// the $submenu variable is set in the PHP page, prior to including this file
var submenuId = '<?php echo $submenuId; ?>';
if (submenuId != '')
{
	ShowSubmenu(submenuId);
}

// functions to show/hide submenus:
function ToggleSubmenu(id)
{
	var submenu = document.getElementById(id + 'Submenu');
	if (submenu.style.display == 'block')
	{
		submenu.style.display = 'none';
	}
	else
	{
		submenu.style.display = 'block';
	}
}
function ShowSubmenu(id)
{
	document.getElementById(id + 'Submenu').style.display = 'block';
}
function HideSubmenu(id)
{
	document.getElementById(id + 'Submenu').style.display = 'none';
}

</script>