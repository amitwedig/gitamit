$("body").append( "<div class='show_alert'>Show Alert Box</div>" );
$(".show_alert").attr( "style", "position:fixed; bottom:0px; background:#f00; padding:5px; color:#fff; cursor:pointer; font-weight:bold; font-size:12px; right:0px;" );
$(".show_alert").click(function() {
	alert( "My first app alert box." );
});