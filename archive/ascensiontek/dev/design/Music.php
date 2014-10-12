<?php
$title = 'Music';
$submenuId = 'Design';
require "../inc/init.php";
require "../tpl/top.php";
?>


<pre>

Music Requirements

Music can be attached to any region or geographical object in the VE, for example, a desert, a forest, a mountain, a city, a base, a river, a building, a region in open space, a space station, etc.  Whichever geographical element dominates, that's the music that the Player will be hearing.

Eventually we will write a full "Music Engine" that creates unique music by combining musical elements and instruments that depend on the Player's location and the weather at that location.

The purpose of the music is to create a *much* more beautiful and enjoyable environment for the Player.  Many Players will want to stay online for hours playing this game because they're having so much fun, and also enjoying the music.


Music Needed
============

Need a loop for different kinds of terrain: desert, tundra, ocean, mountain, beach, forest, woods, river, etc.

Need a bunch of different songs for Brisbane, Billabong and Valhalla.  

The engine will smoothly mix from one track to the next when the Player enters a new environment.

Music is also dependent on weather.  If it's rainy or cloudy then the music becomes heavier and more sombre; if it's sunny and warm, then the music will be light and upbeat.  If it's a sunny arvo with a light breeze, then, party music (they party a LOT in the future - and no matter what time it is, you know that somewhere on Earth it's a sunny afternoon - and it takes less than a minute to travel anywhere on Earth, in a spacecar).


</pre>

<?php
require "../tpl/bottom.php";
?>