<?php
require_once("config/config.php");
$shopname = $_REQUEST['storeName'];	
$response = array();
$get_settings_sql = "SELECT * FROM quick_enquiry WHERE StoreName='$shopname'";
$get_settings_qry = mysql_query($get_settings_sql);
$get_settings_num = mysql_num_rows($get_settings_qry);
$get_settings_rows = mysql_fetch_assoc($get_settings_qry);

$body = "<h2>$shopname</h2><br/>Name : ".$_REQUEST['enq_name']."<br/>Email : ".$_REQUEST['enq_email']."<br/>Phone : ".$_REQUEST['enq_phone']."<br/>Message : ".$_REQUEST['enq_message'];

if($get_settings_num > 0){

	require 'mailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = $emailhost;  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $emailusername;                 // SMTP username
	$mail->Password = $emailpassword;                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = $emailport;                                    // TCP port to connect to

	$mail->From = $_REQUEST['enq_email'];
	$mail->FromName = $_REQUEST['enq_name'];
	$mail->addAddress($get_settings_rows['ToEmail'], $get_settings_rows['ToName']);     // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	//$mail->addReplyTo('info@example.com', 'Information');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $get_settings_rows['EmailSubject'];
	$mail->Body    = $body;
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    $response['error'] = "Message could not be sent...";
	} else {

	    $response['success'] = "Message sent successfully...";
	}

}else{
	$response['error'] = "Message could not be sent...";
}

echo $_REQUEST['callback']."(".json_encode($response).")"; die;
?>