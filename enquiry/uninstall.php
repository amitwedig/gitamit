<?php
require_once("functions.php");
require_once("config/config.php");
$shopname = $_REQUEST['shopname'];
$token = $_REQUEST['token'];

$check_sql = "SELECT COUNT(*) as num FROM quick_enquiry WHERE StoreName='$shopname'";
$check_qry = mysql_query($check_sql);
$check_rows = mysql_fetch_assoc($check_qry);
if($check_rows['num'] > 0){
	$check_sql = "DELETE FROM quick_enquiry WHERE StoreName='$shopname'";
	$check_qry = mysql_query($check_sql);	
}

$get_theme = shopify_call($token, $shopname, "/admin/themes.json", array(), 'GET');
$get_theme = json_decode($get_theme['response'], TRUE);
$themeId = $get_theme['themes'][0]['id'];

//$get_template = shopify_call($token, $shopname, "/admin/themes/$themeId/assets.json?asset[key]=layout/theme.liquid&theme_id=$themeId", array(), 'GET');
$get_template = shopify_call($token, $shopname, "/admin/themes/$themeId/assets.json", array(), 'GET');
//$get_template = json_decode($get_template['response'], TRUE);
mail('amit.kumar@wedigtech.com','test',$get_template['response']);
die;
?>