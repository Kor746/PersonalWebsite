<?php
if(filter_input(INPUT_POST, 'submit'))
{
	
	$name = trim(filter_input(INPUT_POST, 'contactName')," ");
	$email = "From:" . trim(filter_input(INPUT_POST, 'contactEmail')," ");
	$message = trim(filter_input(INPUT_POST, 'contactMessage')," ");
	$captcha = trim(filter_input(INPUT_POST, 'contactCaptcha')," ");
	$to = 'danlee746@hotmail.ca';
	if(!empty($name) AND !empty($email) AND !empty($message) AND $captcha == 2)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			mail($to,$name,$message,$email);
                        header("Location:index.html");
		}
		else {
			die("Incorrect E-mail Format!");
		}
		
	}
	else 
	{
		die("A required field is empty");
	}
}

?>