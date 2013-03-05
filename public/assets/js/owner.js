$(document).ready(function(){
	$(".delete").click(function() {
		if(!confirm($(this).attr("data-confirmation-message"))) {
			return false;
		}

		return true;
	});

	$("form").submit(function () {
		$(this).find("input[type=submit]").attr('disabled', 'disabled');
	});
	
	$('.notifications_place_id').change(function(){
		show_place_resipients(this.options[this.selectedIndex].value);
	});
});


function show_place_resipients(place_id) {
	$(".resipients_carusel").addClass("hidden");
	$("#"+place_id).removeClass("hidden");
}

function OnlyNum(e)
	{
		var keynum;
		var keychar;
		var numcheck;
		var return2;
		if(window.event) { // IE
			keynum = e.keyCode;
		}
		else if(e.which) { // Netscape/Firefox/Opera
			keynum = e.which;
		}
		keychar = String.fromCharCode(keynum);
		if (keynum < 45 || keynum > 57) {
			return2 = false;
			if (keynum == 8) {
				return2 = true;
			}
		}
		else return2 = true;
		return return2;
	}
