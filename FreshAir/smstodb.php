<?php

if ($_SERVER['REQUEST_METHOD']!='POST') 
{
  echo 'This script is not supposed to be viewed in a browser!';
  exit;
}

// Connecting to the database.
// Change the parameter values to the actual ones
$con = new mysqli('108.167.137.43','freshai1_root','','freshai1_smsdb');


$insert_sms_success = FALSE;

if (mysqli_connect_errno()==0)
{ // if successfully connected
  
  // date and time the message was sent in the local time zone of the computer on which SMS Enabler is running
  $sent_dt = $_POST['sc_datetime'];

  // date and time the message was sent in UTC
  // $sent_dt = $_POST['sc_datetime_utc']; 

  // text of the message
  $txt = $_POST['text']; 

  // sender's phone number
  $sender_number = $_POST['sender'];

  // important: escape string values 
  $txt = mysqli_real_escape_string($con, $txt);
  $sender_number = mysqli_real_escape_string($con, $sender_number);

  // creating an sql statement to insert the message into the SMS_IN table
  $sql="INSERT INTO SMS_IN(sms_text,sender_number,sent_dt) VALUES ('$txt','$sender_number','$sent_dt')";
  // executing the sql statement
  $insert_sms_success = mysqli_query($con,$sql);
  
  // closing the connection
  mysqli_close($con);
}

if ($insert_sms_success)
{
  // if we have succeeded to insert sms into the database 
}
else 
{  
  // if we have failed to insert sms into the database.  
  // Here you can do something upon failure to insert sms into the database.
  // For example, let SMS Enabler know an error has occured
  http_response_code(500);
}

?>