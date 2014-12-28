<?php
session_start();
require_once("functions.php");

$token = $_SESSION['token'];
$shop = $_SESSION['shop'];
echo "welcome to my first app.<hr/><br/>";

$query_for_adding_script = array(
	"script_tag"=>array(
		"event"=>"onload",
		"src"=>"http://dev.wedighq.com/chat_app/enquiry_script.js"
		)
	);

$script_tag_added = shopify_call($token, $shop, "/admin/script_tags.json", $query_for_adding_script, 'POST');

echo "<pre>";
print_r($script_tag_added);
echo '<b><a href="http://'.$shop.'">Go To Shop</a> &nbsp; &nbsp; &nbsp; <a href="https://'.$shop.'/admin/apps">Go To Admin</a></b>';
?>