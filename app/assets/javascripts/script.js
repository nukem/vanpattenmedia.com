$(document).ready(function() {


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
