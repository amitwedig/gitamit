<?php
$mailtemplate = '<div style="font-family:Brandon,Helvetica,Arial!important;font-size:16px;color:#30373b;background:#ebeef0" bgcolor="#ebeef0">
    <table align="center" width="100%" style="max-width:600px;margin-left:auto;margin-right:auto">
        <tbody>
            <tr>
                <td style="text-align:center;padding:0px" align="center">
                    <p align="left" style="margin-top:10px;margin-bottom:5px"><a href="[@ShopLink]" target="_blank" style="color:#333;font-size:30px;text-decoration:none;padding-top:15px;clear:both;text-align:center;line-height:24px;margin:0">[@ShopName]</a>
                    </p>
                </td>
                <td style="text-align:center;padding:0px" align="center">
                    <p align="right" style="font-weight:500;letter-spacing:0.5px;font-size:13px;margin-top:0;margin-bottom:5px;color:#30373b;text-transform:uppercase"><strong></strong>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <table cellspacing="0" align="center" width="100%" style="max-width:600px;border-radius:2px;border-spacing:0px;margin-left:auto;margin-right:auto;background:#fff;border:1px solid #dddddd" bgcolor="#FFF">
        <tbody>
            <tr>
                <td style="text-align:center;padding:0px" align="center">
                    <table align="center" style="border-collapse:collapse;margin-left:auto;margin-right:auto" width="100%">
                        <tbody>
                            <tr>
                                <td style="border-bottom-width:1px;border-bottom-color:#e6ebed;border-bottom-style:solid;vertical-align:top;text-align:center;background:#fafbfc center;padding:20px" align="center" bgcolor="#fafbfc" valign="top">
                                    <h2 style="font-size:24px;font-weight:normal;color:#30373b">[@EmailSubject]</h2>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="85%" align="center" style="margin-left:auto;margin-right:auto">
                        <tbody>
                            <tr>
                                <td style="padding:10px 0" align="left"><span style="font-family:Helvetica,Arial;color:#767676;font-size:14px;font-weight:100;letter-spacing:0.3px;line-height:20px">[@EmailMessage]</span>
                                </td>
                            </tr>
                            <!--<tr>
                                <td style="text-align:center;padding:10px 0 35px" align="center">
                                    <span style="border-radius:3px;display:inline-block;background:#79b657;padding:10px 30px;border:0px solid #2a74a0"><a href="#" title="Ex-con Turns His Life Around" style="color:#fff;font-size:16px;font-weight:400;text-decoration:none;letter-spacing:1px" target="_blank">Read now</a>
                                    </span>
                                </td>
                            </tr>-->
                            <tr>
                                <td style="text-align:center;padding:0px 0px 5px" align="center"><hr style="min-height:1px;background:#e5e5e5;padding:0;border:none">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:0px 0px 5px;" align="left">
                                    <span style="font-family:Helvetica,Arial;color:#444;font-size:15px;font-weight:100;letter-spacing:0.3px;line-height:20px">
                                    [@CustomerName]<br/>
                                    [@EmailEmail]</br>
                                    [@EmailPhone]</br>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                </td>
            </tr>
        </tbody>
    </table>
    <table align="center" width="100%" style="margin-left:auto;margin-right:auto;padding:10px 0 0">
        <tbody>
            <tr>
                <td style="text-align:left;padding:0 10px" align="left">
                    <!--<p align="center" style="padding-top:15px;clear:both;text-align:center;line-height:24px;font-size:12px;color:#aaa;text-decoration:none;margin:0">
                        <a href="#" style="color:#888;font-size:13px;text-decoration:none" target="_blank">Support</a>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="#" style="color:#888;font-size:13px;text-decoration:none" target="_blank">Forums</a>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="#" style="color:#888;font-size:13px;text-decoration:none" target="_blank">Theme Store</a>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="#" style="display:inline-block;color:#888;font-size:13px;text-decoration:none" target="_blank">App Store</a>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="#" style="color:#888;font-size:13px;text-decoration:none" target="_blank">Shopify Experts</a>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="#" style="color:#888;font-size:13px;text-decoration:none" target="_blank">Blog</a>
                    </p>-->
                    <p style="padding-top:15px;clear:both;text-align:center;line-height:24px;font-size:12px;color:#aaa;text-decoration:none;margin:0" align="center"> &copy; <a href="[@ShopLink]" style="color:#aaa;font-size:12px;text-decoration:none;padding-top:15px;clear:both;text-align:center;line-height:24px;margin:0" target="_blank">[@ShopName]</a>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</div>';
?>
<?php 

echo $mailtemplate;
/*$timezoneIderntifiers = DateTimeZone::listIdentifiers();
print "<pre>";
print_r($timezoneIderntifiers);
print "</pre>";
//date_default_timezone_set('Asia/Kolkata');
$date1 = date('Y-m-d H:i:s');
$date2 = strtotime($date1." UTC+05:30");
echo date("d-m-Y h:i:s",$date2);
*/

?>
<?php /**
<style type='text/css'>#enquiry_main{display: none ;width: 100% ;background: #efefef;border: 5px solid #3f4141;border-bottom: 0;border-right: 0;overflow: hidden;border-radius: 5px 0 0 0;-moz-border-radius: 5px 0 0 0;-webkit-border-radius: 5px 0 0 0;}.enquiry-box{position: fixed; bottom: 0; right: 0px; width: 450px; z-index: 9999;}.enquiry-box .enquiry-btn{float: right; padding:6px 10px; color:#fff; cursor:pointer; font-weight:normal; font-size:12px; background:#3f4141; text-decoration: none; border-radius: 5px 0 0 0; -moz-border-radius: 5px 0 0 0; -webkit-border-radius: 5px 0 0 0; margin-right: 0;}/*.enquiry-box .enquiry-btn:hover, .enquiry-box .enquiry-btn:focus{ background:#cb210e;}.enquiry-box .enquiry-btn.active{background:#cb210e;}.enquiry-box .enquiry-btn.active:hover, .enquiry-box .enquiry-btn.active:focus{background:#3f4141;} !end comment  </style><script src='js/jquery-1.10.2.min.js' type='text/javascript'></script><link rel='stylesheet' href='css/enq_form_bootstrap.css' media='screen'/><div class='enquiry-box'><div class='show_alert enquiry-btn'>Send A Quick Enquiry</div><div id='enquiry_main'><div class='col-lg-12'><div><h2>Quick Enquiry</h2><small>submit form to send enquiry.</small><br/><br/></div><form class='form-horizontal'><div class='form-group'><label for='enq-name' class='col-lg-2 control-label'>Name</label><div class='col-lg-10'><input type='text' class='form-control' id='enq-name' name='enq-name' placeholder='Enter your name' onKeyPress='return isAlphaKey(event);'><span id="enq-name-error" class='text-danger'></span></div></div><div class='form-group'><label for='enq-email' class='col-lg-2 control-label'>Email</label><div class='col-lg-10'><input type='text' class='form-control' id='enq-email' name='enq-email' placeholder='Enter your email'><span id="enq-email-error" class='text-danger'></span></div></div><div class='form-group'><label for='enq-phone' class='col-lg-2 control-label'>Phone</label><div class='col-lg-10'><input type='text' class='form-control' id='enq-phone' name='enq-phone' placeholder='Enter your phone number' onKeyPress='return isNumberKey(event);'><span id="enq-phone-error" class='text-danger'></span></div></div><div class='form-group'><label for='enq-message' class='col-lg-2 control-label'>Message</label><div class='col-lg-10'><textarea class='form-control' rows='3' id='enq-message' name='enq-message' onKeyPress='return isAlphaKey(event);'></textarea><span id="enq-message-error" class='text-danger'></span><span class='help-block'>A longer block of help text that breaks onto a new line and may extend beyond one line.</span></div></div><div class='form-group'><div class='col-lg-10 col-lg-offset-2'><button type='button' class='btn btn-primary enq-submit'>Submit</button></div></div></form></div></div></div>
<script type='text/javascript'>function isNumberKey(evt){var charCode = (evt.which) ? evt.which : event.keyCode; if (charCode > 31 && (charCode < 48 || charCode > 57)){ return false; } return true;} function isAlphaKey(evt){var charCode = (evt.which) ? evt.which : event.keyCode; if (((charCode >=65) && (charCode <=90) )|| (charCode >=97) || (charCode>42 && charCode<48) || (charCode>39 && charCode<42)|| (charCode>47 && charCode<58)|| (charCode>31 && charCode<33) || charCode==8){ return true; } return false;}

$(document).ready(function(){
    var enquiry_main = $( "#enquiry_main" );
    $(".show_alert").click(function(event){
        if (enquiry_main.is( ":visible" )){
                        enquiry_main.slideUp( 500 );
                    } else {
                        enquiry_main.slideDown( 500 );
                    }
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

            $.ajax({
                url: 'email.php',
                cache: false,
                data:send_data,
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    alert(data);
                }
            });
        }
    });
});
</script>
*/?>