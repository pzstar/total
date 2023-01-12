<?php

if (!function_exists('total_widget_list')) {

    function total_widget_list() {
        global $wp_registered_sidebars;
        $menu_choice = array();
        $widget_list['none'] = esc_html__('-- Choose Widget --', 'total');
        if ($wp_registered_sidebars) {
            foreach ($wp_registered_sidebars as $wp_registered_sidebar) {
                $widget_list[$wp_registered_sidebar['id']] = $wp_registered_sidebar['name'];
            }
        }
        return $widget_list;
    }

}

if (!function_exists('total_cat')) {

    function total_cat() {
        $cat = array();
        $categories = get_categories(array('hide_empty' => 0));
        if ($categories) {
            foreach ($categories as $category) {
                $cat[$category->term_id] = $category->cat_name;
            }
        }
        return $cat;
    }

}

if (!function_exists('total_page_choice')) {

    function total_page_choice() {
        $page_choice = array();
        $pages = get_pages(array('hide_empty' => 0));
        if ($pages) {
            foreach ($pages as $pages_single) {
                $page_choice[$pages_single->ID] = $pages_single->post_title;
            }
        }
        return $page_choice;
    }

}

if (!function_exists('total_menu_choice')) {

    function total_menu_choice() {
        $menu_choice = array('none' => esc_html('Select Menu', 'total'));
        $menus = get_terms('nav_menu', array('hide_empty' => false));
        if ($menus) {
            foreach ($menus as $menus_single) {
                $menu_choice[$menus_single->slug] = $menus_single->name;
            }
        }
        return $menu_choice;
    }

}

if (!function_exists('total_icon_choices')) {

    function total_icon_choices() {
        echo '<div id="ht--icon-box" class="ht--icon-box">';
        echo '<div class="ht--icon-search">';
        echo '<select>';

        //See customizer-icon-manager.php file
        $icons = apply_filters('total_register_icon', array());

        if ($icons && is_array($icons)) {
            foreach ($icons as $icon) {
                if ($icon['name'] && $icon['label']) {
                    echo '<option value="' . esc_attr($icon['name']) . '">' . esc_html($icon['label']) . '</option>';
                }
            }
        }

        echo '</select>';
        echo '<input type="text" class="ht--icon-search-input" placeholder="' . esc_html__('Type to filter', 'total') . '" />';
        echo '</div>';

        if ($icons && is_array($icons)) {
            $active_class = ' active';
            foreach ($icons as $icon) {
                $icon_name = isset($icon['name']) && $icon['name'] ? $icon['name'] : '';
                $icon_prefix = isset($icon['prefix']) && $icon['prefix'] ? $icon['prefix'] : '';
                $icon_displayPrefix = isset($icon['displayPrefix']) && $icon['displayPrefix'] ? $icon['displayPrefix'] . ' ' : '';

                echo '<ul class="ht--icon-list ' . esc_attr($icon_name) . esc_attr($active_class) . '">';
                $icon_array = isset($icon['icons']) ? $icon['icons'] : '';
                if (is_array($icon_array)) {
                    foreach ($icon_array as $icon_id) {
                        echo '<li><i class="' . esc_attr($icon_displayPrefix) . esc_attr($icon_prefix) . esc_attr($icon_id) . '"></i></li>';
                    }
                }
                echo '</ul>';
                $active_class = '';
            }
        }

        echo '</div>';
    }

}

add_action('customize_controls_print_footer_scripts', 'total_icon_choices');

add_action('wp_ajax_total_order_sections', 'total_order_sections');

function total_order_sections() {
    if (isset($_POST['sections'])) {
        set_theme_mod('total_frontpage_sections', $_POST['sections']);
    }
    wp_die();
}

function total_get_section_position($key) {
    $sections = total_home_section();
    $position = array_search($key, $sections);
    $return = ( $position + 1 ) * 10;
    return $return;
}

if (!function_exists('total_post_count_choice')) {

    function total_post_count_choice() {
        return array(3 => 3, 6 => 6, 9 => 9);
    }

}

if (!function_exists('total_percentage')) {

    function total_percentage() {
        for ($i = 1; $i <= 100; $i++) {
            $total_percentage[$i] = $i;
        }
        return $total_percentage;
    }

}

if (!function_exists('total_is_upgrade_notice_active')) {

    function total_is_upgrade_notice_active() {
        $show_upgrade_notice = apply_filters('total_hide_upgrade_notice', get_theme_mod('total_hide_upgrade_notice', false));
        return !$show_upgrade_notice;
    }

}

function total_customizer_settings($wp_customize) {
    if (class_exists('TotalPlus') && version_compare(TOTALPLUS_VERSION, '2.0.8') <= 0) {
        $settings = array(
            'total_template_color',
            'total_wide_container_width',
            'total_fluid_container_width',
            'total_sidebar_width',
            'total_container_padding',
            'total_content_header_color',
            'total_content_text_color',
            'total_content_link_color',
            'total_content_link_hov_color',
            'total_title_color',
            'total_tagline_color',
            'total_logo_width',
            'total_logo_width_tablet',
            'total_logo_width_mobile',
            'total_mh_bg_color',
            'total_mh_spacing_left_desktop',
            'total_mh_spacing_top_desktop',
            'total_mh_spacing_bottom_desktop',
            'total_mh_spacing_right_desktop',
            'total_pm_menu_link_color',
            'total_pm_menu_link_hover_color',
            'total_pm_menu_hover_bg_color',
            'total_pm_submenu_bg_color',
            'total_pm_submenu_link_color',
            'total_pm_submenu_link_hover_color',
            'total_pm_submenu_link_bg_color',
            'total_footer_bg_url',
            'total_footer_bg_size',
            'total_footer_bg_repeat',
            'total_footer_bg_position',
            'total_footer_bg_attachment',
            'total_footer_bg_color',
            'total_footer_bg_overlay',
            'total_top_footer_title_color',
            'total_top_footer_text_color',
            'total_top_footer_anchor_color',
            'total_top_footer_anchor_color_hover',
            'total_bottom_footer_text_color',
            'total_bottom_footer_anchor_color',
            'total_bottom_footer_anchor_color_hover',
            'total_bottom_footer_bg_color',
            'total_service_left_bg',
            'total_counter_bg',
            'total_cta_bg',
            'total_body_family',
            'total_body_style',
            'total_body_text_transform',
            'total_body_text_decoration',
            'total_body_size',
            'total_body_letter_spacing',
            'total_body_line_height',
            'total_body_color',
            'total_menu_family',
            'total_menu_style',
            'total_menu_text_transform',
            'total_menu_text_decoration',
            'total_menu_size',
            'total_menu_letter_spacing',
            'total_menu_line_height',
            'total_h_family',
            'total_h_style',
            'total_h_text_transform',
            'total_h_text_decoration',
            'total_h_letter_spacing',
            'total_h_line_height'
        );

        foreach ($settings as $setting) {
            $wp_customize->get_setting($setting)->transport = 'refresh';
        }
    }
}

add_action('customize_register', 'total_customizer_settings', 100);
