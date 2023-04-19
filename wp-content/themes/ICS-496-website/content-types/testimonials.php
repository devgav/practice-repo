<?php

// Register Custom Post Type
function custom_testimonial_type() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonial Types', 'text_domain' ),
		'name_admin_bar'        => __( 'Testimonial Type', 'text_domain' ),
		'archives'              => __( 'Testimonial Archives', 'text_domain' ),
		'attributes'            => __( 'Testimonial Attributes', 'text_domain' ),
		'parent_Testimonial_colon'     => __( 'Parent Testimonial:', 'text_domain' ),
		'all_Testimonials'             => __( 'All Testimonials', 'text_domain' ),
		'add_new_Testimonial'          => __( 'Add New Testimonial', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_Testimonial'              => __( 'New Testimonial', 'text_domain' ),
		'edit_Testimonial'             => __( 'Edit Testimonial', 'text_domain' ),
		'update_Testimonial'           => __( 'Update Testimonial', 'text_domain' ),
		'view_Testimonial'             => __( 'View Testimonial', 'text_domain' ),
		'view_Testimonials'            => __( 'View Testimonials', 'text_domain' ),
		'search_Testimonials'          => __( 'Search Testimonial', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_Testimonial'        => __( 'Featured Testimonial', 'text_domain' ),
		'set_featured_Testimonial'    => __( 'Set featured Testimonial', 'text_domain' ),
		'remove_featured_Testimonial' => __( 'Remove featured Testimonial', 'text_domain' ),
		'use_featured_Testimonial'    => __( 'Use as featured Testimonial', 'text_domain' ),
		'insert_into_Testimonial'      => __( 'Insert into Testimonial', 'text_domain' ),
		'uploaded_to_this_Testimonial' => __( 'Uploaded to this Testimonial', 'text_domain' ),
		'Testimonials_list'            => __( 'Testimonials list', 'text_domain' ),
		'Testimonials_list_navigation' => __( 'Testimonials list navigation', 'text_domain' ),
		'filter_Testimonials_list'     => __( 'Filter Testimonials list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'text_domain' ),
		'description'           => __( 'Collection of Testimonials data', 'text_domain' ),
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
	register_post_type( 'Testimonial', $args );
}
add_action( 'init', 'custom_testimonial_type', 0 );

// Add the custom field group for Testimonials
function add_testimonial_custom_fields() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'testimonial_custom_fields',
            'title' => 'Testimonial Custom Fields',
            'fields' => array(
                // Person
                // What they said about the project
				array(
                    'key' => 'testimonial_person',
                    'label' => 'Person',
                    'name' => 'testimonial_person',
                    'type' => 'select',
					'choices'	=> array(),
					'default_value'	=> '',
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 1,
					'placeholder' => '',
					'disabled' => 0,
					'readonly' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'instructions' => 'Enter the person that gave the testimonial. ',
                    'required' => true,
                ),
                array(
                    'key' => 'testimonial_statement',
                    'label' => 'Testimonial Statement',
                    'name' => 'testimonial_statement',
                    'type' => 'textarea',
                    'instructions' => 'Enter the statement of the testimonial.',
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
				array(
                    'key' => 'show_in_home',
                    'label' => 'Show the item in the home page carousel.',
                    'name' => 'show_in_home',
                    'type' => 'true_false',
                    'default_value' => true,
                    'ui' => true,
                    'required'  => false,
                    'instructions'  => 'Toggle whether the item should show up in the home page.'
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'testimonial',
                    ),
                ),
            ),
        ));

    endif;
}
add_action( 'acf/init', 'add_testimonial_custom_fields' );

// Function that populates the dropdown field above
function my_populate_person_dropdown($field) {
    $persons = get_posts(array(
        'post_type' => 'person',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));

    $field['choices'] = array();

    foreach ($persons as $person) {
		if ($person->show_in_dropdown == true) {
			$field['choices'][$person->ID] = "{$person->person_first_name} {$person->person_last_name} - {$person->person_email} - {$person->person_organization}";
		}
    }

    return $field;
}

add_filter('acf/load_field/name=testimonial_person', 'my_populate_person_dropdown');


