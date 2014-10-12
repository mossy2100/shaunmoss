<?
include("include/init.php");
$title = "AscensionTek - Software and Science Fiction";
$menuItem = "Home";
include("tpl/templateTop.php");
?>

<h1>Welcome to AscensionTek</h1>

<p>You've reached the website of AscensionTek, a research and
development company based in Queensland, Australia.  The company specializes in
several main areas:</p>

<ol>
	<li>Software development, especially:
	<ol type='a'>
		<li>Dynamic websites and web-based software built using PHP, JavaScript, Flash and MySQL</li>
		<li>Cross-platform desktop applications built using Java</li>
		<li>The computer game/virtual environment <a
			href='http://www.solsys.net.au'>SolSys</a></li>
	</ol>
	</li>
	<li>Writing non-fi and sci-fi books, e-books and articles about the future.</li>
	<li>Design of space colonies.</li>
	<li>Research into extraterrestrials and their technology.</li>
</ol>

<p>
AscensionTek is created by Shaun Moss (that's me).  The company is not 
"operational" as yet, but in a transitional/preparatory phase.  My current strategy is
to continue to express and develop ideas, especially SolSys,
until I can attract sufficient investment to establish a premises and
recruit a team.  The goal is to reach this stage within the next 6 months (by June 2008).
  <a href='bizplan.php'>More about the business plan.</a>
</p>

<p>The long-term plan for the company is to built it up over the coming decades
with the goal of becoming a major contributor in several areas:</p>

<ol>
	<li>Virtual reality and community software</li>
	<li>Robotics and artificial intelligence</li>
	<li>Develop sci-fi movies and internet TV shows about the future</li>
	<li>Sustainable property development</li>
	<li>Metals production</li>
	<li>Space simulation, design and development</li>
</ol>

<br />

<p align='center' id='SolSysBanner'><a
	href='http://www.solsys.net.au'><img
	src='<?= $baseUrl ?>/images/SolSys-banner.jpg' border='0'></a><br />
<a
	href='http://www.solsys.net.au'>SolSys</a> is currently my most important project, due for delivery in
2009. It is a MMORPG (Massively Multi=player Online Role-playing Game)
and VE (Virtual Environment) in which the players explore and
participate in colonisation of the Solar System. <a
	href='http://dev.solsys.net.au'>Visit the developer's website.</a></p>

<?
include("tpl/templateBottom.php");
?>