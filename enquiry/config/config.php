<?php

	$host = "118.139.162.49";
	$db = "wedighq_shopify";
	$user = "wedighq_shopify";
	$pass = "sh0p!fy";
	$conn = mysql_connect($host,$user,$pass) or die("Could not connect to database.");
	mysql_select_db($db);
	
	//Default values
	$emailhost = "ssl://smtp.gmail.com";
	$emailusername = "user1.guts@gmail.com";
	$emailpassword = "wedig@123";
	$emailport = "465";
	$toemail = "";
	$fromname = "";
	$fromemail = "";
	$replyto = "";
	$ccemail = "";
	$bccemail = "";
	$emailsubject = "Enquiry from your shop";
	$enqbtntext = "Send A Quick Enquiry";
	$formheadingtext = "Quick Enquiry";
	$formsubheadingtext = "submit form to send enquiry.";
	$formsubmitbtntext = "Submit";

?>