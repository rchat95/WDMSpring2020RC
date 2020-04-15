<?php
include 'connect.php';
// Check for empty fields
if(empty($_POST['uName'])      ||
   empty($_POST['email'])      ||
   empty($_POST['sub'])        ||
   empty($_POST['msg'])        ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
      echo "No arguments Provided!";
      return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['uName']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$subject = strip_tags(htmlspecialchars($_POST['sub']));
$message = strip_tags(htmlspecialchars($_POST['msg']));

$to = 'rongon95@gmail.com';
$email_subject = "Website Contact Form:  $subject - $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n";
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
function_alert("Email sent successfully!");
navigateTo("http://rxc2199.uta.cloud/assignment2_RC/contact.php");
return true;         
?>
