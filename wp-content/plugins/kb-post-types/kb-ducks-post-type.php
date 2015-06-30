<?php
defined('ABSPATH') or die("No script kiddies please!");

/**
 * Plugin Name: KB - The "Ducks" Post Type
 * Description: Creates the ducks post type so odds can be saved and it can be activated / deactivated.
 * Version: 1.0
 * Author: Kirsty Burgoine
 * Author URI: http://www.kirstyburgoine.co.uk
 */


function kb_register_duck_post_type() {

	$labels = array(
		'name'               => _x( 'Ducks', 'post type general name' ),
		'singular_name'      => _x( 'Duck', 'post type singular name' ),
		'menu_name'          => _x( 'Ducks', 'admin board' ),
		'name_admin_bar'     => _x( 'Ducks', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Duck' ),
		'add_new_item'       => __( 'Add New Duck' ),
		'new_item'           => __( 'New Duck' ),
		'edit_item'          => __( 'Edit Duck' ),
		'view_item'          => __( 'View Duck' ),
		'all_item'          => __( 'All Ducks' ),
		'search_items'       => __( 'Search Ducks' ),
		'parent_item_colon'  => __( 'Parent Duck:' ),
		'not_found'          => __( 'No ducks found.' ),
		'not_found_in_trash' => __( 'No ducks found in Trash.' )
	);

	$args = array(

		'labels'				=> $labels,
		'public'				=> TRUE,
		'query_var'				=> TRUE,
		'rewrite'				=> array('slug' => 'ducks', 'with_front' => FALSE),
		'capability_type'		=> 'post',
		'taxonomies'			=> array(),
		'supports'				=> array('title', 'editor', 'thumbnail',),
		'has_archive'			=> TRUE,
		'show_in_nav_menus'		=> FALSE

	);

	register_post_type('duck', $args );

}

add_action( 'init', 'kb_register_duck_post_type' );


/*
function kb_register_board_taxonomies() {

	register_taxonomy(
		'types',
		'board',
		array(
			'labels' => array(
				'name' => 'Types',
				'add_new_item' => 'Add New Type',
				'new_item_name' => "New Type"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'show_in_nav_menus'	=> false

		)
	);

	

}

add_action( 'init', 'kb_register_board_taxonomies' );
*/



?>