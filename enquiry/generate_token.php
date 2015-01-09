<?php
// Get our helper functions
require_once("functions.php");
session_start();
// Set variables for our request

$_SESSION['code'] = $_GET["code"];
$_SESSION['timestamp'] = $_GET["timestamp"];
$_SESSION['signature'] = $_GET["signature"];

// Compile signature data
$signature_data = $_SESSION['shared_secret'] . "code=" . $_SESSION['code'] . "shop=". $_SESSION['shop'] . "timestamp=" . $_SESSION['timestamp'];
// Use signature data to check that the response is from Shopify or not
//if (md5($signature_data) === $signature) {

	// Set variables for our request
	$query = array(
		"Content-type" => "application/json", // Tell Shopify that we're expecting a response in JSON format
		"client_id" => $_SESSION['api_key'], // Your API key
		"client_secret" => $_SESSION['shared_secret'], // Your app credentials (secret key)
		"code" => $_SESSION['code'] // Grab the access key from the URL
	);

	// Call our Shopify function
	$shopify_response = shopify_call(NULL, $_SESSION['shop'], "/admin/oauth/access_token", $query, 'POST');

	// Convert response into a nice and simple array
	$shopify_response = json_decode($shopify_response['response'], TRUE);

	// Store the response
	$token = $shopify_response['access_token'];

	$_SESSION['token'] = $token;
	//echo $token; die;
	header("location:index.php");

//} else {
	// Someone is trying to be shady!
//	die('This request is NOT from Shopify!');
//}