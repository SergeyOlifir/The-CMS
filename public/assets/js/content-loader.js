$(document).ready( function() {
	
	$( ".main-menu" ).click(function() {
        $( ".main-menu-content" ).toggleClass( "active", 500 );
    });
	
	$("#all-columns").css("width", $("#all-columns").children().length * $(".column").width());

    $('.metro-wrapper .round').hover(function(){
		$(this).find('h3').toggleClass("menu-tile-active", 200);
	});

	$(window).resize(function() {
		setPadding();
	});
			
	$("body").on("click", 'a[data-reveal-id]', function(event){
		get("home/page/popup/" + $(this).attr("content_id"), "#content-of-popup");
	});

	setPadding();
	$(".content-arrow ul li, .metro-wrapper, .main-menu-content").on('click', 'a', function(event){
		$("#content").scrollTo($(this).attr('href'), 900).scrollTo( '-=48px', 900, { axis:'x'});
		HideMenu();
		return false;
	});

	$(".left-arrow").click(function(){
		$("#content").scrollTo( '-=800px', 900, { axis:'x'});
		return false;
	});

	$(".right-arrow").click(function(){
		$("#content").scrollTo( '+=800px', 900, { axis:'x', offset:700});
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
			$(to).html(dat.data);
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
	if(pading > 0) {
		$("#header").css("padding", pading+"px 0 0 0");
		$("#footer").css("padding", "0 0 " + pading + "px 0");
		$("html").css("overflow-y", "hidden");
	} else {
		$("html").css("overflow-y", "auto");
	}
}

