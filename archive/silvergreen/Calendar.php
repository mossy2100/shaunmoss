<?
include("include/init.php");
$title = "Silvergreen - Home";
$menuItem = "Home";
include("tpl/templateTop.php");
?>

<h1>Silvergreen Calendar </h1>
<p>&nbsp;</p>
<h2>Next Meeting</h2>
<p><strong>Please Note:</strong> the community meeting
	which was scheduled for Saturday, 15 September
	2007 at Spiral has been <strong>cancelled</strong>.&nbsp; A
	new meeting time and date has not been set yet.&nbsp; The
	core team has decided they want to prepare further
	before holding another community meeting.&nbsp; If
	you would like to participate in core group meetings,
	please <a class='int' href="<?= htmlEntitiesAll("mailto:shaun@ascensiontek.com") ?>">contact
	Russell Austerberry</a>.&nbsp; Because of my work
	commitments, Russell has taken over as project
	leader.</p>
<p>&nbsp;</p>
<hr>
<p>&nbsp;</p>
<h3>Past Meetings</h3>
<p><a href="Meeting2007-08-19.php">19 August 2007 at Shaun's place</a></p>
<p>&nbsp; </p>
<p>&nbsp;</p>
<?
include("tpl/templateBottom.php");
?>