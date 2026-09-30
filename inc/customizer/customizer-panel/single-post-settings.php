<?php

/* SINGLE POST SECTION */
$wp_customize->add_section('total_blog_options_section', array(
    'title' => esc_html__('Single Post Settings', 'total'),
    'priority' => 45
));

$wp_customize->add_setting('total_single_display_featured_image', array(
    'sanitize_callback' => 'total_sanitize_checkbox',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Total_Toggle_Control($wp_customize, 'total_single_display_featured_image', array(
    'section' => 'total_blog_options_section',
    'label' => esc_html__('Display Featured Image', 'total'),
)));

$wp_customize->add_setting('total_single_post_navigation', array(
    'sanitize_callback' => 'total_sanitize_boolean',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Total_Toggle_Control($wp_customize, 'total_single_post_navigation', array(
    'section' => 'total_blog_options_section',
    'label' => esc_html__('Display Previous/Next Post Links', 'total'),
)));

$wp_customize->add_setting('total_single_post_settings_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_single_post_settings_upgrade_text', array(
    'section' => 'total_blog_options_section',
    'label' => esc_html__('Reorder single post elements and add an author box, share buttons and related posts', 'total'),
    'choices' => array(
        esc_html__('Choose featured image size', 'total'),
        esc_html__('Display social share button', 'total'),
        esc_html__('Display Author Box & Related Post', 'total'),
        esc_html__('Show/Hide & Reorder all the elements with drag and drop', 'total'),
        esc_html__('Reading progress bar with its own color and height', 'total'),
    ),
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('single-post', 'total-customizer')
)));

/* BLOG & ARCHIVE SECTION */
// Setting ids match Total Plus so they carry over; defaults keep the free theme's existing output.
$wp_customize->add_section('total_blog_archive_section', array(
    'title' => esc_html__('Blog & Archive Settings', 'total'),
    'description' => esc_html__('Applies to the blog page, category, tag, author and date archives.', 'total'),
    'priority' => 44
));

$wp_customize->add_setting('total_blog_archive_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_blog_archive_upgrade_text', array(
    'section' => 'total_blog_archive_section',
    'priority' => 100,
    'label' => esc_html__('More blog layouts, and a choice of which posts the blog page shows', 'total'),
    'choices' => array(
        esc_html__('5 blog layouts, including a card grid', 'total'),
        esc_html__('Exclude categories from the blog page', 'total'),
    ),
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('blog-archive', 'total-customizer')
)));

/*
 *  Pro's blog layouts, shown rather than counted, next to the free Blog Layout choice.
 */
$wp_customize->add_setting('total_blog_layout_preview', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Pro_Preview_Control($wp_customize, 'total_blog_layout_preview', array(
    'section' => 'total_blog_archive_section',
    'priority' => 101,
    'label' => esc_html__('4 blog layouts in Total Pro', 'total'),
    'columns' => 2,
    'images' => array(
        'blog-layout1.png',
        'blog-layout2.png',
        'blog-layout3.png',
        'blog-layout4.png'
    ),
    'upgrade_text' => esc_html__('Unlock these layouts', 'total'),
    'upgrade_url' => total_upgrade_url('preview-blog-layout', 'total-customizer'),
    'active_callback' => 'total_is_upgrade_notice_active'
)));

$wp_customize->add_setting('total_blog_layout', array(
    'sanitize_callback' => 'total_sanitize_choices',
    'default' => 'blog-layout1',
    'transport' => 'postMessage'
));

$wp_customize->add_control('total_blog_layout', array(
    'section' => 'total_blog_archive_section',
    'type' => 'select',
    'label' => esc_html__('Blog Layout', 'total'),
    'choices' => array(
        'blog-layout1' => esc_html__('List', 'total'),
        'blog-grid' => esc_html__('Grid', 'total')
    )
));

$wp_customize->add_setting('total_blog_grid_columns', array(
    'sanitize_callback' => 'total_sanitize_choices',
    'default' => '2',
    'transport' => 'postMessage'
));

$wp_customize->add_control('total_blog_grid_columns', array(
    'section' => 'total_blog_archive_section',
    'type' => 'select',
    'label' => esc_html__('Grid Columns', 'total'),
    'choices' => array(
        '2' => esc_html__('2 Columns', 'total'),
        '3' => esc_html__('3 Columns', 'total')
    )
));

$wp_customize->add_setting('total_archive_content', array(
    'sanitize_callback' => 'total_sanitize_choices',
    'default' => 'excerpt',
    'transport' => 'postMessage'
));

$wp_customize->add_control('total_archive_content', array(
    'section' => 'total_blog_archive_section',
    'type' => 'radio',
    'label' => esc_html__('Post Content', 'total'),
    'choices' => array(
        'excerpt' => esc_html__('Custom Excerpt', 'total'),
        'wp-excerpt' => esc_html__('WordPress Excerpt', 'total'),
        'full-content' => esc_html__('Full Content', 'total')
    )
));

$wp_customize->add_setting('total_archive_excerpt_length', array(
    'sanitize_callback' => 'absint',
    'default' => 130,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Total_Range_Slider_Control($wp_customize, 'total_archive_excerpt_length', array(
    'section' => 'total_blog_archive_section',
    'label' => esc_html__('Excerpt Length (words)', 'total'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 200,
        'step' => 1
    )
)));

$wp_customize->add_setting('total_archive_readmore', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => esc_html__('Read More', 'total'),
    'transport' => 'postMessage'
));

$wp_customize->add_control('total_archive_readmore', array(
    'section' => 'total_blog_archive_section',
    'type' => 'text',
    'label' => esc_html__('Read More Text', 'total'),
    'description' => esc_html__('Leave empty to hide the button.', 'total')
));

$wp_customize->add_setting('total_blog_meta_heading', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_blog_meta_heading', array(
    'section' => 'total_blog_archive_section',
    'label' => esc_html__('Post Meta', 'total'),
    'description' => esc_html__('Also applies to single posts.', 'total')
)));

$total_blog_meta = array(
    'total_blog_date' => array(esc_html__('Display Posted Date', 'total'), true),
    'total_blog_author' => array(esc_html__('Display Author', 'total'), false),
    'total_blog_comment' => array(esc_html__('Display Comment Count', 'total'), true),
    'total_blog_category' => array(esc_html__('Display Categories', 'total'), true),
    'total_blog_tag' => array(esc_html__('Display Tags', 'total'), false),
    'total_blog_reading_time' => array(esc_html__('Display Reading Time', 'total'), false),
);

foreach ($total_blog_meta as $total_blog_meta_id => $total_blog_meta_args) {
    $wp_customize->add_setting($total_blog_meta_id, array(
        'sanitize_callback' => 'total_sanitize_boolean',
        'default' => $total_blog_meta_args[1],
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Total_Toggle_Control($wp_customize, $total_blog_meta_id, array(
        'section' => 'total_blog_archive_section',
        'label' => $total_blog_meta_args[0]
    )));
}

$wp_customize->selective_refresh->add_partial('total_main_content', array(
    'selector' => '#main',
    'settings' => array('total_single_display_featured_image', 'total_single_post_navigation', 'total_blog_layout', 'total_blog_grid_columns', 'total_archive_content', 'total_archive_excerpt_length', 'total_archive_readmore', 'total_blog_date', 'total_blog_author', 'total_blog_comment', 'total_blog_category', 'total_blog_tag', 'total_blog_reading_time'),
    'render_callback' => 'total_customize_partial_main_content',
));
