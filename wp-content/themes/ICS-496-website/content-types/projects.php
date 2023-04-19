<?php
// Register Custom Post Type
function custom_project_type() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Project Types', 'text_domain' ),
		'name_admin_bar'        => __( 'Project Type', 'text_domain' ),
		'archives'              => __( 'Project Archives', 'text_domain' ),
		'attributes'            => __( 'Project Attributes', 'text_domain' ),
		'parent_Project_colon'     => __( 'Parent Project:', 'text_domain' ),
		'all_Projects'             => __( 'All Projects', 'text_domain' ),
		'add_new_Project'          => __( 'Add New Project', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_Project'              => __( 'New Project', 'text_domain' ),
		'edit_Project'             => __( 'Edit Project', 'text_domain' ),
		'update_Project'           => __( 'Update Project', 'text_domain' ),
		'view_Project'             => __( 'View Project', 'text_domain' ),
		'view_Projects'            => __( 'View Projects', 'text_domain' ),
		'search_Projects'          => __( 'Search Project', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_Project'        => __( 'Featured Project', 'text_domain' ),
		'set_featured_Project'    => __( 'Set featured Project', 'text_domain' ),
		'remove_featured_Project' => __( 'Remove featured Project', 'text_domain' ),
		'use_featured_Project'    => __( 'Use as featured Project', 'text_domain' ),
		'insert_into_Project'      => __( 'Insert into Project', 'text_domain' ),
		'uploaded_to_this_Project' => __( 'Uploaded to this Project', 'text_domain' ),
		'Projects_list'            => __( 'Projects list', 'text_domain' ),
		'Projects_list_navigation' => __( 'Projects list navigation', 'text_domain' ),
		'filter_Projects_list'     => __( 'Filter Projects list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'text_domain' ),
		'description'           => __( 'Collection of projects data', 'text_domain' ),
		'labels'                => $labels,
		'supports' 				=> array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'rewrite'				=> array('slug' => 'project'),
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
        'menu_icon'             => __('dashicons-welcome-write-blog'),
	);
	register_post_type( 'Project', $args );
}
add_action( 'init', 'custom_project_type', 0 );

function create_tech_stack_taxonomy() {
	register_taxonomy(
	  'tech-stack',
	  'project',
	  array(
		'label' => __( 'Tech Stack' ),
		'rewrite' => array( 'slug' => 'tech-stack' ),
		'hierarchical' => true,
	  )
	);
  }
  add_action( 'init', 'create_tech_stack_taxonomy' );

function add_taxonomy_meta_box() {
	add_meta_box(
	  'taxonomy_meta_box',
	  'Taxonomy Terms',
	  'taxonomy_meta_box_callback',
	  'projects',
	  'side',
	  'default'
	);
  }
  add_action( 'add_meta_boxes', 'add_taxonomy_meta_box' );

// Add the custom field group for projects
function add_project_custom_fields() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'project_custom_fields',
            'title' => 'project Custom Fields',
            'fields' => array(
                array(
					'key' => 'project_sponsor',
					'label' => 'Sponsor',
					'name' => 'project_sponsor',
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
					'required' => false,
                ),
				array(
					'key' => 'project_semester',
					'label' => 'Select a Semester',
					'name' => 'project_semester',
					'type' => 'select',
					'required' => false,
					'choices' => array(
						'Fall' => 'Fall',
						'Spring' => 'Spring',
						'Summer' => 'Summer',
					),
				),
				array(
                    'key' => 'project_year',
                    'label' => 'Year',
                    'name' => 'project_year',
                    'type' => 'date_picker',
                    'instructions' => 'Enter the semester the project was created.',
                    'required' => false,
					'display_format' => 'Y',
					'return_format' => 'Y',
                ),
                array(
                    'key' => 'project_video',
                    'label' => 'Video',
                    'name' => 'project_video',
                    'type' => 'text',
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
                    'required' => false,
                ),
				array(
                    'key' => 'project_students',
                    'label' => 'Students',
                    'name' => 'project_students',
                    'type' => 'select',
					'choices'	=> array(),
					'default_value'	=> '',
					'allow_null' => 0,
					'multiple' => 1,
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
                    'required' => false,
                ),
				array(
                    'key' => 'project_instructor',
                    'label' => 'Instructor',
                    'name' => 'project_instructor',
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
                    'required' => false,
                ),
				array(
                    'key' => 'project_testimonials',
                    'label' => 'Testimonials',
                    'name' => 'project_testimonials',
                    'type' => 'select',
					'choices'	=> array(),
					'default_value'	=> '',
					'allow_null' => 0,
					'multiple' => 1,
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
					'instructions' => 'Enter the testimonials for this project.',
                    'required' => false,
                ),
				array(
                    'key' => 'project_poster',
                    'label' => 'Poster',
                    'name' => 'project_poster',
                    'type' => 'file',
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
					'instructions' => 'Select poster pdf(s) for this project.',
                    'required' => false,
					'mime' => 'pdf'
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
                        'value' => 'project',
                    ),
                ),
            ),
        ));

    endif;
}
add_action( 'acf/init', 'add_project_custom_fields' );

// Function that populates the dropdown field above
function my_populate_student_dropdown($field) {
    $students = get_posts(array(
        'post_type' => 'person',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));

    $field['choices'] = array();

    foreach ($students as $student) {
		if ($student->person_dropdown == 'student' && $student->show_in_dropdown == true) {
			$field['choices'][$student->ID] = "{$student->person_first_name} {$student->person_last_name} - {$student->person_email}";
		}
    }

    return $field;
}

add_filter('acf/load_field/name=project_students', 'my_populate_student_dropdown');

// Function that populates the dropdown field above
function my_populate_sponsor_dropdown($field) {
    $sponsors = get_posts(array(
        'post_type' => 'person',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));

    $field['choices'] = array();

    foreach ($sponsors as $sponsor) {
		if ($sponsor->person_dropdown == 'sponsor' || $sponsor->person_dropdown == 'sponsor_and_instructor' && $sponsor->show_in_dropdown == true) {
			$field['choices'][$sponsor->ID] = "{$sponsor->person_first_name} {$sponsor->person_last_name} - {$sponsor->person_organization}";
		}
    }

    return $field;
}

add_filter('acf/load_field/name=project_sponsor', 'my_populate_sponsor_dropdown');

// Function that populates the dropdown field above
function my_populate_instructor_dropdown($field) {
    $instructors = get_posts(array(
        'post_type' => 'person',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));

    $field['choices'] = array();

    foreach ($instructors as $instructor) {
		if ($instructor->person_dropdown == 'instructor' || $instructor->person_dropdown == 'sponsor_and_instructor' && $instructor->show_in_dropdown == true) {
			$field['choices'][$instructor->ID] = "{$instructor->person_first_name} {$instructor->person_last_name} - {$instructor->person_email}";
		}
    }

    return $field;
}

add_filter('acf/load_field/name=project_instructor', 'my_populate_instructor_dropdown');

// Function that populates the dropdown field above
function my_populate_video_dropdown($field) {
    $videos = get_posts(array(
        'post_type' => 'video',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));

    $field['choices'] = array();

    foreach ($videos as $video) {
		if ($video->show_in_dropdown == true) {
			$field['choices'][$video->ID] = "{$video->post_title}";
		}
    }

    return $field;
}

add_filter('acf/load_field/name=project_video', 'my_populate_video_dropdown');

// Function that populates the dropdown field above
function my_populate_posters_dropdown($field) {
    $posters = get_posts(array(
        'post_type' => 'poster',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));

    $field['choices'] = array();

    foreach ($posters as $poster) {
		if ($poster->show_in_dropdown == true) {
			$field['choices'][$poster->ID] = "{$poster->post_title}";
		}
    }

    return $field;
}

add_filter('acf/load_field/name=project_poster', 'my_populate_posters_dropdown');

// Function that populates the dropdown field above
function my_populate_testimonials_dropdown($field) {
    $testimonials = get_posts(array(
        'post_type' => 'testimonial',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ));

    $field['choices'] = array();

    foreach ($testimonials as $testimonial) {
		if ($testimonial->show_in_dropdown == true) {
			$field['choices'][$testimonial->ID] = "{$testimonial->post_title}";
		}
    }

    return $field;
}

add_filter('acf/load_field/name=project_testimonials', 'my_populate_testimonials_dropdown');

