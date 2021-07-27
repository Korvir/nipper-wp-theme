(function ($, root, undefined) {

    $(document).ready(function () {

    	console.log('ready!!!');

		// Open mobile menu
		$('#toggle-mobile-menu').on('click', function(event){
			event.preventDefault();
			$(document).find('body').addClass('overflow_this');
			$(document).find('.mobile-menu').css('right', 0);
		});

		// Close mobile menu
		$('#toggle-mobile-menu--close').on('click', function(event){
			event.preventDefault();
			$(document).find('body').removeClass('overflow_this');
			$(document).find('.mobile-menu').css('right', -100+'%');
		});

		// Mobile menu actions
		$('.mobile-menu').on('click', '.menu-item:not(.menu-item-has-children) > a', function(event){
			// event.preventDefault();

			//close menu
			$(document).find('body').removeClass('overflow_this');
			$(document).find('.mobile-menu').css('right', -100+'%');

			// open submenu
			$(this).children('.sub-menu').slideToggle('fast');
			$(this).children('.menu-item-has-children a').toggleClass('after_el_rotated');

		});

		// Mobile menu actions
		$('.mobile-menu').on('click', '.menu-item-has-children a', function(event){
			// event.preventDefault();

			// open submenu
			$(this).parents('.menu-item').children('.sub-menu').slideToggle('fast');
			$(this).parents('.menu-item').children('.menu-item-has-children a').toggleClass('after_el_rotated');

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


		$("a[href^='#']").on('click', function(e) {
			// prevent default anchor click behavior
			e.preventDefault();

			// animate
			$('html, body').animate({
				scrollTop: $(this.hash).offset().top - 66
			}, 900, function(){
			});
		});



		window.show_adult_modal = function (f) {
			$('#adult_check').modal({
				backdrop: 'static',
				keyboard: true,
				show: true
			});
		}

		window.show_modal_by_id = function ( string ) {
			$( string ).modal('show');
		}

		window.hide_modal_by_id = function ( string ) {
			$( string ).modal('hide');
		}


	});

})(jQuery);
