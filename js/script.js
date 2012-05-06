$(document).ready(function() {
	// Replace no-js with js
	$('html').removeClass('no-js').addClass('js');

	$(".project-media-item").fancybox({
		helpers : {
			media : {
				//autoplay: false;
			}
		}
	});
});

$('.home #content p:first-child a').css('background-position', '0% 0%').hover(
	function() {
		$(this).stop().animate({
			'background-position-y': '100%'
		}, 200);
	},
	function() {
		$(this).stop().animate({
			'background-position-y': '0%'
		}, 100);
	}
);

$('.menu-item a').not('.current-menu-item a').css('background-position', '0% 0%').hover(
	function() {
		$(this).stop().animate({
			'background-position-y': '100%'
		}, 200);
	},
	function() {
		$(this).stop().animate({
			'background-position-y': '0%'
		}, 100);
	}
);

$('input, textarea, select').focus(
	function() {
		$(this).parent('span').parent('p').find('label').fadeTo('fast', 0.8);
	}
);

$('input, textarea, select').blur(
	function() {
		$(this).parent('span').parent('p').find('label').fadeTo('fast', 0.5);
	}
);


//---------------------//
// Slider
//---------------------//

// Set first slide to be current
$('.slide-hold .slide').first().fadeTo(0, 1).addClass('current');

// Set start position
var current_position = 1;
var total_slides = $('.slide-hold .slide').length;

// Set portfolio-desc
var portfolio_desc = $('#folio_item-data');

// Get first slide description
var folio_data = '.current .folio_item-data'
var the_description = $(folio_data).html();

// Set first slide description
portfolio_desc.html(the_description);

// Set .slide-hold total width
var slidehold_width = total_slides * 700;
$('.slide-hold').css('width',slidehold_width);

//---------------------//
// Previous Slide
//---------------------//
$('.slide-prev').text('&').css('font','20px IconicStrokeRegular').click(function(){

	if ( current_position != 1 ) {
		$('.slide-hold').animate({
			left: '+=700'
		}, 500);
	}

	// If we're not at the beginning...
	if ( current_position >= 2 ) {

		// Set the slide position back, and set this slide as current
		--current_position;
		$('.slide-hold .slide:nth-child(' + current_position + ')').fadeTo(500, 1).addClass('current');

		// Make sure the last slide is not current
		var previous_position = current_position + 1;
		$('.slide-hold .slide:nth-child(' + previous_position + ')').fadeTo(300, 0.3).removeClass('current');

		// Set HTML
		var the_description = $(folio_data).html();
		portfolio_desc.html(the_description);

	}
});

//---------------------//
// Next Slide
//---------------------//
$('.slide-next').text('(').css('font','20px IconicStrokeRegular').click(function(){

	if ( current_position != total_slides ) {
		$('.slide-hold').animate({
			left: '-=700'
		}, 500);
	}

	// If we're not at the end...
	if ( current_position < total_slides ) {

		// Advance the slide position and set it as current
		++current_position;
		$('.slide-hold .slide:nth-child(' + current_position + ')').fadeTo(500, 1).addClass('current');

		// Make sure the last slide is not current
		var previous_position = current_position - 1;
		$('.slide-hold .slide:nth-child(' + previous_position + ')').fadeTo(300, 0.3).removeClass('current');

		// Set HTML
		var the_description = $(folio_data).html();
		portfolio_desc.html(the_description);

	}
});