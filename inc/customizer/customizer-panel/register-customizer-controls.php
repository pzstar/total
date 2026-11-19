<?php

if (!class_exists('Total_Register_Customizer_Controls')) {

    class Total_Register_Customizer_Controls {

        function __construct() {
            add_action('customize_register', array($this, 'register_customizer_settings'));
            add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_customizer_script'));
            add_action('customize_preview_init', array($this, 'enqueue_customize_preview_js'));
        }

        public function register_customizer_settings($wp_customize) {
            /** Theme Options */
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/homepage-settings.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/general-settings.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/typography-settings.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/color-settings.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/header-settings.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/single-post-settings.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/home-sections.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/footer-settings.php';

            /** For Additional Hooks */
            do_action('total_new_options', $wp_customize);
        }

        public function enqueue_customizer_script() {
            wp_enqueue_script('total-customizer', TOTAL_CUSTOMIZER_URL . 'customizer-panel/assets/customizer.js', array('jquery'), TOTAL_VERSION, true);

            wp_localize_script('total-customizer', 'total_ajax_data', array(
                'nonce' => wp_create_nonce('total-order-sections'),
                'page_transparent_header' => total_page_transparent_header_used()
            ));
            if (is_rtl()) {
                wp_enqueue_style('total-customizer', TOTAL_CUSTOMIZER_URL . 'customizer-panel/assets/customizer.rtl.css', array('total-customizer-control'), TOTAL_VERSION);
            } else {
                wp_enqueue_style('total-customizer', TOTAL_CUSTOMIZER_URL . 'customizer-panel/assets/customizer.css', array('total-customizer-control'), TOTAL_VERSION);
            }

            wp_enqueue_style('fontawesome-7.3.1', get_template_directory_uri() . '/css/fontawesome-6.3.0.css', array(), TOTAL_VERSION);
        }

        public function enqueue_customize_preview_js() {
            wp_enqueue_script('total-customizer-preview', TOTAL_CUSTOMIZER_URL . 'customizer-panel/assets/customizer-preview.js', array('customize-preview'), TOTAL_VERSION, true);
        }

    }

    new Total_Register_Customizer_Controls();
}

// Price line under the Customizer upgrade notes.
add_filter('total_upgrade_note', function () {
    return esc_html__('$65 one-time. Unlimited sites, lifetime updates, no renewal fees.', 'total');
});
