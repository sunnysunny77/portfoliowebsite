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

function portfolio_website_enable_vcard_upload($mime_types)
{

    $mime_types['vcf'] = 'text/vcard';
    $mime_types['vcard'] = 'text/vcard';
    return $mime_types;
    }
add_filter('upload_mimes', 'portfolio_website_enable_vcard_upload');

add_filter('pre_option_upload_path', function ($upload_path) {

    return  get_template_directory() . '/files';
});

add_filter('pre_option_upload_url_path', function ($upload_url_path) {

    return get_template_directory_uri() . '/files';
});

add_filter('option_uploads_use_yearmonth_folders', '__return_false');

function portfolio_website_add_column_parent($posts_columns)
{

    $posts_columns['parents'] = __('Parent');
    $posts_columns['child'] = __('Children');
    return $posts_columns;
}
add_filter('manage_media_columns', 'portfolio_website_add_column_parent');

function portfolio_website_custom_column($column_name, $post_id)
{

    global $wpdb;

    if ('parents' == $column_name) {

        $meta_key =  get_post_meta($post_id, 'parent', true);

        $parent = get_post_parent($post_id);

        $result = $wpdb->get_var($wpdb->prepare(
            "
            SELECT meta_value FROM $wpdb->postmeta 
            WHERE meta_key = %s AND post_id = %d LIMIT 1
            ",
            $meta_key,
            $parent->ID
            )
        );

        if ($meta_key) {
            echo $meta_key;
            if (!$result && $parent->post_type !== "page") {
                echo '<br/> Uploaded to is NULL';
            }
        } else {
            echo '-';
        }
    }

    if ('child' == $column_name) {

        $attached = get_post_parent($post_id);

        $text = '';

        $result = $wpdb->get_results(
            $wpdb->prepare(
            "
            SELECT meta_key, post_id
            FROM $wpdb->postmeta
            WHERE meta_value = %sAND NOT post_id = %d
            ",
            $post_id,
            $attached->ID
            )
        );

        foreach ($result as $row) {

            $text .= "<a href='" . get_edit_post_link($row->post_id) . "'>" . $row->meta_key  . "</a><br/>" . _draft_or_post_title($row->post_id) . "<br/><br/>";
        }

        if ($text) {
            echo $text;
        } else {
            echo '-';
        }
    }
    return false;
}
add_action('manage_media_custom_column', 'portfolio_website_custom_column', 10, 2);

function portfolio_website_add_column_sortable($columns)
{

    $columns['parents'] = 'parents';
    return $columns;
}
add_filter('manage_upload_sortable_columns', 'portfolio_website_add_column_sortable');

function portfolio_website_sortable($query)
{

    if (!is_admin() || !$query->is_main_query()) {
        return;
    }
    if ('parents' === $query->get('orderby')) {
        $query->set('order', 'ASC');
        $query->set('orderby', 'meta_value');
        $query->set('meta_key', 'parent');
        if ('desc' == $_REQUEST['order']) {
            $query->set('order', 'DSC');
        }
    }
}
add_action('pre_get_posts', 'portfolio_website_sortable');

function portfolio_website_set_attachment($post_ID)
{

    $post = get_post_parent($post_ID);
    if ($post) {
        update_post_meta($post_ID, "parent", $post->post_type);
    }
}
add_action('add_attachment', 'portfolio_website_set_attachment');
add_action('edit_attachment', 'portfolio_website_set_attachment');

function portfolio_website_attach_action($action, $attachment_id, $parent_id)
{

    $post = get_post($parent_id);
    if ($action == "attach") {
        update_post_meta($attachment_id, "parent", $post->post_type);
    } else if ($action == "detach") {
        delete_post_meta($attachment_id, 'parent');
    }
}
add_action('wp_media_attach_action', 'portfolio_website_attach_action', 10, 3);

function filter_post_data($data, $postarr)
{

    $post_types = ["storyboarding_films", "concepts_films", "independent_films", "theatre", "designs", "poems_poetry", "illustrated_poetry", "sculptures", "illustrations"];
    if ($postarr['post_status'] == "trash" && in_array($postarr['post_type'], $post_types)) {
        $meta_key =  get_post_meta($postarr['ID'], $postarr['post_type'], true);
         delete_post_meta($meta_key, 'parent');
    }
    return $data;
}
add_filter('wp_insert_post_data', 'filter_post_data', '99', 2);

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

    require_once(get_template_directory() . '/inc/activation.php');
}
add_action('after_switch_theme', 'portfolio_website_on_theme_activation');
