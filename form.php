<?php 
$url = 'https://api.sendgrid.com/';
$user = 'azure_10f17c72120cc0aebfd1cc8e7fdb3271@azure.com';
$pass = 'asdfasdf7';

if(isset($_POST['submit']))
{

$name = $_POST['contactName'];
$email = $_POST['contactEmail'];
$subject = "Contacting Dan";
$message = $_POST['contactMessage'];
$cap = $_POST['contactCaptcha'];
if($name != '' AND $email != '' AND $message != '' AND $cap == 2)
{

$params = array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'to'        => 'kor746@sendgrid.com',
    'subject'   => 'Contact Dan',
    'html'      => '<html><head></head><body>Lol</body></html>',
    'text'      => $message,
    'from'      => $email,
 );


$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

// print everything out
print_r($response);


header('Location:index.html');
echo "<script type='text/javascript'> document.getElementById('contact-warning').style.visibility = 'hidden';";
echo "document.getElementById('contact-success').style.visibility = 'visible';</script>";
}
}
else {
    
         
    header('Location:index.html');
    echo "<script type='text/javascript'> document.getElementById('contact-success').style.visibility = 'hidden';";
    echo "document.getElementById('contact-warning').style.visibility = 'visible';</script>";
}
?>



