$("body").append( "<div class='show_alert'>Show Alert Box</div>" );
$(".show_alert").attr( "style", "position:absolute; bottom:0px; background:#f00; padding:5px; color:#fff;" );
$(".show_alert").click(function() {
	alert( "My first app alert box." );
});