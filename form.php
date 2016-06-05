<?php 

$url = 'https://api.sendgrid.com/';
$user = 'kor746';
$pass = 'asdfasdf7';

$name = $_POST['contactName'];
$email = $_POST['contactEmail'];
$subject = "Contacting Dan";
$message = $_POST['contactMessage'];

$params = array(
    'api_user' => "$user",
    'api_key' => "$pass",
    'to' => "danlee746@hotmail.ca",
    'subject' => "$subject",
    'html' => "<html><head><title> Contact Form </title><body>
    Name: $name\n<br>
    Email: $email\n<br>
    Subject: $subject\n<br>
    Message: $message <body></title></head></html>",
    'text' => "
    Name: $name\n
    Email: $email\n
    Subject: $subject\n
    $message",
    'from' => $email,
    
);

curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
$request = $url.'api/mail.send.json';

$session = curl_init($request);
//curl use HTTP POST
curl_setopt($session,CURLOPT_POST,true);
//curl use body of POST
curl_setopt($session,CURLOPT_POSTFIELDS,$params);
//do not return header, only response
curl_setopt($session,CURLOPT_HEADER,false);
curl_setopt($session,CURLOPT_RETURNTRANSFER, true);

//obtain response
$response = curl_exec($session);
curl_close($session);

header('Location:index.html');
exit();

print_r($response);
?>


