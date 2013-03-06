var BV;

$(function() {
	// initialize BigVideo
	BV = new $.BigVideo();

	BV.init();
	BV.show( 'http://0.0.0.0:8000/times-square.mp4', {
		ambient: true
	} );
});
