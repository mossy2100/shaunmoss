<?php
session_start();

// make sure the user is logged in:
if (!$_SESSION['user_logged_in'])
{
	$request_uri = urlencode($_SERVER['REQUEST_URI']);
	header("Location:login_form.php?request_uri=$request_uri");
}
?>
