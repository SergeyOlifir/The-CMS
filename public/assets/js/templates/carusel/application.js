$(function(){
	$(".carousel-partners").jCarouselLite({
		'auto': 2000,
		'visible': 6,
		'hoverPause': true
	}); 
	$('.fancybox').fancybox({
		closeBtn  : true,

		helpers : {
			title : {
				type : 'inside'
			},
			buttons: {
				position : 'top'
			}
		},
		afterLoad : function() {
			this.title = (this.index + 1) + ' / ' + this.group.length + (this.title ? ' - ' + this.title : '');
		}
	});
	$('.content-and-social-button #social-buttons .back-link').click(function(){
		history.back();
	})
});