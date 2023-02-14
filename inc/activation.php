<?php
//theme activation
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

if (!get_option('page_for_posts')) {
    $page = array(
        'post_title'     => 'Blog',
        'post_type'      => 'page',
        'post_name'      => 'Blog',
        'post_status'    => 'publish',
    );
    $id = wp_insert_post($page);
    update_option('page_for_posts', $id);
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
    portfolio_website_post_meta($id, 'media_paragraph_image', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.');
    portfolio_website_post_meta($id, '_media_paragraph_image', 'media_paragraph_image');
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
