(function ($, root, undefined) {

	$(document).ready(function () {

		// Show review modal
		$('.review-modal').on('click', function (e) {
			e.preventDefault();

			show_review_modal();

		})


	});


	window.show_review_modal = function (f) {
		$('#add_review').modal({
			keyboard: true,
			show: true
		});
	}


})(jQuery);
