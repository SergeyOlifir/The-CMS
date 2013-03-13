$(document).ready( function() {
	
	$( ".main-menu" ).click(function() {
        $( ".main-menu-content" ).toggleClass( "active", 500 );
    });

    $('.metro-wrapper .round').hover(function(){
		$(this).find('h3').toggleClass("menu-tile-active", 200);
	});

	$(window).resize(function() {
		setPadding();
	});

	setPadding();

	$(".content-arrow ul li a").click(function(){
	        var selected = $(this).attr('href');
	        $("#content").scrollTo(selected, 900, {offset:{ left:0, top:-125 }});
			$("#content").scrollTo( '-=48px', 900, { axis:'x'});
	        return false;
	    });
	
	    $(".left-arrow").click(function(){
	        $("#content").scrollTo( '-=800px', 900, { axis:'x'});
	        return false;
	    });
	
	    $(".right-arrow").click(function(){
	        $("#content").scrollTo( '+=800px', 900, { axis:'x', offset:700});
	        //$("#content").scrollTo( '-=20px', 900, { axis:'y'});
	        return false;
	    });

	$(".metro-wrapper ul li a, a.map-link").click(function(){
		var selected = $(this).attr('href');	
		$("#content").scrollTo(selected, 900);	
		$("#content").scrollTo( '-=48px', 900, { axis:'x'});
		return false;
	});

    $(".main-menu-content a").click(function(){
		var selected = $(this).attr('href');	
		$("#content").scrollTo(selected, 900);
		$("#content").scrollTo( '-=48px', 900, { axis:'x'});
		HideMenu();		
		return false;
	});


	$(".column .paginator-wrapper .paginator-bottom").click(function(){
		$('#' + $(this).attr('targetContent')).scrollTo('+=345px', 500, { axis:'y' });
	});

	$(".column .paginator-wrapper .paginator-top").click(function(){
		$('#' + $(this).attr('targetContent')).scrollTo('-=345px', 500, { axis:'y' });
	});


   $('body').click(function (event) {
    	HideMenu();
    });  

    function HideMenu() {
    	if($(".main-menu-content").hasClass('active')){ $(".main-menu-content").removeClass( "active", 500 ); };
    	return false;
    }
	
	$(".content").each(function(){
		var _this = this;
		get("home/page/list/" + $(this).attr("data"), "#" + $(this).attr("id"), "");
		$('#list-' + $(this).attr("id") + '-button').click(function() {
			get("home/page/list/" + $(_this).attr("data"), "#" + $(_this).attr("id"), "");
			return false;
		});
		
		$('#tile-' + $(this).attr("id") + '-button').click(function() {
			get("home/page/tiles/" + $(_this).attr("data"), "#" + $(_this).attr("id"), "");
			return false;
		});
	});

});

function get(uri, to, params) {
	$.ajax({
		url: uri,
		success: function(response) {
			var dat = response;
			$(to).html(dat.data + dat.popup);
			galeryInitialise();
			tilehover(to);
		},
		error: function(data) {
			$(to).html("Пусто");
		}
	});
}

function galeryInitialise() {
	$('.fancybox').fancybox({
		closeBtn  : true,
		helpers : {
			title : {
				type : 'inside'
			},
			buttons: {}
		},
		afterLoad : function() {
			this.title = (this.index + 1) + ' / ' + this.group.length + (this.title ? ' - ' + this.title : '');
		}
	});
}

function tilehover(to) {
	$(to +' ul.tile li a').hover(function(){
		$("#" + this.id + ' h3').toggleClass("tile-active", 200);
	});
}

function setPadding() {
	var contentHeight = $("#all-wrapper").height();
	var clientHeight = window.innerHeight;
	var pading = (clientHeight - contentHeight) / 2;
	//debugger;
	if(pading > 0) {
		$("#header").css("padding", pading+"px 0 0 0");
		$("#footer").css("padding", "0 0 " + pading + "px 0");
		$("html").css("overflow-y", "hidden");
	} else {
		$("html").css("overflow-y", "auto");
	}
}

