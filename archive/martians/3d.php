<?php
include("tpl/templateTop.php");
?>

<h2>3D Graphics</h2>

<p>What is the best way to implement the first-person 3D interface?  This question has not been answered yet.

<h5>Options</h5>
<ol>
<li>C++
<li>Java
<li>C#
<li>Flash
<li>VRML
</ol>

<h5>C++/CrystalSpace</h5>

<p>This is currently my favourite option.  CrystalSpace is an Open Source 3D graphics engine ideal for games.  Choosing this option would mean the game would have to be written in C++ (check this).  The main benefits are that (a) because CrystalSpace is Open Source, it's free; (b) it's almost certainly faster than the alternatives.  One disadvantage is that a client application will have to be written, as opposed to running the game inside a browser.  However this may be a blessing as we will then not be constrained by the limitations of a browser (security restrictions, interface restrictions, etc.).   It may be more complex to make the game run on different platforms (I believe we should endeavor to produce 3 versions - Windows, Linux, and Mac, in that order).  More research is required.

<h5>Java 3D</h5>

<p>Using Java 3D requires that the game be written in Java. Using Java solves the problem of making the game multi-platform.  However Java itself may be too slow for a complex application like this.  If there is already an OS networking engine or game engine available in Java then this option will be more appealing.  More research is required.

<h5>Flash 3D</h5>

<p>I suspect that this will not be ideal.  I'm not sure what type of texture-support is available in Flash.  One benefit may be that the game can run in a browser.  More research is required.

<h5>VRML</h5>

<p>My experience with VRML is that the interface is fairly slow and un-responsive, even with simple models, let alone huge virtual worlds.  The benefit is that VRML is an open standard, and the game may run in a browser.</p>


<?php
include("tpl/templateBottom.php");
?>
