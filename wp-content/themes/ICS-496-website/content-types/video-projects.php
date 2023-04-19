<?php

// Register Custom Post Type
function custom_video_type() {

	$labels = array(
		'name'                  => _x( 'Videos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Video Types', 'text_domain' ),
		'name_admin_bar'        => __( 'Video Type', 'text_domain' ),
		'archives'              => __( 'Video Archives', 'text_domain' ),
		'attributes'            => __( 'Video Attributes', 'text_domain' ),
		'parent_Video_colon'     => __( 'Parent Video:', 'text_domain' ),
		'all_Videos'             => __( 'All Videos', 'text_domain' ),
		'add_new_Video'          => __( 'Add New Video', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_Video'              => __( 'New Video', 'text_domain' ),
		'edit_Video'             => __( 'Edit Video', 'text_domain' ),
		'update_Video'           => __( 'Update Video', 'text_domain' ),
		'view_Video'             => __( 'View Video', 'text_domain' ),
		'view_Videos'            => __( 'View Videos', 'text_domain' ),
		'search_Videos'          => __( 'Search Video', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_Video'        => __( 'Featured Video', 'text_domain' ),
		'set_featured_Video'    => __( 'Set featured Video', 'text_domain' ),
		'remove_featured_Video' => __( 'Remove featured Video', 'text_domain' ),
		'use_featured_Video'    => __( 'Use as featured Video', 'text_domain' ),
		'insert_into_Video'      => __( 'Insert into Video', 'text_domain' ),
		'uploaded_to_this_Video' => __( 'Uploaded to this Video', 'text_domain' ),
		'Videos_list'            => __( 'Videos list', 'text_domain' ),
		'Videos_list_navigation' => __( 'Videos list navigation', 'text_domain' ),
		'filter_Videos_list'     => __( 'Filter Videos list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Video', 'text_domain' ),
		'description'           => __( 'Collection of Videos data', 'text_domain' ),
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
	register_post_type( 'Video', $args );
}
add_action( 'init', 'custom_video_type', 0 );

// Add the custom field group for Videos
function add_video_custom_fields() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'video_custom_fields',
            'title' => 'Video Custom Fields',
            'fields' => array(
                array(
                    'key' => 'video_url',
                    'label' => 'Video URL',
                    'name' => 'video_url',
                    'type' => 'text',
                    'instructions' => 'Enter the url of the video.',
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
                        'value' => 'video',
                    ),
                ),
            ),
        ));

    endif;
}
add_action( 'acf/init', 'add_video_custom_fields' );


