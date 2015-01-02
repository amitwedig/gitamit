$("body").append( "<style type='text/css'>#enquiry_main{display: none ;width: 100% ;background: #efefef;border: 5px solid #3f4141;border-bottom: 0;border-right: 0;overflow: hidden;border-radius: 5px 0 0 0;-moz-border-radius: 5px 0 0 0;-webkit-border-radius: 5px 0 0 0;}.enquiry-box{position: fixed; bottom: 0; right: 0px; width: 450px; z-index: 9999;}.enquiry-box .enquiry-btn{float: right; padding:6px 10px; color:#fff; cursor:pointer; font-weight:normal; font-size:12px; background:#3f4141; text-decoration: none; border-radius: 5px 0 0 0; -moz-border-radius: 5px 0 0 0; -webkit-border-radius: 5px 0 0 0; margin-right: 0;}</style><script type='text/javascript'>function isNumberKey(evt){var charCode = (evt.which) ? evt.which : event.keyCode; if (charCode > 31 && (charCode < 48 || charCode > 57)){ return false; } return true;} function isAlphaKey(evt){var charCode = (evt.which) ? evt.which : event.keyCode; if (((charCode >=65) && (charCode <=90) )|| (charCode >=97) || (charCode>42 && charCode<48) || (charCode>39 && charCode<42)|| (charCode>47 && charCode<58)|| (charCode>31 && charCode<33) || charCode==8){ return true; } return false;}</script><link href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel='stylesheet'><script src='http://dev.wedighq.com/shopify/quick_enquiry/js/jquery-1.10.2.min.js' type='text/javascript'></script><link rel='stylesheet' href='http://dev.wedighq.com/shopify/quick_enquiry/css/enq_form_bootstrap.css' media='screen'/><div class='enquiry-box'><div class='show_alert enquiry-btn'>Send A Quick Enquiry</div><div id='enquiry_main'><div class='col-lg-12'><div><h2>Quick Enquiry</h2><small>submit form to send enquiry.</small><br/><br/><div id='sent-msg' style='display:none;'><center><p class='text-success'><i class='fa fa-check-circle fa-2x'></i> Mail successfully sent.</p></center></div></div><form id='enq-form' class='form-horizontal'><div class='form-group'><label for='enq-name' class='col-lg-2 control-label'>Name</label><div class='col-lg-10'><input type='text' class='form-control' id='enq-name' name='enq-name' placeholder='Enter your name' onKeyPress='return isAlphaKey(event);'><span id='enq-name-error' class='text-danger'></span></div></div><div class='form-group'><label for='enq-email' class='col-lg-2 control-label'>Email</label><div class='col-lg-10'><input type='text' class='form-control' id='enq-email' name='enq-email' placeholder='Enter your email'><span id='enq-email-error' class='text-danger'></span></div></div><div class='form-group'><label for='enq-phone' class='col-lg-2 control-label'>Phone</label><div class='col-lg-10'><input type='text' class='form-control' id='enq-phone' name='enq-phone' placeholder='Enter your phone number' onKeyPress='return isNumberKey(event);'><span id='enq-phone-error' class='text-danger'></span></div></div><div class='form-group'><label for='enq-message' class='col-lg-2 control-label'>Message</label><div class='col-lg-10'><textarea class='form-control' rows='3' id='enq-message' name='enq-message' onKeyPress='return isAlphaKey(event);'></textarea><span id='enq-message-error' class='text-danger'></span><span class='help-block'>A longer block of help text that breaks onto a new line and may extend beyond one line.</span></div></div><div class='form-group'><div class='col-lg-10 col-lg-offset-2'><button type='button' class='btn btn-primary enq-submit'>Submit</button></div></div></form></div></div></div>" );


var enquiry_main = $( "#enquiry_main" );
$(".show_alert").click(function(event){
	if (enquiry_main.is( ":visible" )){
		enquiry_main.slideUp( 500 );
    } else {
    	enquiry_main.slideDown( 500 );
    }
    $('#sent-msg').attr("style","display:none;");
});

	$(".enq-submit").click(function(event){
        var enq_name = $('#enq-name').val();
        var enq_email = $('#enq-email').val();
        var enq_phone = $('#enq-phone').val();
        var enq_message = $('#enq-message').val();
        var atpos=enq_email.indexOf("@");
        var dotpos=enq_email.lastIndexOf(".");
        var check_error = 0;
        //validations
        if(enq_name == ""){
            check_error = 1;
            $('#enq-name-error').html("Please enter your name.");
        }else{
            $('#enq-name-error').html("");
        }
        if(enq_email == ""){
            check_error = 1;
            $('#enq-email-error').html("Please enter your email.");
        }else{
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=enq_email.length){
                check_error = 1;
                $('#enq-email-error').html("Please enter valid email address.");
            }else{
                $('#enq-email-error').html("");
            }
        }
        if(enq_phone == ""){
            check_error = 1;
            $('#enq-phone-error').html("Please enter your phone number.");
        }else{
            $('#enq-phone-error').html("");
        }
        if(enq_message == ""){
            check_error = 1;
            $('#enq-message-error').html("Please enter your message.");
        }else{
            $('#enq-message-error').html("");
        }

        if(check_error == 0){
            var send_data = {
                'enq_name':enq_name,
                'enq_email':enq_email,
                'enq_phone':enq_phone,
                'enq_message':enq_message,
            };
            /*img = $("<img />").attr("src", 'http://dev.wedighq.com/shopify/quick_enquiry/email.php?enq_name='+enq_name+'&enq_email='+enq_email+'&enq_phone='+enq_phone+'&enq_message='+enq_message);
            img.load(function () {});
            img.error(function (data) {
            	$("#enq-form").get(0).reset();
            	$('#enq-name-error').html("");
            	$('#enq-email-error').html("");
            	$('#enq-phone-error').html("");
            	$('#enq-message-error').html("");
            	$('#sent-msg').attr("style","display:block;");
            });*/

            $.ajax({
                url         : 'http://dev.wedighq.com/shopify/quick_enquiry/email.php',
                cache       : false,
                data        :send_data,
                global      : false,
                crossDomain : true,
                dataType    : 'jsonp',
                type        : 'POST',
                success: function (data) {
                $("#enq-form").get(0).reset();
                $('#enq-name-error').html("");
                $('#enq-email-error').html("");
                $('#enq-phone-error').html("");
                $('#enq-message-error').html("");
                $('#sent-msg').attr("style","display:block;");
                }
            });
        }
    });