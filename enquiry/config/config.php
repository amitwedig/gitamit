<?php

	$host = "118.139.162.49";
	$db = "wedighq_shopify";
	$user = "wedighq_shopify";
	$pass = "sh0p!fy";
	$conn = mysql_connect($host,$user,$pass) or die("Could not connect to database.");
	mysql_select_db($db);
	
	//Default values
	$emailhost = "ssl://smtp.gmail.com";
	$emailusername = "user1.guts@gmail.com";
	$emailpassword = "wedig@123";
	$emailport = "465";
	$toemail = "";
	$fromname = "";
	$fromemail = "";
	$replyto = "";
	$ccemail = "";
	$bccemail = "";
	$emailsubject = "Enquiry from your shop";
	$enqbtntext = "Send A Quick Enquiry";
	$formheadingtext = "Quick Enquiry";
	$formsubheadingtext = "submit form to send enquiry.";
	$formsubmitbtntext = "Submit";
	$mailtemplate = '<style>.im{color:#767676 !important;}</style><div style="font-family:Brandon,Helvetica,Arial!important;font-size:16px;color:#30373b;background:#ebeef0" bgcolor="#ebeef0">
    <table align="center" width="100%" style="max-width:600px;margin-left:auto;margin-right:auto">
        <tbody>
            <tr>
                <td style="text-align:center;padding:0px" align="center">
                    <p align="left" style="margin-top:10px;margin-bottom:5px"><a href="[@ShopLink]" target="_blank"  style="color:#333;font-size:28px;text-decoration:none;padding-top:15px;clear:both;text-align:center;line-height:24px;margin:0">[@ShopName]</a>
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
                                    <h2 style="font-size:22px;font-weight:normal;color:#30373b">[@EmailSubject]</h2>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="85%" align="center" style="margin-left:auto;margin-right:auto">
                        <tbody>
                            <tr>
                                <td style="padding:10px 0" align="left"><span style="font-family:Helvetica,Arial;color:#767676 !important;font-size:14px;font-weight:100;letter-spacing:0.3px;line-height:20px">[@EmailMessage]</span>
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
                                	From : <br/>
                                    <span style="font-family:Helvetica,Arial;color:#444;font-size:15px;font-weight:100;letter-spacing:0.3px;line-height:20px">
                                    [@CustomerName] ([@CustomerEmail])<br/>
                                    [@CustomerPhone]</br>
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