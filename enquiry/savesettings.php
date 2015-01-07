<?php
session_start();
require_once("config/config.php");
$response = array();
if( !empty($_POST['shopname'])){
	$shopname = $_POST['shopname'];
	$recipientname = mysql_real_escape_string($_POST['recipientname']);
	$recipientemail = $_POST['recipientemail'];
	$emailsubject = mysql_real_escape_string($_POST['emailsubject']);
	$btntext = mysql_real_escape_string($_POST['btntext']);
	$formhdtext = mysql_real_escape_string($_POST['formhdtext']);
	$formhdtagtext = mysql_real_escape_string($_POST['formhdtagtext']);
	
	$check_sql = "SELECT COUNT(*) as num FROM quick_enquiry WHERE StoreName='$shopname'";
	$check_qry = mysql_query($check_sql);
	$check_rows = mysql_fetch_assoc($check_qry);
	
	if($check_rows['num'] > 0){

		$upd_sql = "UPDATE quick_enquiry SET ToName='$recipientname', ToEmail='$recipientemail', EmailSubject='$emailsubject', EnquiryBtnText='$btntext', FormHeadingText='$formhdtext', FormSubHeadingText='$formhdtagtext' WHERE StoreName='$shopname'";
		$upd_qry = mysql_query($upd_sql);

		if($upd_qry)
			$_SESSION['success_msg'] = "Settings updated successfully.";
		else
			$_SESSION['error_msg'] = "There is some error. Please try again...";
	}else{

		$ins_sql = "INSERT INTO quick_enquiry SET StoreName='$shopname', ToName='$recipientname', ToEmail='$recipientemail', EmailSubject='$emailsubject', EnquiryBtnText='$btntext', FormHeadingText='$formhdtext', FormSubHeadingText='$formhdtagtext'";
		$ins_qry = mysql_query($ins_sql);

		if($ins_qry)
			$_SESSION['success_msg'] = "Settings saved successfully.";
		else
			$_SESSION['error_msg'] = "There is some error. Please try again...";
	}
}else{
	$_SESSION['error_msg'] = "Please login to your admin account and than try again...";
}
header("location:index.php");
die;

?>