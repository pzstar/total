jQuery(document).ready(function ($) {
    'use strict';

    wp.customize('total_website_layout', function (value) {
        value.bind(function (to) {
            $('body').removeClass('ht-boxed ht-wide ht-fluid').addClass('ht-' + to);
        });
    });

    wp.customize('total_template_color', function (value) {
        value.bind(function (to) {
            var css = '--total-template-color:' + to + ';';
            css += '--total-template-transparent-color:' + totalConvertHex(to, 90) + ';';
            totalDynamicCss('total_template_color', css);
        });
    });

    wp.customize('total_wide_container_width', function (value) {
        value.bind(function (to) {
            var css = '--total-container-width:' + to + 'px;';
            totalDynamicCss('total_wide_container_width', css);
        });
    });

    wp.customize('total_fluid_container_width', function (value) {
        value.bind(function (to) {
            var css = '--total-fluid-container-width:' + to + '%;';
            totalDynamicCss('total_fluid_container_width', css);
        });
    });

    wp.customize('total_sidebar_width', function (value) {
        value.bind(function (to) {
            var css = '--total-sidebar-width:' + to + '%;';
            totalDynamicCss('total_sidebar_width', css);
        });
    });

    wp.customize('total_container_padding', function (value) {
        value.bind(function (to) {
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
            var css = '--total-mh-spacing-left-desktop:' + to + 'px;';
            totalDynamicCss('total_mh_spacing_left_desktop', css);
        });
    });

    wp.customize('total_mh_spacing_top_desktop', function (value) {
        value.bind(function (to) {
            var css = '--total-mh-spacing-top-desktop:' + to + 'px;';
            totalDynamicCss('total_mh_spacing_top_desktop', css);
        });
    });

    wp.customize('total_mh_spacing_bottom_desktop', function (value) {
        value.bind(function (to) {
            var css = '--total-mh-spacing-bottom-desktop:' + to + 'px;';
            totalDynamicCss('total_mh_spacing_bottom_desktop', css);
        });
    });

    wp.customize('total_mh_spacing_right_desktop', function (value) {
        value.bind(function (to) {
            var css = '--total-mh-spacing-right-desktop:' + to + 'px;';
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

    wp.customize('total_footer_bg_url', function (value) {
        value.bind(function (to) {
            var css = '--total-footer-bg-url:url(' + to + ');';
            totalDynamicCss('total_footer_bg_url', css);
            if (to) {
                var overlay = wp.customize('total_footer_bg_overlay').get();
                var overlaycss = '--total-footer-bg-overlay:' + overlay + ';';
                totalDynamicCss('total_footer_bg_overlay', overlaycss);
            } else {
                var overlaycss = '--total-footer-bg-overlay: ;';
                totalDynamicCss('total_footer_bg_overlay', overlaycss);
            }
        });
    });

    wp.customize('total_footer_bg_size', function (value) {
        value.bind(function (to) {
            var css = '--total-footer-bg-size:' + to + ';';
            totalDynamicCss('total_footer_bg_size', css);
        });
    });

    wp.customize('total_footer_bg_repeat', function (value) {
        value.bind(function (to) {
            var css = '--total-footer-bg-repeat:' + to + ';';
            totalDynamicCss('total_footer_bg_repeat', css);
        });
    });

    wp.customize('total_footer_bg_position', function (value) {
        value.bind(function (to) {
            var css = '--total-footer-bg-position:' + to.replace('-', ' ') + ';';
            totalDynamicCss('total_footer_bg_position', css);
        });
    });

    wp.customize('total_footer_bg_attachment', function (value) {
        value.bind(function (to) {
            var css = '--total-footer-bg-attachment:' + to + ';';
            totalDynamicCss('total_footer_bg_attachment', css);
        });
    });

    wp.customize('total_footer_bg_color', function (value) {
        value.bind(function (to) {
            var css = '--total-footer-bg-color:' + to + ';';
            totalDynamicCss('total_footer_bg_color', css);
        });
    });

    wp.customize('total_footer_bg_overlay', function (value) {
        value.bind(function (to) {
            var css = '--total-footer-bg-overlay:' + to + ';';
            totalDynamicCss('total_footer_bg_overlay', css);
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

    wp.customize('total_body_family', function (value) {
        value.bind(function (to) {
            var css = '--total-body-family:' + to + ';';
            totalDynamicCss('total_body_family', css);
        });
    });

    wp.customize('total_body_style', function (value) {
        value.bind(function (to) {
            var weight = to.replace(/\D/g, '');
            var style = to.replace(/\d+/g, '');
            if ('' == style) {
                style = 'normal';
            }
            var css = '--total-body-weight:' + weight + ';';
            css += '--total-body-style:' + style + ';';
            totalDynamicCss('total_body_style', css);
        });
    });

    wp.customize('total_body_text_transform', function (value) {
        value.bind(function (to) {
            var css = '--total-body-text-transform:' + to + ';';
            totalDynamicCss('total_body_text_transform', css);
        });
    });

    wp.customize('total_body_text_decoration', function (value) {
        value.bind(function (to) {
            var css = '--total-body-text-decoration:' + to + ';';
            totalDynamicCss('total_body_text_decoration', css);
        });
    });

    wp.customize('total_body_size', function (value) {
        value.bind(function (to) {
            var css = '--total-body-size:' + to + 'px;';
            totalDynamicCss('total_body_size', css);
        });
    });

    wp.customize('total_body_letter_spacing', function (value) {
        value.bind(function (to) {
            var css = '--total-body-letter-spacing:' + to + 'px;';
            totalDynamicCss('total_body_letter_spacing', css);
        });
    });

    wp.customize('total_body_line_height', function (value) {
        value.bind(function (to) {
            var css = '--total-body-line-height:' + to + ';';
            totalDynamicCss('total_body_line_height', css);
        });
    });

    wp.customize('total_body_color', function (value) {
        value.bind(function (to) {
            var css = '--total-body-color:' + to + ';';
            totalDynamicCss('total_body_color', css);
        });
    });

    wp.customize('total_menu_family', function (value) {
        value.bind(function (to) {
            var css = '--total-menu-family:' + to + ';';
            totalDynamicCss('total_menu_family', css);
        });
    });

    wp.customize('total_menu_style', function (value) {
        value.bind(function (to) {
            var weight = to.replace(/\D/g, '');
            var style = to.replace(/\d+/g, '');
            if ('' == style) {
                style = 'normal';
            }
            var css = '--total-menu-weight:' + weight + ';';
            css += '--total-menu-style:' + style + ';';
            totalDynamicCss('total_menu_style', css);
        });
    });

    wp.customize('total_menu_text_transform', function (value) {
        value.bind(function (to) {
            var css = '--total-menu-text-transform:' + to + ';';
            totalDynamicCss('total_menu_text_transform', css);
        });
    });

    wp.customize('total_menu_text_decoration', function (value) {
        value.bind(function (to) {
            var css = '--total-menu-text-decoration:' + to + ';';
            totalDynamicCss('total_menu_text_decoration', css);
        });
    });

    wp.customize('total_menu_size', function (value) {
        value.bind(function (to) {
            var css = '--total-menu-size:' + to + 'px;';
            totalDynamicCss('total_menu_size', css);
        });
    });

    wp.customize('total_menu_letter_spacing', function (value) {
        value.bind(function (to) {
            var css = '--total-menu-letter-spacing:' + to + 'px;';
            totalDynamicCss('total_menu_letter_spacing', css);
        });
    });

    wp.customize('total_menu_line_height', function (value) {
        value.bind(function (to) {
            var css = '--total-menu-line-height:' + to + ';';
            totalDynamicCss('total_menu_line_height', css);
        });
    });

    wp.customize('total_h_family', function (value) {
        value.bind(function (to) {
            var css = '--total-h-family:' + to + ';';
            totalDynamicCss('total_h_family', css);
        });
    });

    wp.customize('total_h_size', function (value) {
        value.bind(function (to) {
            var css = '--total-h-size:' + to + 'px;';
            totalDynamicCss('total_h_size', css);
        });
    });

    wp.customize('total_h_style', function (value) {
        value.bind(function (to) {
            var weight = to.replace(/\D/g, '');
            var style = to.replace(/\d+/g, '');
            if ('' == style) {
                style = 'normal';
            }
            var css = '--total-h-weight:' + weight + ';';
            css += '--total-h-style:' + style + ';';
            totalDynamicCss('total_h_style', css);
        });
    });

    wp.customize('total_h_text_transform', function (value) {
        value.bind(function (to) {
            var css = '--total-h-text-transform:' + to + ';';
            totalDynamicCss('total_h_text_transform', css);
        });
    });

    wp.customize('total_h_text_decoration', function (value) {
        value.bind(function (to) {
            var css = '--total-h-text-decoration:' + to + ';';
            totalDynamicCss('total_h_text_decoration', css);
        });
    });

    wp.customize('total_h_letter_spacing', function (value) {
        value.bind(function (to) {
            var css = '--total-h-letter-spacing:' + to + 'px;';
            totalDynamicCss('total_h_letter_spacing', css);
        });
    });

    wp.customize('total_h_line_height', function (value) {
        value.bind(function (to) {
            var css = '--total-h-line-height:' + to + ';';
            totalDynamicCss('total_h_line_height', css);
        });
    });

    /* Font families: load the chosen Google font into the preview, then use it. */
    $.each({total_body_family: 'body', total_menu_family: 'menu', total_h_family: 'h'}, function (setting, key) {
        wp.customize(setting, function (value) {
            value.bind(function (to) {
                totalLoadFont(to);
                totalDynamicCss(setting, '--total-' + key + '-family:' + to + ';');
            });
        });
    });

    /* Top borders of the header and footer. */
    wp.customize('total_enable_header_border', function (value) {
        value.bind(function (to) {
            totalPreviewCss('total_enable_header_border', '.ht-header{border-top:' + (to ? '4px solid var(--total-template-color)' : '0') + '}');
        });
    });

    wp.customize('total_enable_footer_border', function (value) {
        value.bind(function (to) {
            totalPreviewCss('total_enable_footer_border', '#ht-colophon{border-top:' + (to ? '4px solid var(--total-template-color)' : '0') + '}');
        });
    });

    /* Header button colors and rounding. */
    $.each({total_hb_bg_color: 'bg-color', total_hb_text_color: 'text-color', total_hb_bg_hov_color: 'bg-hov-color', total_hb_text_hov_color: 'text-hov-color'}, function (setting, key) {
        wp.customize(setting, function (value) {
            value.bind(function (to) {
                totalDynamicCss(setting, to ? '--total-hb-' + key + ':' + to + ';' : '');
            });
        });
    });

    wp.customize('total_hb_borderradius', function (value) {
        value.bind(function (to) {
            totalDynamicCss('total_hb_borderradius', '--total-hb-border-radius:' + parseInt(to, 10) + 'px;');
        });
    });

    wp.customize('total_transparent_menu_color', function (value) {
        value.bind(function (to) {
            totalDynamicCss('total_transparent_menu_color', to ? '--total-transparent-menu-color:' + to + ';' : '');
        });
    });

    /* Header over the slider/banner and transparent header, as total_header_state() decides it. */
    var totalHeaderState = function () {
        var $body = $('body');
        var over, transparent;

        if ($body.hasClass('ht-preview-transparent-on')) {
            over = transparent = true;
        } else if ($body.hasClass('ht-preview-transparent-off') || wp.customize('total_header_position').get() !== 'header-over') {
            over = transparent = false;
        } else {
            over = $body.hasClass('ht-preview-has-banner');
            transparent = over && !!wp.customize('total_header_transparent').get();
        }

        $body.toggleClass('ht-header-over', over).toggleClass('ht-transparent-header', transparent);
        document.documentElement.style.setProperty('--total-header-height', $('#ht-masthead').outerHeight() + 'px');
    };

    wp.customize('total_header_position', function (value) {
        value.bind(totalHeaderState);
    });

    wp.customize('total_header_transparent', function (value) {
        value.bind(totalHeaderState);
    });

    /* Header search, cart and button: printed hidden in the preview when off, so their switches act instantly. */
    var totalExtraItems = function () {
        // The wrapper has spacing of its own, so it goes too when every item is off.
        $('.ht-menu-extra-items').each(function () {
            $(this).css('display', $(this).children('.ht-menu-extra-item:not([hidden])').length ? '' : 'none');
        });
    };

    $.each({total_mh_show_search: '.ht-menu-search', total_mh_show_cart: '.ht-menu-cart', total_mh_show_cta: '.ht-menu-cta'}, function (setting, selector) {
        wp.customize(setting, function (value) {
            value.bind(function (to) {
                $(selector).prop('hidden', !to);
                totalExtraItems();
            });
        });
    });

    totalExtraItems();
    if (wp.customize.selectiveRefresh) {
        wp.customize.selectiveRefresh.bind('partial-content-rendered', function (placement) {
            if (placement.partial.id === 'total_menu_extra_items') {
                totalExtraItems();
            }
        });
    }

    /* Elements printed in the preview even when off, so they can be shown and hidden here. */
    wp.customize('total_backtotop', function (value) {
        var toggle = function (to) {
            totalPreviewCss('total_backtotop', to ? '' : '#ht-back-top{display:none !important}');
        };
        toggle(value.get());
        value.bind(toggle);
    });

    wp.customize('total_breadcrumb_enable', function (value) {
        var toggle = function (to) {
            totalPreviewCss('total_breadcrumb_enable', to ? '' : '.breadcrumb-trail{display:none !important}');
        };
        toggle(value.get());
        value.bind(toggle);
    });

});

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

function totalPreviewCss(control, css) {
    jQuery('style.' + control).remove();

    if (css) {
        jQuery('head').append('<style class="' + control + '">' + css + '</style>');
    }
}

function totalLoadFont(family) {
    var id = 'total-preview-font-' + String(family).toLowerCase().replace(/[^a-z0-9]+/g, '-');

    if (!family || document.getElementById(id)) {
        return;
    }

    var weights = '100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
    jQuery('head').append('<link id="' + id + '" rel="stylesheet" href="https://fonts.googleapis.com/css?family=' + encodeURIComponent(family).replace(/%20/g, '+') + ':' + weights + '&display=swap">');
}
