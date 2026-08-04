<?php
/**
 * Block pattern support.
 *
 * The patterns themselves live in /patterns and are picked up by WordPress
 * automatically. This file only registers the category they group under.
 *
 * @package Total
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('total_register_block_pattern_categories')) {

    /*
     *  Registers the category the theme's patterns are filed under.
     *
     *  Without this the patterns still work, but WordPress drops them into
     *  "Uncategorized" where nobody finds them.
     */

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
