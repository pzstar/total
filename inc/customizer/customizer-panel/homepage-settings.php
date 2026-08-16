<?php

/* ============PRO FEATURES============ */

$total_pro_features = '<ul>
	<li>' . esc_html__("5 ready made demos that can be imported with one click", "total") . '</li>
    <li>' . esc_html__("Elementor compatible - Built your Home Page with Customizer or Elementor whichever you like", "total") . '</li>
    <li>' . esc_html__("18 Home Page Customizer sections with lots of variations", "total") . '</li>
	<li>' . esc_html__("24 Elementor Elements", "total") . '</li>
    <li>' . esc_html__("25 custom widgets", "total") . '</li>
	<li>' . esc_html__("Video, parallax and gradient background options for each section", "total") . '</li>
	<li>' . esc_html__("5 icon packs for the icon picker (9000+ icons)", "total") . '</li>
	<li>' . esc_html__("Unlimited slider with linkable button", "total") . '</li>
	<li>' . esc_html__("Add unlimited blocks(like slider, team, testimonial) for each Section", "total") . '</li>
	<li>' . esc_html__("Fully customizable options for Home Page blocks", "total") . '</li>
	<li>' . esc_html__("Animated section backgrounds - birds, fog, waves, particles, net and dots", "total") . '</li>
	<li>' . esc_html__("Remove footer credit Text", "total") . '</li>
	<li>' . esc_html__("6 header layouts and advanced header settings", "total") . '</li>
	<li>' . esc_html__("4 blog layouts", "total") . '</li>
	<li>' . esc_html__("In-built MegaMenu", "total") . '</li>
	<li>' . esc_html__("Advanced Typography options", "total") . '</li>
	<li>' . esc_html__("Advanced color options", "total") . '</li>
	<li>' . esc_html__("Top header bar", "total") . '</li>
	<li>' . esc_html__("PreLoader option", "total") . '</li>
	<li>' . esc_html__("Sidebar layout options", "total") . '</li>
	<li>' . esc_html__("Advanced blog settings", "total") . '</li>
	<li>' . esc_html__("Advanced footer setting", "total") . '</li>
	<li>' . esc_html__("Front page sections with full window height", "total") . '</li>
	<li>' . esc_html__("Blog single page - Author Box, Social Share and Related Post", "total") . '</li>
	<li>' . esc_html__("Google map option", "total") . '</li>
	<li>' . esc_html__("Unlimited social links, each with its own icon from the icon picker", "total") . '</li>
	<li>' . esc_html__("GDPR compliance and cookie consent bar", "total") . '</li>
	<li>' . esc_html__("Maintenance mode and coming soon page", "total") . '</li>
	<li>' . esc_html__("WooCommerce Compatible", "total") . '</li>
	<li>' . esc_html__("Fully Multilingual and Translation ready", "total") . '</li>
	<li>' . esc_html__("Fully RTL(Right to left) languages compatible", "total") . '</li>
	</ul>
	<a class="ht-implink button button-primary" href="' . esc_url(admin_url('admin.php?page=total-welcome&section=free_vs_pro')) . '">' . esc_html__("Comparison - Free Vs Pro", "total") . '</a>';

// Seasonal campaigns swap the banner copy automatically - see total_get_active_campaign().
$total_campaign = total_get_active_campaign();
$total_banner_title = $total_campaign ? $total_campaign['title'] : esc_html__('One-time payment. Unlimited sites. Lifetime updates.', 'total');
$total_banner_button = $total_campaign ? $total_campaign['button'] : esc_html__('Get Total Pro - $65', 'total');

$wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-pro-section', array(
    'priority' => 0,
    'title' => $total_banner_title,
    'upgrade_text' => $total_banner_button,
    'upgrade_url' => total_upgrade_url($total_campaign ? 'banner-' . $total_campaign['id'] : 'banner', 'total-customizer-button'),
    'active_callback' => 'total_is_upgrade_notice_active'
)));

$wp_customize->add_section('total_pro_feature_section', array(
    'title' => esc_html__('Pro Theme Features', 'total'),
    'priority' => 0
));

/*
 *  The feature list is registered ahead of the opt-out switch, and the two
 *  carry explicit priorities so the order does not depend on which happens to
 *  be added first. Showing someone the way out before showing them what is on
 *  offer is the wrong way round.
 */

$wp_customize->add_setting('total_pro_features', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Text_Info_Control($wp_customize, 'total_pro_features', array(
    'settings' => 'total_pro_features',
    'section' => 'total_pro_feature_section',
    'priority' => 10,
    'description' => $total_pro_features,
    'active_callback' => 'total_is_upgrade_notice_active'
)));

$wp_customize->add_setting('total_hide_upgrade_notice', array(
    'sanitize_callback' => 'total_sanitize_checkbox',
    'default' => false,
));

$wp_customize->add_control(new Total_Toggle_Control($wp_customize, 'total_hide_upgrade_notice', array(
    'section' => 'total_pro_feature_section',
    'priority' => 20,
    'label' => esc_html__('Hide all Upgrade Notices from Customizer', 'total'),
    'description' => esc_html__('If you don\'t want to upgrade to premium version then you can turn off all the upgrade notices. However you can turn it on anytime if you make mind to upgrade to premium version.', 'total')
)));

$wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-doc-section', array(
    'title' => esc_html__('Documentation', 'total'),
    'priority' => 1000,
    'class' => 'ht--single-row',
    'upgrade_text' => esc_html__('View', 'total'),
    'upgrade_url' => 'https://hashthemes.com/documentation/total-documentation/'
)));

$wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-demo-import-section', array(
    'title' => esc_html__('Import Demo Content', 'total'),
    'priority' => 999,
    'class' => 'ht--single-row',
    'upgrade_text' => esc_html__('Import', 'total'),
    'upgrade_url' => admin_url('admin.php?page=total-welcome')
)));

/*
 *  Pro panels that have no free counterpart at all.
 *
 *  These sit at the position their Pro equivalent occupies, so someone looking
 *  for the setting finds the prompt where they expected the control — rather
 *  than only meeting it in a feature list they have to go and read.
 */

$wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-sidebar-upgrade-section', array(
    'title' => esc_html__('Sidebar Settings', 'total'),
    'priority' => 46,
    'class' => 'ht--single-row ht--pro-row',
    'upgrade_text' => esc_html__('Get Pro', 'total'),
    'upgrade_url' => total_upgrade_url('sec-sidebar', 'total-customizer'),
    'active_callback' => 'total_is_upgrade_notice_active'
)));

$wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-social-upgrade-section', array(
    'title' => esc_html__('Social Links', 'total'),
    'priority' => 47,
    'class' => 'ht--single-row ht--pro-row',
    'upgrade_text' => esc_html__('Get Pro', 'total'),
    'upgrade_url' => total_upgrade_url('sec-social', 'total-customizer'),
    'active_callback' => 'total_is_upgrade_notice_active'
)));

$wp_customize->add_section(new Total_Upgrade_Section($wp_customize, 'total-site-tools-upgrade-section', array(
    'title' => esc_html__('GDPR & Maintenance', 'total'),
    'priority' => 65,
    'class' => 'ht--single-row ht--pro-row',
    'upgrade_text' => esc_html__('Get Pro', 'total'),
    'upgrade_url' => total_upgrade_url('sec-gdpr-maintenance', 'total-customizer'),
    'active_callback' => 'total_is_upgrade_notice_active'
)));

/* ============HOMEPAGE SETTINGS PANEL============ */
$wp_customize->get_section('static_front_page')->priority = 1;

$wp_customize->add_setting('total_enable_frontpage', array(
    'sanitize_callback' => 'total_sanitize_checkbox'
));

$wp_customize->add_control(new Total_Toggle_Control($wp_customize, 'total_enable_frontpage', array(
    'section' => 'static_front_page',
    'label' => esc_html__('Enable Home Sections', 'total'),
    'description' => sprintf(esc_html__('Overwrites the homepage displays setting and replaces frontpage with Customizer %s', 'total'), '<a href="javascript:wp.customize.panel(\'total_home_panel\').focus()">' . esc_html__('Home Sections', 'total') . '</a>') . '<br/><br/>' . esc_html__('Do not enable this option if you want to use Elementor in home page.', 'total')
)));

