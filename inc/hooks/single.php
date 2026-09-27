<?php
if (!function_exists('total_page_header')) {

    function total_page_header() {
        $total_hide_title = get_post_meta(get_the_ID(), 'total_hide_title', true);

        if (!$total_hide_title) {
            ?>
            <div class="ht-main-header">
                <div class="ht-container">
                    <?php the_title('<h1 class="ht-main-title">', '</h1>'); ?>
                    <?php
                    if (!is_front_page()) {
                        do_action('total_breadcrumbs');
                    }
                    ?>
                </div>
            </div><!-- .entry-header -->
            <?php
        }
    }

}

if (!function_exists('total_page_content')) {

    function total_page_content() {
        ?>
        <div class="<?php echo esc_attr(total_content_container_class()); ?> ht-clearfix">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <?php while (have_posts()):
                        the_post();
                        ?>

                        <?php get_template_part('template-parts/content', 'page'); ?>

                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()):
                            comments_template();
                        endif;
                        ?>

                    <?php endwhile; ?>

                </main>
            </div>

            <?php get_sidebar(); ?>
        </div>

        <?php
    }

}

if (!function_exists('total_single_header')) {

    function total_single_header() {
        $total_hide_title = get_post_meta(get_the_ID(), 'total_hide_title', true);

        if (!$total_hide_title) {
            ?>
            <div class="ht-main-header">
                <div class="ht-container">
                    <?php the_title('<h1 class="ht-main-title">', '</h1>'); ?>
                    <?php do_action('total_breadcrumbs'); ?>
                </div>
            </div>
            <?php
        }
    }

}

if (!function_exists('total_single_content')) {

    function total_single_content() {
        ?>
        <div class="<?php echo esc_attr(total_content_container_class()); ?> ht-clearfix">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <?php total_single_loop(); ?>

                </main>
            </div>

            <?php get_sidebar(); ?>

        </div>

        <?php
    }

}

if (!function_exists('total_single_loop')) {

    // The single post and its comments; also re-rendered by the Customizer's live preview.
    function total_single_loop() {
        while (have_posts()):
            the_post();
            get_template_part('template-parts/content', 'single');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()):
                comments_template();
            endif;
        endwhile;
    }

}

if (!function_exists('total_customize_partial_main_content')) {

    // Returning false makes the Customizer fall back to a full refresh on other page types.
    function total_customize_partial_main_content() {
        if (is_singular('post')) {
            total_single_loop();
        } elseif (is_home() || is_archive()) {
            total_blog_loop();
        } else {
            return false;
        }
    }

}

add_action('total_page_template', 'total_page_header');
add_action('total_page_template', 'total_page_content');

add_action('total_single_template', 'total_single_header');
add_action('total_single_template', 'total_single_content');
