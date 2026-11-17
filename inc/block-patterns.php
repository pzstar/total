<?php
/**
 * Block pattern support.
 *
 * @package Total
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('total_register_block_pattern_categories')) {

    /* Registers the theme's pattern category; without it the patterns land in Uncategorized. */

    function total_register_block_pattern_categories() {
        if (!function_exists('register_block_pattern_category')) {
            return;
        }

        register_block_pattern_category(
            'total', array(
                'label' => esc_html__('Total', 'total'),
                'description' => esc_html__('Sections that mirror the Total front page layout.', 'total'),
            )
        );
    }

}

add_action('init', 'total_register_block_pattern_categories');
