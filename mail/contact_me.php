<?php
require '../../lib/PHPMailerAutoload.php';

$mail = new PHPMailer();


// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = "Qimin Liu <liuqimin323@hotmail.com>"; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "[HIRE] $name wants to hire you";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@qiminl.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	


$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "liuqimin323@gmail.com";  // SMTP username
$mail->Password = "Love1115"; // SMTP password


$mail->From = "liuqimin323@gmail.com";
$mail->FromName = "Qimin Liu Portfolio";
$mail->AddAddress("liuqimin323@hotmail.com", "Qimin Liu");
$mail->AddReplyTo($email_address, $name);

$mail->WordWrap = 50;

$mail->Subject = $subject;
$mail->Body = $email_body;

if(!$mail->Send()){
   echo "Message could not be sent: " . $mail->ErrorInfo;
   return false;
   exit;
}
echo "Message has been sent";

   return false;		
?>