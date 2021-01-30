<?php

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Анализ Рекламы',
    //     'menu_title'    => 'Advertising',
    //     'parent_slug'   => 'theme-general-settings',
    //     'capability'    => 'read',
    // ));
}

# Add autosave path for acf-json fields
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );
function my_acf_json_save_point( $path ) {
	$path = get_template_directory() . '/acf_sync';

	return $path;
}

# Add autoload path for acf-json fields
add_filter( 'acf/settings/load_json', 'my_acf_json_load_point' );
function my_acf_json_load_point( $paths ) {
	unset( $paths[0] );
	$paths[] = get_template_directory() . '/acf_sync';

	return $paths;
}
