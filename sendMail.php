<?php
	//FIle Inclusion
    require "phpMailer/PHPMailerAutoload.php";
    include "include/db_connect.php";

    //Decalare Variables
    $insertQuery = "";
    $mailAltBody = "";
    $mailBody = "";
    //checking
    if(isset($_POST['email'])){
        if(!isset($_POST['name']) && !isset($_POST['message'])){
            //Fetch Details using email
            $email=$_POST['email'];
//            $mailBody = '<i>'.$mailMessage.'</i>';
            $mailAltBody = '<i>'.$mailMessage.'</i>';
            $insertQuery = "INSERT INTO `subcription`(`email`) VALUES ('$email')";
        }
        elseif (isset($_POST['name']) && isset($_POST['message'])){
            //Fetch Details using email
            $email=$_POST['email'];
            $name=$_POST['name'];
            $message = $_POST['message'];
//            $mailBody = '<i>'.$mailMessage.'<br/> Your Message : '.$message.'</i>';
            $mailAltBody = '<i>'.$mailMessage.'<br/> Your Message : '.$message.'</i>';
            $insertQuery = "INSERT INTO `subcription`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
        }
    }

	//Creating mail Object for phpMailer
	$mail = new PHPMailer;

//	//Enable SMTP debugging.
	//$mail->SMTPDebug = 2;
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
	$mail->Username = "mnit.cacs@mnit.ac.in";
	$mail->Password = "cacs2k17";



	$mail->From = "blitzschlag.org";
	$mail->FromName = "Blitzchlag Team";

	$mail->addAddress($email, $name);
	$mail->AddBCC("mnit.cacs@mnit.ac.in", "Blitzchlag Team");
	$mail->isHTML(true);
	$mail->Subject = "Thank you for registering with us";
$mailMessage = "<p>
                            Hey there,<br><br><br>
                               
                            Welcome to our world :)</br></br>
                                We are very excited to have you as a part of the Qwiklync community.</br></br>
                                We would like to reach out to you personally to let you know that Qwiklync                                      support team is here to help you. We're going to be one of your ‘guides’ in                                     exploring new career opportunity.</br></br>
                                We’re here to answer each and every question you have so free free to shoot us                                  an email and we’ll get back to you ASAP!</br></br></br>
                                We want your career to reach the highest heights it possibly can :)</br></br></br>
                                Super excited to start this new journey together.</br></br></br>
                                   Best,</br>
                                Qwiklync Team.</br>
                        </p>
                        ";
    $mail->Body = "Hey There </br></br></br>";
    $mail->Body .="</br></br>Welcome to our world :)</br></br>";
    $mail->Body .="<p> </br>We are very excited to have you as a part of the Qwiklync community.</br></br>
                                We would like to reach out to you personally to let you know that Qwiklync                                      support team is here to help you. We're going to be one of your ‘guides’ in                                     exploring new career opportunity.</br></br></p>";
    $mail->Body .="<p></br>We’re here to answer each and every question you have so free free to shoot us                                  an email and we’ll get back to you ASAP!</br></br></br></p>";
    $mail->Body .="<p> </br>We want your career to reach the highest heights it possibly can :)</br></br></br>
                                Super excited to start this new journey together.</br></br></br></p>";
    $mail->Body .="</br>Best,</br>";
    $mail->Body .="</br>Qwiklync Team.</br>";

    $mail->AltBody = $mailAltBody;


	if(!$mail->send())
	{
	    echo "Mailer Error: " . $mail->ErrorInfo;
	}
	else
	{
        if ($conn->query($insertQuery) === TRUE) {
            header('Location:index.php?message=Message Sent Successfully!');
        }
        else {
            header('Location:index.php?message=Message Sent Successfully but Not Subscribed!');
        }
	}
