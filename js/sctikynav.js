$(document).scroll(function () {
	    var y = $(this).scrollTop();
	    if (y > 350) {
	        $('.bottomMenu').fadeIn();
	    } else {
	        $('.bottomMenu').fadeOut();
	    }
	});