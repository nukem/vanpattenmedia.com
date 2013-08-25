$(document).ready(function() {


	$('.gal-item').on({
		mouseenter: function() {
			$(this).find('img').pixastic(
				'blurfast',
				{
					amount: 0.3
				}
			);
		},
		mouseleave: function() {
			$(this).find('canvas').each( function() {
				Pixastic.revert(this);
			} );
		}
	});

});
