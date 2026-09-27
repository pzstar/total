/**
 * Total Custom JS
 *
 * @package Total
 *
 * Distributed under the MIT license - http://opensource.org/licenses/MIT
 */

jQuery(function ($) {

    /* Sticky Header */
    var hHeight = 0;
    var adminbarHeight = 0;
    if ($('body').hasClass('admin-bar')) {
        adminbarHeight = 32;
    }
    var $stickyHeader = $('.ht-header');
    var headerOver = $('body').hasClass('ht-header-over');

    /* Header Over Slider/Banner: the banner pads its top by the header height */
    if (headerOver) {
        var setHeaderHeight = function () {
            document.documentElement.style.setProperty('--total-header-height', $('#ht-masthead').outerHeight() + 'px');
        };
        setHeaderHeight();
        $(window).on('load resize', setHeaderHeight);
    }

    if ($('.ht-sticky-header').length > 0 && $stickyHeader.length > 0) {
        hHeight = $stickyHeader.outerHeight();
        $pageWrapper = $('#ht-content');
        var hOffset = $stickyHeader.offset().top;

        var offset = hOffset - adminbarHeight + 2;

        $stickyHeader.headroom({
            offset: offset,
            onTop: function () {
                $pageWrapper.css({
                    paddingTop: 0
                });
            },
            onNotTop: function () {
                // A header over the content takes no space, so nothing needs padding.
                if (!headerOver) {
                    $pageWrapper.css({
                        paddingTop: hHeight + 'px'
                    });
                }
            }
        });
    }

    /* Section libraries only load on the home sections page. */
    if ($('#ht-bx-slider .ht-slide').length > 0 && $.fn.owlCarousel) {
        $('#ht-bx-slider').owlCarousel({
            rtl: JSON.parse(total_localize.is_rtl),
            autoplay: true,
            items: 1,
            loop: true,
            nav: true,
            dots: false,
            autoplayTimeout: 7000,
            animateOut: 'fadeOut'
        });
    }

    if ($.fn.owlCarousel) {
        $('.ht-testimonial-slider').owlCarousel({
            rtl: JSON.parse(total_localize.is_rtl),
            autoplay: true,
            items: 1,
            loop: true,
            nav: true,
            dots: false,
            autoplayTimeout: 7000,
            navText: ['<i class="fas fa-chevron-left" aria-hidden="true"></i>', '<i class="fas fa-chevron-right" aria-hidden="true"></i>']
        });

        $(".ht-logo-slider").owlCarousel({
            rtl: JSON.parse(total_localize.is_rtl),
            autoplay: true,
            items: 5,
            loop: true,
            nav: false,
            dots: false,
            autoplayTimeout: 7000,
            responsive: {
                0: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                979: {
                    items: 4,
                },
                1200: {
                    items: 5,
                }
            }
        });
    }

    if ($.fn.nivoLightbox) {
        $('.ht-portfolio-image').nivoLightbox();
    }

    var sf = $('.ht-menu > ul').superfish({
        delay: 500, // one second delay on mouseout
        animation: {opacity: 'show', height: 'show'}, // fade-in and slide-down animation
        speed: 'fast', // faster animation speed
        autoArrows: false
    });

    $('.ht-menu .menu-item-has-children > a').append($('<button class="ht-dropdown" aria-expanded="false"></button>').attr('aria-label', total_localize.submenu_label || 'Show submenu'));

    $(window).resize(function () {
        if ($(window).width() < 1000) {
            sf.superfish('destroy');
            $('.ht-dropdown').removeClass('ht-opened').attr({'aria-expanded': 'false', 'tabindex': '0'});
        } else {
            sf.superfish('init');
            // On desktop the submenu opens on hover and focus, so the arrow is not a tab stop.
            $('.ht-dropdown').attr('tabindex', '-1');
        }
    }).resize();

    $('.ht-dropdown').on('click', function () {
        $(this).parent('a').next('ul').slideToggle();
        $(this).toggleClass('ht-opened').attr('aria-expanded', $(this).hasClass('ht-opened') ? 'true' : 'false');
        return false;
    })

    $('.ht-service-excerpt h5').click(function () {
        $(this).next('.ht-service-text').slideToggle();
        $(this).parents('.ht-service-post').toggleClass('ht-active');
    });

    $('.ht-service-icon').click(function () {
        $(this).next('.ht-service-excerpt').find('.ht-service-text').slideToggle();
        $(this).parent('.ht-service-post').toggleClass('ht-active');
    });

    $('.toggle-bar').click(function () {
        $(this).attr('aria-expanded', $(this).attr('aria-expanded') === 'true' ? 'false' : 'true');
        $(this).next('.ht-menu').slideToggle();
        totalKeyboardLoop($('.ht-main-navigation'));
        return false;
    });

    /* Header Search Overlay */
    // Delegated, so a search button re-rendered by the Customizer preview still works.
    var $searchOverlay = $('#ht-search-overlay');

    function totalCloseSearch() {
        $searchOverlay.removeClass('ht-search-open').attr('hidden', true);
        $('body').removeClass('ht-search-active');
        $('.ht-search-toggle').attr('aria-expanded', 'false').trigger('focus');
    }

    $(document).on('click', '.ht-search-toggle', function () {
        var $searchToggle = $(this);
        $searchOverlay.removeAttr('hidden');
        // Let the browser paint the overlay before fading it in.
        requestAnimationFrame(function () {
            $searchOverlay.addClass('ht-search-open');
        });
        $('body').addClass('ht-search-active');
        $searchToggle.attr('aria-expanded', 'true');
        $searchOverlay.find('.search-field').trigger('focus');
    });

    $searchOverlay.on('click', function (e) {
        if (e.target === this || $(e.target).closest('.ht-search-close').length) {
            totalCloseSearch();
        }
    });

    $searchOverlay.on('keydown', function (e) {
        if (e.key === 'Escape') {
            totalCloseSearch();
            return;
        }

        // Keep Tab inside the overlay while it is open.
        if (e.key === 'Tab') {
            var $tabbable = $searchOverlay.find('button, input, a').filter(':visible');
            var first = $tabbable.first()[0];
            var last = $tabbable.last()[0];

            if (e.shiftKey && document.activeElement === first) {
                last.focus();
                e.preventDefault();
            } else if (!e.shiftKey && document.activeElement === last) {
                first.focus();
                e.preventDefault();
            }
        }
    });

    $(window).on("scroll", function () {
        $("[data-pllx-bg-ratio]").each(function () {
            const $section = $(this);
            const scrollPosition = $(window).scrollTop();
            const offset = $section.offset().top; // Section's distance from top of the document
            const speed = $(this).attr('data-pllx-bg-ratio'); // Adjust this value for parallax speed
            var additionalOffset = 0;

            if ($(this).attr('data-pllx-vertical-offset')) {
                additionalOffset = parseInt($(this).attr('data-pllx-vertical-offset'));
            }

            // Update the background position if the section is in view
            if (
                scrollPosition + $(window).height() > offset &&
                scrollPosition < offset + $section.outerHeight()
            ) {
                const backgroundPosition = additionalOffset + ((scrollPosition - offset) * speed * -1);
                $section.css("background-position", `center ${backgroundPosition}px`);
            }
        });
    });

    if ($.fn.waypoint) {
        $('.ht-team-counter-wrap').waypoint(function () {
            setTimeout(function () {
                $('.odometer1').html($('.odometer1').data('count'));
            }, 500);
            setTimeout(function () {
                $('.odometer2').html($('.odometer2').data('count'));
            }, 1000);
            setTimeout(function () {
                $('.odometer3').html($('.odometer3').data('count'));
            }, 1500);
            setTimeout(function () {
                $('.odometer4').html($('.odometer4').data('count'));
            }, 2000);
        }, {
            offset: 800,
            triggerOnce: true
        });
    }

    if ($('.ht-sticky-header').length > 0) {
        var onpageOffset = 74;
    } else {
        onpageOffset = 0
    }

    $('.ht-sticky-header .ht-menu').onePageNav({
        currentClass: 'current',
        changeHash: false,
        scrollSpeed: 750,
        scrollThreshold: 0.1,
        scrollOffset: onpageOffset
    });

    // *only* if we have anchor on the url
    var anchorId = window.location.hash;
    anchorId = anchorId.replace('/', '');
    if ($(anchorId).length > 0) {
        $('html, body').animate({
            scrollTop: $(anchorId).offset().top - onpageOffset
        }, 1000);
    }

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            $('#ht-back-top').removeClass('ht-hide');
        } else {
            $('#ht-back-top').addClass('ht-hide');
        }
    });

    $('#ht-back-top').click(function () {
        $('html,body').animate({scrollTop: 0}, 800);
    });

    if ($('.ht-portfolio-posts').length > 0 && $.fn.isotope) {

        var first_class = $('.ht-portfolio-cat-name:first').data('filter');
        $('.ht-portfolio-cat-name:first').addClass('active');

        var $container = $('.ht-portfolio-posts').imagesLoaded(function () {

            $container.isotope({
                itemSelector: '.ht-portfolio',
                filter: first_class
            });

            var elems = $container.isotope('getFilteredItemElements');

            elems.forEach(function (item, index) {
                if (index == 0 || index == 4) {
                    $(item).addClass('wide');
                    var bg = $(item).find('.ht-portfolio-image').attr('href');
                    $(item).find('.ht-portfolio-wrap').css('background-image', 'url(' + bg + ')');
                } else {
                    $(item).removeClass('wide');
                }
            });

            GetMasonary();

            setTimeout(function () {
                $container.isotope({
                    itemSelector: '.ht-portfolio',
                    filter: first_class,
                });
            }, 2000);

            $(window).on('resize', function () {
                GetMasonary();
            });

        });

        $('.ht-portfolio-cat-name-list').on('click', '.ht-portfolio-cat-name', function () {
            var filterValue = $(this).attr('data-filter');
            $container.isotope({filter: filterValue});

            var elems = $container.isotope('getFilteredItemElements');

            elems.forEach(function (item, index) {
                if (index == 0 || index == 4) {
                    $(item).addClass('wide');
                    var bg = $(item).find('.ht-portfolio-image').attr('href');
                    $(item).find('.ht-portfolio-wrap').css('background-image', 'url(' + bg + ')');
                } else {
                    $(item).removeClass('wide');
                }
            });

            GetMasonary();

            var filterValue = $(this).attr('data-filter');
            $container.isotope({filter: filterValue});

            $('.ht-portfolio-cat-name').removeClass('active');
            $(this).addClass('active');
        });

        function GetMasonary() {
            var winWidth = window.innerWidth;
            if (winWidth > 580) {

                $container.find('.ht-portfolio').each(function () {
                    var image_width = $(this).find('img').width();
                    if ($(this).hasClass('wide')) {
                        $(this).find('.ht-portfolio-wrap').css({
                            height: (image_width * 2) + 15 + 'px'
                        });
                    } else {
                        $(this).find('.ht-portfolio-wrap').css({
                            height: image_width + 'px'
                        });
                    }
                });

            } else {
                $container.find('.ht-portfolio').each(function () {
                    var image_width = $(this).find('img').width();
                    if ($(this).hasClass('wide')) {
                        $(this).find('.ht-portfolio-wrap').css({
                            height: (image_width * 2) + 8 + 'px'
                        });
                    } else {
                        $(this).find('.ht-portfolio-wrap').css({
                            height: image_width + 'px'
                        });
                    }
                });
            }
        }

    }

    var totalKeyboardLoop = function (elem) {

        var tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

        var firstTabbable = tabbable.first();
        var lastTabbable = tabbable.last();
        /*set focus on first input*/
        firstTabbable.focus();

        /*redirect last tab to first input*/
        lastTabbable.on('keydown', function (e) {
            if ((e.which === 9 && !e.shiftKey)) {
                e.preventDefault();
                firstTabbable.focus();
            }
        });

        /*redirect first shift+tab to last input*/
        firstTabbable.on('keydown', function (e) {
            if ((e.which === 9 && e.shiftKey)) {
                e.preventDefault();
                lastTabbable.focus();
            }
        });

        /* allow escape key to close insiders div */
        elem.on('keyup', function (e) {
            if (e.keyCode === 27) {
                elem.hide();
            }
        });
    };

});

