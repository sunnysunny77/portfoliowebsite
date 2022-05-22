<?php

if (!isset($content_width)) {
    $content_width = 1920;
}

if (!function_exists('portfolio_website_setup')) {

    function portfolio_website_setup()
    {
        register_nav_menus(
            array(
                'main-nav' => 'Main Navigation',
                'footer-nav' => 'Footer Navigation',
            )
        );

        add_theme_support('widget-customizer');

        add_theme_support('title-tag');

        add_theme_support('html5', ['script', 'style', 'comment-form', 'search-form', 'gallery', 'caption']);

        add_theme_support('menus');
    }
}
add_action('after_setup_theme', 'portfolio_website_setup');

function portfolio_website_scripts()
{

    //foundation 6 for sites and icons + vivus + app
    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery.js', '', '', false);

    wp_enqueue_script('foundation-js', get_template_directory_uri() . '/js/vendor/foundation.min.js', array('jquery'), '', true);

    wp_enqueue_style('foundation-css', get_template_directory_uri() . '/assets/css/foundation.min.css');

    wp_enqueue_style('icons', get_template_directory_uri() . '/assets/css/icons/foundation-icons.css');

    wp_enqueue_script('what-input', get_template_directory_uri() . '/js/vendor/what-input.js', array('jquery'), '', true);

    wp_enqueue_script('vivus', get_template_directory_uri() . '/node_modules/vivus/dist/vivus.min.js', '', '', true);

    wp_enqueue_script('app-js', get_template_directory_uri() . '/js/app.js', array('jquery'), '', true);

    wp_localize_script('app-js', 'path', array(
        'dir' => get_template_directory_uri(),
    ));

    //AJAX
    wp_enqueue_script('jquery-form', '', array('jquery'), '', true);

    //theme 
    if (is_front_page()) {
        wp_enqueue_style('home-css', get_template_directory_uri() . '/assets/css/home.css');
        wp_enqueue_script('goto-js', get_template_directory_uri() . '/js/goto.js', array('jquery'), '', true);
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
    } else if (is_search()) {
        wp_enqueue_style('search-css', get_template_directory_uri() . '/assets/css/search.css');
    } else if (is_404()) {
        wp_enqueue_style('notfound-css', get_template_directory_uri() . '/assets/css/notfound.css');
    }
}
add_action('wp_enqueue_scripts', 'portfolio_website_scripts');

function portfolio_website_remove_admin_menus()
{
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
    remove_menu_page('index.php');
    remove_menu_page('tools.php');
}
if (current_user_can('editor')) {
    add_action('admin_menu', 'portfolio_website_remove_admin_menus');
}

function portfolio_website_custom_sidebars()
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
add_action('widgets_init', 'portfolio_website_custom_sidebars');

add_filter('pre_option_upload_path', function ($upload_path) {
    return  get_template_directory() . '/files';
});

add_filter('pre_option_upload_url_path', function ($upload_url_path) {
    return get_template_directory_uri() . '/files';
});

add_filter('option_uploads_use_yearmonth_folders', '__return_false');

function portfolio_website_enable_vcard_upload($mime_types)
{
    $mime_types['vcf'] = 'text/vcard';
    $mime_types['vcard'] = 'text/vcard';
    return $mime_types;
}
add_filter('upload_mimes', 'portfolio_website_enable_vcard_upload');

function portfolio_website_media_columns($columns) {
    $columns['post_parent'] = 'Post parent';
    return $columns;
} 
add_filter( 'manage_media_columns', 'portfolio_website_media_columns' );
 
function portfolio_website_media_custom_column($columnName, $columnID){
    if($columnName == 'post_parent'){
        $parent = get_post_parent($columnID);
       echo get_post_type($parent);
    }
}
add_filter( 'manage_media_custom_column', 'portfolio_website_media_custom_column', 10, 2 );

function portfolio_website_submit_form_1()
{

    require_once(get_template_directory() . '/inc/form-1.php');

    exit();
}
add_action('wp_ajax_submit_form_1', "portfolio_website_submit_form_1");
add_action('wp_ajax_nopriv_submit_form_1', 'portfolio_website_submit_form_1');

function portfolio_website_submit_form_2()
{

    require_once(get_template_directory() . '/inc/form-2.php');

    exit();
}
add_action('wp_ajax_submit_form_2', "portfolio_website_submit_form_2");
add_action('wp_ajax_nopriv_submit_form_2', 'portfolio_website_submit_form_2');

function portfolio_website_submit_form_3()
{

    require_once(get_template_directory() . '/inc/form-3.php');

    exit();
}
add_action('wp_ajax_submit_form_3', "portfolio_website_submit_form_3");
add_action('wp_ajax_nopriv_submit_form_3', 'portfolio_website_submit_form_3');

function portfolio_website_register_cptui()
{

    require_once(get_template_directory() . '/inc/custom-post-types.php');
}
add_action('init', 'portfolio_website_register_cptui');

function portfolio_website_on_theme_activation()
{

    function portfolio_website_remove_post($page_path, $output, $post_type)
    {
        $post = get_page_by_path($page_path, $output, $post_type);
        if ($post) {
            wp_delete_post($post->ID, true);
        }
    }

    portfolio_website_remove_post('hello-world', 'OBJECT', 'post');

    portfolio_website_remove_post('Sample Page', 'OBJECT', 'page');

    portfolio_website_remove_post('Privacy Policy', 'OBJECT', 'page');

    function portfolio_website_post_meta($id, $key, $val)
    {
        add_post_meta($id, $key, $val, true);
    }

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
        portfolio_website_post_meta($id, 'heading', 'The Art of Jerry Verschoor');
        portfolio_website_post_meta($id, '_heading', 'heading');
        portfolio_website_post_meta($id, 'heading_image', '');
        portfolio_website_post_meta($id, '_heading_image', 'heading_image');
        portfolio_website_post_meta($id, 'film,', '');
        portfolio_website_post_meta($id, '_film', 'film');
        portfolio_website_post_meta($id, 'theatre', '');
        portfolio_website_post_meta($id, '_theatre', 'theatre');
        portfolio_website_post_meta($id, 'design', '');
        portfolio_website_post_meta($id, '_design', 'design');
        portfolio_website_post_meta($id, 'poetry', '');
        portfolio_website_post_meta($id, '_poetry', 'poetry');
        portfolio_website_post_meta($id, 'sculptures', '');
        portfolio_website_post_meta($id, '_sculptures', 'sculptures');
        portfolio_website_post_meta($id, 'illustrations', '');
        portfolio_website_post_meta($id, '_illustrations', 'illustrations');
        portfolio_website_post_meta($id, 'disclaimer', '* Photoshop images are hand drawn, all work is drawn and illustrated by hand digital or not.');
        portfolio_website_post_meta($id, '_disclaimer', 'disclaimer');
    }

    if (!get_page(256)) {
        $page = array(
            'import_id'         =>  256,
            'post_title'     => 'About',
            'post_type'      => 'page',
            'post_name'      => 'About',
            'post_status'    => 'publish',
            'page_template' => 'page-about.php',
        );
        $id = wp_insert_post($page);
        portfolio_website_post_meta($id, 'heading', 'Biography');
        portfolio_website_post_meta($id, '_heading', 'heading');
        portfolio_website_post_meta($id, 'media_heading', 'Lorem ipsum dolor');
        portfolio_website_post_meta($id, '_media_heading', 'media_heading');
        portfolio_website_post_meta($id, 'media_paragraph', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at justo sapien. Proin tincidunt purus nec orci finibus laoreet. Curabitur facilisis est a posuere sodales.');
        portfolio_website_post_meta($id, '_media_paragraph', 'media_paragraph');
        portfolio_website_post_meta($id, 'media_heading_1', 'Lorem ipsum');
        portfolio_website_post_meta($id, '_media_heading_1', 'media_heading_1');
        portfolio_website_post_meta($id, 'media_paragraph_1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.');
        portfolio_website_post_meta($id, '_media_paragraph_1', 'media_paragraph_1');
        portfolio_website_post_meta($id, 'media_heading_2', 'Lorem ipsum');
        portfolio_website_post_meta($id, '_media_heading_2', 'media_heading_2');
        portfolio_website_post_meta($id, 'media_paragraph_2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.');
        portfolio_website_post_meta($id, '_media_paragraph_2', 'media_paragraph_2');
        portfolio_website_post_meta($id, 'media', '');
        portfolio_website_post_meta($id, '_media', 'media');
        portfolio_website_post_meta($id, 'section_heading_1', 'Lorem ipsum dolor sit');
        portfolio_website_post_meta($id, '_section_heading_1', 'section_heading_1');
        portfolio_website_post_meta($id, 'section_paragraph_1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        portfolio_website_post_meta($id, '_section_paragraph_1', 'section_paragraph_1');
        portfolio_website_post_meta($id, 'section_heading_2', 'Lorem ipsum dolor sit');
        portfolio_website_post_meta($id, '_section_heading_2', 'section_heading_2');
        portfolio_website_post_meta($id, 'section_paragraph_2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
        portfolio_website_post_meta($id, '_section_paragraph_2', 'section_paragraph_2');
        portfolio_website_post_meta($id, 'sticky_image_1', '');
        portfolio_website_post_meta($id, '_sticky_image_1', 'sticky_image_1');
        portfolio_website_post_meta($id, 'biography_1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        portfolio_website_post_meta($id, '_biography_1', 'biography_1');
        portfolio_website_post_meta($id, 'sticky_image_2', '');
        portfolio_website_post_meta($id, '_sticky_image_2', 'sticky_image_2');
        portfolio_website_post_meta($id, 'biography_2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        portfolio_website_post_meta($id, '_biography_2', 'biography_2');
        portfolio_website_post_meta($id, 'card_title', 'Creative Artist');
        portfolio_website_post_meta($id, '_card_title', 'card_title');
        portfolio_website_post_meta($id, 'card_heading', 'Jerry Verschoor');
        portfolio_website_post_meta($id, '_card_heading', 'card_heading');
        portfolio_website_post_meta($id, 'card_paragraph', 'Life is an Exploration, Art is a Journey, and no one lives these principles to the fullest than Jerry Verschoor');
        portfolio_website_post_meta($id, '_card_paragraph', 'card_paragraph');
    }

    if (!get_page(257)) {
        $page = array(
            'import_id'         =>  257,
            'post_title'     => 'Contact',
            'post_type'      => 'page',
            'post_name'      => 'Contact',
            'post_status'    => 'publish',
            'page_template' => 'page-contact.php',
        );
        $id = wp_insert_post($page);
        portfolio_website_post_meta($id, 'heading', 'Get in touch');
        portfolio_website_post_meta($id, '_heading', 'heading');
        portfolio_website_post_meta($id, 'email', 'example@example.com');
        portfolio_website_post_meta($id, '_email', 'email');
        portfolio_website_post_meta($id, 'phone', '0412620989');
        portfolio_website_post_meta($id, '_phone', 'phone');
        portfolio_website_post_meta($id, 'download', 'Download Contact');
        portfolio_website_post_meta($id, '_download', 'download');
        portfolio_website_post_meta($id, 'paragraph', 'Please try the forms below');
        portfolio_website_post_meta($id, '_paragraph', 'paragraph');
        portfolio_website_post_meta($id, 'quote', 'He Thumbs through the pages of his life, his soul bites out with ancestry force and his life surrounds his every move as his child constantly guiding him from over his shoulder.');
        portfolio_website_post_meta($id, '_quote', 'quote');
        portfolio_website_post_meta($id, 'cite', 'Jerry Verschoor');
        portfolio_website_post_meta($id, '_cite', 'cite');
    }
}
add_action('after_switch_theme', 'portfolio_website_on_theme_activation');