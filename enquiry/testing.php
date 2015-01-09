<?php
session_start();
require_once("functions.php");
require_once("config/config.php");
$token = $_SESSION['token'];
$shop = $_SESSION['shop'];

$get_theme = shopify_call($token, $shop, "/admin/themes.json", array(), 'GET');
$get_theme = json_decode($get_theme['response'], TRUE);
$themeId = $get_theme['themes'][0]['id'];

//$get_template = shopify_call($token, $shop, "/admin/themes/$themeId/assets.json?asset[key]=layout/theme.liquid&theme_id=$themeId", array(), 'GET');
//$get_template = shopify_call($token, $shop, "/admin/themes/$themeId/assets.json", $modify_data, 'POST');

/*$modify_data = array(
	"asset"=>array(
		"key"=>"assets/test1.js",
    	"value"=>"var amit;"
    )
);*/
$modify_data = array(
	"webhook"=>array(
		"topic"=>"app/uninstalled",
    	"address"=>"http://dev.wedighq.com/shopify/quick_enquiry/uninstall.php?shopname=".$shop."&token=".$token,
    	"format"=>"json"
    )
);

$get_template = shopify_call($token, $shop, "/admin/webhooks.json", $modify_data, 'POST');
$get_template = json_decode($get_template['response'], TRUE);
echo "<pre>";
print_r($get_template);
echo "</pre>";
die;
?>
