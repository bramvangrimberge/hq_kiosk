$(document).ready(function() {
	$("#slideshow > div:gt(0)").hide();

	setInterval(function() { 
		$('#slideshow > div:first')
	    .fadeOut(0)
	    .next()
	    .fadeIn(0)
	    .end()
	    .appendTo('#slideshow');
	},  10000);
})

