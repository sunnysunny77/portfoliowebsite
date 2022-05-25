<?php
// custom post types
$labels = [
        "name" => __("storyboarding_films", "custom-post-type-ui"),
        "singular_name" => __("storyboarding_film", "custom-post-type-ui"),
    ];

$args = [
    "label" => __("storyboarding_films", "custom-post-type-ui"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => ["slug" => "storyboarding_films", "with_front" => true],
    "query_var" => true,
    "supports" => ["title"],
    "show_in_graphql" => false,
    'menu_icon' => 'dashicons-media-interactive',
];

register_post_type("storyboarding_films", $args);

$labels = [
    "name" => __("concepts_films", "custom-post-type-ui"),
    "singular_name" => __("concepts_film", "custom-post-type-ui"),
];

$args = [
    "label" => __("concepts_films", "custom-post-type-ui"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => ["slug" => "concepts_films", "with_front" => true],
    "query_var" => true,
    "supports" => ["title"],
    "show_in_graphql" => false,
    'menu_icon' => 'dashicons-welcome-view-site',
];

register_post_type("concepts_films", $args);

$labels = [
    "name" => __("independent_films", "custom-post-type-ui"),
    "singular_name" => __("independent_film", "custom-post-type-ui"),
];

$args = [
    "label" => __("independent_films", "custom-post-type-ui"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => ["slug" => "independent_films", "with_front" => true],
    "query_var" => true,
    "supports" => ["title"],
    "show_in_graphql" => false,
    'menu_icon' => 'dashicons-video-alt2',
];

register_post_type("independent_films", $args);

$labels = [
    "name" => __("theatre", "custom-post-type-ui"),
    "singular_name" => __("theatrical", "custom-post-type-ui"),
];

$args = [
    "label" => __("theatre", "custom-post-type-ui"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => ["slug" => "theatre", "with_front" => true],
    "query_var" => true,
    "supports" => ["title"],
    "show_in_graphql" => false,
    'menu_icon' => 'dashicons-tickets-alt',
];

register_post_type("theatre", $args);

$labels = [
    "name" => __("designs", "custom-post-type-ui"),
    "singular_name" => __("design", "custom-post-type-ui"),
];

$args = [
    "label" => __("designs", "custom-post-type-ui"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => ["slug" => "designs", "with_front" => true],
    "query_var" => true,
    "supports" => ["title"],
    "show_in_graphql" => false,
    'menu_icon' => 'dashicons-slides',
];

register_post_type("designs", $args);

$labels = [
    "name" => __("poems_poetry", "custom-post-type-ui"),
    "singular_name" => __("poem_poetry:", "custom-post-type-ui"),
];

$args = [
    "label" => __("poems_poetry", "custom-post-type-ui"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => ["slug" => "poems_poetry", "with_front" => true],
    "query_var" => true,
    "supports" => ["title"],
    "show_in_graphql" => false,
    'menu_icon' => 'dashicons-text-page',
];

register_post_type("poems_poetry", $args);

$labels = [
    "name" => __("illustrated_poetry", "custom-post-type-ui"),
    "singular_name" => __("illustration_poetry", "custom-post-type-ui"),
];

$args = [
    "label" => __("illustrated_poetry", "custom-post-type-ui"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => ["slug" => "illustrated_poetry", "with_front" => true],
    "query_var" => true,
    "supports" => ["title"],
    "show_in_graphql" => false,
    'menu_icon' => 'dashicons-format-gallery',
];

register_post_type("illustrated_poetry", $args);

$labels = [
    "name" => __("sculptures", "custom-post-type-ui"),
    "singular_name" => __("sculpture", "custom-post-type-ui"),
];

$args = [
    "label" => __("sculptures", "custom-post-type-ui"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => ["slug" => "sculptures", "with_front" => true],
    "query_var" => true,
    "supports" => ["title"],
    "show_in_graphql" => false,
    'menu_icon' => 'dashicons-editor-customchar',
];

register_post_type("sculptures", $args);

$labels = [
    "name" => __("illustrations", "custom-post-type-ui"),
    "singular_name" => __("illustration", "custom-post-type-ui"),
];

$args = [
    "label" => __("illustrations", "custom-post-type-ui"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => ["slug" => "illustrations", "with_front" => true],
    "query_var" => true,
    "supports" => ["title"],
    "show_in_graphql" => false,
    'menu_icon' => 'dashicons-art',
];

register_post_type("illustrations", $args);
