<?php
function my_custom_taxonomies() {

    $labels = [
        "name" => esc_html__( "Кастомные таксономии", "custom-post-type-ui" ),
        "singular_name" => esc_html__( "Кастомная таксономия", "custom-post-type-ui" ),
    ];

    $args = [
        "label" => esc_html__( "Кастомные таксономии", "custom-post-type-ui" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'custom_taxonomies', 'with_front' => true, ],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "custom_taxonomies",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => false,
        "sort" => false,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "custom_taxonomies", [ "custom_posts", "custom_name" ], $args );
}
add_action( 'init', 'my_custom_taxonomies' );

function my_custom_posts() {

    $labels = [
        "name" => esc_html__( "Кастомные записи", "custom-post-type-ui" ),
        "singular_name" => esc_html__( "Кастомная запись", "custom-post-type-ui" ),
    ];

    $args = [
        "label" => esc_html__( "Кастомные записи", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "custom_posts", "with_front" => true ],
        "query_var" => true,
        "supports" => [ "title", "editor" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "custom_posts", $args );
}

add_action( 'init', 'my_custom_posts' );
?>