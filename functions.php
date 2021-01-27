<?php
/*
 *  Author: Anton Shcherbyna
 *  URL: html5blank.com | @html5blank
*/

include_once 'inc/define.php';
include_once 'inc/functions-enqueue.php';
include_once 'inc/functions-default.php';
include_once 'inc/functions-menus.php';
include_once 'inc/functions-breadcrumbs.php';
include_once 'inc/functions-common.php';
include_once 'inc/functions-ajax.php';

include_once 'inc/svg.php';

include_once 'inc/post_types.php';
include_once 'inc/acf.php';





















/*
*       ADD COLUMN TO COLUMNS LIST
*/
// add_filter('manage_{POST_TYPE}_posts_columns', 'ST4_columns_head');
// function ST4_columns_head($defaults) {
//     $defaults['first_column']  = 'First Column';
//     $defaults['second_column'] = 'Second Column';
//     return $defaults;
// }

/*
*   DISPLAY
*/
// add_action('manage_{POST_TYPE}_posts_custom_column', 'ST4_columns_book_content', 10, 2);
// function ST4_columns_book_content($column_name, $post_ID) {
//     if ($column_name == 'first_column') {
//         // First column
//     }
//     if ($column_name == 'second_column') {
//         // Second column
//     }
// }

/*
*       SORTABLE Columns
*/
// add_filter( 'manage_{POST_TYPE}_sortable_columns', 'my_sortable_cake_column' );
// function my_sortable_cake_column( $columns ) {
//     $columns['slices'] = 'slice';

//     return $columns;
// }
// add_action( 'pre_get_posts', 'my_slice_orderby' );
// function my_slice_orderby( $query ) {
//     if( ! is_admin() )
//         return;

//     $orderby = $query->get( 'orderby');

//     if( 'slice' == $orderby ) {
//         $query->set('meta_key','slices');
//         $query->set('orderby','meta_value_num');
//     }
// }


?>
