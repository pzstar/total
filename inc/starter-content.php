<?php
/**
 * Credit: Storefront Theme
 */

if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('Total_Starter_Content')):

	class Total_Starter_Content {

		public function __construct() {
			add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
			add_action('admin_notices', array($this, 'admin_notices'), 99);
			add_action('wp_ajax_total_dismiss_notice', array($this, 'dismiss_nux'));
			add_action('admin_post_total_starter_content', array($this, 'redirect_customizer'));
			add_action('after_setup_theme', array($this, 'starter_content'));
			add_action('after_setup_theme', array($this, 'resolve_list_theme_mods'), 101); // Just after the Customizer imports starter content, at 100.
		}


		public function enqueue_scripts() {
			global $wp_customize;

			if (isset($wp_customize) || true === (bool) get_option('total_nux_dismissed')) {
				return;
			}

			wp_enqueue_script('total-starter-admin-script', get_template_directory_uri() . '/js/starter.js', array('jquery'));

			$total_nux = array(
				'nonce' => wp_create_nonce('total_notice_dismiss')
			);

			wp_localize_script('total-starter-admin-script', 'totalNUX', $total_nux);
		}

		public function admin_notices() {
			if (true === (bool) get_option('total_nux_dismissed')) {
				return;
			}
			?>

			<div class="notice notice-info total-notice-nux is-dismissible">

				<div class="notice-content">
					<h2><?php esc_html_e('Thank you for installing the Total Theme', 'total'); ?></h2>
					<p>
						<?php
						echo esc_attr__('Let\'s get started by Customizing the website.', 'total');
						?>
					</p>
					<p></p>
					<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
						<input type="hidden" name="action" value="total_starter_content">
						<?php wp_nonce_field('total_starter_content'); ?>

						<input type="submit" class="button button-primary" value="<?php esc_attr_e('Let\'s go!', 'total'); ?>">
					</form>
					<p></p>
				</div>
			</div>
		<?php }

		/**
		 * AJAX dismiss notice.
		 *
		 */
		public function dismiss_nux() {
			$nonce = !empty($_POST['nonce']) ? $_POST['nonce'] : false;

			if (!$nonce || !wp_verify_nonce($nonce, 'total_notice_dismiss') || !current_user_can('manage_options')) {
				die();
			}

			update_option('total_nux_dismissed', true);
		}

		/**
		 * Redirects to the customizer with the correct variables.
		 *
		 */
		public function redirect_customizer() {
			check_admin_referer('total_starter_content');

			if (current_user_can('manage_options')) {
				// Dismiss notice.
				update_option('total_nux_dismissed', true);
			}

			$args = array('total_starter_content' => '1');

			wp_safe_redirect(add_query_arg($args, admin_url('customize.php')));

			die();
		}

		/**
		 * Starter content.
		 *
		 */
		public function starter_content() {
			// Define and register starter content to showcase the theme on new sites.
			// The WordPress.org theme preview (wp-themes.com) renders this too, so every {{key}} must exist and keys must be unique across posts and attachments.
			$starter_content = array(
				'posts' => array(
					'total-slide-1' => array(
						'post_type' => 'page',
						'post_title' => _x('Grow Your Business With Confidence', 'Theme starter content', 'total'),
						'post_content' => _x('Strategy, design and technology under one roof. We help ambitious teams turn ideas into results.', 'Theme starter content', 'total'),
						'thumbnail' => '{{total-slide-1-image}}',
					),
					'total-slide-2' => array(
						'post_type' => 'page',
						'post_title' => _x('Digital Solutions That Deliver', 'Theme starter content', 'total'),
						'post_content' => _x('From websites to marketing campaigns, we build the tools that bring you more customers.', 'Theme starter content', 'total'),
						'thumbnail' => '{{total-slide-2-image}}',
					),
					'total-about' => array(
						'post_type' => 'page',
						'post_title' => _x('About Our Agency', 'Theme starter content', 'total'),
						'post_content' => _x('We are a small team of strategists, designers and developers who have spent over a decade helping businesses grow online. We listen first, plan carefully and build websites and campaigns that are simple to use and easy to manage.', 'Theme starter content', 'total'),
					),
					'total-featured-1' => array(
						'post_type' => 'page',
						'post_title' => _x('Expert Consulting', 'Theme starter content', 'total'),
						'post_content' => _x('Get clear, practical advice from people who have solved the same problems for hundreds of clients.', 'Theme starter content', 'total'),
					),
					'total-featured-2' => array(
						'post_type' => 'page',
						'post_title' => _x('Creative Design', 'Theme starter content', 'total'),
						'post_content' => _x('Clean, modern designs that reflect your brand and guide visitors toward taking action.', 'Theme starter content', 'total'),
					),
					'total-featured-3' => array(
						'post_type' => 'page',
						'post_title' => _x('Reliable Support', 'Theme starter content', 'total'),
						'post_content' => _x('We stay with you after launch, with quick answers and regular updates whenever you need them.', 'Theme starter content', 'total'),
					),
					'total-service-1' => array(
						'post_type' => 'page',
						'post_title' => _x('Business Strategy', 'Theme starter content', 'total'),
						'post_content' => _x('Set clear goals and a realistic plan to reach them.', 'Theme starter content', 'total'),
					),
					'total-service-2' => array(
						'post_type' => 'page',
						'post_title' => _x('Web Development', 'Theme starter content', 'total'),
						'post_content' => _x('Fast, secure websites built to grow with your business.', 'Theme starter content', 'total'),
					),
					'total-service-3' => array(
						'post_type' => 'page',
						'post_title' => _x('Digital Marketing', 'Theme starter content', 'total'),
						'post_content' => _x('Search, social and email campaigns that reach the right people.', 'Theme starter content', 'total'),
					),
					'total-service-4' => array(
						'post_type' => 'page',
						'post_title' => _x('Brand Identity', 'Theme starter content', 'total'),
						'post_content' => _x('Logos, colors and messaging that make you memorable.', 'Theme starter content', 'total'),
					),
					'total-service-5' => array(
						'post_type' => 'page',
						'post_title' => _x('Data Analytics', 'Theme starter content', 'total'),
						'post_content' => _x('Understand your visitors and make decisions with confidence.', 'Theme starter content', 'total'),
					),
					'total-service-6' => array(
						'post_type' => 'page',
						'post_title' => _x('Customer Support', 'Theme starter content', 'total'),
						'post_content' => _x('Friendly help from a real person whenever you need it.', 'Theme starter content', 'total'),
					),
					'total-team-1' => array(
						'post_type' => 'page',
						'post_title' => _x('Michael Carter', 'Theme starter content', 'total'),
						'post_content' => _x('Michael leads the agency and has guided more than 300 projects from first idea to launch.', 'Theme starter content', 'total'),
						'thumbnail' => '{{total-team-image-1}}',
					),
					'total-team-2' => array(
						'post_type' => 'page',
						'post_title' => _x('Sophia Bennett', 'Theme starter content', 'total'),
						'post_content' => _x('Sophia keeps every project on time and every client up to date.', 'Theme starter content', 'total'),
						'thumbnail' => '{{total-team-image-2}}',
					),
					'total-team-3' => array(
						'post_type' => 'page',
						'post_title' => _x('Daniel Brooks', 'Theme starter content', 'total'),
						'post_content' => _x('Daniel turns complex requirements into fast, dependable websites.', 'Theme starter content', 'total'),
						'thumbnail' => '{{total-team-image-3}}',
					),
					'total-team-4' => array(
						'post_type' => 'page',
						'post_title' => _x('Olivia Hayes', 'Theme starter content', 'total'),
						'post_content' => _x('Olivia shapes the look and feel of every brand we work with.', 'Theme starter content', 'total'),
						'thumbnail' => '{{total-team-image-4}}',
					),
					'total-testimonial-1' => array(
						'post_type' => 'page',
						'post_title' => _x('James Walker', 'Theme starter content', 'total'),
						'post_content' => _x('The team understood our goals from the very first meeting. Our new website doubled the number of enquiries within three months.', 'Theme starter content', 'total'),
						'thumbnail' => '{{total-testimonial-image-1}}',
					),
					'total-testimonial-2' => array(
						'post_type' => 'page',
						'post_title' => _x('Ryan Mitchell', 'Theme starter content', 'total'),
						'post_content' => _x('Professional, responsive and genuinely creative. Every question got a quick, clear answer and the result looks fantastic.', 'Theme starter content', 'total'),
						'thumbnail' => '{{total-testimonial-image-2}}',
					),
					'total-testimonial-3' => array(
						'post_type' => 'page',
						'post_title' => _x('Emma Collins', 'Theme starter content', 'total'),
						'post_content' => _x('They made the whole process easy. We now update the site ourselves in minutes, and our customers love the new design.', 'Theme starter content', 'total'),
						'thumbnail' => '{{total-testimonial-image-3}}',
					),
					'total-post-1' => array(
						'post_type' => 'post',
						'post_title' => _x('5 Tips for Planning Your New Website', 'Theme starter content', 'total'),
						'post_content' => '<!-- wp:paragraph --><p>' . _x('A new website is a big investment, and a little planning at the start saves a lot of time later. Before you think about colors or layouts, write down what you want visitors to do: call you, book a meeting or buy a product.', 'Theme starter content', 'total') . '</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>' . _x('Next, list the pages you really need, gather your text and photos early, and look at a few sites you like for inspiration. With clear goals and content ready, the design and build go faster and the result works harder for your business.', 'Theme starter content', 'total') . '</p><!-- /wp:paragraph -->',
						'thumbnail' => '{{total-post-image-1}}',
					),
					'total-post-2' => array(
						'post_type' => 'post',
						'post_title' => _x('Right Tools for Your Team','Theme starter content', 'total'),
						'post_content' => '<!-- wp:paragraph --><p>' . _x('The right tools make work feel easier, while the wrong ones slow everyone down. Start with the problems your team faces every day, not with the most popular app.', 'Theme starter content', 'total') . '</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>' . _x('Try one tool at a time, give people a few weeks to get used to it, and ask for honest feedback. Keep the tools that save time and drop the ones nobody uses.', 'Theme starter content', 'total') . '</p><!-- /wp:paragraph -->',
						'thumbnail' => '{{total-post-image-2}}',
					),
					'total-post-3' => array(
						'post_type' => 'post',
						'post_title' => _x('Why Great Teams Make Great Businesses', 'Theme starter content', 'total'),
						'post_content' => '<!-- wp:paragraph --><p>' . _x('Every successful project we have delivered had one thing in common: a team that trusted each other. Skills matter, but clear communication and shared goals matter more.', 'Theme starter content', 'total') . '</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>' . _x('Take time to celebrate small wins, make it easy for people to ask questions, and give everyone a clear view of where the business is heading. Happy teams build products customers love.', 'Theme starter content', 'total') . '</p><!-- /wp:paragraph -->',
						'thumbnail' => '{{total-post-image-3}}',
					),
					'contact',
					'blog',
				),

				// Images bundled with the theme, used as featured images for the pages above.
				'attachments' => array(
					'total-slide-1-image' => array(
						'post_title' => _x('Our Team', 'Theme starter content', 'total'),
						'file' => 'images/starter/banner-1.jpg',
					),
					'total-slide-2-image' => array(
						'post_title' => _x('Workspace', 'Theme starter content', 'total'),
						'file' => 'images/starter/banner-2.jpg',
					),
					'total-team-image-1' => array(
						'post_title' => _x('Michael Carter', 'Theme starter content', 'total'),
						'file' => 'images/starter/person-1.jpg',
					),
					'total-team-image-2' => array(
						'post_title' => _x('Sophia Bennett', 'Theme starter content', 'total'),
						'file' => 'images/starter/person-2.jpg',
					),
					'total-team-image-3' => array(
						'post_title' => _x('Daniel Brooks', 'Theme starter content', 'total'),
						'file' => 'images/starter/person-3.jpg',
					),
					'total-team-image-4' => array(
						'post_title' => _x('Olivia Hayes', 'Theme starter content', 'total'),
						'file' => 'images/starter/person-4.jpg',
					),
					'total-testimonial-image-1' => array(
						'post_title' => _x('James Walker', 'Theme starter content', 'total'),
						'file' => 'images/starter/person-5.jpg',
					),
					'total-testimonial-image-2' => array(
						'post_title' => _x('Ryan Mitchell', 'Theme starter content', 'total'),
						'file' => 'images/starter/person-6.jpg',
					),
					'total-testimonial-image-3' => array(
						'post_title' => _x('Emma Collins', 'Theme starter content', 'total'),
						'file' => 'images/starter/person-7.jpg',
					),
					'total-post-image-1' => array(
						'post_title' => _x('Desk with a computer and keyboard', 'Theme starter content', 'total'),
						'file' => 'images/starter/banner-1.jpg',
					),
					'total-post-image-2' => array(
						'post_title' => _x('Laptop and tablet on a desk', 'Theme starter content', 'total'),
						'file' => 'images/starter/banner-2.jpg',
					),
					'total-post-image-3' => array(
						'post_title' => _x('Team talking together', 'Theme starter content', 'total'),
						'file' => 'images/starter/banner-1.jpg',
					),
					'total-client-1' => array(
						'post_title' => _x('Zentrix logo', 'Theme starter content', 'total'),
						'file' => 'images/starter/client-1.png',
					),
					'total-client-2' => array(
						'post_title' => _x('Lumora logo', 'Theme starter content', 'total'),
						'file' => 'images/starter/client-2.png',
					),
					'total-client-3' => array(
						'post_title' => _x('Peakvale logo', 'Theme starter content', 'total'),
						'file' => 'images/starter/client-3.png',
					),
					'total-client-4' => array(
						'post_title' => _x('Orbitly logo', 'Theme starter content', 'total'),
						'file' => 'images/starter/client-4.png',
					),
					'total-client-5' => array(
						'post_title' => _x('Cobaltix logo', 'Theme starter content', 'total'),
						'file' => 'images/starter/client-5.png',
					),
					'total-client-6' => array(
						'post_title' => _x('Solvana logo', 'Theme starter content', 'total'),
						'file' => 'images/starter/client-6.png',
					),
					'total-logo' => array(
						'post_title' => _x('Site logo', 'Theme starter content', 'total'),
						'file' => 'images/starter/logo.png',
					),
				),

				'options' => array(),

				// Set the front page section theme mods to the IDs of the pages above.
				// The logo alone, with the site title and tagline hidden. The WordPress.org preview can't show a custom logo, as it has no real attachments, so its header has no branding.
				'theme_mods' => array(
					'custom_logo' => '{{total-logo}}',
					'total_hide_title' => true,
					'total_hide_tagline' => true,
					'total_enable_frontpage' => true,
					'total_template_color' => '#009dea',
					'total_slider_page1' => '{{total-slide-1}}',
					'total_slider_page2' => '{{total-slide-2}}',
					'total_about_page' => '{{total-about}}',
					'total_about_progressbar_title1' => _x('Strategy', 'Theme starter content', 'total'),
					'total_about_progressbar_percentage1' => 90,
					'total_about_progressbar_title2' => _x('Design', 'Theme starter content', 'total'),
					'total_about_progressbar_percentage2' => 85,
					'total_about_progressbar_title3' => _x('Development', 'Theme starter content', 'total'),
					'total_about_progressbar_percentage3' => 95,
					'total_about_progressbar_title4' => _x('Marketing', 'Theme starter content', 'total'),
					'total_about_progressbar_percentage4' => 80,
					'total_about_progressbar_disable5' => true,
					'total_about_image' => get_template_directory_uri() . '/images/starter/people.png',
					'total_featured_title' => _x('Why Choose Us', 'Theme starter content', 'total'),
					'total_featured_sub_title' => _x('We combine experience, creativity and care to deliver work that makes a real difference to your business.', 'Theme starter content', 'total'),
					'total_featured_page1' => '{{total-featured-1}}',
					'total_featured_page2' => '{{total-featured-2}}',
					'total_featured_page3' => '{{total-featured-3}}',
					'total_featured_page_icon1' => 'fas fa-lightbulb',
					'total_featured_page_icon2' => 'fas fa-pencil-ruler',
					'total_featured_page_icon3' => 'fas fa-headset',
					'total_portfolio_title' => _x('Our Recent Work', 'Theme starter content', 'total'),
					'total_portfolio_sub_title' => _x('A selection of projects we have designed and built for our clients.', 'Theme starter content', 'total'),
					'total_service_left_bg' => get_template_directory_uri() . '/images/starter/banner-2.jpg',
					'total_service_title' => _x('Our Services', 'Theme starter content', 'total'),
					'total_service_sub_title' => _x('Everything you need to plan, build and grow your business online, all in one place.', 'Theme starter content', 'total'),
					'total_service_page1' => '{{total-service-1}}',
					'total_service_page2' => '{{total-service-2}}',
					'total_service_page3' => '{{total-service-3}}',
					'total_service_page4' => '{{total-service-4}}',
					'total_service_page5' => '{{total-service-5}}',
					'total_service_page6' => '{{total-service-6}}',
					'total_service_page_icon1' => 'fas fa-chess',
					'total_service_page_icon2' => 'fas fa-code',
					'total_service_page_icon3' => 'fas fa-bullhorn',
					'total_service_page_icon4' => 'fas fa-palette',
					'total_service_page_icon5' => 'fas fa-chart-line',
					'total_service_page_icon6' => 'fas fa-life-ring',
					'total_team_title' => _x('Meet Our Team', 'Theme starter content', 'total'),
					'total_team_sub_title' => _x('The people who will plan, design and build your project.', 'Theme starter content', 'total'),
					'total_team_page1' => '{{total-team-1}}',
					'total_team_designation1' => _x('Founder & CEO', 'Theme starter content', 'total'),
					'total_team_page2' => '{{total-team-2}}',
					'total_team_designation2' => _x('Project Manager', 'Theme starter content', 'total'),
					'total_team_page3' => '{{total-team-3}}',
					'total_team_designation3' => _x('Lead Developer', 'Theme starter content', 'total'),
					'total_team_page4' => '{{total-team-4}}',
					'total_team_designation4' => _x('Creative Director', 'Theme starter content', 'total'),
					'total_counter_bg' => get_template_directory_uri() . '/images/starter/banner-1.jpg',
					'total_counter_title' => _x('Our Achievements', 'Theme starter content', 'total'),
					'total_counter_sub_title' => _x('A few numbers we are proud of.', 'Theme starter content', 'total'),
					'total_counter_count1' => '450',
					'total_counter_title1' => _x('Projects Completed', 'Theme starter content', 'total'),
					'total_counter_icon1' => 'fas fa-briefcase',
					'total_counter_count2' => '25',
					'total_counter_title2' => _x('Awards Won', 'Theme starter content', 'total'),
					'total_counter_icon2' => 'fas fa-trophy',
					'total_counter_count3' => '120',
					'total_counter_title3' => _x('Happy Clients', 'Theme starter content', 'total'),
					'total_counter_icon3' => 'fas fa-smile',
					'total_counter_count4' => '15',
					'total_counter_title4' => _x('Years of Experience', 'Theme starter content', 'total'),
					'total_counter_icon4' => 'fas fa-calendar-check',
					'total_testimonial_title' => _x('What Our Clients Say', 'Theme starter content', 'total'),
					'total_testimonial_sub_title' => _x('Real feedback from businesses we have helped grow.', 'Theme starter content', 'total'),
					'total_testimonial_page' => array('{{total-testimonial-1}}', '{{total-testimonial-2}}', '{{total-testimonial-3}}'),
					'total_blog_title' => _x('Latest News', 'Theme starter content', 'total'),
					'total_blog_sub_title' => _x('Tips, stories and updates from our team.', 'Theme starter content', 'total'),
					'total_logo_title' => _x('Trusted by Great Companies', 'Theme starter content', 'total'),
					'total_logo_sub_title' => _x('We are proud to work with businesses of every size.', 'Theme starter content', 'total'),
					'total_logo_image' => array('{{total-client-1}}', '{{total-client-2}}', '{{total-client-3}}', '{{total-client-4}}', '{{total-client-5}}', '{{total-client-6}}'),
					'total_cta_bg' => get_template_directory_uri() . '/images/starter/banner-2.jpg',
					'total_cta_title' => _x('Ready to Start Your Project?', 'Theme starter content', 'total'),
					'total_cta_sub_title' => _x('Tell us about your goals and we will get back to you within one business day.', 'Theme starter content', 'total'),
					'total_cta_button1_text' => _x('Get Started', 'Theme starter content', 'total'),
					'total_cta_button1_link' => '#',
					'total_cta_button2_text' => _x('Contact Us', 'Theme starter content', 'total'),
					'total_cta_button2_link' => '#',
				),
				'nav_menus' => array(
					'primary' => array(
						'name' => __('Primary Menu', 'total'),
						'items' => array(
							'link_home',
							'total_about' => array(
								'type' => 'post_type',
								'object' => 'page',
								'object_id' => '{{total-about}}',
							),
							'page_blog',
							'page_contact',
						),
					)
				),
			);

			$starter_content = apply_filters('total_starter_content', $starter_content);

			add_theme_support('starter-content', $starter_content);
		}

		/**
		 * Fills in the list settings (testimonial pages, client logos) when the Customizer imports starter content.
		 *
		 * Core resolves a theme mod only when it holds a single {{symbol}}, and skips the setting otherwise.
		 * Here each symbol is matched to the post or attachment core created for it, which core names after its title.
		 */
		public function resolve_list_theme_mods() {
			global $wp_customize, $pagenow;

			if (!get_option('fresh_site') || 'customize.php' !== $pagenow || !$wp_customize instanceof WP_Customize_Manager) {
				return;
			}

			$starter_content = get_theme_starter_content();
			$post_values = $wp_customize->unsanitized_post_values();
			$changeset_data = $wp_customize->changeset_data();

			if (empty($starter_content['theme_mods']) || empty($post_values['nav_menus_created_posts']) || !is_array($changeset_data)) {
				return;
			}

			$created_ids = array();
			foreach ((array) $post_values['nav_menus_created_posts'] as $post_id) {
				$created_ids[get_post_type($post_id) . ':' . get_post_meta($post_id, '_customize_draft_post_name', true)] = $post_id;
			}

			// The Clients Logo gallery saves a comma separated string; the testimonial pages an array.
			$list_theme_mods = array(
				'total_testimonial_page' => false,
				'total_logo_image' => true,
			);

			foreach ($list_theme_mods as $name => $comma_separated) {
				// Leave a value the user has already set in this changeset alone.
				if (!isset($starter_content['theme_mods'][$name]) || !is_array($starter_content['theme_mods'][$name]) || isset($changeset_data[$name])) {
					continue;
				}

				$ids = array();
				foreach ($starter_content['theme_mods'][$name] as $value) {
					if (!preg_match('/^{{(?P<symbol>.+)}}$/', $value, $matches)) {
						continue;
					}

					$symbol = $matches['symbol'];
					if (isset($starter_content['posts'][$symbol])) {
						$key = $starter_content['posts'][$symbol]['post_type'] . ':' . sanitize_title($starter_content['posts'][$symbol]['post_title']);
					} elseif (isset($starter_content['attachments'][$symbol])) {
						$key = 'attachment:' . sanitize_title($starter_content['attachments'][$symbol]['post_title']);
					} else {
						continue;
					}

					if (isset($created_ids[$key])) {
						$ids[] = $created_ids[$key];
					}
				}

				if ($ids) {
					$wp_customize->set_post_value($name, $comma_separated ? implode(',', $ids) : $ids);
				}
			}
		}

	}

endif;

return new Total_Starter_Content();