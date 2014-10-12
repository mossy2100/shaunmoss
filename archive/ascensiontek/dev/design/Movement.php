<?php
$title = 'Exploration';
$submenuId = 'Design';
require "../inc/init.php";
require "../tpl/top.php";
?>

<h1>Movement and Travel In SolSys</h1>

<pre>
One of the major aspects of SolSys is exploration, and our goal is to provide various incentives for Players to explore the virtual environment.  There are several methods for moving around in SolSys:

1.  Walking.  This can be with or without a <a href='Spacesuits.php'>spacesuit</a>.
2.  Running.  Same as walking except at double speed (consumes Air and Water at double rate - see <a href='Health.php'>Health</a>)
2.  Climbing.  Players can climb steep or vertical cliff walls.  This consumes water and food at a faster rate than normal, depending on the gravity level.
3.  Driving.  There are a number of ground-based vehicles available for driving, although this is much less common than flying and there are few roads.  Vehicles include rovers (pressurized or unpressurized), ATVs, or electric cars.
4.  Flying an aerospace vehicle.  There is a wide range of vehicles in SolSys, including spacecars, spacebikes and many kinds of spaceships.  Some are rated for atmosphere-only, some are ideal for Earth-Moon trips, others are suited for interplanetary travel.  Advanced ships are interdimensional and can move at superluminary (faster than light) speed.  (see <a href='Vehicles.php'>Vehicles</a>)
5.  Levitating.  Some types of ETs can levitate; other types, as well as Humans, can obtain a levitation harness.  Androids can have levitational capabilities installed.  This enables the Player to move around in 3 dimensions.  Being able to levitate becomes more useful in low gravity environments where walking is impractical.
6.  Flying with wings.  This is usually reserved for low gravity sports in pressurized environments, where Players can strap on wings and fly like birds.
</pre>


<h2>Space Travel</h2>

<pre>
Space travel is extremely common, and very advanced.  The speed of light is no longer considered any kind of barrier to velocity, and modern space vehicles can approach the speed of thought.  The speed of thought was successfully measured in 2033 to be approximately 50Gm/s.  The standard symbol is 'b'.

[Aside: distances and velocities within SolSys are usually expressed in terms of "megametres" (1Mm = 1,000km), "gigametres" (1Gm = 1,000Mm), and "teramatres" (1Tm = 1,000Gm)]

Space travel in SolSys is comprised of consistent acceleration for half the distance, then constant and equal deceleration for the second half, so that the spacecraft arrives with a controlled velocity.  Ships are generally rated according to their maximum acceleration; a good ship will have a maximum acceleration (a) of up to 50Mm/<sup>2</sup>.

<b>Typical calculations for a spacecraft with a=50Mm/s<sup>2</sup></b>
</pre>

<br />


<table border='1' bordercolor='red' style='border-collapse:collapse' cellpadding="5" cellspacing="0">
<tr>
<th>Journey</th>
<th>Distance</th>
<th>Travel time</th>
<th>Maximum velocity</th>
</tr>
<tr>
<td>Earth - Luna</td>
<td>385Mm</td>
<td>6 seconds</td>
<td>139Mm/s = b/360</td>
</tr>
<tr>
<td>Sol - Mars</td>
<td>228Gm</td>
<td>135 seconds = 2.25 minutes</td>
<td>3.4Gm/s = b/15</td>
</tr>
<tr>
<td>Sol - Pluto</td>
<td>6Tm</td>
<td>700 seconds = 12 minutes</td>
<td>17Gm/s = b/3</td>
</tr>
</table>


<?php
require "../tpl/bottom.php";
?>