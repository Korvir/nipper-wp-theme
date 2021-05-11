<?php
$cur_lang = wpm_get_language();
if ( function_exists('get_field') )
{
	$contact_field_title = get_field( 'contact_field_title', 'options');
	$contact_field_1 = get_field( 'contact_field_1', 'options');
	$contact_field_2 = get_field( 'contact_field_2', 'options');
	$contact_field_btn = get_field( 'contact_field_btn', 'options');
}
?>

<!-- Modal adult check -->
<div class="modal fade" id="add_review" tabindex="-1" role="dialog" aria-labelledby="add_review_Label" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">


			<div class="px-3 pt-4 pb-3 text-center">
				<h3 class="p-2 font-prata d-inline-block modal-title text-center border-bottom" id="add_review_Label">
					<?php echo wpm_translate_string( $contact_field_title, $cur_lang ) ?>
				</h3>
			</div>


			<div class="modal-body px-3 pb-4 pt-0">
				<div class="modal-body--content">

					<form action="#" method="post" id="review-form" class="px-3 px-md-5 py-3 d-flex flex-column align-items-start justify-content-center ">

						<label for="contact_field_review" class="w-100 d-flex flex-column align-items-start justify-content-center">
							<p class="m-0 w-100"> <?php echo wpm_translate_string( $contact_field_1, $cur_lang ) ?> <span> * </span> </p>
							<textarea name="contact_field_review"
									  id="contact_field_review"
									  class="w-100"
									  required
									  cols="30" rows="5"></textarea>
						</label>

						<label for="contact_field_connect" class="w-100 d-flex flex-column align-items-start justify-content-center">
							<p class="m-0 w-100"> <?php echo wpm_translate_string( $contact_field_2, $cur_lang ) ?> </p>
							<input type="text"
								   name="contact_field_connect"
								   id="contact_field_connect"
								   class="w-100">
						</label>

						<div class="w-100 mt-3 d-flex align-items-center justify-content-center">
							<button type="submit"
									id="contact_submit" class="py-3 px-5" >
								<?php echo wpm_translate_string( $contact_field_btn, $cur_lang ) ?>
							</button>
						</div>

					</form>

				</div>
			</div>


		</div>
	</div>
</div>
<!-- -->
