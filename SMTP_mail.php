<?php
require_once "Mail.php";

$from = "<Sender@xxxxxx.com>";
$to = "<Yourmail@xxxxxx.com>";
$subject =  $_REQUEST['subject'];

$email= $_REQUEST['email'];
$name = $_REQUEST['name'];

$message = $_REQUEST['message'];
  
$headers = array ('From' => $email,
  'To' => $to,
  'Subject' => $subject);
 

$body  = "Sender name:   \t{$name}\n";
$body .= "Sender e-mail:  \t{$email}\n";
$body .= "Message:\t{$message}";
 

$host = "your_smtp_hostname";
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
