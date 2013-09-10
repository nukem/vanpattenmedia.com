$(document).ready(function() {

	$.localScroll();

	$('.more').delay(500).animate({
		opacity: 0.5
	}, 500 );
	
	$('.more').hover(
		function() {
			$(this).fadeTo(250, 0.9);
		},
		function() {
			$(this).fadeTo(250, 0.5);
		}
	);

});
