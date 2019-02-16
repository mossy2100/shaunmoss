<?php
// process the Silvergreen form:

include("include/init.php");
include("include/opendb.php");

import_request_variables("p");

// prepare database fields:
if (!get_magic_quotes_gpc()) {
  $name = mysql_escape_string($name);
  $email_address = mysql_escape_string($email_address);
}

// Silvergreen Updates:
$mailing_list_id = 2;

// check and see if this email address is already in the subscribers table:
$sql = "select * from person where email_address='$email_address'";
$rs = mysql_query($sql);
$subscribeThem = FALSE;
if (mysql_num_rows($rs) == 0) {
//	print("email address not found; ");
  // this person is not in the database yet, insert it:
  $sql = "insert into person (email_address, name) values ('$email_address', '$name')";
  mysql_query($sql);
  $person_id = mysql_insert_id();
  $subscribeThem = TRUE;
//	print("email added subscriber_id=$subscriber_id; ");
}
else {
  // this email address is already in the db
//	print("email found; ");
  $rec = mysql_fetch_assoc($rs);
  $person_id = $rec['id'];
  // update their name:
  $sql = "update person set name='$name' where id='$subscriber_id'";
  mysql_query($sql);
  // let's see if they're subscribed to this newsletter:
  $sql = "select * from person_mailing_list where person_id=$person_id and mailing_list_id=$mailing_list_id";
  $rs = mysql_query($sql);
  if (mysql_num_rows($rs) == 0) {
//		print("not subscribed; ");
    // they aren't subscribed to this newsletter yet:
    $subscribeThem = TRUE;
//		print("subscribeThem = true; ");
  }
}

$subscribedOk = FALSE;
if ($subscribeThem) {
//	print("subscribing user; ");
  // enter the new subscriber:
  $sql = "insert into person_mailing_list (person_id, mailing_list_id) values ($person_id, $mailing_list_id)";
  if (mysql_query($sql)) {
    $subscribedOk = TRUE;
//		print("subscribedOk; ");

    // send an email to me:
    $subject = "";
    $body = "Someone has filled in the Silvergreen Sign-up form:\r\n\r\n";
    $body .= "Name: " . stripslashes($name) . "\r\n";
    $body .= "Email: " . stripslashes($email_address) . "\r\n";
    $body .= "Message: " . stripslashes($message) . "\r\n";
    mail("shaun@astromultimedia.com", $subject, $body);
  }
}

// rock on:
header("Location: SignupFormComplete.php");
