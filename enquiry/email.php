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
?>