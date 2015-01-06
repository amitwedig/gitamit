<?php
$response = array();
if($_REQUEST['savetype'] == "emailsettings"){
	
}
$response['name1'] = $_REQUEST['recipientname'];
echo $_REQUEST['callback']."(".json_encode($_REQUEST).")"; die;
?>