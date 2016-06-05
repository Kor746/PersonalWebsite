<?php 
require 'PHPMailerAutoload.php';
if(isset($_POST['submit']))
{

$url = 'https://api.sendgrid.com/';
$user = 'azure_10f17c72120cc0aebfd1cc8e7fdb3271@azure.com';
$pass = 'asdfasdf7';

$name = $_POST['contactName'];
$email = $_POST['contactEmail'];
$subject = "Contacting Dan";
$message = $_POST['contactMessage'];
$cap = $_POST['contactCaptcha'];
if($name != '' AND $email != '' AND $message != '' AND $cap == 2)
{

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                          // Enable verbose debug output

$mail->isSMTP();                                        // Set mailer to use SMTP 
$mail->Host = 'smtp.sendgrid.net';             // Specify main/backup SMTP servers 
$mail->SMTPAuth = true;                           // Enable SMTP authentication 
$mail->Username = $user;    // SMTP username 
$mail->Password = $pass;    // SMTP password 
$mail->SMTPSecure = 'tls';                        // Enable TLS/SSL encryption 
$mail->Port = 587;                                      // TCP port to connect to

$mail->From = $email; 
$mail->FromName = $name; 
$mail->addAddress('danlee746@hotmail.ca', 'Boss');     // Add a recipient

$mail->WordWrap = 50;                              // Set word wrap to 50 characters 
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject'; 
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';

if(!$mail->send()) { 
    echo 'Message could not be sent.'; 
    echo 'Mailer Error: ' . $mail->ErrorInfo; 
} else { 
    echo 'Message has been sent'; 
}
header('Location:index.html');

}
}
else {
    
         
    header('Location:index.html');
    echo "<script type= 'text/javascript'> document.getElementById('contact-success').style.visibility = 'hidden';";
    echo "<script type= 'text/javascript'> document.getElementById('contact-warning').style.visibility = 'visible';</script>";
}
?>



