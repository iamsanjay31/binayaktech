<?php 
if($_POST)
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  $to = "info@binayaktech.com";
  $subject = "Inquiry from website";

  $txt = "Name: $name <br> Email : $email <br> Phone : $phone <br> Message: $message";

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= "From: $email" . "\r\n";
  session_start();
  if(mail($to,$subject,$txt,$headers))
  {
    $_SESSION['msg'] = 'Email Sent';
  	header('location: index.php');
  }
  else
  {
  	$_SESSION['msg'] = 'Email Not Sent';
  	header('location: index.php');
  }
}
?>