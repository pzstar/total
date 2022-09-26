function totalDynamicCss(control, style) {
    jQuery('style.' + control).remove();

    jQuery('head').append(
            '<style class="' + control + '">:root{' + style + '}</style>'
            );
}

function totalConvertHex(hexcolor, opacity) {
    if (hexcolor) {
        var hex = String(hexcolor).replace(/[^0-9a-f]/gi, '');
        if (hex.length < 6) {
            hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
        }
        r = parseInt(hex.substring(0, 2), 16);
        g = parseInt(hex.substring(2, 4), 16);
        b = parseInt(hex.substring(4, 6), 16);

        result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity / 100 + ')';
        return result;
    }
}

(function ($) {
    wp.customize('total_template_color', function (value) {
        value.bind(function (to) {
            var css = '--total-template-color:' + to + ';';
            css += '--total-template-transparent-color:' + totalConvertHex(to, 90) + ';';
            totalDynamicCss('total_template_color', css);
        });
    });
    
    wp.customize('total_wide_container_width', function (value) {
        value.bind(function (to) {
            console.log(to);
            var css = '--total-container-width:' + to + 'px;';
            totalDynamicCss('total_wide_container_width', css);
        });
    });

    wp.customize('total_fluid_container_width', function (value) {
        value.bind(function (to) {
            console.log(to);
            var css = '--total-fluid-container-width:' + to + '%;';
            totalDynamicCss('total_fluid_container_width', css);
        });
    });
    
    wp.customize('total_sidebar_width', function (value) {
        value.bind(function (to) {
            console.log(to);
            var css = '--total-sidebar-width:' + to + '%;';
            totalDynamicCss('total_sidebar_width', css);
        });
    });

    wp.customize('total_container_padding', function (value) {
        value.bind(function (to) {
            console.log(to);
            var css = '--total-container-padding:' + to + 'px;';
            totalDynamicCss('total_container_padding', css);
        });
    });

    wp.customize('total_content_header_color', function (value) {
        value.bind(function (to) {
            var css = '--total-content-header-color:' + to + ';';
            totalDynamicCss('total_content_header_color', css);
        });
    });

    wp.customize('total_content_text_color', function (value) {
        value.bind(function (to) {
            var css = '--total-content-text-color:' + to + ';';
            totalDynamicCss('total_content_text_color', css);
        });
    });

    wp.customize('total_content_link_color', function (value) {
        value.bind(function (to) {
            var css = '--total-content-link-color:' + to + ';';
            totalDynamicCss('total_content_link_color', css);
        });
    });

    wp.customize('total_content_link_hov_color', function (value) {
        value.bind(function (to) {
            var css = '--total-content-link-hov-color:' + to + ';';
            totalDynamicCss('total_content_link_hov_color', css);
        });
    });

    wp.customize('total_title_color', function (value) {
        value.bind(function (to) {
            var css = '--total-title-color:' + to + ';';
            totalDynamicCss('total_title_color', css);
        });
    });

    wp.customize('total_tagline_color', function (value) {
        value.bind(function (to) {
            var css = '--total-tagline-color:' + to + ';';
            totalDynamicCss('total_tagline_color', css);
        });
    });

    wp.customize('total_logo_width', function (value) {
        value.bind(function (to) {
            var css = '--total-logo-width:' + to + 'px;';
            totalDynamicCss('total_logo_width', css);
        });
    });

    wp.customize('total_logo_width_tablet', function (value) {
        value.bind(function (to) {
            var css = '--total-logo-width-tablet:' + to + 'px;';
            totalDynamicCss('total_logo_width_tablet', css);
        });
    });

    wp.customize('total_logo_width_mobile', function (value) {
        value.bind(function (to) {
            var css = '--total-logo-width-mobile:' + to + 'px;';
            totalDynamicCss('total_logo_width_mobile', css);
        });
    });

    wp.customize('total_mh_bg_color', function (value) {
        value.bind(function (to) {
            var css = '--total-mh-bg-color:' + to + ';';
            totalDynamicCss('total_mh_bg_color', css);
        });
    });
    
    wp.customize('total_mh_spacing_left_desktop', function (value) {
        value.bind(function (to) {
            var css = '--total-mh-spacing-left:' + to + 'px;';
            totalDynamicCss('total_mh_spacing_left_desktop', css);
        });
    });
    
    wp.customize('total_mh_spacing_top_desktop', function (value) {
        value.bind(function (to) {
            var css = '--total-mh-spacing-top:' + to + 'px;';
            totalDynamicCss('total_mh_spacing_top_desktop', css);
        });
    });
    
    wp.customize('total_mh_spacing_bottom_desktop', function (value) {
        value.bind(function (to) {
            var css = '--total-mh-spacing-bottom:' + to + 'px;';
            totalDynamicCss('total_mh_spacing_bottom_desktop', css);
        });
    });
    
    wp.customize('total_mh_spacing_right_desktop', function (value) {
        value.bind(function (to) {
            var css = '--total-mh-spacing-right:' + to + 'px;';
            totalDynamicCss('total_mh_spacing_right_desktop', css);
        });
    });

    wp.customize('total_pm_menu_link_color', function (value) {
        value.bind(function (to) {
            var css = '--total-menu-link-color:' + to + ';';
            totalDynamicCss('total_pm_menu_link_color', css);
        });
    });

    wp.customize('total_pm_menu_link_hover_color', function (value) {
        value.bind(function (to) {
            var css = '--total-menu-link-hov-color:' + to + ';';
            totalDynamicCss('total_pm_menu_link_hover_color', css);
        });
    });

    wp.customize('total_pm_menu_hover_bg_color', function (value) {
        value.bind(function (to) {
            var css = '--total-menu-link-hover-bg-color:' + to + ';';
            totalDynamicCss('total_pm_menu_hover_bg_color', css);
        });
    });

    wp.customize('total_pm_submenu_bg_color', function (value) {
        value.bind(function (to) {
            var css = '--total-submenu-bg-color:' + to + ';';
            totalDynamicCss('total_pm_submenu_bg_color', css);
        });
    });

    wp.customize('total_pm_submenu_link_color', function (value) {
        value.bind(function (to) {
            var css = '--total-submenu-link-color:' + to + ';';
            totalDynamicCss('total_pm_submenu_link_color', css);
        });
    });

    wp.customize('total_pm_submenu_link_hover_color', function (value) {
        value.bind(function (to) {
            var css = '--total-submenu-link-hover-color:' + to + ';';
            totalDynamicCss('total_pm_submenu_link_hover_color', css);
        });
    });

    wp.customize('total_pm_submenu_link_bg_color', function (value) {
        value.bind(function (to) {
            var css = '--total-submenu-link-hover-bg-color:' + to + ';';
            totalDynamicCss('total_pm_submenu_link_bg_color', css);
        });
    });

    wp.customize('total_top_footer_title_color', function (value) {
        value.bind(function (to) {
            var css = '--total-top-footer-title-color:' + to + ';';
            totalDynamicCss('total_top_footer_title_color', css);
        });
    });

    wp.customize('total_top_footer_text_color', function (value) {
        value.bind(function (to) {
            var css = '--total-top-footer-text-color:' + to + ';';
            totalDynamicCss('total_top_footer_text_color', css);
        });
    });

    wp.customize('total_top_footer_anchor_color', function (value) {
        value.bind(function (to) {
            var css = '--total-footer-anchor-color:' + to + ';';
            totalDynamicCss('total_top_footer_anchor_color', css);
        });
    });

    wp.customize('total_top_footer_anchor_color_hover', function (value) {
        value.bind(function (to) {
            var css = '--total-footer-anchor-color-hover:' + to + ';';
            totalDynamicCss('total_top_footer_anchor_color_hover', css);
        });
    });

    wp.customize('total_bottom_footer_text_color', function (value) {
        value.bind(function (to) {
            var css = '--total-bottom-footer-text-color:' + to + ';';
            totalDynamicCss('total_bottom_footer_text_color', css);
        });
    });

    wp.customize('total_bottom_footer_anchor_color', function (value) {
        value.bind(function (to) {
            var css = '--total-bottom-footer-anchor-color:' + to + ';';
            totalDynamicCss('total_bottom_footer_anchor_color', css);
        });
    });

    wp.customize('total_bottom_footer_anchor_color_hover', function (value) {
        value.bind(function (to) {
            var css = '--total-bottom-footer-anchor-color-hover:' + to + ';';
            totalDynamicCss('total_bottom_footer_anchor_color_hover', css);
        });
    });

    wp.customize('total_bottom_footer_bg_color', function (value) {
        value.bind(function (to) {
            var css = '--total-bottom-footer-bg-color:' + to + ';';
            totalDynamicCss('total_bottom_footer_bg_color', css);
        });
    });

    wp.customize('total_service_left_bg', function (value) {
        value.bind(function (to) {
            var css = '--total-service-left-bg:' + to + ';';
            totalDynamicCss('total_service_left_bg', css);
        });
    });

    wp.customize('total_counter_bg', function (value) {
        value.bind(function (to) {
            var css = '--total-counter-bg:' + to + ';';
            totalDynamicCss('total_counter_bg', css);
        });
    });

    wp.customize('total_cta_bg', function (value) {
        value.bind(function (to) {
            var css = '--total-cta-bg:' + to + ';';
            totalDynamicCss('total_cta_bg', css);
        });
    });

})(jQuery);