<?php
/**
 * Register Custom Post types
 */
add_action('init', 'register_cpt_restaurant_menu' );



/**
 * Register taxonomies
 */
add_action( 'init', 'register_tax_production_cats' );



function register_cpt_restaurant_menu(){
    register_post_type('restaurant_product', // Register Custom Post Type
        array(
        'labels' => array(
            'name'          => __('Меню ресторана'), // Rename these to suit
            'singular_name' => __('Меню ресторана'),
        ),
        'public' => true,
        'menu_icon'  => 'dashicons-welcome-widgets-menus',
        'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail'), // Go to Dashboard Custom HTML5 Blank post for supports
    ));
}






# Taxonomies
function register_tax_production_cats() {
	$labels = array(
		'name'          => 'Категории ресторана',
		'singular_name' => 'Категории ресторана',
	);
	$args   = array(
		'label'                 => '',
		'labels'                => $labels,
		'description'           => '',
		'public'                => true,
		'publicly_queryable'    => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_tagcloud'         => true,
		'hierarchical'          => true,
		'update_count_callback' => '',
		'rewrite'               => array(
			'slug' => 'production-type',
			'hierarchical' => true
		),
//		'query_var'             => 'production-type',
		'capabilities'          => array(),
		'meta_box_cb'           => 'post_categories_meta_box',
		'show_admin_column'     => true,
	);
	register_taxonomy( 'production_cats', 'restaurant_product', $args );
	register_taxonomy_for_object_type( 'production_cats', 'restaurant_product' );
}
