$(document).ready(function() {

	$('.more').delay(1000).fadeTo(500, 0.5);
	
	$('.more').hover(
		function() {
			$(this).fadeTo(500, 0.75);
		}, function() {
			$(this).fadeTo(500, 0.5);
		}
	);

	$('.gal-item').hover(
		function() {
			$(this).find('img').pixastic(
				'blurfast',
				{
					amount: 0.3
				}
			);
		},
		function() {
			$(this).find('canvas').each( function() {
				Pixastic.revert(this);
			} );
		}
	);

});
