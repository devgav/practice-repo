<?php
// Register Custom Post Type
function custom_navbar_buttons_type() {

	$labels = array(
		'name'                  => _x( 'Buttons', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Button', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Navbar Buttons', 'text_domain' ),
		'name_admin_bar'        => __( 'Navbar Buttons', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_Students'        => __( 'Featured Students', 'text_domain' ),
		'set_featured_Students'    => __( 'Set featured Students', 'text_domain' ),
		'remove_featured_Students' => __( 'Remove featured Students', 'text_domain' ),
		'use_featured_Students'    => __( 'Use as featured Students', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Button', 'text_domain' ),
		'description'           => __( 'Collection of Buttons data', 'text_domain' ),
		'labels'                => $labels,
		'supports' 				=> array( 'title' ),
		// 'taxonomies'            => array( 'Students', 'Sponsors', 'SemesterYears', 'YoutubeLinks', 'TechStacks', 'Instructors' ),
		'hierarchical'          => false,
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
	register_post_type( 'NavbarButtons', $args );

}
add_action( 'init', 'custom_navbar_buttons_type', 0 );

// Add the custom field group for projects
function add_navbar_button_custom_fields() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'navbar_button_custom_fields',
            'title' => 'Navbar Button Fields',
            'fields' => array(
                array(
                    'key' => 'navbar_logo',
                    'label' => 'Navbar Logo',
                    'name' => 'navbar_logo',
                    'type' => 'file',
                    'instructions' => 'Enter the image of the navbar, must be (jpeg, raw, or png).',
                ),
                array(
                    'key' => 'main_navbar_title',
                    'label' => 'Main Navbar Title',
                    'name' => 'main_navbar_title',
                    'type' => 'text',
                    'instructions' => 'Enter the main title of the Navbar.',
                    'required' => true,
                ),
                array(
                    'key' => 'main_navbar_title_link',
                    'label' => 'Main Navbar Title Link',
                    'name' => 'main_navbar_title_link',
                    'type' => 'text',
                    'instructions' => 'Enter the main title link of the Navbar.',
                    'default' => 'bruh',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_button_4',
                    'label' => 'Fourth Navbar Button Title',
                    'name' => 'navbar_button_4',
                    'type' => 'text',
                    'instructions' => 'Enter the title of the fourth navbar button.',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_button_4_link',
                    'label' => 'Fourth Navbar Button Link',
                    'name' => 'navbar_button_4_link',
                    'type' => 'text',
                    'instructions' => 'Enter the link of the fourth navbar button.',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_button_3',
                    'label' => 'Third Navbar Button Title',
                    'name' => 'navbar_button_3',
                    'type' => 'text',
                    'instructions' => 'Enter the title of the third navbar button.',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_button_3_link',
                    'label' => 'Third Navbar Button Link',
                    'name' => 'navbar_button_3_link',
                    'type' => 'text',
                    'instructions' => 'Enter the link of the third navbar button.',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_button_2',
                    'label' => 'Second Navbar Button Title',
                    'name' => 'navbar_button_2',
                    'type' => 'text',
                    'instructions' => 'Enter the title of the second navbar button.',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_button_2_link',
                    'label' => 'Second Navbar Button Link',
                    'name' => 'navbar_button_2_link',
                    'type' => 'text',
                    'instructions' => 'Enter the link of the second navbar button.',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_button_1',
                    'label' => 'First Navbar Button Title',
                    'name' => 'navbar_button_1',
                    'type' => 'text',
                    'instructions' => 'Enter the title of the first navbar button.',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_button_1_link',
                    'label' => 'First Navbar Button Link',
                    'name' => 'navbar_button_1_link',
                    'type' => 'text',
                    'instructions' => 'Enter the link of the first navbar button.',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_dropdown_button_title',
                    'label' => 'Dropdown Button Title',
                    'name' => 'navbar_dropdown_button_title',
                    'type' => 'text',
                    'instructions' => 'Enter the dropdown button title.',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_dropdown_1_title',
                    'label' => 'First Navbar Dropdown Button Title',
                    'name' => 'navbar_dropdown_1_title',
                    'type' => 'text',
                    'instructions' => 'Enter the title of the first dropdown navbar button.',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_dropdown_1_link',
                    'label' => 'First Navbar Dropdown Button Link',
                    'name' => 'navbar_dropdown_1_link',
                    'type' => 'text',
                    'instructions' => 'Enter the link of the first dropdown navbar button.',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_dropdown_2_title',
                    'label' => 'Second Navbar Dropdown Button Title',
                    'name' => 'navbar_dropdown_2_title',
                    'type' => 'text',
                    'instructions' => 'Enter the title of the second dropdown navbar button.',
                    'required' => false,
                ),
                array(
                    'key' => 'navbar_dropdown_2_link',
                    'label' => 'Second Navbar Dropdown Button Link',
                    'name' => 'navbar_dropdown_2_link',
                    'type' => 'text',
                    'instructions' => 'Enter the link of the second dropdown navbar button.',
                    'required' => false,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'navbarbuttons',
                    ),
                ),
            ),
        ));

    endif;
}
add_action( 'acf/init', 'add_navbar_button_custom_fields' );
