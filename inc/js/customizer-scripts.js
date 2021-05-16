jQuery(document).ready(function ($) {
    "use strict";

    //FontAwesome Icon Control JS
    $('body').on('click', '.total-icon-list li', function () {
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.total-icon-list').prev('.total-selected-icon').children('i').attr('class', '').addClass(icon_class);
        $(this).parent('.total-icon-list').next('input').val(icon_class).trigger('change');
    });

    $('body').on('click', '.total-selected-icon', function () {
        $(this).next().slideToggle();
    });

    //Switch Control
    $('body').on('click', '.total-onoffswitch', function () {
        var $this = $(this);
        if ($this.hasClass('total-switch-on')) {
            $(this).removeClass('total-switch-on');
            $this.next('input').val('off').trigger('change')
        } else {
            $(this).addClass('total-switch-on');
            $this.next('input').val('on').trigger('change')
        }
    });

    $('.total-gallery-button').click(function (e) {
        e.preventDefault();

        var button = $(this);
        var hiddenfield = button.prev();
        if (hiddenfield.val()) {
            var hiddenfieldvalue = hiddenfield.val().split(",");
        } else {
            var hiddenfieldvalue = new Array();
        }

        var frame = wp.media({
            title: 'Insert Images',
            library: {
                type: 'image',
                post__not_in: hiddenfieldvalue
            },
            button: {text: 'Use Images'},
            multiple: 'add'
        });

        frame.on('select', function () {
            var attachments = frame.state().get('selection').map(function (a) {
                a.toJSON();
                return a;
            });
            var i;
            /* loop through all the images */
            for (i = 0; i < attachments.length; ++i) {
                /* add HTML element with an image */
                $('ul.total-gallery-container').append('<li data-id="' + attachments[i].id + '"><span style="background-image:url(' + attachments[i].attributes.url + ')"></span><a href="#" class="total-gallery-remove">×</a></li>');
                /* add an image ID to the array of all images */
                hiddenfieldvalue.push(attachments[i].id);
            }
            /* refresh sortable */
            $("ul.total-gallery-container").sortable("refresh");
            /* add the IDs to the hidden field value */
            hiddenfield.val(hiddenfieldvalue.join()).trigger('change');
        }).open();
    });

    $('ul.total-gallery-container').sortable({
        items: 'li',
        cursor: '-webkit-grabbing', /* mouse cursor */
        stop: function (event, ui) {
            ui.item.removeAttr('style');

            var sort = new Array(), /* array of image IDs */
                    gallery = $(this); /* ul.total-gallery-container */

            /* each time after dragging we resort our array */
            gallery.find('li').each(function (index) {
                sort.push($(this).attr('data-id'));
            });
            /* add the array value to the hidden input field */
            gallery.next().val(sort.join()).trigger('change');
        }
    });

    /*
     * Remove certain images
     */
    $('body').on('click', '.total-gallery-remove', function () {
        var id = $(this).parent().attr('data-id'),
                gallery = $(this).parent().parent(),
                hiddenfield = gallery.next(),
                hiddenfieldvalue = hiddenfield.val().split(","),
                i = hiddenfieldvalue.indexOf(id);

        $(this).parent().remove();

        /* remove certain array element */
        if (i != -1) {
            hiddenfieldvalue.splice(i, 1);
        }

        /* add the IDs to the hidden field value */
        hiddenfield.val(hiddenfieldvalue.join()).trigger('change');

        /* refresh sortable */
        gallery.sortable("refresh");

        return false;
    });

    //MultiCheck box Control JS
    $('.customize-control-checkbox-multiple input[type="checkbox"]').on('change', function () {

        var checkbox_values = $(this).parents('.customize-control').find('input[type="checkbox"]:checked').map(
                function () {
                    return $(this).val();
                }
        ).get().join(',');

        $(this).parents('.customize-control').find('input[type="hidden"]').val(checkbox_values).trigger('change');

    }
    );

    //Chosen JS
    $(".hs-chosen-select").chosen({
        width: "100%"
    })
    
    $(".hs-selectize").selectize({
        plugins: ['remove_button', 'drag_drop'],
        delimiter: ',',
        persist: false,
        maxItems: 8
    });

    //Scroll to section
    $('body').on('click', '#sub-accordion-panel-total_home_panel .control-subsection .accordion-section-title', function (event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection(section_id);
    });

    //Homepage Section Sortable
    function total_sections_order(container) {
        var sections = $(container).sortable('toArray');
        var sec_ordered = [];
        $.each(sections, function (index, sec_id) {
            sec_id = sec_id.replace("accordion-section-", "");
            sec_ordered.push(sec_id);
        });

        $.ajax({
            url: ajaxurl,
            type: 'post',
            dataType: 'html',
            data: {
                'action': 'total_order_sections',
                'sections': sec_ordered,
            }
        }).done(function (data) {
            $.each(sec_ordered, function (key, value) {
                wp.customize.section(value).priority(key);
            });
            $(container).find('.total-drag-spinner').hide();
            wp.customize.previewer.refresh();
        });
    }

    $('#sub-accordion-panel-total_home_panel').sortable({
        axis: 'y',
        helper: 'clone',
        cursor: 'move',
        items: '> li.control-section:not(#accordion-section-total_slider_section):not(#accordion-section-total-upgrade-section)',
        delay: 150,
        update: function (event, ui) {
            $('#sub-accordion-panel-total_home_panel').find('.total-drag-spinner').show();
            total_sections_order('#sub-accordion-panel-total_home_panel');
            $('.wp-full-overlay-sidebar-content').scrollTop(0);
        }
    });
});

// Extends our custom section.
(function (api) {

    api.sectionConstructor['total-pro-section'] = api.Section.extend({

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    });

    api.sectionConstructor['total-upgrade-section'] = api.Section.extend({

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    });

})(wp.customize);

function scrollToSection(section_id) {
    var preview_section_id = "ht-home-slider-section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch (section_id) {
        case 'accordion-section-total_slider_section':
            preview_section_id = "ht-home-slider-section";
            break;

        case 'accordion-section-total_about_section':
            preview_section_id = "ht-about-us-section";
            break;

        case 'accordion-section-total_featured_section':
            preview_section_id = "ht-featured-post-section";
            break;

        case 'accordion-section-total_portfolio_section':
            preview_section_id = "ht-portfolio-section";
            break;

        case 'accordion-section-total_service_section':
            preview_section_id = "ht-service-post-section";
            break;

        case 'accordion-section-total_team_section':
            preview_section_id = "ht-team-section";
            break;

        case 'accordion-section-total_testimonial_section':
            preview_section_id = "ht-testimonial-section";
            break;

        case 'accordion-section-total_counter_section':
            preview_section_id = "ht-counter-section";
            break;

        case 'accordion-section-total_blog_section':
            preview_section_id = "ht-blog-section";
            break;

        case 'accordion-section-total_client_logo_section':
            preview_section_id = "ht-logo-section";
            break;

        case 'accordion-section-total_cta_section':
            preview_section_id = "ht-cta-section";
            break;
    }

    if ($contents.find('#' + preview_section_id).length > 0) {
        $contents.find("html, body").animate({
            scrollTop: $contents.find("#" + preview_section_id).offset().top
        }, 1000);
    }
}