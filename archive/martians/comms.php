<?php
include("tpl/templateTop.php");
?>

<h2>Communications</h2>

<p>Communications is experienced through a chat interface.  There are a number of channels that can be selected (e.g. 256), and each channel hosts a number of players who can all chat with each other like a conference call.  The players on that channel are listed down the right-hand side (like in IRC).

<p>Some channels are text-based and others are audio-based (for players with microphones).  Or, they could all be both text- and audio-based (like a Yahoo chat) -audio can be turned on or off.  I would encourage every player to use a microphone.


<h4>Basic commands</h4>

<p><b>\off</b><br>
This turns off the chat interface - the player is then on no channel.  (Emergency/special announcements from the game controllers still appear).

<p><b>\on</b><br>
This turns on the chat interface.  The previously selected channel is opened.  If this is the first time using the chat, then channel 1 (newbie channel) is opened.<br><br>

<p><b>\select XXX</b><br>
This switches to channel XXX.

<p><b>\select private</b><br>
Opens the player's private channel (every player has one).  The player can invite people to it, or kick people off it.  Other players cannot select this channel.

<p><b>\locate player_name</b><br>
This returns a string such as "player_name is on channel XXX" or "player_name is on no channel" or "player_name is not online"

<p><b>\invite player_name</b><br>
This shows text such as "Shaun is inviting you to switch to channel XXX" or "Shaun is inviting you to switch to his private channel" on player_name's chat screen.  They can choose [yes][no] or invite you to their channel.


<h4>Special channels</h4>

<p><b>Channel 0</b> is the emergency channel.  Select this if you are about to run out of O<sub>2</sub> or H<sub>2</sub>O and are stuck in the middle of nowhere.

<p><b>Channel 1</b> is the newbie channel.  Go here if you don't know what to do.




</p>


<?php
include("tpl/templateBottom.php");
?>
