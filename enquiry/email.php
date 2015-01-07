<?php
$response = array();
//$response['submited'] = $_POST;
//require_once "Mail.php";
$to = "amit.kumar@mailinator.com";
$from = $_REQUEST['enq_email'];
$subject = "Enquiry From Shop";
$message = $_REQUEST['enq_message'];
/*
$host = "ssl://smtp.gmail.com"; 
$username = "user1.guts@gmail.com"; 
$password = "wedig@123";  

$headers = array (
	'From' => $from,
	'To' => $to,
	'Subject' => $subject,
	'MIME-Version' => "1.0",
	'Content-type' => "text/html",
	'smtp',   array (
		'host' => $host,
		'auth' => true,
		'username' => $username,
		'password' => $password
		)
	); 
$smtp = Mail::factory('smtp',   array (
	'host' => $host,
	'auth' => true,
	'username' => $username,
	'password' => $password
	));  
$mail = $smtp->send($to, $headers, $message);*/



$header = "From:".$_REQUEST['enq_email']." \r\n";
//$header = "Cc:afgh@somedomain.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";
$mail = mail($to,$subject,$message,$header);

if( $mail == true )
{
	$response['success'] = "Message sent successfully...";
}
else
{
    $response['error'] = "Message could not be sent...";
}

echo $_REQUEST['callback']."(".json_encode($response).")"; die;
//	print_r($_POST); die;


require 'mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'user@example.com';                 // SMTP username
$mail->Password = 'secret';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = 'from@example.com';
$mail->FromName = 'Mailer';
$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>