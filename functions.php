<?php

if (!isset($content_width)) {
    $content_width = 1920;
}

if (!function_exists('foundation_setup')) {

    function foundation_setup()
    {
        register_nav_menus(
            array(
                'main-nav' => 'Main Navigation',
                'footer-nav' => 'Footer Navigation',
            )
        );

        add_theme_support('widget-customizer');

        add_theme_support('custom-logo', array('height' => 100, 'width' => 235,  'unlink-homepage-logo' => true,  'header-text' => array('site-title', 'site-description')));

        add_theme_support('title-tag');

        add_theme_support('html5', ['script', 'style', 'comment-form', 'search-form', 'gallery', 'caption']);

        add_theme_support('menus');

        // add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

        // add_theme_support('automatic-feed-links');

        // add_theme_support('post-thumbnails');
    }
}
add_action('after_setup_theme', 'foundation_setup');

function foundation_scripts()
{

    //foundation 6 for sites and icons
    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery.js', '', '', false);

    wp_enqueue_script('foundation-js', get_template_directory_uri() . '/js/vendor/foundation.min.js', array('jquery'), '', true);

    wp_enqueue_style('foundation-css', get_template_directory_uri() . '/assets/css/foundation.min.css');

    wp_enqueue_style('icons', get_template_directory_uri() . '/assets/css/icons/foundation-icons.css');

    wp_enqueue_script('what-input', get_template_directory_uri() . '/js/vendor/what-input.js', array('jquery'), '', true);

    wp_enqueue_script('app-js', get_template_directory_uri() . '/js/app.js', array('jquery'), '', true);

    //AJAX
    wp_enqueue_script('jquery-form', '', array('jquery'), '', true);

    //theme styles
    if (is_front_page()) {
        wp_enqueue_style('home-css', get_template_directory_uri() . '/assets/css/home.css');
    } else if (is_page('about')) {
        wp_enqueue_style('about-css', get_template_directory_uri() . '/assets/css/about.css');
    } else if (is_page('contact')) {
        wp_enqueue_style('contact-css', get_template_directory_uri() . '/assets/css/contact.css');
        wp_enqueue_script('form-js', get_template_directory_uri() . '/js/form.js', array('jquery'), '', true);
        wp_localize_script(
            'form-js',
            'frontend_ajax_object',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            )
        );
    } else if (is_page('gallery')) {
        wp_enqueue_style('gallery-css', get_template_directory_uri() . '/assets/css/gallery.css');
    } else if (is_search()) {
        wp_enqueue_style('search-css', get_template_directory_uri() . '/assets/css/search.css');
    } else if (is_404()) {
        wp_enqueue_style('notfound-css', get_template_directory_uri() . '/assets/css/notfound.css');
    }
}
add_action('wp_enqueue_scripts', 'foundation_scripts');

function foundation_custom_sidebars()
{
    register_sidebar(
        array(
            'name' => 'widget one',
            'id' => 'widget_one',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<span class="widgettitle">',
            'after_title'   => '</span>',
        )
    );
}
add_action('widgets_init', 'foundation_custom_sidebars');


add_filter('pre_option_upload_path', function ($upload_path) {
    return  get_template_directory() . '/files';
});

add_filter('pre_option_upload_url_path', function ($upload_url_path) {
    return get_template_directory_uri() . '/files';
});

function foundation_enable_vcard_upload($mime_types)
{
    $mime_types['vcf'] = 'text/vcard';
    $mime_types['vcard'] = 'text/vcard';
    return $mime_types;
}
add_filter('upload_mimes', 'foundation_enable_vcard_upload');


function foundation_submit_form_1()
{

    require_once(get_template_directory() . '/inc/form-1.php');

    exit();
}
add_action('wp_ajax_submit_form_1', "foundation_submit_form_1");
add_action('wp_ajax_nopriv_submit_form_1', 'foundation_submit_form_1');

function foundation_submit_form_2()
{

    require_once(get_template_directory() . '/inc/form-2.php');

    exit();
}
add_action('wp_ajax_submit_form_2', "foundation_submit_form_2");
add_action('wp_ajax_nopriv_submit_form_2', 'foundation_submit_form_2');


function foundation_submit_form_3()
{

    require_once(get_template_directory() . '/inc/form-3.php');

    exit();
}
add_action('wp_ajax_submit_form_3', "foundation_submit_form_3");
add_action('wp_ajax_nopriv_submit_form_3', 'foundation_submit_form_3');
/*
function foundation_cptui_register_my_cpts()
{

    $labels = [
        "name" => __("", "custom-post-type-ui"),
        "singular_name" => __("", "custom-post-type-ui"),
    ];

    $args = [
        "label" => __("", "custom-post-type-ui"),
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
        "rewrite" => ["slug" => "", "with_front" => true],
        "query_var" => true,
        "supports" => ["title"],
        "show_in_graphql" => false,
    ];

    register_post_type("products", $args);
}

add_action('init', 'foundation_cptui_register_my_cpts');

*/

function foundation_on_theme_activation()
{
    function foundation_post_meta($id, $key, $val)
    {
        add_post_meta($id, $key, $val, true);
    }

    /*
       $ = [ '' => [ , ];

    if (get_post_type_object("")) {
        foreach ($ as $x => $) {
            $page = array(
                'post_type'      => '',
                'post_status'    => 'publish',
                'post_title' =>  $x,
            );
            $id = wp_insert_post($page);
           foundation_post_meta($id, '', '');
        }
    }
    */

    if (!get_option('page_on_front')) {
        $page = array(
            'import_id'      =>  254,
            'post_title'     => 'Home',
            'post_type'      => 'page',
            'post_name'      => 'Home',
            'post_status'    => 'publish',
        );
        $id = wp_insert_post($page);
        update_option('page_on_front', $id);
        update_option('show_on_front', 'page');
        foundation_post_meta($id, 'heading', 'Portfolio website');
        foundation_post_meta($id, '_heading', 'heading');
        foundation_post_meta($id, 'carousel_1', '');
        foundation_post_meta($id, '_carousel_1', 'carousel_1');
        foundation_post_meta($id, 'carousel_2', '');
        foundation_post_meta($id, '_carousel_2', 'carousel_2');
        foundation_post_meta($id, 'media_heading', 'Lorem ipsum dolor');
        foundation_post_meta($id, '_media_heading', 'media_heading');
        foundation_post_meta($id, 'media_paragraph', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at justo sapien. Proin tincidunt purus nec orci finibus laoreet. Curabitur facilisis est a posuere sodales.');
        foundation_post_meta($id, '_media_paragraph', 'media_paragraph');
        foundation_post_meta($id, 'media_heading_1', 'Lorem ipsum');
        foundation_post_meta($id, '_media_heading_1', 'media_heading_1');
        foundation_post_meta($id, 'media_paragraph_1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.');
        foundation_post_meta($id, '_media_paragraph_1', 'media_paragraph_1');
        foundation_post_meta($id, 'media_heading_2', 'Lorem ipsum');
        foundation_post_meta($id, '_media_heading_2', 'media_heading_2');
        foundation_post_meta($id, 'media_paragraph_2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.');
        foundation_post_meta($id, '_media_paragraph_2', 'media_paragraph_2');
        foundation_post_meta($id, 'media', '');
        foundation_post_meta($id, '_media', 'media');
        foundation_post_meta($id, 'section_heading_1', 'Lorem ipsum dolor sit');
        foundation_post_meta($id, '_section_heading_1', 'section_heading_1');
        foundation_post_meta($id, 'section_paragrap_1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        foundation_post_meta($id, '_section_paragrap_1', 'section_paragrap_1');
        foundation_post_meta($id, 'section_heading_2', 'Lorem ipsum dolor sit');
        foundation_post_meta($id, '_section_heading_2', 'section_heading_2');
        foundation_post_meta($id, 'section_paragrap_2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        foundation_post_meta($id, '_section_paragrap_2', 'section_paragrap_2');
        
    }


    if (!get_page_template_slug(256)) {
        $page = array(
            'import_id'         =>  256,
            'post_title'     => 'About',
            'post_type'      => 'page',
            'post_name'      => 'About',
            'post_status'    => 'publish',
            'page_template' => 'page-about.php',
        );
        $id = wp_insert_post($page);
        foundation_post_meta($id, 'heading', 'Biography');
        foundation_post_meta($id, '_heading', 'heading');
        foundation_post_meta($id, 'sticky_image_1', '');
        foundation_post_meta($id, '_sticky_image_1', 'sticky_image_1');
        foundation_post_meta($id, 'biography_1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        foundation_post_meta($id, '_biography_1', 'biography_1');
        foundation_post_meta($id, 'sticky_image_2', '');
        foundation_post_meta($id, '_sticky_image_2', 'sticky_image_2');
        foundation_post_meta($id, 'biography_2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        foundation_post_meta($id, '_biography_2', 'biography_2');
        foundation_post_meta($id, 'card_title', 'Creative Artist');
        foundation_post_meta($id, '_card_title', 'card_title');
        foundation_post_meta($id, 'card_heading', 'Jerry Verschoor');
        foundation_post_meta($id, '_card_heading', 'card_heading');
        foundation_post_meta($id, 'card_paragraph', 'Life is an Exploration, Art is a Journey, and no one lives these principles to the fullest than Jerry Verschoor');
        foundation_post_meta($id, '_card_paragraph', 'card_paragraph');
    }

    if (!get_page_template_slug(257)) {
        $page = array(
            'import_id'         =>  257,
            'post_title'     => 'Contact',
            'post_type'      => 'page',
            'post_name'      => 'Contact',
            'post_status'    => 'publish',
            'page_template' => 'page-contact.php',
        );
        $id = wp_insert_post($page);
        foundation_post_meta($id, 'heading', 'Get in touch');
        foundation_post_meta($id, '_heading', 'heading');
        foundation_post_meta($id, 'email', 'example@example.com');
        foundation_post_meta($id, '_email', 'email');
        foundation_post_meta($id, 'phone', '0412620989');
        foundation_post_meta($id, '_phone', 'phone');
        foundation_post_meta($id, 'download', 'Download Contact');
        foundation_post_meta($id, '_download', 'download');
        foundation_post_meta($id, 'paragraph', 'Please try the forms below');
        foundation_post_meta($id, '_paragraph', 'paragraph');
        foundation_post_meta($id, 'quote', 'He Thumbs through the pages of his life, his soul bites out with ancestry force and his life surrounds his every move as his child constantly guiding him from over his shoulder.');
        foundation_post_meta($id, '_quote', 'quote');
        foundation_post_meta($id, 'cite', 'Jerry Verschoor');
        foundation_post_meta($id, '_cite', 'cite');
    }

    if (!get_page_template_slug(258)) {
        $page = array(
            'import_id'         =>  258,
            'post_title'     => 'Gallery',
            'post_type'      => 'page',
            'post_name'      => 'Gallery',
            'post_status'    => 'publish',
            'page_template' => 'page-gallery.php',
        );
        $id = wp_insert_post($page);
        // foundation_post_meta($id, '', '');
    }

    update_option('uploads_use_yearmonth_folders', 0);
}
add_action('after_switch_theme', 'foundation_on_theme_activation');
