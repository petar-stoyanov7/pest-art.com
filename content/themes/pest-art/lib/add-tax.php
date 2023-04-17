<?php
/**
 * Register Taxonomy
 *
 * @package Pest-art.com
 * @since 0.0.1
 */
// register media tax
add_action('init', function() {
    register_taxonomy(
        'media-category',
        'attachment'
    );
});


// Register Custom Taxonomy
function galleryTax() {

    $labels = [
        'name'                       => _x( 'Galleries', 'Taxonomy General Name', 'pest-art' ),
        'singular_name'              => _x( 'Gallery', 'Taxonomy Singular Name', 'pest-art' ),
        'menu_name'                  => __( 'Gallery', 'pest-art' ),
        'all_items'                  => __( 'All Items', 'pest-art' ),
        'parent_item'                => __( 'Parent Item', 'pest-art' ),
        'parent_item_colon'          => __( 'Parent Item:', 'pest-art' ),
        'new_item_name'              => __( 'New Item Name', 'pest-art' ),
        'add_new_item'               => __( 'Add New Item', 'pest-art' ),
        'edit_item'                  => __( 'Edit Item', 'pest-art' ),
        'update_item'                => __( 'Update Item', 'pest-art' ),
        'view_item'                  => __( 'View Item', 'pest-art' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'pest-art' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'pest-art' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'pest-art' ),
        'popular_items'              => __( 'Popular Items', 'pest-art' ),
        'search_items'               => __( 'Search Items', 'pest-art' ),
        'not_found'                  => __( 'Not Found', 'pest-art' ),
        'no_terms'                   => __( 'No items', 'pest-art' ),
        'items_list'                 => __( 'Items list', 'pest-art' ),
        'items_list_navigation'      => __( 'Items list navigation', 'pest-art' ),
    ];
    $rewrite = [
        'slug'                       => 'gallery',
        'with_front'                 => true,
        'hierarchical'               => false,
    ];
    $args = [
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
        'show_in_rest'               => true,
    ];
    register_taxonomy( 'gallery', [ 'caricature' ], $args );

}
add_action( 'init', 'galleryTax', 0 );
?>