<?php
defined('ABSPATH') or die("No script kiddies please!");

/**
 * Plugin Name: KB - The "Races" Post Type
 * Description: Creates the races post type used within the directory so that it can be activated / deactivated.
 * Version: 1.0
 * Author: Kirsty Burgoine
 * Author URI: http://www.kirstyburgoine.co.uk
 */


function kb_register_races_post_type() {

	$labels = array(
		'name'               => _x( 'Races', 'post type general name' ),
		'singular_name'      => _x( 'Race', 'post type singular name' ),
		'menu_name'          => _x( 'Races', 'admin board' ),
		'name_admin_bar'     => _x( 'Races', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Race' ),
		'add_new_item'       => __( 'Add New Race' ),
		'new_item'           => __( 'New Race' ),
		'edit_item'          => __( 'Edit Race' ),
		'view_item'          => __( 'View Race' ),
		'all_items'          => __( 'All Races' ),
		'search_items'       => __( 'Search Races' ),
		'parent_item_colon'  => __( 'Parent Race:' ),
		'not_found'          => __( 'No races found.' ),
		'not_found_in_trash' => __( 'No races found in Trash.' )
	);

	$args = array(

		'labels'				=> $labels,
		'public'				=> TRUE,
		'query_var'				=> TRUE,
		'rewrite'				=> array('slug' => 'races', 'with_front' => FALSE),
		'capability_type'		=> 'post',
		'taxonomies'			=> array(),
		'supports'				=> array('title', 'editor', 'thumbnail',),
		'has_archive'			=> TRUE,
		'show_in_nav_menus'		=> FALSE

	);

	register_post_type('races', $args );

}

add_action( 'init', 'kb_register_races_post_type' );

/*

function kb_register_region_taxonomies() {

	register_taxonomy(
		'regions',
		'member',
		array(
			'labels' => array(
				'name' => 'Regions',
				'add_new_item' => 'Add New Region',
				'new_item_name' => "New Region"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'show_in_nav_menus'	=> false

		)
	);

	

}

add_action( 'init', 'kb_register_region_taxonomies' );

*/

?>