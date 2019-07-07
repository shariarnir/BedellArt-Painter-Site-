<?php

	// Start the session
	session_start();
	
	$err = '';
	$name = '';
	$email = '';
	$message = '';

function validate($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	
	return $data ;
}
//fucntion end

//end function validation 

if (isset($_POST['form_submit'])){

		$name = validate($_POST['name']);

		$email = validate($_POST['email']);
		if(!filter_var($email ,FILTER_VALIDATE_EMAIL)){
			$err .= '<p >Invaid email Format</p>';			
		}
		
		$message = validate($_POST['message']);
		require 'PHPMailer/class.phpmailer.php';
		  
		  $mail = new PHPMailer;
		  
		  $mail->IsSMTP();        //Sets Mailer to send message using SMTP
		  $mail->Host = 'bedellart.com';  //Sets the SMTP hosts
		  $mail->Port = '465';  //Sets the default SMTP server port
		  $mail->SMTPDebug = 2;
		  $mail->SMTPAuth = true;		  //Sets SMTP authentication. Utilizes the Username and Password variables
		  $mail->Username = 'info@bedellart.com';     //Sets SMTP username
		  $mail->Password = 'info@777';     //Sets SMTP password
		  $mail->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
		  $mail->From = $_POST["email"];     //Sets the From email address for the message
		  $mail->FromName = $_POST["name"];    //Sets the From name of the message
		  $mail->AddAddress('swajan.talukdar@gmail.com', 'Name');//Adds a "To" address
		  $mail->AddCC($_POST["email"], $_POST["name"]); //Adds a "Cc" address
		  $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
		  $mail->IsHTML(true);       //Sets message type to HTML    
		  
		  $mail->Body = $_POST["message"];    //An HTML or plain text message body
		  
		  if($mail->Send()){        //Send an Email. Return true on success or false on error
			  $err = "mail send";
			}else{
				$err = "mail not send";
			}
	
}//end 


  //raju code
?>
