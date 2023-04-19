<?php

function custom_enqueue_scripts() {
    wp_enqueue_script('custom-script', get_template_directory() . '/script.js', array('jquery'), '1.0.0', true);
 }
 add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');

// Register Custom Post Type
function custom_person_type() {

	$labels = array(
		'name'                  => _x( 'Persons', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Person', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Person Types', 'text_domain' ),
		'name_admin_bar'        => __( 'Person Type', 'text_domain' ),
		'archives'              => __( 'Person Archives', 'text_domain' ),
		'attributes'            => __( 'Person Attributes', 'text_domain' ),
		'parent_Person_colon'     => __( 'Parent Person:', 'text_domain' ),
		'all_Persons'             => __( 'All Persons', 'text_domain' ),
		'add_new_Person'          => __( 'Add New Person', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_Person'              => __( 'New Person', 'text_domain' ),
		'edit_Person'             => __( 'Edit Person', 'text_domain' ),
		'update_Person'           => __( 'Update Person', 'text_domain' ),
		'view_Person'             => __( 'View Person', 'text_domain' ),
		'view_Persons'            => __( 'View Persons', 'text_domain' ),
		'search_Persons'          => __( 'Search Person', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_Person'        => __( 'Featured Person', 'text_domain' ),
		'set_featured_Person'    => __( 'Set featured Person', 'text_domain' ),
		'remove_featured_Person' => __( 'Remove featured Person', 'text_domain' ),
		'use_featured_Person'    => __( 'Use as featured Person', 'text_domain' ),
		'insert_into_Person'      => __( 'Insert into Person', 'text_domain' ),
		'uploaded_to_this_Person' => __( 'Uploaded to this Person', 'text_domain' ),
		'Persons_list'            => __( 'Persons list', 'text_domain' ),
		'Persons_list_navigation' => __( 'Persons list navigation', 'text_domain' ),
		'filter_Persons_list'     => __( 'Filter Persons list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Person', 'text_domain' ),
		'description'           => __( 'Collection of Persons data', 'text_domain' ),
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
	register_post_type( 'Person', $args );
}
add_action( 'init', 'custom_person_type', 0 );

// Add the custom field group for Persons
function add_person_custom_fields() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'person_custom_fields',
            'title' => 'person Custom Fields',
            'fields' => array(
                array(
                    'key' => 'person_first_name',
                    'label' => 'First Name',
                    'name' => 'person_first_name',
                    'type' => 'text',
                    'instructions' => 'Enter the first name of the person.',
                    'required' => true,
                ),
                array(
                    'key' => 'person_last_name',
                    'label' => 'Last Name',
                    'name' => 'person_last_name',
                    'type' => 'text',
                    'instructions' => 'Enter the last name of the person.',
                    'required' => true,
                ),
                array(
                    'key' => 'person_email',
                    'label' => 'Email',
                    'name' => 'person_email',
                    'type' => 'text',
                    'instructions' => 'Enter the email of the person.',
                    'required' => true,
                ),
                array(
					'key' => 'person_dropdown',
					'label' => 'Select a role for this person ',
					'name' => 'person_dropdown',
					'type' => 'select',
					'required' => true,
					'choices' => array(
						'student' => 'Student',
						'instructor' => 'Instructor',
						'sponsor' => 'Sponsor',
                        'sponsor_and_instructor' => 'Sponsor & Instructor'
					),
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
                array(
                    'key' => 'person_organization',
                    'label' => 'Organization',
                    'name' => 'person_organization',
                    'type' => 'text',
                    'default_value' => 'University of Hawaii at Manoa',
                    'instructions'  => 'Enter the organization of the individual if applicable.'
                ),
                array(
                    'key' => 'person_personal_website',
                    'label' => 'Personal Website Link',
                    'name' => 'person_personal_website',
                    'type' => 'text',
                    'instructions' => 'Enter the personal website link of the person.',
                ),
                array(
                    'key' => 'person_image',
                    'label' => 'Self Portrait',
                    'name' => 'person_image',
                    'type' => 'file',
                    'instructions' => 'Enter the self portrait of the person.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'person',
                    ),
                ),
            ),
        ));

    endif;
}
add_action( 'acf/init', 'add_person_custom_fields' );


