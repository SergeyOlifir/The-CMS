$(document).ready( function() {
	$(window).resize(function() {
		setPadding();
	});

	setPadding();
});

function setPadding() {
	var contentHeight = $("body").height();
	var clientHeight = window.innerHeight;
	var pading = (clientHeight - contentHeight) / 2;
	//debugger;
	if(pading > 0) {
		$("#header").css("margin", "0px 0 " + pading+ "px 0");
		$("footer").css("margin", pading +"px 0 0px 0");
		$("html").css("overflow-y", "hidden");
	} else {
		$("html").css("overflow-y", "auto");
	}
}