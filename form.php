<?php
if(isset($_POST['Submit']))
{
	
	$name= trim($_POST['contactName']," ");
	$email= "From: ".trim($_POST['contactEmail']," ")."\r\n";
	$message= trim($_POST['contactMessage']," ");
	$captcha= trim($_POST['contactCaptcha']," ");
	$to= 'daniel@incubateinstitute.org';
	if($name != "" OR $email != "" OR $message != "" OR $captcha != 2)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			mail($to,$name,$message,$email);	
		}
		else {
			die("E-mail must be in the proper format");
		}
		
	}
	else 
	{
		die("A required field is empty");
	}

	
}


?>