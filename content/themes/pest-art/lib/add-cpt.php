<?php
// Register Custom Post Type
function caricature_cpt() {

    $labels = array(
        'name'                  => _x( 'Caricatures', 'Post Type General Name', 'pest-art' ),
        'singular_name'         => _x( 'Caricature', 'Post Type Singular Name', 'pest-art' ),
        'menu_name'             => __( 'Caricatures', 'pest-art' ),
        'name_admin_bar'        => __( 'Caricatures', 'pest-art' ),
        'archives'              => __( 'Caricature Archives', 'pest-art' ),
        'attributes'            => __( 'Item Attributes', 'pest-art' ),
        'parent_item_colon'     => __( 'Parent Item:', 'pest-art' ),
        'all_items'             => __( 'All Items', 'pest-art' ),
        'add_new_item'          => __( 'Add New Item', 'pest-art' ),
        'add_new'               => __( 'Add New', 'pest-art' ),
        'new_item'              => __( 'New Item', 'pest-art' ),
        'edit_item'             => __( 'Edit Item', 'pest-art' ),
        'update_item'           => __( 'Update Item', 'pest-art' ),
        'view_item'             => __( 'View Item', 'pest-art' ),
        'view_items'            => __( 'View Items', 'pest-art' ),
        'search_items'          => __( 'Search Item', 'pest-art' ),
        'not_found'             => __( 'Not found', 'pest-art' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'pest-art' ),
        'featured_image'        => __( 'Featured Image', 'pest-art' ),
        'set_featured_image'    => __( 'Set featured image', 'pest-art' ),
        'remove_featured_image' => __( 'Remove featured image', 'pest-art' ),
        'use_featured_image'    => __( 'Use as featured image', 'pest-art' ),
        'insert_into_item'      => __( 'Insert into item', 'pest-art' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'pest-art' ),
        'items_list'            => __( 'Items list', 'pest-art' ),
        'items_list_navigation' => __( 'Items list navigation', 'pest-art' ),
        'filter_items_list'     => __( 'Filter items list', 'pest-art' ),
    );
    $rewrite = array(
        'slug'                  => 'caricatures',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Caricature', 'pest-art' ),
        'description'           => __( 'Caricature Description', 'pest-art' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'gallery', 'post_tag' ),
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
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'caricature', $args );

}
add_action( 'init', 'caricature_cpt', 0 );
