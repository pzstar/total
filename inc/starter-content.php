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
			$starter_content = array(
				'posts' => array(
					'about' => array(
						'post_type' => 'page',
						'post_title' => _x('About Us', 'Theme starter content', 'total'),
						'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
					),
					'slider' => array(
						'post_type' => 'page',
						'post_title' => 'HELPING TO BUILD YOUR FUTURE',
						'thumbnail' => '{{slider}}',
						'post_content' => 'Secure your future with us. We are wordwide trusted for our service.'
					),
					'consulting' => array(
						'post_type' => 'page',
						'post_title' => 'Financial Consulting',
						'thumbnail' => '{{clock}}',
						'post_content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
					),
					'team' => array(
						'post_type' => 'page',
						'post_title' => 'Barak Stuart',
						'thumbnail' => '{{team-member}}',
						'post_content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
					),
					'testimonial' => array(
						'post_type' => 'page',
						'post_title' => 'Baraksfs Stuart',
						'post_content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
					),
					'contact',
					'blog',
					'sample_post' => array(
						'post_type' => 'post',
						'post_title' => __('Welcome to Our Blog', 'textdomain'),
						'post_content' => 'This is your first sample blog post. Edit or delete it.',
						'thumbnail' => '{{team-member}}', // reference attachment by key
					),
				),

				// Create the custom image attachments used as post thumbnails for pages.
				'attachments' => array(
					'slider' => array(
						'post_title' => _x('Slider', 'Theme starter content', 'total'),
						'file' => 'images/slider.jpg', // URL relative to the template directory.
					),
					'people' => array(
						'post_title' => _x('About Us', 'Theme starter content', 'total'),
						'file' => 'images/people.png', // URL relative to the template directory.
					),
					'team-member' => array(
						'post_title' => _x('Team Member', 'Theme starter content', 'total'),
						'file' => 'images/team.jpg', // URL relative to the template directory.
					),
					'total-logo' => array(
						'post_title' => _x('Total Logo', 'Theme starter content', 'total'),
						'file' => 'images/logo.png', // URL relative to the template directory.
					)
				),

				'options' => array(
					//'show_on_front' => 'page',
					//'page_on_front' => '{{home}}',
					//'page_for_posts' => '{{blog}}',
				),

				// Set the front page section theme mods to the IDs of the core-registered pages.
				'theme_mods' => array(
					'custom_logo' => '{{total-logo}}',
					'total_enable_frontpage' => true,
					'total_template_color' => '#009dea',
					'total_slider_page1' => '{{slider}}',
					'total_about_page' => '{{about}}',
					'total_about_progressbar_title1' => _x('Management', 'Theme starter content', 'total'),
					'total_about_progressbar_title2' => _x('Marketing', 'Theme starter content', 'total'),
					'total_about_progressbar_title3' => _x('Strategy', 'Theme starter content', 'total'),
					'total_about_progressbar_title4' => _x('Planning', 'Theme starter content', 'total'),
					'total_about_progressbar_title5' => _x('Deployment', 'Theme starter content', 'total'),
					'total_about_image' => get_template_directory_uri() . '/images/people.png',
					'total_featured_title' => _x('Why Choose Us', 'Theme starter content', 'total'),
					'total_featured_sub_title' => 'Auctor orci proin consequat magna natoque mattis nostra eiusmod esse lunga laboriosam luctus pulvinar tenetur fugito similique',
					'total_featured_page1' => '{{consulting}}',
					'total_featured_page2' => '{{consulting}}',
					'total_featured_page3' => '{{consulting}}',
					'total_featured_page_icon1' => 'fas fa-plane',
					'total_featured_page_icon2' => 'fa fa-money',
					'total_featured_page_icon3' => 'fa fa-lightbulb-o',
					'total_service_title' => _x('Our Services', 'Theme starter content', 'total'),
					'total_service_sub_title' => 'Auctor orci proin consequat magna natoque mattis nostra eiusmod esse lunga laboriosam luctus pulvinar tenetur fugito similique',
					'total_service_page1' => '{{consulting}}',
					'total_service_page2' => '{{consulting}}',
					'total_service_page3' => '{{consulting}}',
					'total_service_page4' => '{{consulting}}',
					'total_service_page5' => '{{consulting}}',
					'total_service_page6' => '{{consulting}}',
					'total_service_page_icon1' => 'fa fa-headphones',
					'total_service_page_icon2' => 'fa fa-pencil',
					'total_service_page_icon3' => 'fa fa-pie-chart',
					'total_service_page_icon4' => 'fa fa-line-chart',
					'total_service_page_icon5' => 'fa fa-balance-scale',
					'total_service_page_icon6' => 'fa fa-diamond',
					'total_team_title' => _x('Our Talented Members', 'Theme starter content', 'total'),
					'total_team_sub_title' => 'Auctor orci proin consequat magna natoque mattis nostra eiusmod esse lunga laboriosam luctus pulvinar tenetur fugito similique',
					'total_team_page1' => '{{team}}',
					'total_team_designation1' => _x('Chief Executive Officer', 'Theme starter content', 'total'),
					'total_team_page2' => '{{team}}',
					'total_team_designation2' => _x('Chief Executive Officer', 'Theme starter content', 'total'),
					'total_team_page3' => '{{team}}',
					'total_team_designation3' => _x('Chief Executive Officer', 'Theme starter content', 'total'),
					'total_team_page4' => '{{team}}',
					'total_team_designation4' => _x('Chief Executive Officer', 'Theme starter content', 'total'),
					'total_testimonial_title' => _x('From Our Clients', 'Theme starter content', 'total'),
					'total_testimonial_page' => array('{{team}}'),
					'total_counter_count1' => '450',
					'total_counter_title1' => _x('Projects Completed', 'Theme starter content', 'total'),
					'total_counter_icon1' => 'fa fa-briefcase',
					'total_counter_count2' => '10',
					'total_counter_title2' => _x('Awards Won', 'Theme starter content', 'total'),
					'total_counter_icon2' => 'fa fa-trophy',
					'total_counter_count3' => '124',
					'total_counter_title3' => _x('OnGoing Projects', 'Theme starter content', 'total'),
					'total_counter_icon3' => 'fa fa-suitcase',
					'total_counter_count4' => '500',
					'total_counter_title4' => _x('Employee Working', 'Theme starter content', 'total'),
					'total_counter_icon4' => 'fa fa-user-secret',
					'total_blog_title' => _x('Latest Blog', 'Theme starter content', 'total'),
					'total_blog_sub_title' => _x('Get information on everything.', 'Theme starter content', 'total'),
					'total_logo_title' => _x('Awesome Clients', 'Theme starter content', 'total'),
					'total_logo_sub_title' => _x('Get information on everything.', 'Theme starter content', 'total'),
					'total_logo_image' => '{{slider}},{{people}}',
					'total_cta_title' => _x('CREATE OWN BUSINESS WITH OUR IDEAS !', 'Theme starter content', 'total'),
					'total_cta_sub_title' => _x('Get information on everything.', 'Theme starter content', 'total'),
					'total_cta_button1_text' => _x('Read More', 'Theme starter content', 'total'),
					'total_cta_button1_link' => '#',
					'total_cta_button2_text' => _x('Purchase', 'Theme starter content', 'total'),
					'total_cta_button2_link' => '#',
				),
				'nav_menus' => array(
					'primary' => array(
						'name' => __('Primary Menu', 'total'),
						'items' => array(
							'link_home',
							'page_about',
							'page_blog',
							'page_contact',
							'post_news'
						),
					)
				),
			);

			$starter_content = apply_filters('total_starter_content', $starter_content);

			add_theme_support('starter-content', $starter_content);
		}

	}

endif;

return new Total_Starter_Content();