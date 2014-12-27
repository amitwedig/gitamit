<?php

// Set variables for our request
session_start();
$_SESSION['shop'] = $_GET['shop'];
$_SESSION['api_key'] = "fceba264375b7dcd11b7b4f7d6710a64";
$_SESSION['shared_secret'] = "cd70d4f07ed4a8b17cae1023b42ed342";
$scopes = "write_orders,write_products,write_content,write_themes,write_script_tags";
$redirect_uri = "http://dev.wedighq.com/chat_app/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $_SESSION['shop'] . "/admin/oauth/authorize?client_id=" . $_SESSION['api_key'] . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();