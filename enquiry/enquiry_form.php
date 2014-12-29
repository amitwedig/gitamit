<style type="text/css">
#enquiry_main{
	bottom: 0px ;
    display: none ;
    right: 0px ;
    position: fixed ;
    width: 60% ;
    border: 1px solid;
}

</style>
<div id="alerts" style='position:fixed; bottom:0px; background:#666; padding:5px; color:#fff; cursor:pointer; font-weight:bold; font-size:11px; right:0px;'><a href='#enquiry_main' class='show_alert'>Send Enquiry</a></div>

<script src='js/jquery-1.10.2.min.js' type='text/javascript'></script><link rel='stylesheet' href='css/bootstrap.css' media='screen'/><div style='display:block;'><div id='enquiry_main'><div class='col-lg-12'><form class='form-horizontal'><div class='form-group'><label for='enq-name' class='col-lg-2 control-label'>Name</label><div class='col-lg-10'><input type='text' class='form-control' id='enq-name' name='enq-name' placeholder='Enter your name'></div></div><div class='form-group'><label for='enq-email' class='col-lg-2 control-label'>Email</label><div class='col-lg-10'><input type='text' class='form-control' id='enq-email' name='enq-email' placeholder='Enter your email'></div></div><div class='form-group'><label for='enq-phone' class='col-lg-2 control-label'>Phone</label><div class='col-lg-10'><input type='text' class='form-control' id='enq-phone' name='enq-phone' placeholder='Enter your phone number'></div></div><div class='form-group'><label for='enq-message' class='col-lg-2 control-label'>Message</label><div class='col-lg-10'><textarea class='form-control' rows='3' id='enq-message' name='enq-message'></textarea><span class='help-block'>A longer block of help text that breaks onto a new line and may extend beyond one line.</span></div></div><div class='form-group'><div class='col-lg-10 col-lg-offset-2'><button class='btn btn-default'>Cancel</button>&nbsp;<button type='submit' class='btn btn-primary enq-submit'>Submit</button></div></div></form></div></div></div>
<script type="text/javascript">
$(document).ready(function(){
	var enquiry_main = $( "#enquiry_main" );
	$(".show_alert").click(function(event){
		if (enquiry_main.is( ":visible" )){

                        // Hide - slide up.
                        enquiry_main.slideUp( 1000 );
                        $('#alerts').slideUp( 1000 );

                    } else {

                        // Show - slide down.
                        enquiry_main.slideDown( 1000 );
                        $('#alerts').slideDown( 1000 );

                    }
	});
	//$(".show_alert").colorbox({inline:true, width:"50%"});
});
</script>