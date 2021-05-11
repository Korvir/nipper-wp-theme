<?php

add_action( 'wp_ajax_review_form_submit', 'review_form_submit_fn' );
add_action( 'wp_ajax_nopriv_review_form_submit', 'review_form_submit_fn' );

function review_form_submit_fn()
{

	// Default text
	$succes_text = __('Thank you for review!', 'html5blank');
	$error_text  = __('Some error. Sorry', 'html5blank');

	if ( function_exists( 'get_field' ) )
	{
		$succes_text = get_field( 'succes_text', 'options' );
		$error_text  = get_field( 'error_text', 'options' );
		$email_address  = get_field( 'contact_emails_to_send', 'options' );
	}

	$contact_field_review  = $_POST['contact_field_review'];
	$contact_field_connect = $_POST['contact_field_connect'];

	$mail_worker = mailWorker ( $email_address, $contact_field_review, $contact_field_connect );


	// Response
	if ( $mail_worker )
	{
		wp_send_json_success( [
			'success_text' => $succes_text
		] );
	}

	wp_send_json_error( [
		'error_text' => $error_text
	] );


}


function mailWorker( $email_address, $contact_field_review, $contact_field_connect )
{

	$headers = array(
		'From: Nipper <addictedgroupod@gmail.com>',
		'content-type: text/html',
	);

	$subject = 'Отзыв о Nipper';

	$mail_body = '<p>'. $contact_field_review .'</p>
				  <br>
				  <p>Отправлено от:'. $contact_field_connect .'</p>';



	add_filter( 'wp_mail_content_type', 'set_html_content_type' );

	$send_email = wp_mail( $email_address, $subject, $mail_body, $headers );

	remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

	return $send_email;
}



function set_html_content_type()
{
	return 'text/html';
}

