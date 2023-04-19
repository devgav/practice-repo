<?php
// Register Custom Post Type
function custom_sponsor_description_type() {

	$labels = array(
		'name'                  => _x( 'Descriptions', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Description', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Sponsor Page Descriptions', 'text_domain' ),
		'name_admin_bar'        => __( 'Sponsor Page Descriptions', 'text_domain' ),
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
		'label'                 => __( 'Description', 'text_domain' ),
		'description'           => __( 'Collection of Descriptions data', 'text_domain' ),
		'labels'                => $labels,
		'supports' 				=> array( 'title' ),
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
	register_post_type( 'SponsorDescription', $args );

}
add_action( 'init', 'custom_sponsor_description_type', 0 );

// Add the custom field group for projects
function add_sponsor_custom_fields() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'sponsor_custom_fields',
            'title' => 'Sponsor Custom Fields',
            'fields' => array(
                array(
                    'key' => 'sponsor_page_main_title',
                    'label' => 'Main Title',
                    'name' => 'sponsor_page_main_title',
                    'type' => 'text',
                    'instructions' => 'Enter the main title of the sponsor page.',
                    'required' => true,
                ),
                array(
                    'key' => 'sponsor_page_main_description',
                    'label' => 'Main Description',
                    'name' => 'sponsor_page_main_description',
                    'type' => 'text',
                    'instructions' => 'Enter the main description of the sponsor page.',
                    'required' => true,
                ),
                array(
                    'key' => 'sponsor_page_title_1',
                    'label' => 'Title 1',
                    'name' => 'sponsor_page_title_1',
                    'type' => 'text',
                    'instructions' => 'Enter the first title of the second column of the sponsor page.',
                    'required' => true,
                ),
                array(
                    'key' => 'sponsor_page_title_1_description',
                    'label' => 'Title 1 Description',
                    'name' => 'sponsor_page_title_1_description',
                    'type' => 'text',
                    'instructions' => 'Enter the first description of the second column of the sponsor page.',
                    'required' => true,
                ),
                array(
                    'key' => 'sponsor_page_title_2',
                    'label' => 'Title 2',
                    'name' => 'sponsor_page_title_2',
                    'type' => 'text',
                    'instructions' => 'Enter the second title of the second column of the sponsor page.',
                    'required' => true,
                ),
                array(
                    'key' => 'sponsor_page_title_2_description',
                    'label' => 'Title 2 Description',
                    'name' => 'sponsor_page_title_2_description',
                    'type' => 'text',
                    'instructions' => 'Enter the second description of the second column of the sponsor page.',
                    'required' => true,
                ),
                array(
                    'key' => 'sponsor_page_title_3',
                    'label' => 'Title 3',
                    'name' => 'sponsor_page_title_3',
                    'type' => 'text',
                    'instructions' => 'Enter the third title of the second column of the sponsor page.',
                    'required' => true,
                ),
                array(
                    'key' => 'sponsor_page_title_3_description',
                    'label' => 'Title 3 Description',
                    'name' => 'sponsor_page_title_3_description',
                    'type' => 'text',
                    'instructions' => 'Enter the third description of the second column of the sponsor page.',
                    'required' => true,
                ),
                array(
                    'key' => 'button_title',
                    'label' => 'Button Title',
                    'name' => 'button_title',
                    'type' => 'text',
                    'instructions' => 'Enter the title of the button.',
                    'required' => true,
                ),
                array(
                    'key' => 'button_link',
                    'label' => 'Button Link',
                    'name' => 'button_link',
                    'type' => 'text',
                    'instructions' => 'Enter the button link.',
                    'required' => true,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'sponsordescription',
                    ),
                ),
            ),
        ));

    endif;
}
add_action( 'acf/init', 'add_sponsor_custom_fields' );
