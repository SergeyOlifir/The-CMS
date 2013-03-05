$(document).ready(function() {
	$('.fancybox').fancybox({
		closeBtn  : false,

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
});
