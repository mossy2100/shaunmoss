<?
session_start();
import_request_variables('p', 'x_');

if ($x_username == "shaun" && $x_pwd == "freedom35")
{
	$_SESSION['user_logged_in'] = true;
	if ($x_request_uri == "")
	{
		$x_request_uri = "person_list.php";
	}	
	header("Location:$x_request_uri");
}
else
{
	$_SESSION['user_logged_in'] = false;
	print("You were not successfully logged in.");
}

?>