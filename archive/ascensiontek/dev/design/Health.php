<?php
$title = 'Health';
$submenuId = 'Design';
require "../inc/init.php";
require "../tpl/top.php";
?>

<h1>Health</h1>

<p>
Every character in the game has a certain degree of Health.  This is usually pretty high due to advanced health and safety techniques used in SolSys society, which included an abundant supply of high-quality food, water and air in most Settlements.
</p>

<br>

<h2>Attributes</h2>

<p>
A character's health is represented by 4 numbers: <b>Health</b> (their overall health) plus the three "Vitals": <b>Air</b>, <b>Water</b> and <b>Food</b>. <b>Note that Vitals do not generally apply to Androids.</b>
</p>

<p>
<b>Health</b>: This is the avatar's overall physical health, which can range from 0% (dead) to 100% (fully healthy).  [Alternately, we may go for a "hit points" style system, where a character's hit points are related to their type and attributes, and may increase over time.]
</p>

<p>
<b>Air</b>: If on the surface of Earth, or in a moonbase, marsbase or aerospace vehicle with a functional ECS (Environment Control System), then a Player's Air level remains more-or-less full.  It declines fairly rapidly when underwater, in a non-oxygenated atmosphere such as the atmosphere of Mars, or in a low-pressure environment such as the vacuum of space (other damage effects would also be at work).  Variations in combinations of gases may qualify as air for a particular type, e.g. a Human can safely breathe pure oxygen, or oxygen mixed with nitrogen and/or argon in various ratios.  Some types of ETs do not breath oxygenated air (e.g. Repterrians breathe sulphur dioxide), so for them "Air" does not refer to Earth-like air.  <b>A full supply of Air will last about 3 minutes.  </b>
</p>

<p>
<b>Water</b>: This attribute refers to an avatar's hydration level.  All biological life forms need access to Water.  An avatar's Water level decreases at a steady rate, depending on how much exercise they are doing.  If the avatar is standing or sitting still, or flying a ship, then the Water level goes down slowly.  When walking, it drops faster, and if they run or climb then it drops even faster.  If the avatar is in a Settlement, Vehicle or Spacesuit, then it is assumed that the avatar automatically takes a drink of water (250mL by default, customizable) once their water level reaches about 75% (customizable).  The water supply of the Settlement, Vehicle or Spacesuit automatically decreases by that amount.  Generally, a Player does not have to give any special command (e.g. "drink 200mL water" - see <a href='Commands.php'>Commands</a>) in order to drink water - it's automatic.  However, they can give such a command if they want to, and in fact they must give a command to drink other things such as beer).  (<b>NOTE</b> - drinking beer or coffee increases Water level, but also increases the rate at which the avatar's Water level decreases.)  <b>A full supply of Water will last about 1 day.</b>
</p>

<p>
<b>Food</b>: This attribute refers to the avatar's energy level, and operates in much the same way as Water.  An avatar's Food level decreases at a rate proportional to the intensity of the avatar's activity.  If the avatar is somewhere like a Settlement, Vehicle or Spacesuit that has a Food supply, then a certain amount of Food will be automatically subtracted from that supply whenever it drops to a certain level.  The avatar's Food level then goes up.  Again, the amount of Food consumed and the level at which consumption is automatically triggered is customizable.  The Player can also manually give commands at any time such as "eat food", "eat cake", etc.  <b>A full supply of food will last about 3 days.</b>
</p>

<br>

<h2>Damage</h2>

<p>
Damage refers to a drop in Health.  e.g. if an event occurs that causes a Player's Health to drop from 100% to 95%, then we say that 5 points of damage were taken.  There are several ways that a Player's avatar can sustain damage:
</p>
<br>


<h3>1. Zero Vitals</h3>
<p>
Once any Vital reaches 0, the avatar's Health begins to decrease.  If more than one Vital reaches 0, then Health drops faster.  This effect ceases as soon as the avatar restores all Vitals to above 0 again.  <b>NOTE</b>: Androids do not sustain damage in this way.
</p>

<p>
All deaths are recorded in the <b>SolSys Births and Deaths Registry</b>, which is accessible online.  Depending on which Vital is depleted first, the death will be recorded as <i>Asphyxiation</i>, <i>Dehydration</i>, or <i>Starvation</i>.
</p>
<br>

<h3>2. From the Space Environment</h3>
<p>
Space is a dangerous environment, and Humans in particular can get hurt.  It is possible to be irradiated, cooked or frozen on Luna, poisoned and irradiated on Mars, squished, cooked <i>and</i> poisoned on Venus, or burst in the vacuum of space.  Hence, Humans always need to have an appropriate spacesuit to access these environments - fortunately they are readily available.
</p>

<p>
ETs can also be harmed by the space environment, however, being genetically more evolved than Humans, they are able to survive in a much wider range of environments such as extremes of temperature and pressure.  Androids can typically survive in an even wider range of environments, including the vacuum of space, and are the least likely to become damaged in this way.  
</p>

<p>
The amount of damage incurred depends on the temperature, pressure, radiation levels and atmospheric constituents of the environment that the avatar has been exposed to, and their own tolerances.  Reasons for death caused by the space environment include: <i>Frozen</i>, <i>Burned</i>, <i>Irradiated</i>, or <i>Burst</i>.
</p>
<br>

<h3>3. From Collision</h3>
<p>
Avatar's can also be damaged by collisions, e.g. caused by falling from a height.  The amount of Damage suffered depends on the velocity of the impact.  Since impact velocity is usually dependent on the gravity level, this type of Damage is less common on Luna or in space, and more common on Earth, Mars and Venus .  All types of avatars can suffer Damage in this way.
</p>
<br>

<h3>4. From Combat</h3>

<p>
Avatars can also be damaged by weapons in combat.  Combat in SolSys is rare, as society has largely progressed beyond the use of violence as a solution to problems. (see <a href='Combat.php'>Combat</a>)</p>


<br />

<?php
require "../tpl/bottom.php";
?>