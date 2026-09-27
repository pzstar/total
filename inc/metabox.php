<?php

/**
 *
 * @package Total
 */

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function total_sidebar_layout_meta_box() {

    $screens = array('post', 'page');

    add_meta_box(
        'total_sidebar_layout', esc_html__('Page Settings', 'total'), 'total_sidebar_layout_meta_box_callback', $screens, 'side', 'high'
    );
}

add_action('add_meta_boxes', 'total_sidebar_layout_meta_box');

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function total_sidebar_layout_meta_box_callback($post) {

    // Add a nonce field so we can check for it later.
    wp_nonce_field('total_sidebar_layout_save_meta_box', 'total_sidebar_layout_meta_box_nonce');

    /*
     * Use get_post_meta() to retrieve an existing value
     * from the database and use the value for the form.
     */
    $total_sidebar_layout = get_post_meta($post->ID, 'total_sidebar_layout', true);
    $total_hide_title = get_post_meta($post->ID, 'total_hide_title', true);
    $total_transparent_header = get_post_meta($post->ID, 'total_transparent_header', true);
    $total_content_width = get_post_meta($post->ID, 'total_content_width', true);
    $total_no_header_space = get_post_meta($post->ID, 'total_disable_space_below_header', true);
    $total_no_footer_space = get_post_meta($post->ID, 'total_disable_space_above_footer', true);

    if (!$total_sidebar_layout) {
        $total_sidebar_layout = 'right_sidebar';
    }

    echo '<div class="total-sidebar-layouts">';
    echo '<label>';
    echo '<input type="radio" name="total_sidebar_layout" value="right_sidebar" ' . checked($total_sidebar_layout, 'right_sidebar', false) . ' />';
    echo '<img src="' . esc_url(get_template_directory_uri() . '/inc/customizer/customizer-panel/assets/images/sidebar-layouts/right-sidebar.jpg') . '"/>';
    echo '</label>';

    echo '<label>';
    echo '<input type="radio" name="total_sidebar_layout" value="left_sidebar" ' . checked($total_sidebar_layout, 'left_sidebar', false) . ' />';
    echo '<img src="' . esc_url(get_template_directory_uri() . '/inc/customizer/customizer-panel/assets/images/sidebar-layouts/left-sidebar.jpg') . '"/>';
    echo '</label>';

    echo '<label>';
    echo '<input type="radio" name="total_sidebar_layout" value="no_sidebar" ' . checked($total_sidebar_layout, 'no_sidebar', false) . ' />';
    echo '<img src="' . esc_url(get_template_directory_uri() . '/inc/customizer/customizer-panel/assets/images/sidebar-layouts/no-sidebar.jpg') . '"/>';
    echo '</label>';

    echo '<label>';
    echo '<input type="radio" name="total_sidebar_layout" value="no_sidebar_condensed" ' . checked($total_sidebar_layout, 'no_sidebar_condensed', false) . ' />';
    echo '<img src="' . esc_url(get_template_directory_uri() . '/inc/customizer/customizer-panel/assets/images/sidebar-layouts/no-sidebar-narrow.jpg') . '"/>';
    echo '</label>';
    echo '</div>';

    echo '<p>';
    echo '<input type="checkbox" id="total_hide_title" name="total_hide_title" value="1" ' . checked($total_hide_title, 1, false) . ' />';
    echo '<label for="total_hide_title">';
    echo esc_html__('Hide Title Banner', 'total');
    echo '</label>';
    echo '</p>';

    echo '<p>';
    echo '<label for="total_content_width">' . esc_html__('Content Width', 'total') . '</label><br>';
    echo '<select id="total_content_width" name="total_content_width">';
    echo '<option value="container" ' . selected($total_content_width, 'container', false) . '>' . esc_html__('Inside Container', 'total') . '</option>';
    echo '<option value="full-width" ' . selected($total_content_width, 'full-width', false) . '>' . esc_html__('Full Width', 'total') . '</option>';
    echo '</select>';
    echo '</p>';

    echo '<p>';
    echo '<input type="checkbox" id="total_disable_space_below_header" name="total_disable_space_below_header" value="1" ' . checked($total_no_header_space, 1, false) . ' />';
    echo '<label for="total_disable_space_below_header">' . esc_html__('Remove Space Below Header', 'total') . '</label><br>';
    echo '<input type="checkbox" id="total_disable_space_above_footer" name="total_disable_space_above_footer" value="1" ' . checked($total_no_footer_space, 1, false) . ' />';
    echo '<label for="total_disable_space_above_footer">' . esc_html__('Remove Space Above Footer', 'total') . '</label>';
    echo '</p>';

    $transparent_choices = array(
        '' => esc_html__('Default (from Customizer)', 'total'),
        'on' => esc_html__('On: over the content', 'total'),
        'off' => esc_html__('Off', 'total'),
    );
    echo '<p>';
    echo '<label for="total_transparent_header">' . esc_html__('Transparent Header', 'total') . '</label><br>';
    echo '<select id="total_transparent_header" name="total_transparent_header">';
    foreach ($transparent_choices as $value => $label) {
        echo '<option value="' . esc_attr($value) . '" ' . selected($total_transparent_header, $value, false) . '>' . esc_html($label) . '</option>';
    }
    echo '</select>';
    echo '<span class="description" style="display:block;margin-top:4px">' . esc_html__('"On" places a transparent header over the top of the page, even with the title hidden, e.g. over a full-width Elementor hero.', 'total') . '</span>';
    echo '</p>';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function total_sidebar_layout_save_meta_box($post_id) {

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if (!isset($_POST['total_sidebar_layout_meta_box_nonce'])) {
        return;
    }

    // Verify that the nonce is valid.
    if (!wp_verify_nonce(sanitize_key($_POST['total_sidebar_layout_meta_box_nonce']), 'total_sidebar_layout_save_meta_box')) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    /* OK, it's safe for us to save the data now. */

    // Make sure that it is set.
    if (isset($_POST['total_sidebar_layout'])) {
        // Sanitize user input.
        $total_data = sanitize_text_field(wp_unslash($_POST['total_sidebar_layout']));
        // Update the meta field in the database.
        update_post_meta($post_id, 'total_sidebar_layout', $total_data);
    }

    $total_hide_title = isset($_POST['total_hide_title']) ? true : false;
    update_post_meta($post_id, 'total_hide_title', $total_hide_title);
    // Total Plus reads the banner setting from this key.
    update_post_meta($post_id, 'total_hide_titlebar', $total_hide_title);

    $total_content_width = isset($_POST['total_content_width']) && $_POST['total_content_width'] === 'full-width' ? 'full-width' : 'container';
    update_post_meta($post_id, 'total_content_width', $total_content_width);

    foreach (array('total_disable_space_below_header', 'total_disable_space_above_footer') as $total_space_key) {
        update_post_meta($post_id, $total_space_key, isset($_POST[$total_space_key]) ? true : false);
    }

    $total_transparent_header = isset($_POST['total_transparent_header']) ? sanitize_key(wp_unslash($_POST['total_transparent_header'])) : '';
    if (in_array($total_transparent_header, array('on', 'off'), true)) {
        update_post_meta($post_id, 'total_transparent_header', $total_transparent_header);
    } else {
        delete_post_meta($post_id, 'total_transparent_header');
    }
}

add_action('save_post', 'total_sidebar_layout_save_meta_box');
