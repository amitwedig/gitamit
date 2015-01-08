<?php
require_once("config/config.php");
$response = array();

if( !empty($_REQUEST['storeName'])){
	$shopname = $_REQUEST['storeName'];	
	$get_settings_sql = "SELECT * FROM quick_enquiry WHERE StoreName='$shopname'";
	$get_settings_qry = mysql_query($get_settings_sql);
	$get_settings_num = mysql_num_rows($get_settings_qry);
	$get_settings_rows = mysql_fetch_assoc($get_settings_qry);
	
	if($get_settings_num > 0){
		$response['enqBtnText'] = $get_settings_rows['EnquiryBtnText'];
		$response['hdText'] = $get_settings_rows['FormHeadingText'];
		$response['hdTagText'] =  $get_settings_rows['FormSubHeadingText'];
	}else{
		$response['Error'] = "error";
	}
}else{
	$response['Error'] = "error";
}
echo $_REQUEST['callback']."(".json_encode($response).")"; die;
?>