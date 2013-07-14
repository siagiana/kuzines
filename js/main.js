$(function() {
	var styleSheet = $("<style type='text/css'>").appendTo($('head'));

	function calcFullPageSize() {
		var h = $(window).height()-$('.navbar-fixed-top').height();
		styleSheet.html('.full-page { min-height: '+h+'px }');
		$('[data-spy="scroll"]').each(function () {
			var $spy = $(this).scrollspy('refresh')
		});
	}

	$(window).resize(function() {
		calcFullPageSize();
	});

	calcFullPageSize();

	$('a[href^="#"]').click(function(){
		$('html, body').animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top
		}, 500);
		return false;
	});
});