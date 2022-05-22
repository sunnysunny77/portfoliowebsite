<?php

// add category to media library
function portfolio_website_category_media()
{
    $taxonomies = get_taxonomies(array('name' => 'category'), 'objects')['category'];

    $taxonomies->update_count_callback = '_update_generic_term_count';

    register_taxonomy_for_object_type('category', 'attachment');
}
add_action('init', 'portfolio_website_category_media');

// remove category meta_box so a user cant enter an incorrect category 
function portfolio_website_remove_post_meta_boxes()
{
    remove_meta_box('categorydiv', 'attachment', 'normal');
}
add_action('admin_menu', 'portfolio_website_remove_post_meta_boxes');

// remove category field so a user cant enter an incorrect category 
function portfolio_website_remove_category($fields)
{
    unset($fields['category']);
    return $fields;
}
add_filter('attachment_fields_to_edit', 'portfolio_website_remove_category');

// remove media library column so a user cant eddit attachments
function portfolio_website_columns_manage($columns)
{
    unset($columns['parent']);
    $columns['attached'] = 'Parent';
    return $columns;
}
add_filter('manage_upload_columns', 'portfolio_website_columns_manage');

// add new attachments column
function portfolio_website_columns_display($column_name, $post_id)
{
    if ('attached' == $column_name) {
        $post = get_post($post_id);
        $parent =  $post->post_parent;

        if ($parent > 0) {

            $value = '';

            if (get_post($parent)) {
                $value = "Title: " . _draft_or_post_title($parent) . "<br/> Status: " . get_post_status($parent);
            }

            if (current_user_can('edit_post', $parent)) {
?>
                <a href="<?php echo get_edit_post_link($parent); ?>">
                    <?php echo  $value; ?>
                </a>
<?php
            } else {
                echo $value;
            }
        } else {

            echo '(Unattached)';
        }
    }
}
add_action('manage_media_custom_column', 'portfolio_website_columns_display', 10, 2);

// set category after attachment
function portfolio_website_set_attachment_category($post_ID)
{
    $post_types = ["storyboarding_films", "concepts_films", "independent_films", "theatre", "designs", "poems_poetry", "illustrated_poetry", "sculptures", "illustrations"];

    $post = get_post($post_ID);
    $post = get_post_type($post->post_parent);

    if (in_array($post, $post_types)) {

        foreach ($post_types as $post_type) {

            if ($post == $post_type) {
                $category = get_term_by('name', $post_type, 'category');
                wp_set_object_terms($post_ID, $category->term_id, 'category');
            }
        }
    }
};
add_action('add_attachment', 'portfolio_website_set_attachment_category');
add_action('edit_attachment', 'portfolio_website_set_attachment_category');

// remove category before trash
function portfolio_website_trash_post($post_id)
{
    $post_types = ["storyboarding_films", "concepts_films", "independent_films", "theatre", "designs", "poems_poetry", "illustrated_poetry", "sculptures", "illustrations"];

    $post = get_post_type($post_id);

    if (in_array($post, $post_types)) {

        foreach ($post_types as  $post_type) {
            if ($post_type == $post) {
                $meta = get_post_meta($post_id, $post, true);
                $category = get_term_by('name', $post, 'category');
                wp_remove_object_terms($meta, $category->term_id, 'category');
            }
        }
    }
}
add_action('wp_trash_post', 'portfolio_website_trash_post');


// add category when un-trashing
function portfolio_website_untrash_posts($post_id)
{
    $post_types = ["storyboarding_films", "concepts_films", "independent_films", "theatre", "designs", "poems_poetry", "illustrated_poetry", "sculptures", "illustrations"];

    $post = get_post_type($post_id);

    if (in_array($post, $post_types)) {

        foreach ($post_types as  $post_type) {
            if ($post_type == $post) {
                $meta = get_post_meta($post_id, $post, true);
                $category = get_term_by('name', $post, 'category');
                wp_set_object_terms($meta, $category->term_id, 'category');
            }
        }
    }
}
add_action('untrash_post', 'portfolio_website_untrash_posts');
