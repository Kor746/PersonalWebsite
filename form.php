<?php

 $url = 'https://api.sendgrid.com/';
 $user = 'azure_10f17c72120cc0aebfd1cc8e7fdb3271@azure.com';
 $pass = 'Your Password'; 
 $email = $_POST['contactEmail'];
 $message = $_POST['contactMessage'];
 $name = $_POST['contactName'];
 $params = array(
      'api_user' => $user,
      'api_key' => $pass,
      
      'to' => 'danlee746@hotmail.ca',
      'subject' => $name,
      'html' => 'testing body',
      'text' => $message,
      'from' => $email,
   );

 $request = $url.'api/mail.send.json';

 // Generate curl request
 $session = curl_init($request);

 // Tell curl to use HTTP POST
 curl_setopt ($session, CURLOPT_POST, true);

 // Tell curl that this is the body of the POST
 curl_setopt ($session, CURLOPT_POSTFIELDS, $params);

 // Tell curl not to return headers, but do return the response
 curl_setopt($session, CURLOPT_HEADER, false);
 curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

 // obtain response
 $response = curl_exec($session);
 curl_close($session);

 // print everything out
 print_r($response);
?>