<?php

// Register Custom Posts Type
function agw_custom_post_type() {

// Services
	$labels = array(
		'name'                => _x( 'Services', 'Post Type General Name', 'agw' ),
		'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'agw' ),
		'menu_name'           => __( 'Services', 'agw' ),
		'name_admin_bar'      => __( 'Service', 'agw' ),
		'parent_item_colon'   => __( 'Parent Item:', 'agw' ),
		'all_items'           => __( 'All Services', 'agw' ),
		'add_new_item'        => __( 'Add New Service', 'agw' ),
		'add_new'             => __( 'Add New', 'agw' ),
		'new_item'            => __( 'New Service', 'agw' ),
		'edit_item'           => __( 'Edit Service', 'agw' ),
		'update_item'         => __( 'Update Service', 'agw' ),
		'view_item'           => __( 'View Service', 'agw' ),
		'search_items'        => __( 'Search Service', 'agw' ),
		'not_found'           => __( 'Not services found', 'agw' ),
		'not_found_in_trash'  => __( 'Not services found in Trash', 'agw' ),
	);
	$args = array(
		'label'               => __( 'services', 'agw' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'page-attributes', 'thumbnail' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'			 => 'dashicons-networking',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'services', $args );


// Team
	$labels = array(
		'name'                => _x( 'Members', 'Post Type General Name', 'agw' ),
		'singular_name'       => _x( 'Member', 'Post Type Singular Name', 'agw' ),
		'menu_name'           => __( 'Team', 'agw' ),
		'name_admin_bar'      => __( 'Team', 'agw' ),
		'parent_item_colon'   => __( 'Parent Item:', 'agw' ),
		'all_items'           => __( 'All members', 'agw' ),
		'add_new_item'        => __( 'Add member', 'agw' ),
		'add_new'             => __( 'Add New', 'agw' ),
		'new_item'            => __( 'New member', 'agw' ),
		'edit_item'           => __( 'Edit member', 'agw' ),
		'update_item'         => __( 'Update member', 'agw' ),
		'view_item'           => __( 'View member', 'agw' ),
		'search_items'        => __( 'Search member', 'agw' ),
		'not_found'           => __( 'Not found', 'agw' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'agw' ),
	);
	$args = array(
		'label'               => __( 'team', 'agw' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-groups',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'team', $args );


// Events
	$labels = array(
		'name'                => _x( 'Events', 'Post Type General Name', 'agw' ),
		'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'agw' ),
		'menu_name'           => __( 'Events', 'agw' ),
		'name_admin_bar'      => __( 'Events', 'agw' ),
		'parent_item_colon'   => __( 'Parent Item:', 'agw' ),
		'all_items'           => __( 'All Events', 'agw' ),
		'add_new_item'        => __( 'Add New Event', 'agw' ),
		'add_new'             => __( 'Add New', 'agw' ),
		'new_item'            => __( 'New Event', 'agw' ),
		'edit_item'           => __( 'Edit Event', 'agw' ),
		'update_item'         => __( 'Update Event', 'agw' ),
		'view_item'           => __( 'View Event', 'agw' ),
		'search_items'        => __( 'Search Event', 'agw' ),
		'not_found'           => __( 'Not found', 'agw' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'agw' ),
	);
	$args = array(
		'label'               => __( 'events', 'agw' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-calendar-alt',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'events', $args );

// Partners
	$labels = array(
		'name'                => _x( 'Partners', 'Post Type General Name', 'agw' ),
		'singular_name'       => _x( 'Partner', 'Post Type Singular Name', 'agw' ),
		'menu_name'           => __( 'Partners', 'agw' ),
		'name_admin_bar'      => __( 'Partners', 'agw' ),
		'parent_item_colon'   => __( 'Parent partner:', 'agw' ),
		'all_items'           => __( 'All partners', 'agw' ),
		'add_new_item'        => __( 'Add New partner', 'agw' ),
		'add_new'             => __( 'Add New', 'agw' ),
		'new_item'            => __( 'New partner', 'agw' ),
		'edit_item'           => __( 'Edit partner', 'agw' ),
		'update_item'         => __( 'Update partner', 'agw' ),
		'view_item'           => __( 'View partner', 'agw' ),
		'search_items'        => __( 'Search partner', 'agw' ),
		'not_found'           => __( 'Not found', 'agw' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'agw' ),
	);
	$args = array(
		'label'               => __( 'partners', 'agw' ),
		'labels'              => $labels,
		'supports'            => array( 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-awards',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'partners', $args );

// Causes
	$labels = array(
		'name'                => _x( 'Causes', 'Post Type General Name', 'awg' ),
		'singular_name'       => _x( 'Cause', 'Post Type Singular Name', 'awg' ),
		'menu_name'           => __( 'Causes', 'awg' ),
		'name_admin_bar'      => __( 'Causes', 'awg' ),
		'parent_item_colon'   => __( 'Parent Item:', 'awg' ),
		'all_items'           => __( 'All causes', 'awg' ),
		'add_new_item'        => __( 'Add New cause', 'awg' ),
		'add_new'             => __( 'Add New', 'awg' ),
		'new_item'            => __( 'New cause', 'awg' ),
		'edit_item'           => __( 'Edit cause', 'awg' ),
		'update_item'         => __( 'Update cause', 'awg' ),
		'view_item'           => __( 'View cause', 'awg' ),
		'search_items'        => __( 'Search cause', 'awg' ),
		'not_found'           => __( 'Not found', 'awg' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'awg' ),
	);
	$args = array(
		'label'               => __( 'causes', 'awg' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-heart',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'causes', $args );

// Gallery
	$labels = array(
		'name'                => _x( 'Foto', 'Post Type General Name', 'agw' ),
		'singular_name'       => _x( 'Foto', 'Post Type Singular Name', 'agw' ),
		'menu_name'           => __( 'Gallery', 'agw' ),
		'name_admin_bar'      => __( 'Gallery', 'agw' ),
		'parent_item_colon'   => __( 'Parent Item:', 'agw' ),
		'all_items'           => __( 'All fotos', 'agw' ),
		'add_new_item'        => __( 'Add New foto', 'agw' ),
		'add_new'             => __( 'Add New', 'agw' ),
		'new_item'            => __( 'New foto', 'agw' ),
		'edit_item'           => __( 'Edit foto', 'agw' ),
		'update_item'         => __( 'Update foto', 'agw' ),
		'view_item'           => __( 'View foto', 'agw' ),
		'search_items'        => __( 'Search foto', 'agw' ),
		'not_found'           => __( 'Not found', 'agw' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'agw' ),
	);
	$args = array(
		'label'               => __( 'gallery', 'agw' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-images-alt2',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'gallery', $args );

}

add_action( 'init', 'agw_custom_post_type' );




?>