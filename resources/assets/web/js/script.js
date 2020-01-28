$(document).ready(function() {
	/* Check width on page load*/
    if ($(window).width() < 768) {
	    $(".clinics-page .nav").removeClass('nav-stacked');
    }
    else {
	    $(".clinics-page .nav").addClass('nav-stacked');
    }
	
	$(window).resize(function() {
		if($(window).width() < 768) {
			$(".clinics-page .nav").removeClass('nav-stacked');
	   } else {
		   $(".clinics-page .nav").addClass('nav-stacked');
	   }
	});
});