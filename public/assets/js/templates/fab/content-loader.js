$(document).ready( function() {
	
	$(function() {
	    $(".carusel").jCarouselLite({
	       'auto': 1300,
	       'visible': 5,
	       'hoverPause': true
	    });
	});

	$('.carusel ul').on('mouseenter','li', function(e) {
		var coord_x = e.clientX + (document.documentElement.scrollLeft || document.body.scrollLeft) - document.documentElement.clientLeft - 22;
		$('.hint p.hint-title a').html($(this).find('a').attr('data-title'));
		$('.hint p.hint-info').html($(this).find('a').attr('data-info'));
		$('.hint').css('left',coord_x).fadeIn(300);
	}).on('mouseleave','li',function(e) {
		var curr_x = e.clientX + (document.documentElement.scrollLeft || document.body.scrollLeft);
		var curr_y = e.clientY + (document.documentElement.scrollTop || document.body.scrollTop);
		$('.hint').offset(function(i,val){
			if ((curr_x < val.left) || (curr_x > val.left + this.width) || (curr_y < val.top - 10) || (curr_y > val.top + this.height)) {
				$('.hint').fadeOut(200);
			}
		});
	});

	$('.hint').on('mouseleave',function() {
		$('.hint').fadeOut(200);
	})

	$( ".main-menu" ).click(function() {
        $( ".main-menu-content" ).toggleClass( "active", 500 );
    });

	$("#all-columns").css("width", $("#all-columns").children().length * $(".column").width());

    $('.metro-wrapper li').hover(function(){
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
    	if ($("#all-columns").width() - $("#content").scrollLeft() > 2*800)
        	$("#content").scrollTo( '+=800px', 900, { axis:'x'});
        //$("#content").scrollTo( '-=20px', 900, { axis:'y'});
        return false;
    });

	$(".metro-wrapper ul li a").click(function(){
		var selected = $(this).attr('href');	
		$("#content").scrollTo(selected, 900);
		$("#content").scrollTo( '-=48px', 900, { axis:'x'});	
		return false;
	});

    $(".main-menu-content a").click(function(){
		var selected = $(this).attr('href');	
		$("#content").scrollTo(selected, 900);
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

	get("news/index",            "#news", "");
	get("products/tiles",        "#products", "");
	get("productions/tiles",     "#productions", "");
	get("raws/index",            "#raws", "");
	get("implementations/index", "#implementations", "");
	get("partners/index",        "#partners", "");
	get("contacts/tiles",        "#contacts", "");

	$('#list-news-button').click(function() {
		get("news/index", "#news", "");
		return false;
	});
	$('#tile-news-button').click(function() {
		get("news/tiles", "#news", "");
		return false;
	});

	$('#list-products-button').click(function() {
		get("products/index", "#products", "");
		return false;
	});
	$('#tile-products-button').click(function() {
		get("products/tiles", "#products", "");
		return false;
	});

	$('#list-productions-button').click(function() {
		get("productions/index", "#productions", "");
		return false;
	});
	$('#tile-productions-button').click(function() {
		get("productions/tiles", "#productions", "");
		return false;
	});

	$('#list-raws-button').click(function() {
		get("raws/index", "#raws", "");
		return false;
	});
	$('#tile-raws-button').click(function() {
		get("raws/tiles", "#raws", "");
		return false;
	});

	$('#list-implementations-button').click(function() {
		get("implementations/index", "#implementations", "");
		return false;
	});
	$('#tile-implementations-button').click(function() {
		get("implementations/tiles", "#implementations", "");
		return false;
	});

	$('#list-partners-button').click(function() {
		get("partners/index", "#partners", "");
		return false;
	});
	$('#tile-partners-button').click(function() {
		get("partners/tiles", "#partners", "");
		return false;
	});
	$('#list-contacts-button').click(function() {
		get("contacts/index", "#contacts", "");
		return false;
	});
	$('#tile-contacts-button').click(function() {
		get("contacts/tiles", "#contacts", "");
		return false;
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
		$(to + " #" + this.id + ' h3').toggleClass("tile-active", 200);
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

