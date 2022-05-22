<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$body=<<< email

    <h1>email verification </h1>
    
    <a href = "http://localhost/assignment/test/Peter/login.php" >verify your account</a>
email;


try {
	// $mail->SMTPDebug = 2;									
	$mail->isSMTP(true);											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'pattiradu@gmail.com';				
	$mail->Password = 'patrick9876';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom('pattiradu@gmail.com', 'assignment');		
	$mail->addAddress('gilbertishimwe2020@gmail.com');
	
	$mail->isHTML(true);								
	$mail->Subject = 'confirmation Email';
	$mail->Body = $body;
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
