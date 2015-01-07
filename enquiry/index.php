<?php
session_start();
$shop = $_SESSION['shop'];
require_once("config/config.php");

$enq_settings_sql = "SELECT * FROM quick_enquiry WHERE StoreName = '$shop'";
$enq_settings_qry = mysql_query($enq_settings_sql);
$enq_settings_row = mysql_fetch_assoc($enq_settings_qry);

if(empty($enq_settings_row['StoreName'])){
	$publish_disable = "disabled";
	$publish_title = "Save settings to publish changes";
}
else{
	$publish_disable = "";
	$publish_title = "Click to publish changes";
}
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
			<div class="col-lg-8">
		        <h2><img src="images/logo.png" width="40"> Quick Enquiry</h2>
		        <small>Welcome to quick enquiry, Set your settings here.<br><br></small>
	    	</div>
	        <div class="col-lg-4">
		        <div class="btn-toolbar bs-component pull-right">
				    <div class="btn-group">
					  <a href="publish_changes.php" class="btn btn-primary <?php echo $publish_disable;?>" title="<?php echo $publish_title; ?>">Publish Changes</a>
					  <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>&nbsp;</a>
					  <ul class="dropdown-menu">
					    <li><a href="//<?php echo $shop; ?>/admin/">Go To Admin Panel</a></li>
					    <li><a href="//<?php echo $shop; ?>" target="_blank">View Your Shop</a></li>
					  </ul>
					</div>
				</div>			
			</div>
	    </div>
	    <div class=" clearfix"></div>		
        <div class="panel panel-default">
            <div class="bs-component">
            	<div>
            		<?php if(isset($_SESSION['success_msg'])){?>
	            	<div class="alert alert-dismissable alert-success">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <i class="fa fa-check-circle fa-lg"></i> <span class="msg"><?php echo $_SESSION['success_msg'];?></span>
					</div>
					<?php }?>
					<?php if(isset($_SESSION['error_msg'])){?>
	            	<div class="alert alert-dismissable alert-danger">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <i class="fa fa-exclamation-circle fa-lg"></i> <span class="msg"><?php echo $_SESSION['error_msg'];?></span>
					</div>
					<?php }?>
				</div>
              <!--<ul class="nav nav-tabs">
                 <li class="active"><a href="#email" data-toggle="tab">Settings</a></li>
                <li><a href="#form" data-toggle="tab"><i class="fa fa-pencil-square-o fa-lg"></i> Form Settings</a></li>
                <li><a href="#theme" data-toggle="tab"><i class="fa fa-paint-brush fa-lg"></i> Theme Settings</a></li>
              </ul> -->
              <div id="myTabContent" class="tab-content m20">
                <div class="tab-pane fade active in" id="email">
                	<!-- <small>Set your email settings.</small> -->
                	<form class="form-horizontal mt20" name="emailSettings" id="emailSettings" method="post">
                		<input type="hidden" class="form-control" name="shopname" id="shopname" value="<?php echo $shop; ?>">
                		<!-- <div class="alert alert-dismissable alert-info">
                			<small>* fields are manadatory.</small>
                		</div> -->
                		<div class="page-header">
						  <h4><i class="fa fa-envelope-o fa-lg"></i> Email Settings</h4>
						</div>
                		<div class="form-group">
					      <label for="recipientname" class="col-lg-2 control-label pull-left">Recipient Name <small class="text-danger">*</small></label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="recipientname" id="recipientname" placeholder="Enter your recipient name" value ="<?php echo $enq_settings_row['ToName'];?>">
					      </div>
					      <div class="col-lg-5"><span id="recipientname-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="recipientemail" class="col-lg-2 control-label">Recipient Email <small class="text-danger">*</small></label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="recipientemail" id="recipientemail" placeholder="Enter your recipient email" value ="<?php echo $enq_settings_row['ToEmail'];?>">
					      </div>
					      <div class="col-lg-5"><span id="recipientemail-error" class="text-danger"></span></div>
					    </div>
					    <!-- <div class="form-group">
					      <label for="sendername" class="col-lg-2 control-label">Sender Name</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="sendername" id="sendername" placeholder="Enter your sender name" value ="<?php //echo $enq_settings_row['FromName'];?>">
					      </div>
					      <div class="col-lg-5"><span id="sendername-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="senderemail" class="col-lg-2 control-label">Sender Email</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="senderemail" id="senderemail" placeholder="Enter your recipient email" value ="<?php //echo $enq_settings_row['FromEmail'];?>">
					      </div>
					      <div class="col-lg-5"><span id="senderemail-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="replyto" class="col-lg-2 control-label">Reply To Email</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="replyto" id="replyto" placeholder="Enter your reply to email" value ="<?php //echo $enq_settings_row['ReplyTo'];?>">
					      </div>
					      <div class="col-lg-5"><span id="replyto-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="ccemail" class="col-lg-2 control-label">CC Email </label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="ccemail" id="ccemail" placeholder="Enter your cc email" value ="<?php //echo $enq_settings_row['CcEmail'];?>">
					      </div>
					      <div class="col-lg-5"><span id="ccemail-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="bccemail" class="col-lg-2 control-label">BCC Email</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="bccemail" id="bccemail" placeholder="Enter your bcc email" value ="<?php //echo $enq_settings_row['BccEmail'];?>">
					      </div>
					      <div class="col-lg-5"><span id="bccemail-error" class="text-danger"></span></div>
					    </div> -->
					    <div class="form-group">
					      <label for="emailsubject" class="col-lg-2 control-label">Email Subject <small class="text-danger">*</small></label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="emailsubject" id="emailsubject" placeholder="Enter your email subject" value ="<?php echo $enq_settings_row['EmailSubject'];?>">
					      </div>
					      <div class="col-lg-5"><span id="emailsubject-error" class="text-danger"></span></div>
					    </div>
					    <!-- <div class="page-header">
						  <h4>Email Authentication Details</h4>
						</div>
					    <div class="form-group">
					      <label for="hostname" class="col-lg-2 control-label">Host Name</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="hostname" id="hostname" placeholder="Enter your smtp host name" value ="<?php //echo $enq_settings_row['EmailHost'];?>">
					      </div>
					      <div class="col-lg-5"><span id="hostname-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="emailusername" class="col-lg-2 control-label">Username</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="emailusername" id="emailusername" placeholder="Enter your smtp username" value ="<?php //echo $enq_settings_row['EmailUsername'];?>">
					      </div>
					      <div class="col-lg-5"><span id="emailusername-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="emailpassword" class="col-lg-2 control-label">Password</label>
					      <div class="col-lg-5">
					        <input type="password" class="form-control" name="emailpassword" id="emailpassword" placeholder="Enter your smtp password" value ="<?php //echo $enq_settings_row['EmailPassword'];?>">					        
					      </div>
					      <div class="col-lg-5"><span id="emailpassword-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="emailport" class="col-lg-2 control-label">Port</label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="emailport" id="emailport" placeholder="Enter your smtp port" value ="<?php //echo $enq_settings_row['EmailPort'];?>">
					      </div>
					      <div class="col-lg-5"><span id="emailport-error" class="text-danger"></span></div>
					    </div> -->
					    <div class="page-header">
						  <h4><i class="fa fa-pencil-square-o fa-lg"></i> Form Settings</h4>
						</div>
					    <div class="form-group">
					      <label for="btntext" class="col-lg-2 control-label">Enquiry Button Text <small class="text-danger">*</small></label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="btntext" id="btntext" placeholder="Enter enquiry button text" value ="<?php echo $enq_settings_row['EnquiryBtnText'];?>">
					      </div>
					      <div class="col-lg-5"><span id="btntext-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="formhdtext" class="col-lg-2 control-label">Heading Text <small class="text-danger">*</small></label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="formhdtext" id="formhdtext" placeholder="Enter enquiry form heading text" value ="<?php echo $enq_settings_row['FormHeadingText'];?>">
					      </div>
					      <div class="col-lg-5"><span id="formhdtext-error" class="text-danger"></span></div>
					    </div>
					    <div class="form-group">
					      <label for="formhdtagtext" class="col-lg-2 control-label">Heading Tagline Text <small class="text-danger">*</small></label>
					      <div class="col-lg-5">
					        <input type="text" class="form-control" name="formhdtagtext" id="formhdtagtext" placeholder="Enter enquiry form heading tagline text" value ="<?php echo $enq_settings_row['FormSubHeadingText'];?>">
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
        	$("#emailSettings").attr("action","savesettings.php");
        	$("#emailSettings").submit();
			/*$.ajax({
			    url         : 'http://localhost/shopify/enquiry/savesettings.php',
			    cache       : false,
			    data        :send_data,
			    global      : false,
			    crossDomain : true,
			    dataType    : 'jsonp',
			    type        : 'POST',
			    success: function (data) {
			    	alert(data.savetype);
			    $("#enq-form").get(0).reset();
			    $('#enq-name-error').html("");
			    $('#enq-email-error').html("");
			    $('#enq-phone-error').html("");
			    $('#enq-message-error').html("");
			    $('#sent-msg').attr("style","display:block;");
			    }
			});*/
		}
	});
});
</script>

<?php
unset($_SESSION['success_msg']);
unset($_SESSION['error_msg']);
?>