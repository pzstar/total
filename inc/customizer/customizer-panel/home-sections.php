<?php

/* ============HOME PANEL============ */
$wp_customize->add_panel('total_home_panel', array(
    'title' => esc_html__('Home Sections', 'total'),
    'priority' => 50,
    'description' => esc_html__('Drag and Drop to Reorder', 'total') . '<img class="total-drag-spinner" src="' . admin_url('/images/spinner.gif') . '">',
));

$wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-frontpage-notice', array(
    'title' => sprintf(esc_html__('Important! Home Page Sections are not enabled. Enable it %1shere%2s.', 'total'), '<a href="javascript:wp.customize.section( \'static_front_page\' ).focus()">', '</a>'),
    'priority' => -1,
    'class' => 'ht--single-row',
    'panel' => 'total_home_panel',
    'active_callback' => 'total_check_frontpage'
)));

/* ============SLIDER IMAGES SECTION============ */

$wp_customize->add_section(new Total_Toggle_Section($wp_customize, 'total_slider_section', array(
    'title' => esc_html__('Home Slider', 'total'),
    'panel' => 'total_home_panel',
    'priority' => -1,
    'hiding_control' => 'total_slider_section_disable'
)));

//ENABLE/DISABLE ABOUT US PAGE
$wp_customize->add_setting('total_slider_section_disable', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Total_Switch_Control($wp_customize, 'total_slider_section_disable', array(
    'section' => 'total_slider_section',
    'label' => esc_html__('Disable Section', 'total'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'total'),
        'off' => esc_html__('No', 'total')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1
)));

//SLIDERS
for ($i = 1; $i < 4; $i++) {

    $wp_customize->add_setting('total_slider_heading' . $i, array(
        'sanitize_callback' => 'total_sanitize_text'
    ));

    $wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_slider_heading' . $i, array(
        'settings' => 'total_slider_heading' . $i,
        'section' => 'total_slider_section',
        'label' => esc_html__('Slider ', 'total') . $i,
    )));

    $wp_customize->add_setting('total_slider_page' . $i, array(
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control('total_slider_page' . $i, array(
        'settings' => 'total_slider_page' . $i,
        'section' => 'total_slider_section',
        'type' => 'dropdown-pages',
        'label' => esc_html__('Select a Page', 'total'),
    ));
}

$wp_customize->add_setting('total_slider_info', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Text_Info_Control($wp_customize, 'total_slider_info', array(
    'settings' => 'total_slider_info',
    'section' => 'total_slider_section',
    'label' => esc_html__('Note:', 'total'),
    'description' => wp_kses_post(__('The Page featured image works as a slider banner and the title & content work as a slider caption. <br/> Recommended Image Size: 1900X600', 'total')),
)));

$wp_customize->add_setting('total_slider_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_slider_upgrade_text', array(
    'section' => 'total_slider_section',
    'label' => esc_html__('Slides come from pages here. Pro adds unlimited slides with their own image, caption and button', 'total'),
    'choices' => array(
        esc_html__('Unlimited slider blocks', 'total'),
        esc_html__('Repeatable slider block with image, caption and button fields instead of page', 'total'),
        esc_html__('Option for Revolution slider or single banner display with text', 'total'),
        esc_html__('Option to link slider externally with button', 'total'),
        esc_html__('Option to configure slider pause duration', 'total'),
        esc_html__('Option to change caption background and text color', 'total'),
        esc_html__('Advanced slider settings', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('slider', 'total-customizer')
)));

/* ============ABOUT US SECTION============ */
$wp_customize->add_section(new Total_Toggle_Section($wp_customize, 'total_about_section', array(
    'title' => esc_html__('About Us Section', 'total'),
    'panel' => 'total_home_panel',
    'priority' => total_get_section_position('total_about_section'),
    'hiding_control' => 'total_about_page_disable'
)));


//ENABLE/DISABLE ABOUT US PAGE
$wp_customize->add_setting('total_about_page_disable', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Total_Switch_Control($wp_customize, 'total_about_page_disable', array(
    'settings' => 'total_about_page_disable',
    'section' => 'total_about_section',
    'label' => esc_html__('Disable Section', 'total'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'total'),
        'off' => esc_html__('No', 'total')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1
)));

//ABOUT US PAGE
$wp_customize->add_setting('total_about_page', array(
    'sanitize_callback' => 'absint',
));

$wp_customize->add_control('total_about_page', array(
    'settings' => 'total_about_page',
    'section' => 'total_about_section',
    'type' => 'dropdown-pages',
    'label' => esc_html__('Select a Page', 'total'),
));

for ($i = 1; $i < 6; $i++) {
    $wp_customize->add_setting('total_about_progressbar_heading' . $i, array(
        'sanitize_callback' => 'total_sanitize_text'
    ));

    $wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_about_progressbar_heading' . $i, array(
        'settings' => 'total_about_progressbar_heading' . $i,
        'section' => 'total_about_section',
        'label' => esc_html__('Progress Bar ', 'total') . $i,
    )));

    $wp_customize->add_setting('total_about_progressbar_disable' . $i, array(
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control('total_about_progressbar_disable' . $i, array(
        'settings' => 'total_about_progressbar_disable' . $i,
        'section' => 'total_about_section',
        'label' => esc_html__('Check to Disable', 'total'),
        'type' => 'checkbox'
    ));

    $wp_customize->add_setting('total_about_progressbar_title' . $i, array(
        'sanitize_callback' => 'total_sanitize_text',
        'default' => sprintf(
            /* translators: Progress bar count */
            esc_html__('Progress Bar %d', 'total'), $i
        )));

    $wp_customize->add_control('total_about_progressbar_title' . $i, array(
        'settings' => 'total_about_progressbar_title' . $i,
        'section' => 'total_about_section',
        'type' => 'text',
        'label' => esc_html__('Title', 'total')
    ));

    $wp_customize->add_setting('total_about_progressbar_percentage' . $i, array(
        'sanitize_callback' => 'total_sanitize_integer',
        'default' => rand(60, 100)
    ));

    $wp_customize->add_control(new Total_Range_Slider_Control($wp_customize, 'total_about_progressbar_percentage' . $i, array(
        'settings' => 'total_about_progressbar_percentage' . $i,
        'section' => 'total_about_section',
        'label' => esc_html__('Percentage', 'total'),
        'input_attrs' => array(
            'min' => 1,
            'max' => 100,
            'step' => 1
        )
    )));
}

$wp_customize->add_setting('total_about_image_heading', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_about_image_heading', array(
    'settings' => 'total_about_image_heading',
    'section' => 'total_about_section',
    'label' => esc_html__('Right Image', 'total'),
)));

$wp_customize->add_setting('total_about_image', array(
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'total_about_image', array(
    'section' => 'total_about_section',
    'settings' => 'total_about_image',
    'description' => esc_html__('Recommended Image Size: 500X600px', 'total')
)));

$wp_customize->add_setting('total_about_widget', array(
    'default' => 'none',
    'sanitize_callback' => 'total_sanitize_choices'
));

$wp_customize->add_control('total_about_widget', array(
    'settings' => 'total_about_widget',
    'section' => 'total_about_section',
    'type' => 'select',
    'label' => esc_html__('Replace Image by widget', 'total'),
    'choices' => total_widget_list()
));


$wp_customize->add_setting('total_about_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_about_upgrade_text', array(
    'section' => 'total_about_section',
    'label' => esc_html__('Add a video, gradient or motion background to this section', 'total'),
    'choices' => array(
        esc_html__('Option to disable the Right Image', 'total'),
        esc_html__('Multiple background option(image, gradient, video) for the section', 'total')
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('about', 'total-customizer')
)));

/* ============FEATURED SECTION PANEL============ */
$wp_customize->add_section(new Total_Toggle_Section($wp_customize, 'total_featured_section', array(
    'title' => esc_html__('Featured Section', 'total'),
    'panel' => 'total_home_panel',
    'priority' => total_get_section_position('total_featured_section'),
    'hiding_control' => 'total_featured_section_disable'
)));

//ENABLE/DISABLE FEATURED SECTION
$wp_customize->add_setting('total_featured_section_disable', array(
    'sanitize_callback' => 'total_sanitize_text',
));

$wp_customize->add_control(new Total_Switch_Control($wp_customize, 'total_featured_section_disable', array(
    'settings' => 'total_featured_section_disable',
    'section' => 'total_featured_section',
    'label' => esc_html__('Disable Section', 'total'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'total'),
        'off' => esc_html__('No', 'total')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('total_featured_title_sub_title_heading', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_featured_title_sub_title_heading', array(
    'settings' => 'total_featured_title_sub_title_heading',
    'section' => 'total_featured_section',
    'label' => esc_html__('Section Title & Sub Title', 'total'),
)));

$wp_customize->add_setting('total_featured_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Featured Section', 'total')
));

$wp_customize->add_control('total_featured_title', array(
    'settings' => 'total_featured_title',
    'section' => 'total_featured_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'total')
));

$wp_customize->add_setting('total_featured_sub_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Featured Section SubTitle', 'total')
));

$wp_customize->add_control('total_featured_sub_title', array(
    'settings' => 'total_featured_sub_title',
    'section' => 'total_featured_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'total'),
));

//FEATURED PAGES
for ($i = 1; $i < 4; $i++) {
    $wp_customize->add_setting('total_featured_header' . $i, array(
        'sanitize_callback' => 'total_sanitize_text'
    ));

    $wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_featured_header' . $i, array(
        'settings' => 'total_featured_header' . $i,
        'section' => 'total_featured_section',
        'label' => esc_html__('Featured Page ', 'total') . $i
    )));

    $wp_customize->add_setting('total_featured_page' . $i, array(
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control('total_featured_page' . $i, array(
        'settings' => 'total_featured_page' . $i,
        'section' => 'total_featured_section',
        'type' => 'dropdown-pages',
        'label' => esc_html__('Select a Page', 'total')
    ));

    $wp_customize->add_setting('total_featured_page_icon' . $i, array(
        'default' => 'far fa-bell',
        'sanitize_callback' => 'total_sanitize_text'
    ));

    $wp_customize->add_control(new Total_Icon_Selector_Control($wp_customize, 'total_featured_page_icon' . $i, array(
        'settings' => 'total_featured_page_icon' . $i,
        'section' => 'total_featured_section',
    )));
}

$wp_customize->add_setting('total_featured_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_featured_upgrade_text', array(
    'section' => 'total_featured_section',
    'label' => total_section_upgrade_label('total_featured_page', 3, esc_html__('You have used all 3 featured blocks. Pro makes them unlimited and adds 7 layouts', 'total'), esc_html__('Free shows 3 featured blocks. Pro removes the limit and adds 7 layouts', 'total')),
    'choices' => array(
        esc_html__('Unlimited featured block', 'total'),
        esc_html__('Display featured block with repeater instead of page with option of external url field', 'total'),
        esc_html__('7 featured block layouts', 'total'),
        esc_html__('5000+ icon to choose from(5 icon packs)', 'total'),
        esc_html__('Configure no of column to display in a row', 'total'),
        esc_html__('Multiple background option(image, gradient, video) for the section', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('featured', 'total-customizer')
)));

/* ============PORTFOLIO SECTION PANEL============ */
$wp_customize->add_section(new Total_Toggle_Section($wp_customize, 'total_portfolio_section', array(
    'title' => esc_html__('Portfolio Section', 'total'),
    'panel' => 'total_home_panel',
    'priority' => total_get_section_position('total_portfolio_section'),
    'hiding_control' => 'total_portfolio_section_disable'
)));

//ENABLE/DISABLE PORTFOLIO
$wp_customize->add_setting('total_portfolio_section_disable', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Total_Switch_Control($wp_customize, 'total_portfolio_section_disable', array(
    'settings' => 'total_portfolio_section_disable',
    'section' => 'total_portfolio_section',
    'label' => esc_html__('Disable Section', 'total'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'total'),
        'off' => esc_html__('No', 'total')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('total_portfolio_title_sec_heading', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_portfolio_title_sec_heading', array(
    'settings' => 'total_portfolio_title_sec_heading',
    'section' => 'total_portfolio_section',
    'label' => esc_html__('Section Title & Sub Title', 'total'),
)));

$wp_customize->add_setting('total_portfolio_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Portfolio Section', 'total')
));

$wp_customize->add_control('total_portfolio_title', array(
    'settings' => 'total_portfolio_title',
    'section' => 'total_portfolio_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'total')
));

$wp_customize->add_setting('total_portfolio_sub_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Portfolio Section SubTitle', 'total')
));

$wp_customize->add_control('total_portfolio_sub_title', array(
    'settings' => 'total_portfolio_sub_title',
    'section' => 'total_portfolio_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'total')
));

//PORTFOLIO CHOICES
$wp_customize->add_setting('total_portfolio_cat_heading', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_portfolio_cat_heading', array(
    'settings' => 'total_portfolio_cat_heading',
    'section' => 'total_portfolio_section',
    'label' => esc_html__('Portfolio Category', 'total'),
)));

$wp_customize->add_setting('total_portfolio_cat', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Multiple_Checkbox_Control($wp_customize, 'total_portfolio_cat', array(
    'label' => esc_html__('Select Category', 'total'),
    'section' => 'total_portfolio_section',
    'settings' => 'total_portfolio_cat',
    'choices' => total_cat()
)));

$wp_customize->add_setting('total_portfolio_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_portfolio_upgrade_text', array(
    'section' => 'total_portfolio_section',
    'label' => esc_html__('Add 6 masonry styles, filter tabs and external project links', 'total'),
    'choices' => array(
        esc_html__('Link portfolio to external url', 'total'),
        esc_html__('Option to select active category in the tab', 'total'),
        esc_html__('4 portfolio tab styles', 'total'),
        esc_html__('6 portfolio masonry styles', 'total'),
        esc_html__('Order portfolio by date, title or random in ascending or descending order', 'total'),
        esc_html__('Option to show/hide zoom and link button', 'total'),
        esc_html__('Enable/Disable gap between portfolio images', 'total'),
        esc_html__('Multiple background option(image, gradient, video) for the section', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('portfolio', 'total-customizer')
)));

/* The 6 Pro portfolio layouts, shown rather than described. */
$wp_customize->add_setting('total_portfolio_preview', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Pro_Preview_Control($wp_customize, 'total_portfolio_preview', array(
    'section' => 'total_portfolio_section',
    'priority' => 101,
    'label' => esc_html__('6 portfolio layouts in Total Pro', 'total'),
    'columns' => 3,
    'images' => array(
        'portfolio-style1.png',
        'portfolio-style2.png',
        'portfolio-style3.png',
        'portfolio-style4.png',
        'portfolio-style5.png',
        'portfolio-style6.png'
    ),
    'upgrade_text' => esc_html__('Unlock these layouts', 'total'),
    'upgrade_url' => total_upgrade_url('preview-portfolio', 'total-customizer'),
    'active_callback' => 'total_is_upgrade_notice_active'
)));


/* ============SERVICE SECTION PANEL============ */
$wp_customize->add_section(new Total_Toggle_Section($wp_customize, 'total_service_section', array(
    'title' => esc_html__('Service Section', 'total'),
    'panel' => 'total_home_panel',
    'priority' => total_get_section_position('total_service_section'),
    'hiding_control' => 'total_service_section_disable'
)));

//ENABLE/DISABLE SERVICE SECTION
$wp_customize->add_setting('total_service_section_disable', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Total_Switch_Control($wp_customize, 'total_service_section_disable', array(
    'settings' => 'total_service_section_disable',
    'section' => 'total_service_section',
    'label' => esc_html__('Disable Section', 'total'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'total'),
        'off' => esc_html__('No', 'total')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('total_service_section_heading', array(
    'sanitize_callback' => 'total_sanitize_text',
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_service_section_heading', array(
    'settings' => 'total_service_section_heading',
    'section' => 'total_service_section',
    'label' => esc_html__('Section Title & Sub Title', 'total'),
)));

$wp_customize->add_setting('total_service_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Service Section', 'total')
));

$wp_customize->add_control('total_service_title', array(
    'settings' => 'total_service_title',
    'section' => 'total_service_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'total')
));

$wp_customize->add_setting('total_service_sub_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Service Section', 'total')
));

$wp_customize->add_control('total_service_sub_title', array(
    'settings' => 'total_service_sub_title',
    'section' => 'total_service_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'total')
));

//SERVICE PAGES
for ($i = 1; $i < 7; $i++) {
    $wp_customize->add_setting('total_service_header' . $i, array(
        'default' => '',
        'sanitize_callback' => 'total_sanitize_text'
    ));

    $wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_service_header' . $i, array(
        'settings' => 'total_service_header' . $i,
        'section' => 'total_service_section',
        'label' => esc_html__('Service Page ', 'total') . $i
    )));

    $wp_customize->add_setting('total_service_page' . $i, array(
        'default' => '',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control('total_service_page' . $i, array(
        'settings' => 'total_service_page' . $i,
        'section' => 'total_service_section',
        'type' => 'dropdown-pages',
        'label' => esc_html__('Select a Page', 'total')
    ));

    $wp_customize->add_setting('total_service_page_icon' . $i, array(
        'default' => 'far fa-bell',
        'sanitize_callback' => 'total_sanitize_text'
    ));

    $wp_customize->add_control(new Total_Icon_Selector_Control($wp_customize, 'total_service_page_icon' . $i, array(
        'settings' => 'total_service_page_icon' . $i,
        'section' => 'total_service_section',
    )));
}
$wp_customize->add_setting('total_service_left_bg_heading', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_service_left_bg_heading', array(
    'settings' => 'total_service_left_bg_heading',
    'section' => 'total_service_section',
    'label' => esc_html__('Left Image', 'total'),
)));

$wp_customize->add_setting('total_service_left_bg', array(
    'sanitize_callback' => 'esc_url_raw',
    'default' => get_template_directory_uri() . '/images/banner.jpg'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'total_service_left_bg', array(
    'section' => 'total_service_section',
    'settings' => 'total_service_left_bg',
    'description' => esc_html__('Recommended Image Size: 770X650px', 'total')
)));

$wp_customize->add_setting('total_service_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_service_upgrade_text', array(
    'section' => 'total_service_section',
    'label' => total_section_upgrade_label('total_service_page', 6, esc_html__('You have used all 6 service blocks. Pro makes them unlimited and adds 4 layouts', 'total'), esc_html__('Free shows 6 service blocks. Pro removes the limit and adds 4 layouts', 'total')),
    'choices' => array(
        esc_html__('Unlimited service block', 'total'),
        esc_html__('Display service block with repeater instead of page with option of external url field', 'total'),
        esc_html__('4 service block layouts', 'total'),
        esc_html__('5000+ icon to choose from(5 icon packs)', 'total'),
        esc_html__('Display image postion in left or right', 'total'),
        esc_html__('Multiple background option(image, gradient, video) for the section', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('service', 'total-customizer')
)));

/* The 4 Pro service layouts, shown rather than described. */
$wp_customize->add_setting('total_service_preview', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Pro_Preview_Control($wp_customize, 'total_service_preview', array(
    'section' => 'total_service_section',
    'priority' => 101,
    'label' => esc_html__('4 service layouts in Total Pro', 'total'),
    'columns' => 3,
    'images' => array(
        'service-style1.png',
        'service-style2.png',
        'service-style3.png',
        'service-style4.png'
    ),
    'upgrade_text' => esc_html__('Unlock these layouts', 'total'),
    'upgrade_url' => total_upgrade_url('preview-service', 'total-customizer'),
    'active_callback' => 'total_is_upgrade_notice_active'
)));


/* ============TEAM SECTION PANEL============ */
$wp_customize->add_section(new Total_Toggle_Section($wp_customize, 'total_team_section', array(
    'title' => esc_html__('Team Section', 'total'),
    'panel' => 'total_home_panel',
    'priority' => total_get_section_position('total_team_section'),
    'hiding_control' => 'total_team_section_disable'
)));

//ENABLE/DISABLE TEAM SECTION
$wp_customize->add_setting('total_team_section_disable', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Total_Switch_Control($wp_customize, 'total_team_section_disable', array(
    'settings' => 'total_team_section_disable',
    'section' => 'total_team_section',
    'label' => esc_html__('Disable Section', 'total'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'total'),
        'off' => esc_html__('No', 'total')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('total_team_title_subtitle_heading', array(
    'sanitize_callback' => 'total_sanitize_text',
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_team_title_subtitle_heading', array(
    'settings' => 'total_team_title_subtitle_heading',
    'section' => 'total_team_section',
    'label' => esc_html__('Section Title & Sub Title', 'total'),
)));

$wp_customize->add_setting('total_team_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Team Section', 'total')
));

$wp_customize->add_control('total_team_title', array(
    'settings' => 'total_team_title',
    'section' => 'total_team_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'total')
));

$wp_customize->add_setting('total_team_sub_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Team Section SubTitle', 'total')
));

$wp_customize->add_control('total_team_sub_title', array(
    'settings' => 'total_team_sub_title',
    'section' => 'total_team_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'total')
));

//TEAM PAGES
for ($i = 1; $i < 5; $i++) {
    $wp_customize->add_setting('total_team_heading' . $i, array(
        'sanitize_callback' => 'total_sanitize_text'
    ));

    $wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_team_heading' . $i, array(
        'settings' => 'total_team_heading' . $i,
        'section' => 'total_team_section',
        'label' => esc_html__('Team Member ', 'total') . $i,
    )));

    $wp_customize->add_setting('total_team_page' . $i, array(
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control('total_team_page' . $i, array(
        'settings' => 'total_team_page' . $i,
        'section' => 'total_team_section',
        'type' => 'dropdown-pages',
        'label' => esc_html__('Select a Page', 'total')
    ));

    $wp_customize->add_setting('total_team_designation' . $i, array(
        'sanitize_callback' => 'total_sanitize_text'
    ));

    $wp_customize->add_control('total_team_designation' . $i, array(
        'settings' => 'total_team_designation' . $i,
        'section' => 'total_team_section',
        'type' => 'text',
        'label' => esc_html__('Team Member Designation', 'total')
    ));

    $wp_customize->add_setting('total_team_facebook' . $i, array(
        'default' => 'https://facebook.com',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('total_team_facebook' . $i, array(
        'settings' => 'total_team_facebook' . $i,
        'section' => 'total_team_section',
        'type' => 'url',
        'label' => esc_html__('Facebook Url', 'total')
    ));

    $wp_customize->add_setting('total_team_twitter' . $i, array(
        'default' => 'https://twitter.com',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('total_team_twitter' . $i, array(
        'settings' => 'total_team_twitter' . $i,
        'section' => 'total_team_section',
        'type' => 'url',
        'label' => esc_html__('Twitter Url', 'total')
    ));

    $wp_customize->add_setting('total_team_instagram' . $i, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('total_team_instagram' . $i, array(
        'settings' => 'total_team_instagram' . $i,
        'section' => 'total_team_section',
        'type' => 'url',
        'label' => esc_html__('Instagram Url', 'total')
    ));

    $wp_customize->add_setting('total_team_linkedin' . $i, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('total_team_linkedin' . $i, array(
        'settings' => 'total_team_linkedin' . $i,
        'section' => 'total_team_section',
        'type' => 'url',
        'label' => esc_html__('Linkedin Url', 'total')
    ));
}

$wp_customize->add_setting('total_team_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_team_upgrade_text', array(
    'section' => 'total_team_section',
    'label' => total_section_upgrade_label('total_team_page', 4, esc_html__('You have used all 4 team members. Pro makes them unlimited and adds 6 layouts', 'total'), esc_html__('Free shows 4 team members. Pro removes the limit and adds 6 layouts', 'total')),
    'choices' => array(
        esc_html__('Unlimited team block', 'total'),
        esc_html__('Display team block with repeater instead of page with option of external url field', 'total'),
        esc_html__('6 team block layouts', 'total'),
        esc_html__('Configure no of column to display in a row', 'total'),
        esc_html__('Display team in grid or carousel slider', 'total'),
        esc_html__('Multiple background option(image, gradient, video) for the section', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('team', 'total-customizer')
)));

/* The 6 Pro team layouts, shown rather than described. */
$wp_customize->add_setting('total_team_preview', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Pro_Preview_Control($wp_customize, 'total_team_preview', array(
    'section' => 'total_team_section',
    'priority' => 101,
    'label' => esc_html__('6 team layouts in Total Pro', 'total'),
    'columns' => 3,
    'images' => array(
        'team-style1.png',
        'team-style2.png',
        'team-style3.png',
        'team-style4.png',
        'team-style5.png',
        'team-style6.png'
    ),
    'upgrade_text' => esc_html__('Unlock these layouts', 'total'),
    'upgrade_url' => total_upgrade_url('preview-team', 'total-customizer'),
    'active_callback' => 'total_is_upgrade_notice_active'
)));


/* ============COUNTER SECTION PANEL============ */
$wp_customize->add_section(new Total_Toggle_Section($wp_customize, 'total_counter_section', array(
    'title' => esc_html__('Counter Section', 'total'),
    'panel' => 'total_home_panel',
    'priority' => total_get_section_position('total_counter_section'),
    'hiding_control' => 'total_counter_section_disable'
)));

$wp_customize->add_setting('total_counter_title_subtitle_heading', array(
    'sanitize_callback' => 'total_sanitize_text'
));

//ENABLE/DISABLE COUNTER SECTION
$wp_customize->add_setting('total_counter_section_disable', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Total_Switch_Control($wp_customize, 'total_counter_section_disable', array(
    'settings' => 'total_counter_section_disable',
    'section' => 'total_counter_section',
    'label' => esc_html__('Disable Section', 'total'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'total'),
        'off' => esc_html__('No', 'total')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1
)));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_counter_title_subtitle_heading', array(
    'settings' => 'total_counter_title_subtitle_heading',
    'section' => 'total_counter_section',
    'label' => esc_html__('Section Title & Sub Title', 'total'),
)));

$wp_customize->add_setting('total_counter_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Counter Section', 'total')
));

$wp_customize->add_control('total_counter_title', array(
    'settings' => 'total_counter_title',
    'section' => 'total_counter_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'total')
));

$wp_customize->add_setting('total_counter_sub_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Counter Section SubTitle', 'total')
));

$wp_customize->add_control('total_counter_sub_title', array(
    'settings' => 'total_counter_sub_title',
    'section' => 'total_counter_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'total')
));

$wp_customize->add_setting('total_counter_bg_heading', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_counter_bg_heading', array(
    'settings' => 'total_counter_bg_heading',
    'section' => 'total_counter_section',
    'label' => esc_html__('Section Background', 'total'),
)));

$wp_customize->add_setting('total_counter_bg', array(
    'sanitize_callback' => 'esc_url_raw',
    'default' => get_template_directory_uri() . '/images/banner.jpg'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'total_counter_bg', array(
    'label' => esc_html__('Upload Image', 'total'),
    'section' => 'total_counter_section',
    'settings' => 'total_counter_bg',
    'description' => esc_html__('Recommended Image Size: 1800X400px', 'total')
)));

//COUNTERS
for ($i = 1; $i < 5; $i++) {

    $wp_customize->add_setting('total_counter_heading' . $i, array(
        'sanitize_callback' => 'total_sanitize_text'
    ));

    $wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_counter_heading' . $i, array(
        'settings' => 'total_counter_heading' . $i,
        'section' => 'total_counter_section',
        'label' => esc_html__('Counter', 'total') . $i,
    )));

    $wp_customize->add_setting('total_counter_title' . $i, array(
        'sanitize_callback' => 'total_sanitize_text'
    ));

    $wp_customize->add_control('total_counter_title' . $i, array(
        'settings' => 'total_counter_title' . $i,
        'section' => 'total_counter_section',
        'type' => 'text',
        'label' => esc_html__('Title', 'total')
    ));

    $wp_customize->add_setting('total_counter_count' . $i, array(
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control('total_counter_count' . $i, array(
        'settings' => 'total_counter_count' . $i,
        'section' => 'total_counter_section',
        'type' => 'number',
        'label' => esc_html__('Counter Value', 'total')
    ));

    $wp_customize->add_setting('total_counter_icon' . $i, array(
        'default' => 'far fa-bell',
        'sanitize_callback' => 'total_sanitize_text'
    ));

    $wp_customize->add_control(new Total_Icon_Selector_Control($wp_customize, 'total_counter_icon' . $i, array(
        'settings' => 'total_counter_icon' . $i,
        'section' => 'total_counter_section',
    )));
}

$wp_customize->add_setting('total_counter_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_counter_upgrade_text', array(
    'section' => 'total_counter_section',
    'label' => total_section_upgrade_label('total_counter_title', 4, esc_html__('You have used all 4 counters. Pro makes them unlimited and adds 4 layouts', 'total'), esc_html__('Free shows 4 counters. Pro removes the limit and adds 4 layouts', 'total')),
    'choices' => array(
        esc_html__('Unlimited counter block', 'total'),
        esc_html__('4 counter block layouts', 'total'),
        esc_html__('5000+ icon to choose from(5 icon packs)', 'total'),
        esc_html__('Multiple background option(image, gradient, video) for the section', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('counter', 'total-customizer')
)));

/* ============TESTIMONIAL PANEL============ */
$wp_customize->add_section(new Total_Toggle_Section($wp_customize, 'total_testimonial_section', array(
    'title' => esc_html__('Testimonial Section', 'total'),
    'panel' => 'total_home_panel',
    'priority' => total_get_section_position('total_testimonial_section'),
    'hiding_control' => 'total_testimonial_section_disable'
)));

//ENABLE/DISABLE TESTIMONIAL SECTION
$wp_customize->add_setting('total_testimonial_section_disable', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Total_Switch_Control($wp_customize, 'total_testimonial_section_disable', array(
    'settings' => 'total_testimonial_section_disable',
    'section' => 'total_testimonial_section',
    'label' => esc_html__('Disable Section', 'total'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'total'),
        'off' => esc_html__('No', 'total')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('total_testimonial_title_subtitle_heading', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_testimonial_title_subtitle_heading', array(
    'settings' => 'total_testimonial_title_subtitle_heading',
    'section' => 'total_testimonial_section',
    'label' => esc_html__('Section Title & Sub Title', 'total'),
)));

$wp_customize->add_setting('total_testimonial_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Testimonial Section', 'total')
));

$wp_customize->add_control('total_testimonial_title', array(
    'settings' => 'total_testimonial_title',
    'section' => 'total_testimonial_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'total')
));

$wp_customize->add_setting('total_testimonial_sub_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Testimonial Section SubTitle', 'total')
));

$wp_customize->add_control('total_testimonial_sub_title', array(
    'settings' => 'total_testimonial_sub_title',
    'section' => 'total_testimonial_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'total')
));

//TESTIMONIAL PAGES
$wp_customize->add_setting('total_testimonial_header', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_testimonial_header', array(
    'settings' => 'total_testimonial_header',
    'section' => 'total_testimonial_section',
    'label' => esc_html__('Testimonial', 'total')
)));

$wp_customize->add_setting('total_testimonial_page', array(
    'sanitize_callback' => 'total_sanitize_choices_array'
));

$wp_customize->add_control(new Total_Multiple_Selectize_Control($wp_customize, 'total_testimonial_page', array(
    'settings' => 'total_testimonial_page',
    'section' => 'total_testimonial_section',
    'choices' => total_page_choice(),
    'label' => esc_html__('Select the Pages', 'total'),
    'description' => esc_html__('Drag & Drop to reorder', 'total'),
    'placeholder' => esc_html__('Select Some Pages', 'total')
)));

$wp_customize->add_setting('total_testimonial_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_testimonial_upgrade_text', array(
    'section' => 'total_testimonial_section',
    'label' => esc_html__('Add 4 testimonial layouts and write testimonials inline instead of as pages', 'total'),
    'choices' => array(
        esc_html__('Display testimonial block with repeater instead of page with option of external url field', 'total'),
        esc_html__('4 testimonial block layouts', 'total'),
        esc_html__('Multiple background option(image, gradient, video) for the section', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('testimonial', 'total-customizer')
)));

/* The 4 Pro testimonial layouts, shown rather than described. */
$wp_customize->add_setting('total_testimonial_preview', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Pro_Preview_Control($wp_customize, 'total_testimonial_preview', array(
    'section' => 'total_testimonial_section',
    'priority' => 101,
    'label' => esc_html__('4 testimonial layouts in Total Pro', 'total'),
    'columns' => 3,
    'images' => array(
        'testimonial-style1.png',
        'testimonial-style2.png',
        'testimonial-style3.png',
        'testimonial-style4.png'
    ),
    'upgrade_text' => esc_html__('Unlock these layouts', 'total'),
    'upgrade_url' => total_upgrade_url('preview-testimonial', 'total-customizer'),
    'active_callback' => 'total_is_upgrade_notice_active'
)));


/* ============BLOG PANEL============ */
$wp_customize->add_section(new Total_Toggle_Section($wp_customize, 'total_blog_section', array(
    'title' => esc_html__('Blog Section', 'total'),
    'panel' => 'total_home_panel',
    'priority' => total_get_section_position('total_blog_section'),
    'hiding_control' => 'total_blog_section_disable'
)));

//ENABLE/DISABLE BLOG SECTION
$wp_customize->add_setting('total_blog_section_disable', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Total_Switch_Control($wp_customize, 'total_blog_section_disable', array(
    'settings' => 'total_blog_section_disable',
    'section' => 'total_blog_section',
    'label' => esc_html__('Disable Section', 'total'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'total'),
        'off' => esc_html__('No', 'total')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('total_blog_title_subtitle_heading', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_blog_title_subtitle_heading', array(
    'settings' => 'total_blog_title_subtitle_heading',
    'section' => 'total_blog_section',
    'label' => esc_html__('Section Title & Sub Title', 'total'),
)));

$wp_customize->add_setting('total_blog_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Blog Section', 'total')
));

$wp_customize->add_control('total_blog_title', array(
    'settings' => 'total_blog_title',
    'section' => 'total_blog_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'total')
));

$wp_customize->add_setting('total_blog_sub_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Blog Section SubTitle', 'total')
));

$wp_customize->add_control('total_blog_sub_title', array(
    'settings' => 'total_blog_sub_title',
    'section' => 'total_blog_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'total')
));

//BLOG SETTINGS
$wp_customize->add_setting('total_blog_post_count', array(
    'default' => '3',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control(new Total_Chosen_Select_Control($wp_customize, 'total_blog_post_count', array(
    'settings' => 'total_blog_post_count',
    'section' => 'total_blog_section',
    'label' => esc_html__('Number of Posts to show', 'total'),
    'choices' => total_post_count_choice()
)));

$wp_customize->add_setting('total_blog_cat_exclude', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Multiple_Checkbox_Control($wp_customize, 'total_blog_cat_exclude', array(
    'label' => esc_html__('Exclude Category from Blog Posts', 'total'),
    'section' => 'total_blog_section',
    'settings' => 'total_blog_cat_exclude',
    'choices' => total_cat()
)));

$wp_customize->add_setting('total_blog_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_blog_upgrade_text', array(
    'section' => 'total_blog_section',
    'label' => esc_html__('Add 4 blog layouts and choose how many posts sit in a row', 'total'),
    'choices' => array(
        esc_html__('4 blog layouts', 'total'),
        esc_html__('Configure no of column to display in a row', 'total'),
        esc_html__('Control excerpt character', 'total'),
        esc_html__('Show/Hide date, author and comment', 'total'),
        esc_html__('Multiple background option(image, gradient, video) for the section', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('blog', 'total-customizer')
)));

/* ============CLIENTS LOGO SECTION============ */
$wp_customize->add_section(new Total_Toggle_Section($wp_customize, 'total_logo_section', array(
    'title' => esc_html__('Clients Logo Section', 'total'),
    'panel' => 'total_home_panel',
    'priority' => total_get_section_position('total_logo_section'),
    'hiding_control' => 'total_logo_section_disable'
)));

//ENABLE/DISABLE LOGO SECTION
$wp_customize->add_setting('total_logo_section_disable', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Total_Switch_Control($wp_customize, 'total_logo_section_disable', array(
    'settings' => 'total_logo_section_disable',
    'section' => 'total_logo_section',
    'label' => esc_html__('Disable Section', 'total'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'total'),
        'off' => esc_html__('No', 'total')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('total_logo_title_subtitle_heading', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_logo_title_subtitle_heading', array(
    'settings' => 'total_logo_title_subtitle_heading',
    'section' => 'total_logo_section',
    'label' => esc_html__('Section Title & Sub Title', 'total'),
)));

$wp_customize->add_setting('total_logo_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Client Logo Section', 'total')
));

$wp_customize->add_control('total_logo_title', array(
    'settings' => 'total_logo_title',
    'section' => 'total_logo_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'total')
));

$wp_customize->add_setting('total_logo_sub_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Clients Logo Section SubTitle', 'total')
));

$wp_customize->add_control('total_logo_sub_title', array(
    'settings' => 'total_logo_sub_title',
    'section' => 'total_logo_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'total')
));

//CLIENTS LOGOS
$wp_customize->add_setting('total_logo_image', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Gallery_Control($wp_customize, 'total_logo_image', array(
    'settings' => 'total_logo_image',
    'section' => 'total_logo_section',
    'label' => esc_html__('Upload Clients Logos', 'total'),
    'description' => esc_html__('Drag and Drop to reorder', 'total'),
)));

$wp_customize->add_setting('total_logo_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_logo_upgrade_text', array(
    'section' => 'total_logo_section',
    'label' => esc_html__('Add 4 logo layouts and link each client logo out', 'total'),
    'choices' => array(
        esc_html__('Option to link the client logos to external url', 'total'),
        esc_html__('4 client logo layouts', 'total'),
        esc_html__('Multiple background option(image, gradient, video) for the section', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('logo', 'total-customizer')
)));

/* ============CALL TO ACTION PANEL============ */
$wp_customize->add_section(new Total_Toggle_Section($wp_customize, 'total_cta_section', array(
    'title' => esc_html__('Call To Action Section', 'total'),
    'panel' => 'total_home_panel',
    'priority' => total_get_section_position('total_cta_section'),
    'hiding_control' => 'total_cta_section_disable'
)));

//ENABLE/DISABLE LOGO SECTION
$wp_customize->add_setting('total_cta_section_disable', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Total_Switch_Control($wp_customize, 'total_cta_section_disable', array(
    'settings' => 'total_cta_section_disable',
    'section' => 'total_cta_section',
    'label' => esc_html__('Disable Section', 'total'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'total'),
        'off' => esc_html__('No', 'total')
    ),
    'class' => 'ht--switch-section',
    'priority' => -1
)));

$wp_customize->add_setting('total_cta_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Call To Action Section', 'total')
));

$wp_customize->add_control('total_cta_title', array(
    'settings' => 'total_cta_title',
    'section' => 'total_cta_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'total')
));

$wp_customize->add_setting('total_cta_sub_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => esc_html__('Call To Action Section SubTitle', 'total')
));

$wp_customize->add_control('total_cta_sub_title', array(
    'settings' => 'total_cta_sub_title',
    'section' => 'total_cta_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'total')
));

$wp_customize->add_setting('total_cta_button1_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control('total_cta_button1_text', array(
    'settings' => 'total_cta_button1_text',
    'section' => 'total_cta_section',
    'type' => 'text',
    'label' => esc_html__('Button 1 Text', 'total')
));

$wp_customize->add_setting('total_cta_button1_link', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('total_cta_button1_link', array(
    'settings' => 'total_cta_button1_link',
    'section' => 'total_cta_section',
    'type' => 'url',
    'label' => esc_html__('Button 1 Link', 'total')
));

$wp_customize->add_setting('total_cta_button2_text', array(
    'default' => '',
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control('total_cta_button2_text', array(
    'settings' => 'total_cta_button2_text',
    'section' => 'total_cta_section',
    'type' => 'text',
    'label' => esc_html__('Button 2 Text', 'total')
));

$wp_customize->add_setting('total_cta_button2_link', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('total_cta_button2_link', array(
    'settings' => 'total_cta_button2_link',
    'section' => 'total_cta_section',
    'type' => 'url',
    'label' => esc_html__('Button 2 Link', 'total')
));

$wp_customize->add_setting('total_cta_bg', array(
    'sanitize_callback' => 'esc_url_raw',
    'default' => get_template_directory_uri() . '/images/banner.jpg'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'total_cta_bg', array(
    'label' => esc_html__('Background Image', 'total'),
    'section' => 'total_cta_section',
    'settings' => 'total_cta_bg',
    'description' => esc_html__('Recommended Image Size: 1800X800px', 'total')
)));

$wp_customize->add_setting('total_cta_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_cta_upgrade_text', array(
    'section' => 'total_cta_section',
    'label' => esc_html__('Add 4 call to action layouts and a video popup', 'total'),
    'choices' => array(
        esc_html__('4 CTA layouts', 'total'),
        esc_html__('Option to display video in CTA with popup', 'total'),
        esc_html__('Multiple background option(image, gradient, video) for the section', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('cta', 'total-customizer')
)));

$wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-upgrade-section', array(
    'title' => esc_html__('What Pro Adds to Every Section', 'total'),
    'panel' => 'total_home_panel',
    'priority' => 1000,
    'class' => 'ht--boxed',
    // The Pro-only sections now have a row each, so this box carries only what
    // those rows cannot say - what Pro adds to every section, free or not.
    'options' => array(
        esc_html__('- Every section above gains more layouts and customization options', 'total'),
        esc_html__('- Video, image motion, parallax and gradient backgrounds per section', 'total'),
        esc_html__('- Contact section includes a Google Map', 'total'),
        esc_html__('- Custom Sections A and B build anything with Elementor', 'total'),
        esc_html('------------------------'),
        esc_html__('- Elementor Pagebuilder Compatible. All the above sections can be created with Elementor Page Builder or Customizer whichever you like.', 'total'),
    ),
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => total_upgrade_url('banner', 'total-customizer-button'),
)));

/*
 *  Home page sections that exist only in Pro.
 *
 *  Listed individually, in the order Pro registers them, rather than only as
 *  names inside the summary box below - a row per section makes it clear what
 *  each one is and lets each be tracked separately. Priorities start just above
 *  the default so these sit after the free sections without reordering them.
 */

$total_pro_home_sections = array(
    'highlight' => array(esc_html__('Highlight Section', 'total'), 161),
    'pricing' => array(esc_html__('Pricing Section', 'total'), 162),
    'news' => array(esc_html__('News & Update Section', 'total'), 163),
    'tab' => array(esc_html__('Tab Section', 'total'), 164),
    'contact' => array(esc_html__('Contact Section', 'total'), 165),
    'customa' => array(esc_html__('Custom Section A', 'total'), 166),
    'customb' => array(esc_html__('Custom Section B', 'total'), 167),
);

foreach ($total_pro_home_sections as $total_pro_key => $total_pro_section) {
    $wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-' . $total_pro_key . '-upgrade-section', array(
        'title' => $total_pro_section[0],
        'panel' => 'total_home_panel',
        'priority' => $total_pro_section[1],
        'class' => 'ht--single-row ht--pro-row',
        'upgrade_text' => esc_html__('Get Pro', 'total'),
        'upgrade_url' => total_upgrade_url('sec-home-' . $total_pro_key, 'total-customizer'),
        'active_callback' => 'total_is_upgrade_notice_active'
    )));
}
