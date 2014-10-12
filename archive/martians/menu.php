<?
$menuItems = array(
	'Overview' => 'index.php',
	'Concept History' => 'history.php',
	'Marketability' => 'marketing.php',
	'A Peaceful Game' => 'peace.php',
	'Open Source' => 'strategy.php',
	'Future Development' => 'future.php',
	'The Story So Far' => 'story.php',
	'Technology' => 'tech.php',
	'Government' => 'gov.php',
	'Money' => 'money.php',
	'Collectives' => 'collectives.php',
	'Base-building' => 'bases.php',
	'Communications' => 'comms.php',
	'Movement' => 'movement.php',
	'Health' => 'health.php',
	'Terraforming' => 'terraforming.php',
	'Model' => 'model.php',
	'User Interface' => 'ui.php',
	'Chemistry' => 'chem.php', 
);

$links = array();
$currentPage = basename($_SERVER['PHP_SELF']);
foreach ($menuItems as $label => $page)
{
	$links[] = $page == $currentPage ? "<span id='current'>$label</span>" : "<a href='$page'>$label</a>";
}
print implode(" &nbsp;-&nbsp; ", $links);
?>
