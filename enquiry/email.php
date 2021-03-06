<?php
require_once("config/config.php");
$shopname = $_REQUEST['storeName'];	
$response = array();
$get_settings_sql = "SELECT * FROM quick_enquiry WHERE StoreName='$shopname'";
$get_settings_qry = mysql_query($get_settings_sql);
$get_settings_num = mysql_num_rows($get_settings_qry);
$get_settings_rows = mysql_fetch_assoc($get_settings_qry);
date_default_timezone_set("UTC");

/*$body = "<h2>$shopname</h2><br/>Name : ".$_REQUEST['enq_name']."<br/>Email : ".$_REQUEST['enq_email']."<br/>Phone : ".$_REQUEST['enq_phone']."<br/>Message : ".$_REQUEST['enq_message'];*/

$patterns = array(
	'/\[@ShopLink\]/',
	'/\[@ShopName\]/',
	'/\[@EmailSubject\]/',
	'/\[@EmailMessage\]/',
	'/\[@CustomerName\]/',
	'/\[@CustomerEmail\]/',
	'/\[@CustomerPhone\]/'
);

$replacements = array(
	$shopname,
	str_replace(".myshopify.com", "", $shopname),
	$get_settings_rows['EmailSubject'],
	nl2br($_REQUEST['enq_message']),
	$_REQUEST['enq_name'],
	$_REQUEST['enq_email'],				
	$_REQUEST['enq_phone']
);

if(!empty($mailtemplate) && !empty($patterns) && !empty($replacements)){
	$body = preg_replace($patterns, $replacements,$mailtemplate);
}

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
		$log_data = array(
			"store_id"=>$get_settings_rows['id'],
			"customer_name"=>$_REQUEST['enq_name'],
			"customer_email"=>$_REQUEST['enq_email'],
			"customer_phone"=>$_REQUEST['enq_phone'],
			"customer_msg"=>nl2br($_REQUEST['enq_message']),
			"created"=>date("Y-m-d H:i:s")
		);
		$set_logs_sql = "INSERT INTO enquiry_logs SET StoreId = '$log_data[store_id]', CustomerName = '$log_data[customer_name]', CustomerEmail = '$log_data[customer_email]', CustomerPhone = '$log_data[customer_phone]', CustomerMsg = '$log_data[customer_msg]', Created = '$log_data[created]' ";
		$set_logs_qry = mysql_query($set_logs_sql);
	    $response['success'] = "Message sent successfully...";
	}

}else{
	$response['error'] = "Message could not be sent...";
}

echo $_REQUEST['callback']."(".json_encode($response).")"; die;
?>