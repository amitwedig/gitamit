<?php
session_start();
require_once("functions.php");
require_once("config/config.php");
$token = $_SESSION['token'];
$shop = $_SESSION['shop'];

$istall_script = 0;
$script_tag_check = shopify_call($token, $shop, "/admin/script_tags.json", array(), 'GET');
$script_tag_list = json_decode($script_tag_check['response'], TRUE);

foreach ($script_tag_list['script_tags'] as $key => $value) {
	if( $value['src'] == "//dev.wedighq.com/shopify/quick_enquiry/enquiry_script.js"){
		$istall_script = 1;
		$_SESSION['success_msg'] = "Settings published successfully.";
	}
	//$script_tag_added1 = shopify_call($token, $shop, "/admin/script_tags/".$value['id'].".json", array(), 'DELETE');
}
if( $istall_script == 0 ){
	$query_for_adding_script = array(
		"script_tag"=>array(
			"event"=>"onload",
			"src"=>"//dev.wedighq.com/shopify/quick_enquiry/enquiry_script.js"
			)
		);
	$script_tag_added = shopify_call($token, $shop, "/admin/script_tags.json", $query_for_adding_script, 'POST');
	$_SESSION['success_msg'] = "Settings published successfully.";
}

header("location:index.php");
die;
//echo "<pre>";
//print_r($script_tag_list);
//echo "</pre>";
//echo '<b><a href="http://'.$shop.'">Go To Shop</a> &nbsp; &nbsp; &nbsp; <a href="https://'.$shop.'/admin/apps">Go To Admin</a></b>';
?>