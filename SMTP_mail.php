<?php
require_once "Mail.php";

$from = "<Sender@xxxxxx.com>";
$to = "<Yourmail@xxxxxx.com>";
$subject =  $_REQUEST['subject'];

$= $_REQUEST['email'];
$name = $_REQUEST['name'];


$message = $_REQUEST['message'];
  
 $headers = array ('From' => $email,
  'To' => $to,
  'Subject' => $subject);
 

$body .= "Name:   \t{$name}\n";
$body .= "Email:  \t{$email}\n";
$body .= "Subject:\t{$subject}\n";
$body .= "Message:\t{$message}";
 

$host = "your_smtp_host";
$username = "smtp_username";
$password = "smtp_password";

$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));
$mail = $smtp->send($to, $headers, $body);
if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
 } else {
  echo("<p>Message successfully sent!</p>");
 }
?>
