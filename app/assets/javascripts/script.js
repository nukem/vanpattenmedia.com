$(document).ready(function() {

	$.localScroll();

	$('.more').delay(500).fadeTo(500, 0.5);
	
	$('.more').hover(
		function() {
			$(this).fadeTo(250, 0.9);
		},
		function() {
			$(this).fadeTo(250, 0.5);
		}
	);

});
