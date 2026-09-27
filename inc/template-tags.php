<?php

/**
 * Custom template tags for this theme.
 *
 *
 * @package Total
 */
if (!function_exists('total_posted_on')):

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function total_posted_on() {
        $time_string = '<span class="ht-day">%1$s</span><span class="ht-month-year">%2$s %3$s</span>';

        $posted_on = sprintf($time_string, esc_html(get_the_date('d')), esc_attr(get_the_date('M')), esc_html(get_the_date('Y'))
        );

        $byline = sprintf(
            /* translators: author */
            esc_html_x('by %s', 'post author', 'total'), '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        $comment_count = get_comments_number(); // get_comments_number returns only a numeric value

        if (comments_open()) {
            if ($comment_count == 0) {
                $comments = esc_html__('No Comments', 'total');
            } elseif ($comment_count > 1) {
                $comments = $comment_count . esc_html__(' Comments', 'total');
            } else {
                $comments = esc_html__('1 Comment', 'total');
            }
            $comment_link = '<a href="' . get_comments_link() . '"><i class="far fa-comment" aria-hidden="true"></i> ' . $comments . '</a>';
        } else {
            $comment_link = "";
        }

        if (get_theme_mod('total_blog_date', true)) {
            echo '<span class="entry-date published updated">' . $posted_on . '</span>'; // WPCS: XSS OK.
        }

        // Printed but hidden by CSS when off, as before, to keep the hentry author markup.
        $byline_class = get_theme_mod('total_blog_author', false) ? 'byline ht-byline' : 'byline';
        echo '<span class="' . esc_attr($byline_class) . '"> ' . $byline . '</span>'; // WPCS: XSS OK.

        if (get_theme_mod('total_blog_comment', true)) {
            echo $comment_link; // WPCS: XSS OK.
        }

        if (get_theme_mod('total_blog_reading_time', false)) {
            $minutes = total_reading_time();
            /* translators: %d: minutes needed to read the post */
            echo '<span class="ht-reading-time"><i class="far fa-clock" aria-hidden="true"></i> ' . esc_html(sprintf(_n('%d min read', '%d min read', $minutes, 'total'), $minutes)) . '</span>';
        }
    }

endif;

if (!function_exists('total_entry_footer')):

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function total_entry_footer() {
        // Hide category and tag text for pages.
        if ('post' == get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(', ');
            if ($categories_list) {
                printf(// WPCS: XSS OK.
                    /* translators: categories */
                    '<span class="cat-links">' . esc_html__('Posted in %s', 'total') . '</span>', $categories_list);
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', ', ');
            if ($tags_list) {
                printf(// WPCS: XSS OK.
                    /* translators: tags */
                    '<span class="tags-links">' . esc_html__('Tagged %s', 'total') . '</span>', $tags_list);
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(esc_html__('Leave a comment', 'total'), esc_html__('1 Comment', 'total'), esc_html__('% Comments', 'total'));
            echo '</span>';
        }

        edit_post_link(esc_html__('Edit', 'total'), '<span class="edit-link">', '</span>');
    }

endif;

if (!function_exists('total_entry_category')):

    /**
     * Prints HTML with meta information for the categories
     */
    function total_entry_category() {
        // Hide category and tag text for pages.
        if ('post' == get_post_type() && get_theme_mod('total_blog_category', true)) {
            $categories_list = get_the_category_list(', ');
            if ($categories_list) {
                echo '<i class="far fa-bookmark"></i>' . $categories_list; // WPCS: XSS OK.
            }
        }
    }

endif;

if (!function_exists('total_entry_tags')):

    /**
     * Prints the post's tags when Display Tags is on.
     */
    function total_entry_tags() {
        if ('post' != get_post_type() || !get_theme_mod('total_blog_tag', false)) {
            return;
        }

        $tags_list = get_the_tag_list('', ', ');
        if ($tags_list) {
            echo '<div class="entry-tags"><i class="fas fa-tags" aria-hidden="true"></i>' . $tags_list . '</div>'; // WPCS: XSS OK.
        }
    }

endif;

if (!function_exists('total_reading_time')):

    /**
     * Minutes needed to read the current post, at least one.
     */
    function total_reading_time() {
        $words = str_word_count(wp_strip_all_tags(strip_shortcodes(get_the_content())));
        $words_per_minute = absint(apply_filters('total_reading_words_per_minute', 200));

        return max(1, (int) ceil($words / max(1, $words_per_minute)));
    }

endif;
