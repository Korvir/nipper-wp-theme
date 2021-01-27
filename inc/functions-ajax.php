<?php 

add_action( 'wp_ajax_add_order', 'add_order_via_ajax' );
add_action( 'wp_ajax_nopriv_add_order', 'add_order_via_ajax' );
function add_order_via_ajax(){
	$return = array();
	$return['status'] = 'false';
	$return['message'] = 'Fail!';

	var_dump($_POST);

	echo json_encode($return);
	die;	
}


// $str = "first=value&arr[]=foo+bar&arr[]=baz";

// // Рекомендуемый подход
// parse_str($str, $output);
// echo $output['first'];  // value
// echo $output['arr'][0]; // foo bar
// echo $output['arr'][1]; // baz


 ?>