$(function(){
	 // Gallery
    $('.main-metro-wrapper .tile, .main-metro-wrapper .thumbnail').mouseenter(
    	function(){
    		$(this).find('.buttons-area').css('display','block').fadeTo(700, 1);
    		$(this).find('.overlay').fadeTo(500, 0.7);
    		$(this).find('.img-polaroid').addClass('active', 500);
    }).mouseleave(
    	function(){
    		$(this).find('.buttons-area').fadeTo(700, 0.6).css('display','none');
    		$(this).find('.overlay').fadeTo(500, 0);
    		$(this).find('.img-polaroid').removeClass('active', 500);
    });

    $('.main-metro-wrapper .tile .buttons-area a, .main-metro-wrapper .thumbnail .buttons-area a').mouseenter(
    	function(){
    		$(this).addClass('active', 300);
    		$(this).parent().parent().find('.img-polaroid').removeClass('active', 500);
    }).mouseleave(
    	function(){
    		$(this).removeClass('active', 300);
    		$(this).parent().parent().find('.img-polaroid').addClass('active', 500);
    });

    $('.fancybox').fancybox({
		closeBtn  : true,

		helpers : {
			title : {
				type : 'inside'
			}
		},
		afterLoad : function() {
			this.title = (this.index + 1) + ' / ' + this.group.length + (this.title ? ' - ' + this.title : '');
		}
	});

	$('#scroll').scrollspy();

	$('[data-spy="scroll"]').each(function () {
    	var spy = $(this).scrollspy('refresh');
    });

});