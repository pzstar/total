<?php
/**
 * Template part for displaying single posts.
 *
 * @package Total
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
        <div class="single-entry-meta">
            <?php total_posted_on(); ?>
        </div><!-- .entry-meta -->

        <?php
        $total_single_display_featured_image = get_theme_mod('total_single_display_featured_image');
        if ($total_single_display_featured_image && has_post_thumbnail()) {
            echo '<div class="single-featured-img">';
            the_post_thumbnail('full');
            echo '</div>';
        }

        the_content();
        ?>

        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'total'),
            'after' => '</div>',
        ));

        total_entry_tags();
        ?>
    </div><!-- .entry-content -->

    <?php
    if (get_theme_mod('total_single_post_navigation', false)) {
        the_post_navigation(array(
            'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous Post', 'total') . '</span><span class="nav-title">%title</span>',
            'next_text' => '<span class="nav-subtitle">' . esc_html__('Next Post', 'total') . '</span><span class="nav-title">%title</span>',
        ));
    }
    ?>

</article><!-- #post-## -->