<?php
$title = 'Welcome';
require "inc/init.php";
require "tpl/top.php";
?>


<pre class='important'>
This website is just new, and largely incomplete!  Please check back often.

Last updated: 9:30 17-Dec-2007.  See: <a href='design/Characters.php'>Characters</a>, <a
	href='design/Genders.php'>Genders</a>
</pre>

<br>

<h1>Welcome to SolSys</h1>

<p>SolSys is a new game based on colonisation of the Solar System, 150 years into the future. You
have found the developers' website (which is pretty much all there is at this stage :)</p>

<p><a href='jobs.php'>Volunteer developers wanted</a></p>


<p>This website is just new, launched 16-Dec-2007. I will try to explain the game concept as clearly
as possible on this website, and we will produce some strategies for building it.</p>

<p>Enjoy the site. If you have any questions about the project, just <a
	href='<?= htmlEntitiesAll("mailto:shaunmoss@yahoo.com.au") ?>'>email me</a>.</p>

<br>


<h2>News</h2>

<h3>SolSys Developers meetup: 2007-12-16 14:00 @ 4/105 Waverley St, Annerley</h3>

<p>We are having our first SolSys Developers meetup at my place (4/105 Waverley St, Annerley,
Brisbane, Queensland, Australia, Earth) at 2pm on Sunday 16th-Dec-2007. Please feel welcome to join
us if you are interested in this project. We will need all kinds of people to build this game,
including programmers, graphic designers, 3d modellers, musicians, scientists and engineers.</p>

<p>This meetup is different from our BIGD (Brisbane Indie Game Developers) meetup, which is at 12pm
on the first Saturday of each month at Wordsmith's Cafe, UQ.</p>


<?php
require "tpl/bottom.php";
?>