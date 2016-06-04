<?php
    
    if(isset($_POST['submit'])) {
        $name = $_POST['contactName'];
        $message = $_POST['contactMessage'];
        $email = $_POST['contactEmail'];
        $cap = $_POST['contactCaptchaAnswer'];
        
        if($name !== '' AND $message !== '' AND $email !== '' AND $cap == 2){
            $message = wordwrap($message,70);
            mail("danlee746@hotmail.ca",$name,$message);
        }
            
        else {
            header("Location:index.html");
        }
    }
?>