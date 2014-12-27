<?php
session_start();
require_once("functions.php");

$token = $_SESSION['token'];
$shop = $_SESSION['shop'];
echo "welcome to my first app.<hr/><br/>";

$query_for_adding_script = array(
	"script_tag"=>array(
		"event"=>"onload",
		"src"=>"http://dev.wedighq.com/chat_app/my_script.js"
		)
	);

$query_for_adding_pages = array(
	"page"=>array(
		"title"=>"My First App Page",
		"body_html"=>"<h1>Warranty</h1><p><strong>Forget it</strong>, we aint giving you nothing</p>"
		)
	);

$script_tag_added = shopify_call($token, $shop, "/admin/script_tags.json", $query_for_adding_script, 'POST');
/*$pages_added = shopify_call($token, $shop, "/admin/pages.json", $query_for_adding_pages, 'POST');*/


echo "<pre>";
print_r($script_tag_added);
echo '<b><a href="http://'.$shop.'">Go To Shop</a> &nbsp; &nbsp; &nbsp; <a href="https://'.$shop.'/admin/apps">Go To Admin</a></b>';
//header("location:https://".$shop)

//$script_tags = shopify_call($token, $shop, "/admin/pages.json", array(), 'GET');

// Convert product JSON information into an array
//$script_tags_array = json_decode($script_tags['response'], TRUE);

//print_r($script_tags_array);
?>