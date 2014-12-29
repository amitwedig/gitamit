<?php
if( isset($_SESSION['shop']) ){
	$host = "118.139.162.49";
	$db = "wedighq_shopify";
	$user = "wedighq_shopify";
	$pass = "sh0p!fy";
	$conn = mysql_connect($host,$user,$pass) or die("Could not connect to database.");
	mysql_select_db($db);
}else{
	header("location:https://apps.shopify.com/");
}
?>