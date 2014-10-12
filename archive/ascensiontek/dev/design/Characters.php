<?php
$title = "Characters";
$submenuId = "Design";
require "../inc/init.php";
require "../tpl/top.php";
?>

<h1>Characters</h1>

<h2>Character Creation</h2>

<pre>
Players create their characters by specifying parameters such as <a href='Types.php'>type and subtype</a>, <a href='Genders.php'>gender</a>, <a href='Attributes.php'>attributes</a> and specifying a <a href='Professions.php'>profession</a>.  This is somewhat similar to D&D and other RPGs, although perhaps simpler.  Within SolSys, Players have much more flexiblity with developing their characters, and there are much fewer constraints on behaviour, abilities, possessions, etc.
</pre>

<br>


<h2>Player Characters and Non-Player Characters</h2>

<pre>
Within SolSys, there are two types of Characters: Player Characters, and Non-Player Characters (NPCs).  Player Characters are controlled by real Humans (the Players), whereas NPCs are controlled by AI scripts.

The Player Characters are the wealthy, powerful, intelligent and creative members of the SolSys community, really the only citizens that have the funds and reasons to purchase spaceships, explore SolSys, start businesses, participate in planetary governments, etc.

NPCs can be useful to a PC in many ways:

	(a) A PC may be able to purchase items from an NPC, e.g. from a shop or over the Net.
	(b) An NPC can sometimes have useful information.
	(c) NPCs provide a market for products.

However, they also consume resources such as Food and Water, hence NPC populations are an important consideration for Base Managers.

A Settlement's population is comprised of both PCs and NPCs, and will vary according to the living conditions.  i.e. if the living conditions are particularly good (plenty of space, good business opportunities, plenty of food, water, babes etc.), then the population will automatically increase.  NPCs will be spawned as required, and presumably the PC population will increase as well.

On the other hand, if conditions worsen due to lack of supplies, warfare, etc., then a Settlement's population will automatically decrease.
</pre>


<br>

<h2>Character Codes</h2>

<pre>
Character codes are used to provide a small amount of information about a character in a very concise way, which can be useful in things like noticeboards, comms channels, forums, etc.

A character code is comprised of one letter for the character's gender (M, F, A), one for the type (H, A, E), and one for the subtype (varies with type).

Examples:
	MHM = Male Human Martian
	AAM = Androgynous Android Mechanic
	FES = Female ET Sirian
	AEZ = Androgynous ET Zeta

Where appropriate, the character code appears with a character's name, e.g. "Xentaur (MHM)"

(see <a href='Types.php'>Types</a> and <a href='Genders.php'>Genders</a> for more information)
</pre>

<?php
require "../tpl/bottom.php";
?>