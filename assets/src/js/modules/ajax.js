(function ($, root, undefined) {
	$(document).ready(function () {

		$('#review-form').on('submit', function (e){
			e.preventDefault();

			let form_data = new FormData();

			let contact_field_review 	 = $('#contact_field_review').val();
			let contact_field_connect 	 = $('#contact_field_connect').val();

			form_data.append("contact_field_review", contact_field_review);
			form_data.append("contact_field_connect", contact_field_connect);
			form_data.append('action', 'review_form_submit');


			$.ajax({
				url: nipper_vars.ajaxurl,
				type: 'POST',
				data: form_data,
				dataType: 'json',
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function () {
					// $('.ftp-progress-loader').css("display", "block");
				},
			})
			.done(function (response) {
				console.log('response', response);
				try {
					if ( response.success ) {
						console.log('Done');
						hide_modal_by_id('#add_review');
						$(document).find('#modal-response .modal-response-render').empty();
						$(document).find('#modal-response .modal-response-render').append(  response.data.success_text  );
						show_modal_by_id( '#modal-response' );
					}

				} catch (err) {
					console.log('err', err);
					hide_modal_by_id('#add_review');
					$(document).find('#modal-response .modal-response-render').empty();
					$(document).find('#modal-response .modal-response-render').append(  response.data.error_text  );
					show_modal_by_id( '#modal-response' );
				}
			})

		})



	});
})(jQuery);
