<?php

/**
 * Block editor: carries the Customizer's colors, fonts and content width into the editor.
 * The palette in theme.json uses the Customizer's CSS variables, which only resolve once these styles load.
 *
 * @package Total
 */

if (!function_exists('total_editor_content_width')) {

    // CSS width of the post's content column, matching its sidebar and Content Width settings.
    function total_editor_content_width($post) {
        $post_id = $post ? $post->ID : 0;

        if ($post_id && get_post_meta($post_id, 'total_content_width', true) == 'full-width') {
            return 'none';
        }

        $layout = get_theme_mod('total_website_layout', 'wide');
        if ($layout == 'fluid') {
            $container = absint(get_theme_mod('total_fluid_container_width', 80)) . '%';
        } elseif ($layout == 'boxed') {
            $container = 'calc(' . absint(get_theme_mod('total_wide_container_width', 1170)) . 'px - ' . (2 * absint(get_theme_mod('total_container_padding', 80))) . 'px)';
        } else {
            $container = absint(get_theme_mod('total_wide_container_width', 1170)) . 'px';
        }

        // Total saves no_sidebar, Total Plus saves no-sidebar.
        $sidebar = $post_id ? str_replace('_', '-', get_post_meta($post_id, 'total_sidebar_layout', true)) : '';
        if ($sidebar == 'no-sidebar') {
            $factor = 1;
        } elseif ($sidebar == 'no-sidebar-condensed') {
            $factor = 0.76;
        } else {
            $factor = (96 - absint(get_theme_mod('total_sidebar_width', 30))) / 100;
        }

        return 'calc(' . $container . ' * ' . $factor . ')';
    }

}

if (!function_exists('total_editor_settings')) {

    // Styles added here reach the editor iframe, unlike styles printed in the admin page.
    function total_editor_settings($settings, $context) {
        $post = isset($context->post) ? $context->post : null;
        $width = total_editor_content_width($post);

        $css = total_dymanic_styles();
        $css .= '.editor-styles-wrapper{padding-left:20px;padding-right:20px}';
        // Full-width blocks run edge to edge on the front end, so pull them over that padding.
        $css .= '.editor-styles-wrapper .is-root-container > .alignfull{margin-left:-20px;margin-right:-20px;max-width:none}';
        if ($width != 'none') {
            $css .= '.editor-styles-wrapper .is-root-container > :not(.alignfull), .editor-styles-wrapper .editor-post-title{max-width:' . $width . ';margin-left:auto;margin-right:auto}';
        }

        $settings['styles'][] = array('css' => $css);

        return $settings;
    }

}

add_filter('block_editor_settings_all', 'total_editor_settings', 10, 2);

if (!function_exists('total_editor_fonts')) {

    // enqueue_block_assets also loads inside the editor iframe.
    function total_editor_fonts() {
        if (!is_admin()) {
            return;
        }

        $fonts_url = total_fonts_url();
        if ($fonts_url) {
            wp_enqueue_style('total-editor-fonts', $fonts_url, array(), null);
        }
    }

}

add_action('enqueue_block_assets', 'total_editor_fonts');
