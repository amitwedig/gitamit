<?php
session_start();
/*require_once("config/config.php");
require_once("functions.php");
$token = $_SESSION['token'];
$shop = $_SESSION['shop'];
$istall_script = 0;

$script_tag_added = shopify_call($token, $shop, "/admin/script_tags.json", array(), 'GET');
$script_tag_list = json_decode($script_tag_added['response'], TRUE);

foreach ($script_tag_list['script_tags'] as $key => $value) {
	if( $value['src'] == "//dev.wedighq.com/shopify/quick_enquiry/enquiry_script.js"){
		$istall_script = 1;
	}
	//$script_tag_added1 = shopify_call($token, $shop, "/admin/script_tags/".$value['id'].".json", array(), 'DELETE');
}
if( $istall_script == 0 ){
	$query_for_adding_script = array(
		"script_tag"=>array(
			"event"=>"onload",
			"src"=>"//dev.wedighq.com/shopify/quick_enquiry/enquiry_script.js"
			)
		);
	$script_tag_added = shopify_call($token, $shop, "/admin/script_tags.json", $query_for_adding_script, 'POST');
}*/
//echo "<pre>";
//print_r($script_tag_list);
//echo "</pre>";
//echo '<b><a href="http://'.$shop.'">Go To Shop</a> &nbsp; &nbsp; &nbsp; <a href="https://'.$shop.'/admin/apps">Go To Admin</a></b>';
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Quick Enquiry</title>
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.css" media="screen">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="jumbotron m20">
		<div class="mb20">
	        <h2><img src="images/logo.png" width="40"> Quick Enquiry</h2>
	        <small>Welcome to quick enquiry, set your settings here.</small>
	    </div>
        <div class="panel panel-default">
            <div class="bs-component">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#email" data-toggle="tab">Settings</a></li><!-- 
                <li><a href="#form" data-toggle="tab"><i class="fa fa-pencil-square-o fa-lg"></i> Form Settings</a></li>
                <li><a href="#theme" data-toggle="tab"><i class="fa fa-paint-brush fa-lg"></i> Theme Settings</a></li> -->
              </ul>
              <div id="myTabContent" class="tab-content m20">
                <div class="tab-pane fade active in" id="email">
                	<!-- <small>Set your email settings.</small> -->
                	<form class="form-horizontal mt20" name="emailSettings" id="emailSettings" method="post">
                		<input type="hidden" class="form-control" name="shopname" id="shopname" value="amit-demo-shop.myshopify.com">
                		<input type="hidden" class="form-control" name="savetype" id="savetype" value="emailsettings">
                		<!-- <div class="alert alert-dismissable alert-info">
                			<small>* fields are manadatory.</small>
                		</div> -->
                		<div class="page-header">
						  <h4><i class="fa fa-envelope-o fa-lg"></i> Email Settings</h4>
						</div>
                		<div class="form-group">
					      <label for="recipientname" class="col-lg-2 control-label pull-left">Recipient Name <small class="text-danger">*</small></label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="recipientname" id="recipientname" placeholder="Enter your recipient name">
					      </div>
					      <div class="col-lg-5"><span id="recipientname-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="recipientemail" class="col-lg-2 control-label">Recipient Email <small class="text-danger">*</small></label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="recipientemail" id="recipientemail" placeholder="Enter your recipient email">
					      </div>
					      <div class="col-lg-5"><span id="recipientemail-error" class="text-danger"></span></div>
					    </div>
					    <!-- <div class="form-group">
					      <label for="sendername" class="col-lg-2 control-label">Sender Name</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="sendername" id="sendername" placeholder="Enter your sender name">
					      </div>
					      <div class="col-lg-5"><span id="sendername-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="senderemail" class="col-lg-2 control-label">Sender Email</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="senderemail" id="senderemail" placeholder="Enter your recipient email">
					      </div>
					      <div class="col-lg-5"><span id="senderemail-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="replyto" class="col-lg-2 control-label">Reply To Email</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="replyto" id="replyto" placeholder="Enter your reply to email">
					      </div>
					      <div class="col-lg-5"><span id="replyto-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="ccemail" class="col-lg-2 control-label">CC Email </label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="ccemail" id="ccemail" placeholder="Enter your cc email">
					      </div>
					      <div class="col-lg-5"><span id="ccemail-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="bccemail" class="col-lg-2 control-label">BCC Email</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="bccemail" id="bccemail" placeholder="Enter your bcc email">
					      </div>
					      <div class="col-lg-5"><span id="bccemail-error" class="text-danger"></span></div>
					    </div> -->
					    <div class="form-group">
					      <label for="emailsubject" class="col-lg-2 control-label">Email Subject <small class="text-danger">*</small></label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="emailsubject" id="emailsubject" placeholder="Enter your email subject">
					      </div>
					      <div class="col-lg-5"><span id="emailsubject-error" class="text-danger"></span></div>
					    </div>
					    <!-- <div class="page-header">
						  <h4>Email Authentication Details</h4>
						</div>
					    <div class="form-group">
					      <label for="hostname" class="col-lg-2 control-label">Host Name</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="hostname" id="hostname" placeholder="Enter your smtp host name">
					      </div>
					      <div class="col-lg-5"><span id="hostname-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="emailusername" class="col-lg-2 control-label">Username</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="emailusername" id="emailusername" placeholder="Enter your smtp username">
					      </div>
					      <div class="col-lg-5"><span id="emailusername-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="emailpassword" class="col-lg-2 control-label">Password</label>
					      <div class="col-lg-5">
					        <input type="password" class="form-control" name="emailpassword" id="emailpassword" placeholder="Enter your smtp password">					        
					      </div>
					      <div class="col-lg-5"><span id="emailpassword-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="emailport" class="col-lg-2 control-label">Port</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="emailport" id="emailport" placeholder="Enter your smtp port">
					      </div>
					      <div class="col-lg-5"><span id="emailport-error" class="text-danger"></span></div>
					    </div> -->
					    <div class="page-header">
						  <h4><i class="fa fa-pencil-square-o fa-lg"></i> Form Settings</h4>
						</div>
					    <div class="form-group">
					      <label for="btntext" class="col-lg-2 control-label">Enquiry Button Text <small class="text-danger">*</small></label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="btntext" id="btntext" placeholder="Enter enquiry button text">
					      </div>
					      <div class="col-lg-5"><span id="btntext-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="formhdtext" class="col-lg-2 control-label">Heading Text <small class="text-danger">*</small></label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="formhdtext" id="formhdtext" placeholder="Enter enquiry form heading text">
					      </div>
					      <div class="col-lg-5"><span id="formhdtext-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="formhdtagtext" class="col-lg-2 control-label">Heading Tagline Text <small class="text-danger">*</small></label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="formhdtagtext" id="formhdtagtext" placeholder="Enter enquiry form heading tagline text">
					      </div>
					      <div class="col-lg-5"><span id="formhdtagtext-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <div class="col-lg-10 col-lg-offset-2">
					        <button type="button" class="btn btn-default enq-email-settings">Save Settings</button>
					      </div>
					    </div>
					</form>
                </div>                
              </div>
            </div>
        </div>
	</div>
	<div class="text-center">
		<small>&copy; 2015 Quick Enquiry. All Rights Reserved.</small>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode; 
	if (charCode > 31 && (charCode < 48 || charCode > 57)){ 
		return false; 
	} 
	return true;
} 
function isAlphaKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode; 
	if (((charCode >=65) && (charCode <=90) )|| (charCode >=97) || (charCode>42 && charCode<48) || (charCode>39 && charCode<42)|| (charCode>47 && charCode<58)|| (charCode>31 && charCode<33) || charCode==8){ 
		return true; 
	} 
	return false;
}

$(document).ready(function(){
	$(".enq-email-settings").click(function(event){
		var recipientname = $('#recipientname').val();
        var recipientemail = $('#recipientemail').val();
        var emailsubject = $('#emailsubject').val();
        var btntext = $('#btntext').val();
        var formhdtext = $('#formhdtext').val();
        var formhdtagtext = $('#formhdtagtext').val();
        var atpos=recipientemail.indexOf("@");
        var dotpos=recipientemail.lastIndexOf(".");
        var check_error = 0;
		
		//validations
        if(recipientname == ""){
            check_error = 1;
            $('#recipientname').closest(".form-group").addClass("has-error");
            $('#recipientname-error').html("Required !");
        }else{
        	$('#recipientname').closest(".form-group").removeClass("has-error");
            $('#recipientname-error').html("");
        }
        if(recipientemail == ""){
            check_error = 1;
             $('#recipientemail').closest(".form-group").addClass("has-error");
            $('#recipientemail-error').html("Required !");
        }else{
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=recipientemail.length){
                check_error = 1;
                 $('#recipientemail').closest(".form-group").addClass("has-error");
                $('#recipientemail-error').html("Invalid email address !");
            }else{
            	$('#recipientemail').closest(".form-group").removeClass("has-error");
                $('#recipientemail-error').html("");
            }
        }
        if(emailsubject == ""){
            check_error = 1;
             $('#emailsubject').closest(".form-group").addClass("has-error");
            $('#emailsubject-error').html("Required !");
        }else{
        	$('#emailsubject').closest(".form-group").removeClass("has-error");
            $('#emailsubject-error').html("");
        }
        if(btntext == ""){
            check_error = 1;
             $('#btntext').closest(".form-group").addClass("has-error");
            $('#btntext-error').html("Required !");
        }else{
        	$('#btntext').closest(".form-group").removeClass("has-error");
            $('#btntext-error').html("");
        }
        if(formhdtext == ""){
            check_error = 1;
             $('#formhdtext').closest(".form-group").addClass("has-error");
            $('#formhdtext-error').html("Required !");
        }else{
        	$('#formhdtext').closest(".form-group").removeClass("has-error");
            $('#formhdtext-error').html("");
        }
        if(formhdtagtext == ""){
            check_error = 1;
             $('#formhdtagtext').closest(".form-group").addClass("has-error");
            $('#formhdtagtext-error').html("Required !");
        }else{
        	$('#formhdtagtext').closest(".form-group").removeClass("has-error");
            $('#formhdtagtext-error').html("");
        }
        if(check_error == 0){
        	var send_data = $("#emailSettings").serialize();

			$.ajax({
			    url         : 'http://localhost/shopify/enquiry/savesettings.php',
			    cache       : false,
			    data        :send_data,
			    global      : false,
			    crossDomain : true,
			    dataType    : 'jsonp',
			    type        : 'POST',
			    success: function (data) {
			    	alert(data.savetype);
			    /*$("#enq-form").get(0).reset();
			    $('#enq-name-error').html("");
			    $('#enq-email-error').html("");
			    $('#enq-phone-error').html("");
			    $('#enq-message-error').html("");
			    $('#sent-msg').attr("style","display:block;");*/
			    }
			});
		}
	});
});
</script>