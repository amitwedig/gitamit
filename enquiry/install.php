<?php

// Set variables for our request
session_start();
$_SESSION['shop'] = $_GET['shop'];
$_SESSION['api_key'] = "8b9db24cd8698984101ed32ab74232f2";
$_SESSION['shared_secret'] = "8ae57a5969e152fbc63a28bd87bf2788";
$scopes = "write_content,write_themes,write_script_tags";
$redirect_uri = "http://dev.wedighq.com/shopify/quick_enquiry/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $_SESSION['shop'] . "/admin/oauth/authorize?client_id=" . $_SESSION['api_key'] . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();
?>