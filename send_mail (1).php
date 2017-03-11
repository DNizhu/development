<?php
	//Session Started
	session_start();

	//FIle Inclusion
	include "includes/phpMailer/PHPMailerAutoload.php";
	// include "includes/phpMailer/class.phpmailer.php'";
	// include "includes/phpMailer/class.smtp.php'";
	include "includes/db_connect.php";

	//Fetch Details using email
	$email=$_SESSION['email'];
	$phone=$_SESSION['phone'];

	//Creating mail Object for phpMailer
	$mail = new PHPMailer;
	
	$selectData="SELECT `name` from `basic_data` WHERE `email`='".$email."';";
	$selectResult=$conn->query($selectData);
	$selectRow=mysqli_fetch_array($selectResult);
	$name=$selectRow['name'];
	$count=mt_rand(0,999);
	$count=sprintf("%03d",$count);
	$count=(string)$count;
	$str='QLAC'.$count;	

	//Enable SMTP debugging. 
	$mail->SMTPDebug = 2;       
	$mail->Debugoutput = 'html';                        
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = "smtp.gmail.com";
	//Set TCP port to connect to 
	$mail->Port = 587;

	$mail->SMTPSecure = "tls"; 
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password     
	$mail->Username = "connect@qwiklync.com";                 
	$mail->Password = "Qwiklync@123";                           
	
	                        

	$mail->From = "connect@qwiklync.com";
	$mail->FromName = "Qwiklync Team";

	$mail->addAddress($email, $name);

	$mail->isHTML(true);
	$url="http://35.160.159.65/verification.php?email=".$email;
	$mail->Subject = "Verification email";
	$mail->Body = '<i>Greetings, Please click on the link to verify your email.</i><a href ="'.$url.'">"'.$str.'"</a>';
	$mail->AltBody = "This is the plain text version of the email content";

	if(!$mail->send()) 
	{
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
	   header('Location: ../waiting_for_verification.php');
	}

?>