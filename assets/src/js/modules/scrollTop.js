
(function ($, root, undefined) {

	$(document).ready(function () {

		let ScrollTop = $(document).scrollTop(),
			ScreenHeight = window.innerHeight;

		show_gototop( ScrollTop );


		// Scroll to top handlers
		$('#gototop').on('click', function(event) {
			event.preventDefault();
			$('html, body').stop().animate({scrollTop:0}, 500, 'swing');
		});

		$('#header_logo').on('click', function(event) {
			event.preventDefault();
			$('html, body').stop().animate({scrollTop:0}, 500, 'swing');
		});






		$(document).on('scroll', function(event) {
			ScrollTop = $(document).scrollTop();
			show_gototop( ScrollTop );
		});


	});


	// Functions
	function show_gototop ( ScrollTop ) {
		let ScreenHeight = window.innerHeight;
		if (ScrollTop > 250 + ScreenHeight ){
			$('#gototop').addClass('show_this');
		}
		else{
			$('#gototop').removeClass('show_this');
		}
	}


})(jQuery);


