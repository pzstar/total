<div class="free-vs-pro-info-wrap">
    <div class="free-vs-pro-info">
        <h4><?php echo esc_html_x('ONE TIME PAYMENT', 'free vs pro content', 'total'); ?></h4>
        <p><?php echo esc_html_x('No renewal needed', 'free vs pro content', 'total'); ?></p>
    </div>

    <div class="free-vs-pro-info">
        <h4><?php echo esc_html_x('UNLIMITED DOMAIN LICENCE', 'free vs pro content', 'total'); ?></h4>
        <p><?php echo esc_html_x('Use in as many websites as you need', 'free vs pro content', 'total'); ?></p>
    </div>

    <div class="free-vs-pro-info">
        <h4><?php echo esc_html_x('FREE UPDATES FOR LIFETIME', 'free vs pro content', 'total'); ?></h4>
        <p><?php echo esc_html_x('Keep up to date', 'free vs pro content', 'total'); ?></p>
    </div>
</div>

<?php
/*
 *  Feature rows carry the .feature-row class and are numbered by a CSS counter
 *  rather than by a number typed into each label. The numbers used to be part
 *  of the translatable strings, which meant inserting a feature renumbered -
 *  and so invalidated the translation of - every row below it.
 */
?>
<table class="comparison-table">
    <tr>
        <td>
            <span><?php echo esc_html_x('Upgrade to Pro', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Everything below, on as many sites as you like, for a single payment. No renewals, and updates stay free for life.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td colspan="2">
            <a target="_blank" class="buy-pro-btn" href="https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-freevspro-top&utm_campaign=total-upgrade"><?php echo esc_html_x('Buy Now ($65 only)', 'free vs pro content', 'total'); ?></a>
        </td>
    </tr>
    <tr>
        <th><?php echo esc_html_x('Features', 'free vs pro content', 'total'); ?></th>
        <th><?php echo esc_html_x('Free', 'free vs pro content', 'total'); ?></th>
        <th><?php echo esc_html_x('Pro', 'free vs pro content', 'total'); ?></th>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('One Click Demo Import', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('With one click demo-import, you can install the demo content with just one click.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><?php echo esc_html_x('7 Demos', 'free vs pro content', 'total'); ?></td>
        <td><?php echo esc_html_x('8 More Demos', 'free vs pro content', 'total'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Maintenance Mode', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/articles/setting-up-maintenance-mode-page/" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('The premium version has an inbuilt option to add the Maintenance(under construction) Screen with countdown time. You don\'t need to install additional plugins.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Elementor Compatible', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Fan of Pagebuilder? No problem, with premium version you can create your website with Elementor. Elementor provides you with unlimited possibilities to create the website of your imagination.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'total'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'total'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Elementor Widgets', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#I.ElementorModule" target="_blank"><?php echo esc_html_x('View Demo', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('Total Plus adds its own Elementor widgets - sliders, featured, highlight, service, portfolio, team, testimonial, counter, pricing, tabs, news, logo carousel, progress bar, animated text, animation layers, video popup and more. Each one can be switched off individually in Theme Options.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><?php echo esc_html_x('24 Widgets', 'free vs pro content', 'total'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Elementor Section Extenders', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#III.ElementorExtender" target="_blank"><?php echo esc_html_x('View Demo', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('You can extend the Elementor section with 9 interactive extenders - Parallax Background, Parallax Animation, Parallax Effect, Colors Animation, Water Ripples, Particles Background, Background Effect, Float Effect and Transform.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Elementor Sticky Column and Sticky Container', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Make any Elementor column or container stick as the visitor scrolls, with control over the offset and the screen sizes it applies to.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Elementor Template/Section Importer', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/articles/import-elementor-template/" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('Import Elementor Templates and Sections with just one click without having to import the whole website.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Multiple Header Layouts and Settings', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/wordpress-theme/total/#totalplus-headers" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('The premium version gives the option to choose from 6 header layouts. Additionally, it allows changing the header background color, text color, header height, and more.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Menu CTA Button', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Add a call to action button next to the menu, with its own text, link, colors, border radius and typography.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Mega Menu', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/articles/create-mega-menu/" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('The Premium version has an inbuilt mega menu that will allow you to create beautiful big menus in no time.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Page Banner (Title Bar) Settings', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Choose from 3 page banner styles and set the banner background, height, alignment, breadcrumb and typography for the whole site.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Advanced Typography Options for Specific Sections', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#TypographySettings" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('The free version sets the typography of the body, of all the headings together and of the menu. The premium version adds separate typography for H1 to H6, home page section titles, site title and tagline, top header, sub menu, page banner, slider caption, sidebar and footer. Both versions pick from the same 1400+ Google Fonts and web safe non-Google fonts.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'total'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'total'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Color Options', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('The free version has a basic color option but the premium version has advanced color options that allow customizing the color everywhere like header, post/page, footer, and home page sections.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'total'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'total'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Section Reorder', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Option to organize how the home page section appears.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Unlimited Blocks for Each Section', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('The premium version allows adding an unlimited block for all the sections on the home page. This includes a slider, featured block, highlight block, service, team, testimonial, counter, pricing, tabs, news and update block, and logo. Moreover, it has the option to choose the number of columns to show in each row.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Video Background, Image Motion Background, Gradient Background', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/articles/configure-advanced-settings/#totalplus-background-types" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('The premium version has advanced background options that include an option to choose from a video background, moving background, or gradient background.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Sections', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#HomePageSection/Settings" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('Total Plus adds 7 more sections - Highlight, Pricing, News & Update, Tab, Contact, and the two Custom Sections you can build with Elementor.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td>11</td>
        <td>18</td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Blocks - Style Variations', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Option to switch the style of the home page blocks.', 'free vs pro content', 'total'); ?></p>
            <ul>
                <li><a href="https://demo.hashthemes.com/total-plus/featured-block/" target="_blank"><?php echo esc_html_x('Featured block - 8 styles', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/highlights-block/" target="_blank"><?php echo esc_html_x('Highlight Block - 4 styles', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/service-toggle-block/" target="_blank"><?php echo esc_html_x('Service Block - 4 styles', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/el-portfolio-masonary/" target="_blank"><?php echo esc_html_x('Portfolio - 6 styles', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/counter-block/" target="_blank"><?php echo esc_html_x('Counter - 4 styles', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/team-block/" target="_blank"><?php echo esc_html_x('Team - 6 styles', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/testimonial-block/" target="_blank"><?php echo esc_html_x('Testimonial - 4 styles', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/pricing-block/" target="_blank"><?php echo esc_html_x('Pricing - 4 styles', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/news-block/" target="_blank"><?php echo esc_html_x('News & Update block - 3 styles', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/tab-block/" target="_blank"><?php echo esc_html_x('Tabs - 5 styles', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/blog-section/" target="_blank"><?php echo esc_html_x('Blog block - 4 styles', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/logo-carousel/" target="_blank"><?php echo esc_html_x('Client Logo - 4 styles', 'free vs pro content', 'total'); ?></a></li>
            </ul>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Shape Dividers', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/articles/configure-advanced-settings/#totalplus-shape-divider" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('The theme has 16 shape dividers that you can choose from to create a nice transition effect between sections.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Sections with Full Screen Height', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/articles/configure-advanced-settings/#totalplus-full-window-height" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('A home page section that covers the full screen despite having less content. It is useful for a one-page website.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Slider', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#HomeSlider" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('The premium version has an option for the Simple Slider, Revolution Slider, and Single Banner Image with advanced customization options.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'total'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'total'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Top Header Bar', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#TopHeader" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('Total Plus comes with an option for the top bar where you can add a contact address, social icon, language picker, or any informative text.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Social Links', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Set your social profiles once in the customizer and reuse them in the top header, menu, footer, author box and the social icon widget.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Add New Widget Area', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/articles/add-new-widget-area/" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('Create unlimited widget areas using our premium version. You can create new widget areas for placing widgets.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Custom Widgets', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/wordpress-theme/total/#totalplus-widgets" target="_blank"><?php echo esc_html_x('View Demo', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('With the custom widgets and the SiteOrigin Page Builder, you can play to create various website layouts.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td>3</td>
        <td>25</td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Switch Off What You Do Not Use', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Theme Options lets you enable or disable each widget, Elementor widget, section extender and icon library individually, so the site only loads the assets it actually uses.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('PreLoader Option', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#PreloaderOption" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('The loading screen appears until the website is fully loaded. The premium version has the option to choose from 16 preloaders or add your preloader image as well.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Admin and Login Logo', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Replace the WordPress logo on the login screen with your own, so the site stays branded for the client from the moment they sign in.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Sidebar Layout Options', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#SidebarSettings" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php printf(esc_html_x('The free version sets the sidebar layout on each post and page individually. The premium version adds a site wide default, 3 sidebar styles and the option to %1$schoose unique sidebar widgets for individual posts/pages%2$s.', 'free vs pro content', 'total'), '<a href="https://hashthemes.com/articles/change-the-sidebar-layout-and-choose-unique-widget/" target="_blank">', '</a>'); ?></p>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'total'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'total'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Advanced Blog Settings', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#Blog/SinglePostSettings" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('The Premium version has an advanced blog page setting option. The option allows you to show or hide each element of the blog.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'total'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'total'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Blog Layouts', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('The premium version gives the option to choose from 4 differently designed blog layouts.', 'free vs pro content', 'total'); ?></p>
            <ul>
                <li><a href="https://demo.hashthemes.com/total-plus/total/blog/" target="_blank"><?php echo esc_html_x('Blog Layout 1 Demo', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/creative-agency/blog/" target="_blank"><?php echo esc_html_x('Blog Layout 2 Demo', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/construction/blog/" target="_blank"><?php echo esc_html_x('Blog Layout 3 Demo', 'free vs pro content', 'total'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/one-page/blog/" target="_blank"><?php echo esc_html_x('Blog Layout 4 Demo', 'free vs pro content', 'total'); ?></a></li>
            </ul>
        </td>
        <td>1</td>
        <td>4</td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Reorder and Show/Hide Elements of Single Post', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#SinglePostSettings" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('Change the position(reorder) the single post elements like post meta, featured image, content, category, tags, and social share icons and place them in the order you want. You can disable it individually if you do not want to show it.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Author Box, Social Share, and Related Post at the Bottom of the Single Post', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Shows the short intro of the post author along with social icons, major Social Share Icons without using a plugin, and related posts by category.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Unique Header Background for Each Post and Page', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/articles/changing-the-title-bar-background/" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('The premium version has the option to add a unique Title Bar(Header) background for each post and page.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Different Background and Text Color for Each Post and Page', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/articles/change-the-background-and-text-color/" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('The premium version comes with the option to configure the background and text color of each page and post on the website. It will allow you to choose the custom background color, background image, and text color for any page or post you like.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Hide Header and Footer for Each Post and Page', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/articles/hide-header-and-footer/" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('You can show/hide the header and footer for each of the pages/posts. It is helpful if you are running an infographic website.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Advanced Footer Setting', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#FooterSection" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('The premium version has the option to choose from 5 different footer styles. Apart from that, you can set the number of footer columns and resize them as you want with dragging column resizer.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Remove Footer Credit Text', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('The premium version easily allows you to remove or change the footer credit text or replace it with the widget.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Google Map Option', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Shows the physical location with an interactive contact form.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Icon Picker', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('The premium theme has 4 icon packs with more than 5000+ icons. They can be used on the various sections of the Home Page, WordPress Widget Blocks, and Elementor Modules. Each pack can be switched off in Theme Options so only the icon fonts you use are loaded.', 'free vs pro content', 'total'); ?></p>
            <ul>
                <li><?php echo esc_html_x('i) Ico Font', 'free vs pro content', 'total'); ?></li>
                <li><?php echo esc_html_x('ii) FontAwesome', 'free vs pro content', 'total'); ?></li>
                <li><?php echo esc_html_x('iii) Essential Icon', 'free vs pro content', 'total'); ?></li>
                <li><?php echo esc_html_x('iv) Material Icon', 'free vs pro content', 'total'); ?></li>
            </ul>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'total'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'total'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('WooCommerce Compatible', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('The premium version has enhanced WooCommerce options like adding a cart icon in the menu, product page settings, sidebar layout settings, and more.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'total'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'total'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('GDPR Compliance & Cookies Consent', 'free vs pro content', 'total'); ?> - <a href="https://hashthemes.com/articles/configuring-gdpr-settings/" target="_blank"><?php echo esc_html_x('Detail', 'free vs pro content', 'total'); ?></a></span>
            <p><?php echo esc_html_x('Neither version collects any visitor data on its own. The premium version adds the cookie consent bar, with your own consent text, buttons and a link to your privacy policy.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/no.png'); ?>" alt="No"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('RTL Ready', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Both the free and premium versions are fully compatible with RTL (Right to left) languages like Arabic.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Multilingual Ready', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('The Premium Version is fully compatible with WPML and Polylang. Create the website in multiple languages.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><?php echo esc_html_x('Partially', 'free vs pro content', 'total'); ?></td>
        <td><?php echo esc_html_x('Fully', 'free vs pro content', 'total'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Translation Ready', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Both the free and pro versions are fully translation ready.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Search Engine Optimization', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Follows best SEO practices so that your website always ranks higher in Search Engines.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Major Browser Compatible', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('The website runs smoothly in all major browsers.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Responsive - Mobile Friendly', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Adapts to any screen size and displays beautifully.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Fast and Friendly Support', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('For the Premium theme, the user will get a reply in 10 hours or less.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
        <td><img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/yes.png'); ?>" alt="Yes"></td>
    </tr>
    <tr>
        <td>
            <span><?php echo esc_html_x('Upgrade to Pro', 'free vs pro content', 'total'); ?></span>
            <p><?php echo esc_html_x('Everything below, on as many sites as you like, for a single payment. No renewals, and updates stay free for life.', 'free vs pro content', 'total'); ?></p>
        </td>
        <td colspan="2">
            <a target="_blank" class="buy-pro-btn" href="https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-freevspro-bottom&utm_campaign=total-upgrade"><?php echo esc_html_x('Buy Now ($65 only)', 'free vs pro content', 'total'); ?></a>
        </td>
    </tr>
</table>
