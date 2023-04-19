<?php
// Register Custom Post Type
function custom_home_type() {

    $labels = array(
        'name'                  => _x( 'Home', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Home', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Home', 'text_domain' ),
        'name_admin_bar'        => __( 'Home', 'text_domain' ),
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
        'label'                 => __( 'Home', 'text_domain' ),
        'description'           => __( 'Home', 'text_domain' ),
        'labels'                => $labels,
        'supports'                 => array( 'title' ),
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
    register_post_type( 'Home', $args );

}
add_action( 'init', 'custom_home_type', 0 );

// Add the custom field group for projects
function add_home_fields() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'home_custom_fields',
            'title' => 'Home Custom Fields',
            'fields' => array(
                array(
                    'key' => 'home_page_background_image',
                    'label' => 'Home Page Background Image',
                    'name' => 'home_page_background_image',
                    'type' => 'file',
                    'instructions' => 'Submit a file for the background of the home page.',
                ),
                array(
                    'key' => 'home_page_main_title',
                    'label' => 'Main Title',
                    'name' => 'home_page_main_title',
                    'type' => 'text',
                    'instructions' => 'Enter the main title of the sponsor page.',
                ),
                array(
                    'key' => 'home_page_main_title_color',
                    'label' => 'Home Page Background Color',
                    'name' => 'home_page_main_title_color',
                    'type' => 'color_picker',
                    'instructions' => 'Choose a color for the text of the Main Title. If no color is chosen it will default to black.',
                ),
                array(
                    'key' => 'subsection_second_title',
                    'label' => 'Subsection Title',
                    'name' => 'subsection_second_title',
                    'type' => 'text',
                    'instructions' => 'Enter the subsection title.',
                ),
                array(
                    'key' => 'subsection_paragraph',
                    'label' => 'Subsection Paragraph',
                    'name' => 'subsection_paragraph',
                    'type' => 'textarea',
                    'instructions' => 'Enter the paragraph for the subsection.',
                ),
                array(
                    'key' => 'subsection_button_title',
                    'label' => 'Subsection Button Title',
                    'name' => 'subsection_button_title',
                    'type' => 'text',
                    'instructions' => 'Enter the title for the subsection button.',
                ),
                array(
                    'key' => 'subsection_button_link',
                    'label' => 'Subsection Button Link',
                    'name' => 'subsection_button_link',
                    'type' => 'text',
                    'instructions' => 'Enter the button link.',
                ),
                array(
                    'key' => 'video_url',
                    'label' => 'Video URL',
                    'name' => 'video_url',
                    'type' => 'text',
                    'instructions' => 'Enter the URL for the video.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'home',
                    ),
                ),
            ),
        ));

    endif;
}
add_action( 'acf/init', 'add_home_fields' );

