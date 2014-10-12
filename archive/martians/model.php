<?
include("tpl/templateTop.php");
?>

<h3>The Model</h3>

<p>The game takes place in a 4D virtual-reality model of Mars.  The goal is to make this model as realistic as possible to enhance the feeling of being on Mars.  I say "4D" because this is a model which changes over time, in accordance with orbital and weather algorithms.

<h4>3D Graphics</h4>

<p>The actual shape of the Martian landscape, its topography, can be created using MOLA data.  This has been done before, by Adrian Lark, NASA programmers and others.  Also, using the colour images taken by the MOC (Mars Orbital Camera) can be used to give the landscape realistic colours.

<p>The MOLA data is accurate to a resolution of metres, which is very good, however, players will be close to the ground so it may be necessary to give a certain "roughness" to the terrain to make it look realistic.  This can be done using fractal mathematics to generate the small-scale terrain details.


<p>What is the best option for drawing the 3D graphics?  This question has not been answered yet.

<h5>Options</h5>
<ol>
<li>C++/CrystalSpace
<li>Java 3D
<li>Flash 3D
<li>VRML
</ol>

<h5>C++/CrystalSpace</h5>

<p>This is currently my favourite option.  CrystalSpace is an Open Source 3D graphics engine ideal for games.  Choosing this option would mean the game would have to be written in C++ (check this).  The main benefits are that (a) because CrystalSpace is Open Source, it's free; (b) it's almost certainly faster than the alternatives.  One disadvantage is that a client application will have to be written, as opposed to running the game inside a browser.  However this may be a blessing as we will then not be constrained by the limitations of a browser (security restrictions, interface restrictions, etc.).   It may be more complex to make the game run on different platforms (I believe we should endeavor to produce 3 versions - Windows, Linux, and Mac, in that order).  More research is required.

<h5>Java 3D</h5>

<p>Using Java 3D requires that the game be written in Java. Using Java solves the problem of making the game multi-platform.  However Java itself may be too slow for a complex application like this.  If there is already an OS networking engine or game engine available in Java then this option will be more appealing.  More research is required.

<h5>Flash 3D</h5>

<p>I suspect that this will not be ideal.  I'm not sure what type of texture-support is available in Flash.  One benefit may be that the game can run in a browser.  More research is required.

<h5>VRML</h5>

<p>My experience with VRML is that the interface is fairly slow and un-responsive, even with simple models, let alone huge virtual worlds.  The benefit is that VRML is an open standard, and the game may run in a browser.


<h4>Weather</h4>

<p>To add realism to the game, it is necessary to simulate Mars's weather as part of the model.  Mars is subject to the following elements of weather:
<ul>
<li>seasons
<li>temperature
<li>barometric pressure
<li>wind-speed
<li>clouds
<li>dust-storms
<li>meteorite showers
</ul>

<p>Information about current or predicted weather can be accessed through the mini-browser, and the wristpad can show things like current temperature and pressure.

<p>Weather affects the 3D view - if there is currently a dust-storm in your area than vision will be partially or wholly obscured.  Cloud cover can reduce lighting levels.  Wind-speed may affect vehicle movement (wind can reach very high speeds on Mars).

<p>Meteorite showers can also potentially be a cause of problems on Mars.  Although showers are infrequent, with Mars's thin atmosphere many more meteorites hit the surface than on Earth, as is evidenced by the heavily cratered surface.  If a meteorite hits a tent or a dome then a breach or rupture can occur which could be very dangerous for any players under it.  The size of the meteorites, and the location and timing of impacts, would have to be determined by some random algorithm.  Considering how infrequent they are and how unlikely it is that a meteorite would hit a base or a player, it may not be worthwhile including this feature.

<p><a href='http://vmwx.com'>Steve Heaton's Mars weather simulation</a>.


<h2>Time</h2>

<p>The simplest way of implementing game time would be something like <b>Mars/game time = Earth/real time + 50 years</b>, with one day of game time passing for each day of Earth time.

<p>Naturally, night-time cause the 3D view to appear dark.  This would be incorporated with the weather algorithms - a clear night on Mars would still provide some light, from the stars or the moons (Phobos and Deimos); but a cloudy night, or a night during a dust storm, would be very dark.

<p>Regarding a Martian calendar, this is a subject I have researched in considerable detail.  I have developed my own Martian calendar known as the <a href='../calendar'>Kepler Calendar</a>.



<h2>Physics</h2>

<p>It will be necessary to incorporate a physics engine into the model.  This is mainly related to how players move around in the game.  For example, when walking in Martian gravity (0.38g), a person will move differently than on Earth.  Also, if they walk off a cliff then they will fall to Mars slower than if they fell over a similar cliff on Earth.  People will be able to jump higher, climb more easily, and so on.

<p>Physics is also necessary to control the behavious of ground vehicles such as rovers and air vehicles such as planes, helicopters and balloons.

</p>


<?
include("tpl/templateBottom.php");
?>
