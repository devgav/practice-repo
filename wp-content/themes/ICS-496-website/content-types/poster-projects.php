<?php

// Register Custom Post Type
function custom_poster_type() {

	$labels = array(
		'name'                  => _x( 'Posters', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Poster', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Poster Types', 'text_domain' ),
		'name_admin_bar'        => __( 'Poster Type', 'text_domain' ),
		'archives'              => __( 'Poster Archives', 'text_domain' ),
		'attributes'            => __( 'Poster Attributes', 'text_domain' ),
		'parent_Poster_colon'     => __( 'Parent Poster:', 'text_domain' ),
		'all_Posters'             => __( 'All Posters', 'text_domain' ),
		'add_new_Poster'          => __( 'Add New Poster', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_Poster'              => __( 'New Poster', 'text_domain' ),
		'edit_Poster'             => __( 'Edit Poster', 'text_domain' ),
		'update_Poster'           => __( 'Update Poster', 'text_domain' ),
		'view_Poster'             => __( 'View Poster', 'text_domain' ),
		'view_Posters'            => __( 'View Posters', 'text_domain' ),
		'search_Posters'          => __( 'Search Poster', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_Poster'        => __( 'Featured Poster', 'text_domain' ),
		'set_featured_Poster'    => __( 'Set featured Poster', 'text_domain' ),
		'remove_featured_Poster' => __( 'Remove featured Poster', 'text_domain' ),
		'use_featured_Poster'    => __( 'Use as featured Poster', 'text_domain' ),
		'insert_into_Poster'      => __( 'Insert into Poster', 'text_domain' ),
		'uploaded_to_this_Poster' => __( 'Uploaded to this Poster', 'text_domain' ),
		'Posters_list'            => __( 'Posters list', 'text_domain' ),
		'Posters_list_navigation' => __( 'Posters list navigation', 'text_domain' ),
		'filter_Posters_list'     => __( 'Filter Posters list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Poster', 'text_domain' ),
		'description'           => __( 'Collection of Posters data', 'text_domain' ),
		'labels'                => $labels,
		'supports' 				=> array( 'title' ),
		// 'taxonomies'            => array( 'Students', 'Sponsors', 'SemesterYears', 'YoutubeLinks', 'TechStacks', 'Instructors' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
        'menu_icon'             => __('dashicons-welcome-write-blog'),
	);
	register_post_type( 'Poster', $args );
}
add_action( 'init', 'custom_poster_type', 0 );

// Add the custom field group for posters
function add_poster_custom_fields() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'poster_custom_fields',
            'title' => 'poster Custom Fields',
            'fields' => array(
                array(
                    'key' => 'poster_pdf',
                    'label' => 'Poster PDF',
                    'name' => 'poster_pdf',
                    'type' => 'file',
                    'instructions' => 'Enter the pdf of the poster.',
                    'mime' => 'pdf',
                    'required' => true,
                ),
				array(
                    'key' => 'show_in_dropdown',
                    'label' => 'Show the item in the dropdown menu of a content type.',
                    'name' => 'show_in_dropdown',
                    'type' => 'true_false',
                    'default_value' => true,
                    'ui' => true,
                    'required'  => false,
                    'instructions'  => 'Toggle whether the item should show up in the dropdown of another content type.'
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'poster',
                    ),
                ),
            ),
        ));

    endif;
}
add_action( 'acf/init', 'add_poster_custom_fields' );


