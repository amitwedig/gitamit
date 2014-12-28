$("body").append( "<div class='show_alert'>Send Enquiry</div>" );
$(".show_alert").attr( "style", "position:fixed; bottom:0px; background:#f00; padding:5px; color:#fff; cursor:pointer; font-weight:bold; font-size:11px; right:0px;" );
//$("body").append( "<div style='display:none;'><div id='enquiry_div'>Enquiry form comes here.</div></div>" );
$(".show_alert").click(function() {
	$.fancybox("<div id='enquiry_div'>Enquiry form comes here.</div>");
});