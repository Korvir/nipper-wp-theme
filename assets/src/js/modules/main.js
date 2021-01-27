(function ($, root, undefined) {

    $(document).ready(function () {
        console.log('ready!!!');

		// Open mobile menu
		$('#toggle-mobile-menu').on('click', function(event){
			event.preventDefault();
			$(document).find('body').addClass('overflow_this');
			$(document).find('.mobile-menu').css('left', 0);
		});

		// Close mobile menu
		$('#toggle-mobile-menu--close').on('click', function(event){
			event.preventDefault();
			$(document).find('body').removeClass('overflow_this');
			$(document).find('.mobile-menu').css('left', -100+'%');
		});

		$('.mobile-menu').on('click', '.menu-item-has-children', function(event){
			// event.preventDefault();
			$(this).children('.sub-menu').slideToggle('fast');
			$(this).children('.menu-item-has-children a').toggleClass('after_el_rotated');
		});



		// Scroll to anchor
		// $('a[href^="#"]').bind('click',function (e) {
		// 	e.preventDefault();
		// 	var target = this.hash,
		// 		$target = $(target);
		//
		// 	$('html, body').stop().animate( {
		// 		'scrollTop': $target.offset().top-80
		// 	}, 900, 'smooth', function () {
		// 		window.location.hash = target;
		// 	} );
		// 	return false
		// } );

		// Smooth scroll to anchor.
		document.querySelectorAll('a[href^="#"]').forEach(anchor => {
			anchor.addEventListener('click', function (e) {
				e.preventDefault();
				document.querySelector(this.getAttribute('href')).scrollIntoView({
					behavior: 'smooth'
				});
			});
		});

	});

})(jQuery);
