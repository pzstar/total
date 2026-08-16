<?php

/* SINGLE POST SECTION */
$wp_customize->add_section('total_blog_options_section', array(
    'title' => esc_html__('Single Post Settings', 'total'),
    'priority' => 45
));

$wp_customize->add_setting('total_single_display_featured_image', array(
    'sanitize_callback' => 'total_sanitize_checkbox',
    'default' => false
));

$wp_customize->add_control(new Total_Toggle_Control($wp_customize, 'total_single_display_featured_image', array(
    'section' => 'total_blog_options_section',
    'label' => esc_html__('Display Featured Image', 'total'),
)));

$wp_customize->add_setting('total_single_post_settings_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_single_post_settings_upgrade_text', array(
    'section' => 'total_blog_options_section',
    'label' => esc_html__('Reorder single post elements and add an author box, share buttons and related posts', 'total'),
    'choices' => array(
        esc_html__('SINGLE POST  -', 'total'),
        esc_html__('Choose featured image size', 'total'),
        esc_html__('Display social share button', 'total'),
        esc_html__('Display Author Box & Related Post', 'total'),
        esc_html__('Show/Hide & Reorder all the elements with drag and drop', 'total'),
        esc_html('----------------'),
        esc_html__('BLOG/ARCHIVE PAGE  -', 'total'),
        esc_html__('4 differently designed blog page', 'total'),
        esc_html__('Option to display Full Content, Custom Excerpt or WordPress Excerpt', 'total'),
        esc_html__('Show/Hide Posted Date, Author, Comment, Category & Tag', 'total'),
    ),
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('single-post', 'total-customizer')
)));

/*
 *  Blog and archive settings.
 *
 *  Pro combines blog and single post into one section; free covers only the
 *  single post, so the archive half has no home at all. This sits directly
 *  before Single Post Settings, where its Pro counterpart begins.
 */
$wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-blog-archive-upgrade-section', array(
    'title' => esc_html__('Blog & Archive Settings', 'total'),
    'priority' => 44,
    'class' => 'ht--single-row ht--pro-row',
    'upgrade_text' => esc_html__('Get Pro', 'total'),
    'upgrade_url' => total_upgrade_url('sec-blog-archive', 'total-customizer'),
    'active_callback' => 'total_is_upgrade_notice_active'
)));
