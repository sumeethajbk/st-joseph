<?php

if (!function_exists('stjoseph_setup')) {

	function stjoseph_setup()
	{

		load_theme_textdomain('stjoseph', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');


		add_theme_support('title-tag');

		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);


		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1568, 9999);

		register_nav_menus(
			array(
				'primary' => esc_html__('Primary menu', 'stjoseph'),
				'footer_one'  => __('Footer menu One', 'stjoseph'),
				'footer_two'  => __('Footer menu Two', 'stjoseph'),
				'footer_three'  => __('Footer menu Three', 'stjoseph'),
			)
		);

		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);
	}
}
add_action('after_setup_theme', 'stjoseph_setup');

/**
 * Move jQuery to the footer. 
 */
function wpse_173601_enqueue_scripts()
{
	wp_scripts()->add_data('jquery', 'group', 1);
	wp_scripts()->add_data('jquery-core', 'group', 1);
	wp_scripts()->add_data('jquery-migrate', 'group', 1);
}
add_action('wp_enqueue_scripts', 'wpse_173601_enqueue_scripts');

function stjoseph_scripts()
{
	$p_cache = rand(1000, 100000);

	wp_enqueue_style('stjoseph-style', get_template_directory_uri() . '/style.css', array(), '' . $p_cache . '');
}
add_action('wp_enqueue_scripts', 'stjoseph_scripts');

if (function_exists('acf_add_options_sub_page')) {
	acf_add_options_sub_page(array(
		'title' => 'Header Options',
		'parent' => 'themes.php',
	));
}

if (function_exists('acf_add_options_sub_page')) {
	acf_add_options_sub_page(array(
		'title' => 'Footer Options',
		'parent' => 'themes.php',
	));
}

function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter('big_image_size_threshold', '__return_false');

function st_joseph_scripts()
{
	// Enqueue jQuery
	wp_enqueue_script('jquery');

	// Enqueue slick.js
	wp_enqueue_script('slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.8.1', true);

	// Enqueue custom-slick.js
	wp_enqueue_script('custom-slick-js', get_template_directory_uri() . '/js/custom-slick.js', array('slick-js'), '1.0', true);

	// Enqueue jquery.selectBox.js
	wp_enqueue_script('selectBox-js', get_template_directory_uri() . '/js/jquery.selectBox.js', array('jquery'), '1.2', true);

	// Enqueue custom-script.js
	wp_enqueue_script('custom-script-js', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), '1.0', true);

	// Enqueue jquery.magnific-popup.js
	wp_enqueue_script('jquery-magnific-popup-js', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array('jquery'), '1.0', true);

	// Enqueue custom-popup.js
	wp_enqueue_script('custom-popup-js', get_template_directory_uri() . '/js/custom-popup.js', array('jquery'), '1.0', true);

	// Enqueue iframe-bg.js
	wp_enqueue_script('iframe-js', get_template_directory_uri() . '/js/iframe-bg.js', array('jquery'), '1.1', true);

	// Enqueue custom-iframe.js
	wp_enqueue_script('custom-iframe-js', get_template_directory_uri() . '/js/custom-iframe.js', array('jquery'), '1.1', true);

	// Enqueue Counter.js
	wp_enqueue_script('Counter-js', get_template_directory_uri() . '/js/Counter.js', array('jquery'), '1.1', true);

	// Enqueue slick.css
	wp_enqueue_style('slick-css', get_template_directory_uri() . '/css/slick.css', array(), '1.8.1', 'all');

	// Enqueue jquery.selectBox.css
	wp_enqueue_style('selectBox-css', get_template_directory_uri() . '/css/jquery.selectBox.css', array(), '1.2', 'all');

	//Enqueue style.css
	//wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');

	// Enqueue magnific-popup.css
	wp_enqueue_style('magnific-popup-css', get_template_directory_uri() . '/css/magnific-popup.css', array(), '1.2', 'all');

	// Enqueue contact-page.css
	if (is_page_template('templates/contact.php')) {
		wp_enqueue_style('contact-page-style', get_template_directory_uri() . '/css/contact-page.css', array(), '1.0', 'all');
	}

	// Enqueue campaign-access-request.css
	if (is_page_template('templates/campaign-access-request.php')) {
		wp_enqueue_style('campaign-access-request-style', get_template_directory_uri() . '/css/campaign-access-request.css', array(), '1.0', 'all');
	}

	// Enqueue team.css
	if (is_page_template('templates/team.php')) {
		wp_enqueue_style('team-style', get_template_directory_uri() . '/css/team.css', array(), '1.0', 'all');
	}

	// Enqueue /our-thanks.css
	if (is_page_template('templates/our-thanks.php')) {
		wp_enqueue_style('our-thanks-style', get_template_directory_uri() . '/css/our-thanks.css', array(), '1.0', 'all');
	}

	// Enqueue /home.css
	if (is_page_template('templates/home.php')) {
		wp_enqueue_style('home-style', get_template_directory_uri() . '/css/home.css', array(), '1.0', 'all');
	}

	// Enqueue /default-page.css 
	global $template;
	if (basename($template) === 'page.php') {
		wp_enqueue_style('default-style', get_template_directory_uri() . '/css/default-page.css', array(), '1.0', 'all');
	}

	// Enqueue /why-give.css
	if (is_page_template('templates/why-give.php')) {
		wp_enqueue_style('why-give-style', get_template_directory_uri() . '/css/why-give.css', array(), '1.0', 'all');

		// Enqueue jQuery UI script
		wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js', array('jquery'), '1.12.1', true);

		// Enqueue jQuery UI stylesheet
		wp_enqueue_style('jquery-ui-css', get_template_directory_uri() . '/css/jquery-ui.css', array(), '1.12.1', 'all');
	}

	// Enqueue /our-story.css
	if (is_page_template('templates/our-story.php')) {
		wp_enqueue_style('our-story-style', get_template_directory_uri() . '/css/our-story.css', array(), '1.0', 'all');
	}

	// Enqueue /campaign.css
	if (is_page_template('templates/campaign.php')) {
		wp_enqueue_style('campaign-style', get_template_directory_uri() . '/css/campaign.css', array(), '1.0', 'all');
		wp_enqueue_script('custom-campaign-login-popup', get_template_directory_uri() . '/js/custom-campaign-login-popup.js', array('jquery'), '', true);
		wp_enqueue_script('custom-campaign-popup', get_template_directory_uri() . '/js/custom-campaign-popup.js', array('jquery'), '', true);
	}

	// Enqueue /community-events.css
	if (is_category()) {
		wp_enqueue_style('community-events-style', get_template_directory_uri() . '/css/community-events.css', array(), '1.0', 'all');
		wp_enqueue_script('load-more-js', get_template_directory_uri() . '/js/load-more.js', array('jquery'), '1.0', true);
	}

	if (is_search()) {
		wp_enqueue_style('community-events-style', get_template_directory_uri() . '/css/community-events.css', array(), '1.0', 'all');
		wp_enqueue_script('load-more-js', get_template_directory_uri() . '/js/load-more.js', array('jquery'), '1.0', true);
	}

	// Enqueue /post.css
	if (is_single()) {
		wp_enqueue_style('post-style', get_template_directory_uri() . '/css/post.css', array(), '1.0', 'all');
	}

	// Enqueue /your-impact.css
	if (is_page_template('templates/your-impact.php')) {
		wp_enqueue_style('your-impact-style', get_template_directory_uri() . '/css/your-impact.css', array(), '1.0', 'all');
		wp_enqueue_script('load-more-stories', get_template_directory_uri() . '/js/load-more-stories.js', array('jquery'), '1.0', true);

	}

	wp_enqueue_script('patient-stories-filter', get_template_directory_uri() . "/js/patient-stories-filter.js", array(), '1.2', true);
	wp_localize_script('patient-stories-filter', 'ajax_object', array(
		'ajaxUrl' => admin_url('admin-ajax.php')
	));


	wp_enqueue_script('patient-stories-show-more', get_template_directory_uri() . '/js/patient-stories-show-more.js', array('jquery'), '1.2', true);

	wp_localize_script('patient-stories-show-more', 'ajax_object', array(
		'ajax_url' => admin_url('admin-ajax.php'),
	));
}

add_action('wp_enqueue_scripts', 'st_joseph_scripts');



require_once get_template_directory() . '/ajax-functions.php';


add_action('frm_after_create_entry', 'process_stories_submission', 30, 2);

function process_stories_submission($entry_id, $form_id)
{
	if ($form_id == 5) {
		create_stories_post($entry_id);
	}
}

function create_stories_post($entry_id)
{

	$form_data = FrmEntry::getOne($entry_id);

	if (empty($form_data)) {
		error_log('Error: Form data not found for entry ID ' . $entry_id);
		return;
	}

	$stories_heading = FrmEntryMeta::get_entry_meta_by_field($entry_id, 31);

	$stories_post = array(
		'post_title'    => $stories_heading,
		'post_status'   => 'draft',
		'post_type'     => 'story',
		'cache_results'  => false,
	);

	$post_id = wp_insert_post($stories_post);

	$field_id = 44;
	$stories_category = FrmEntryMeta::get_entry_meta_by_field($entry_id, $field_id);
	$field_id = 29;
	$stories_profile_image = FrmEntryMeta::get_entry_meta_by_field($entry_id, $field_id);
	$field_id = 30;
	$stories_description = FrmEntryMeta::get_entry_meta_by_field($entry_id, $field_id);
	$file_path = '/www/stjoseph_401/public/wp-content/themes/stjoseph/test.txt';
	file_put_contents($file_path, $stories_profile_image);

	if (!empty($stories_category)) {
		wp_set_object_terms($post_id, $stories_category, 'stories_category');
	}

	update_field('stories_short_introduction', $stories_description, $post_id);
	update_field('stories_desktop_image', $stories_profile_image, $post_id);
}


function add_description_to_menu($item_output, $item, $depth, $args)
{

	if (strlen($item->description) > 0) {
		$item_output .= sprintf('<span class="description">%s</span>', esc_html($item->description));
	}
	return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_description_to_menu', 10, 4);

function get_stjoseph_banner()
{

	$banner_image_2x = get_field('banner_image_2x');
	$banner_image_t_2x = get_field('banner_image_tablet_2x');
	$banner_image_m_2x = get_field('banner_image_mobile_2x');
	$banner_image_tablet_2x = $banner_image_t_2x ? $banner_image_t_2x : $banner_image_2x;
	$banner_image_mobile_2x = $banner_image_m_2x ? $banner_image_m_2x : $banner_image_2x;
	$banner_h = get_field('banner_heading');
	if (empty($banner_h)) {
		$banner_heading = get_the_title();
	} else {
		$banner_heading = $banner_h;
	}
	$banner_button_text = get_field('banner_button_text');
	$banner_button_link = get_field('banner_button_link');
	if (is_page(array(2))) {
		$banner_main_cls = "";
	} else {
		$banner_main_cls = "banner-center";
	}

	if (!empty($banner_image_2x || $banner_heading)) { ?>
		<section class="hero-banner-section pos-relative">
			<?php if (!empty($banner_image_2x)) { ?>
				<picture class="object-fit background-bg">
					<source srcset="<?php echo $banner_image_2x['url']; ?>" media="(min-width: 1024px)" />
					<source srcset="<?php echo $banner_image_tablet_2x['url']; ?>" media="(min-width: 768px)" />
					<img srcset="<?php echo $banner_image_mobile_2x['url']; ?>" alt="<?php echo $banner_image_2x['alt']; ?>" />
				</picture>
			<?php } ?>
			<div class="container md">
				<div class="hero-banner-main flex flex-vcenter">
					<div class="hero-banner-text">
						<h1><?php echo $banner_heading; ?></h1>
						<?php if (!empty($banner_button_text && $banner_button_link)) { ?>
							<a href="<?php echo $banner_button_link; ?>" class="button"><?php echo $banner_button_text; ?></a>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="progress-bg"><span class="color1"></span><span class="color2"></span><span class="color3"></span><span class="color4"></span></div>
		</section>
	<?php }
}

function render_micro_cta_shortcode()
{

	if (is_category()) {
		$micro_cta_module_image = get_field('default_page_micro_cta_module_image', 'category_3');
		$micro_cta_module_color_picker = get_field('default_page_micro_cta_module_background_color', 'category_3');
		$micro_cta_module_text_color = get_field('default_page_micro_cta_module_text_color', 'category_3');
		$micro_cta_module_button_color = get_field('default_page_micro_cta_module_button_color', 'category_3');
		$micro_cta_module_button_text_color = get_field('default_page_micro_cta_module_button_text_color', 'category_3');
		$micro_cta_module_sub_heading = get_field('default_page_micro_cta_module_sub_heading', 'category_3');
		$micro_cta_module_heading = get_field('default_page_micro_cta_module_heading', 'category_3');
		$micro_cta_module_button_text = get_field('default_page_micro_cta_module_button_text', 'category_3');
		$micro_cta_module_button_link = get_field('default_page_micro_cta_module_button_link', 'category_3');
		$micro_cta_module_link_text = get_field('default_page_micro_cta_module_link_text', 'category_3');
		$micro_cta_module_link = get_field('default_page_micro_cta_module_link', 'category_3');
	} else {
		$micro_cta_module_image = get_field('default_page_micro_cta_module_image');
		$micro_cta_module_color_picker = get_field('default_page_micro_cta_module_background_color');
		$micro_cta_module_text_color = get_field('default_page_micro_cta_module_text_color');
		$micro_cta_module_button_color = get_field('default_page_micro_cta_module_button_color');
		$micro_cta_module_button_text_color = get_field('default_page_micro_cta_module_button_text_color');
		$micro_cta_module_sub_heading = get_field('default_page_micro_cta_module_sub_heading');
		$micro_cta_module_heading = get_field('default_page_micro_cta_module_heading');
		$micro_cta_module_button_text = get_field('default_page_micro_cta_module_button_text');
		$micro_cta_module_button_link = get_field('default_page_micro_cta_module_button_link');
		$micro_cta_module_link_text = get_field('default_page_micro_cta_module_link_text');
		$micro_cta_module_link = get_field('default_page_micro_cta_module_link');
		$micro_cta_module_button_text_color_one  = get_field('default_page_micro_cta_module_button_text_color_one');
		$micro_cta_module_button_color_one  = get_field('default_page_micro_cta_module_button_color_one');
	}

	if (!empty($micro_cta_module_sub_heading) || !empty($micro_cta_module_heading) || (!empty($micro_cta_module_button_text) && !empty($micro_cta_module_button_link)) || (!empty($micro_cta_module_link_text) && !empty($micro_cta_module_link))) {
		ob_start();
	?>
		<section class="micro-cta pos-relative">
			<div class="container">
				<div class="bg" style="background-color: <?php echo $micro_cta_module_color_picker; ?>"></div>
				<div class="micro-cta-wrap flex">
					<div class="micro-cta-lt">
						<?php if (!empty($micro_cta_module_sub_heading)) { ?>
							<span class="optional-text" style="color: <?php echo $micro_cta_module_text_color; ?>"><?php echo $micro_cta_module_sub_heading; ?></span>
						<?php } ?>
						<?php if (!empty($micro_cta_module_heading)) { ?>
							<div class="h4" style="color: <?php echo $micro_cta_module_text_color; ?>"><?php echo $micro_cta_module_heading; ?></div>
						<?php } ?>
						<div class="micro-cta-btns flex flex-vcenter">
							<?php if (!empty($micro_cta_module_button_text) && !empty($micro_cta_module_button_link)) { ?>
								<a href="<?php echo $micro_cta_module_button_link; ?>" class="button btn-white" style=" background:<?php echo $micro_cta_module_button_color; ?>; color: <?php echo $micro_cta_module_button_text_color; ?>"><?php echo $micro_cta_module_button_text; ?></a>
							<?php } ?>
							<?php if (!empty($micro_cta_module_link_text) && !empty($micro_cta_module_link)) { ?>
								<a href="<?php echo $micro_cta_module_link; ?>" class="button trans-btn" style="background:<?php echo $micro_cta_module_button_color_one; ?>; color: <?php echo $micro_cta_module_button_text_color_one; ?>"><?php echo $micro_cta_module_link_text; ?></a>
							<?php } ?>
						</div>
					</div>
					<?php if (!empty($micro_cta_module_image)) { ?>
						<div class="micro-cta-rt">
							<div class="micro-cta-img">
								<figure class="object-fit">
									<img src="<?php echo $micro_cta_module_image['url']; ?>" alt="<?php echo $micro_cta_module_image['alt']; ?>" title="<?php echo $micro_cta_module_image['title']; ?>" />
								</figure>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
	<?php
		return ob_get_clean();
	}
}
add_shortcode('micro_cta', 'render_micro_cta_shortcode');


function render_images_shortcode()
{
	$image_repeater = get_field('default_page_image_repeater');

	if ($image_repeater) {
		ob_start();
	?>
		<div class="default-slider">
			<span class="counter-info"></span>
			<div class="def-slider">
				<?php foreach ($image_repeater as $image_item) { ?>
					<?php $image = $image_item['default_page_image']; ?>
					<?php if (!empty($image)) { ?>
						<div class="default-slide">
							<figure class="object-fit">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
							</figure>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	<?php
		return ob_get_clean();
	}
}
add_shortcode('images', 'render_images_shortcode');


function render_cta_shortcode()
{
	$primary_cta_shortcode_desktop_image = get_field('default_page_primary_cta_shortcode_desktop_image');
	$primary_cta_shortcode_mobile_image = get_field('default_page_primary_cta_shortcode_mobile_image');
	$primary_cta_shortcode_sub_heading = get_field('default_page_primary_cta_shortcode_sub_heading');
	$primary_cta_shortcode_heading = get_field('default_page_primary_cta_shortcode_heading');
	$primary_cta_shortcode_button_text = get_field('default_page_primary_cta_shortcode_button_text');
	$primary_cta_shortcode_button_link = get_field('default_page_primary_cta_shortcode_button_link');
	$primary_cta_shortcode_link_text = get_field('default_page_primary_cta_shortcode_link_text');
	$primary_cta_shortcode_link = get_field('default_page_primary_cta_shortcode_link');
	$primary_cta_shortcode_background_color = get_field('default_page_primary_cta_shortcode_background_color');
	$primary_cta_shortcode_text_color = get_field('default_page_primary_cta_shortcode_text_color');
	$primary_cta_shortcode_button_color = get_field('default_page_primary_cta_shortcode_button_color');
	$primary_cta_shortcode_button_text_color = get_field('default_page_primary_cta_shortcode_button_text_color');


	if (!empty($primary_cta_shortcode_desktop_image) || !empty($primary_cta_shortcode_mobile_image) || !empty($primary_cta_shortcode_sub_heading) || !empty($primary_cta_shortcode_heading) || !empty($primary_cta_shortcode_button_text) || !empty($primary_cta_shortcode_button_link) || !empty($primary_cta_shortcode_link_text) || !empty($primary_cta_shortcode_link)) {
		ob_start();
	?>
		<section class="fluid-cta-module fluid-width pos-relative">
			<div class="fluid-cta-main">
				<?php if ($primary_cta_shortcode_mobile_image ||  $primary_cta_shortcode_desktop_image) {
					$primary_cta_shortcode_mobile_image = $primary_cta_shortcode_mobile_image ? $primary_cta_shortcode_mobile_image : $primary_cta_shortcode_desktop_image;
					$primary_cta_shortcode_desktop_image = $primary_cta_shortcode_desktop_image ? $primary_cta_shortcode_desktop_image : $primary_cta_shortcode_mobile_image; ?>
					<div class="fluid-cta-thumb">
						<picture class="object-fit">
							<source srcset="<?php echo $primary_cta_shortcode_desktop_image['url']; ?>" media="(min-width: 1024px)">
							<source srcset="<?php echo $primary_cta_shortcode_desktop_image['url']; ?>" media="(min-width: 768px)">
							<img src="<?php echo $primary_cta_shortcode_mobile_image['url']; ?>" alt="CTA Thumb" title="CTA Thumb" />
						</picture>
						<div class="ripple">
							<div class="pulse1">&nbsp;</div>
							<div class="pulse2">&nbsp;</div>
						</div>
					</div>
				<?php } ?>
				<div class="fluid-cta-txt">
					<div class="fluid-cta-inner-txt pos-relative">
						<div class="bg pos-absolute" style="background:<?php echo $primary_cta_shortcode_background_color; ?>;"></div>
						<?php if (!empty($primary_cta_shortcode_sub_heading)) { ?>
							<span class="optional-text" style="color: <?php echo $primary_cta_shortcode_text_color; ?>"><?php echo $primary_cta_shortcode_sub_heading; ?></span>
						<?php } ?>
						<?php if (!empty($primary_cta_shortcode_heading)) { ?>
							<h3 style="color: <?php echo $primary_cta_shortcode_text_color; ?>"><?php echo $primary_cta_shortcode_heading; ?></h3>
						<?php } ?>
						<div class="fluid-cta-btns">
							<?php if (!empty($primary_cta_shortcode_button_text) && !empty($primary_cta_shortcode_button_link)) { ?>
								<a href="<?php echo $primary_cta_shortcode_button_link; ?>" class="button btn-white" style=" background:<?php echo $primary_cta_shortcode_button_color; ?>; color: <?php echo $primary_cta_shortcode_button_text_color; ?>"><?php echo $primary_cta_shortcode_button_text; ?></a>
							<?php } ?>
							<?php if (!empty($primary_cta_shortcode_link_text) && !empty($primary_cta_shortcode_link)) { ?>
								<a href="<?php echo $primary_cta_shortcode_link; ?>" class="readmore" style="color: <?php echo $primary_cta_shortcode_text_color; ?>"><?php echo $primary_cta_shortcode_link_text; ?></a>
							<?php } ?>
						</div>
					</div>
					<div class="ripple">
						<div class="pulse1">&nbsp;</div>
						<div class="pulse2">&nbsp;</div>
					</div>
				</div>
			</div>
		</section>
	<?php
		return ob_get_clean();
	}
}
add_shortcode('cta-short-code', 'render_cta_shortcode');

function render_supporting_link_shortcode()
{
	$supporting_link_color_picker = get_field('default_page_supporting_link_background_color');
	$supporting_link_text_color = get_field('default_page_supporting_link_text_color');
	$supporting_link_description = get_field('default_page_supporting_link_description');
	$supporting_link_link_text = get_field('default_page_supporting_link_link_text');
	$supporting_link_link = get_field('default_page_supporting_link_link');

	if (!empty($supporting_link_description) || (!empty($supporting_link_link_text) && !empty($supporting_link_link))) {
		ob_start();
	?>
		<section class="single-note">
			<div class="container">
				<div class="bg" style="background:<?php echo $supporting_link_color_picker; ?>;"></div>
				<?php if (!empty($supporting_link_description) || (!empty($supporting_link_link_text) && !empty($supporting_link_link))) { ?>
					<div class="single-note-wrap">
						<?php if (!empty($supporting_link_description)) { ?>
							<?php echo $supporting_link_description; ?>
						<?php } ?>
						<?php if (!empty($supporting_link_link_text) && !empty($supporting_link_link)) { ?>
							<a href="<?php echo $supporting_link_link; ?>" class="readmore" style="color: <?php echo $supporting_link_text_color; ?>"><?php echo $supporting_link_link_text; ?></a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</section>
		<?php
		return ob_get_clean();
	}
}
add_shortcode('supporting_link', 'render_supporting_link_shortcode');


function render_testimonial_shortcode()
{
	$selected_testimonials = get_field('default_page_select_testimonial_one');

	if ($selected_testimonials) {
		ob_start();
		foreach ($selected_testimonials as $testimonial) {
		?>
			<section class="single-quote">
				<div class="container">
					<div class="bg"></div>
					<div class="single-quote-wrap">
						<?php echo get_field('testimonial_post_review', $testimonial->ID); ?>
						<div class="quote-by">
							<div class="quote-line">&nbsp;</div>
							<span class="quote-name"><?php echo get_field('testimonial_post_name', $testimonial->ID); ?></span>
							<span class="quote-pos"><?php echo get_field('testimonial_post_position_title_or_credential', $testimonial->ID); ?></span>
						</div>
					</div>
				</div>
			</section>
		<?php
		}
		return ob_get_clean();
	}
}
add_shortcode('testimonial_shortcode', 'render_testimonial_shortcode');


function render_faq_shortcode()
{
	$faq_items = get_field('default_page_faq_repeater');

	if ($faq_items) {
		ob_start();
		?>
		<section class="accordion-module">
			<div class="container">
				<div class="accordion-main">
					<?php foreach ($faq_items as $faq_item) { ?>
						<?php
						$question = $faq_item['default_page_faq_question'];
						$answer = $faq_item['default_page_faq_answer'];
						?>
						<?php if ($question && $answer) { ?>
							<div class="accordion">
								<div class="accordion-item">
									<?php if ($question) { ?>
										<a href="#" class="accordion-heading">
											<span class="title"><?php echo $question; ?></span>
										</a>
									<?php }
									if ($question) { ?>
										<div class="content">
											<?php echo $answer; ?>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</section>
	<?php
		return ob_get_clean();
	}
}
add_shortcode('faq', 'render_faq_shortcode');


function render_why_give_micro_cta_shortcode()
{
	$micro_cta_module_image = get_field('why_give_micro_cta_module_image');
	$micro_cta_module_color_picker = get_field('why_give_micro_cta_module_background_color');
	$micro_cta_module_text_color = get_field('why_give_micro_cta_module_text_color');
	$micro_cta_module_button_color = get_field('why_give_micro_cta_module_button_color');
	$micro_cta_module_button_text_color = get_field('why_give_micro_cta_module_button_text_color');
	$micro_cta_module_sub_heading = get_field('why_give_micro_cta_module_sub_heading');
	$micro_cta_module_heading = get_field('why_give_micro_cta_module_heading');
	$micro_cta_module_button_text = get_field('why_give_micro_cta_module_button_text');
	$micro_cta_module_button_link = get_field('why_give_micro_cta_module_button_link');
	$micro_cta_module_link_text = get_field('why_give_micro_cta_module_link_text');
	$micro_cta_module_link = get_field('why_give_micro_cta_module_link');

	if (!empty($micro_cta_module_sub_heading) || !empty($micro_cta_module_heading) || !empty($micro_cta_module_button_text) || !empty($micro_cta_module_button_link) || !empty($micro_cta_module_link_text) || !empty($micro_cta_module_link)) {
		ob_start();
	?>
		<section class="micro-cta pos-relative">
			<div class="container">
				<div class="bg" style="background-color: <?php echo $micro_cta_module_color_picker; ?>"></div>
				<div class="micro-cta-wrap flex">
					<div class="micro-cta-lt">
						<?php if (!empty($micro_cta_module_sub_heading)) { ?>
							<span class="optional-text" style="color: <?php echo $micro_cta_module_text_color; ?>"><?php echo $micro_cta_module_sub_heading; ?></span>
						<?php } ?>
						<?php if (!empty($micro_cta_module_heading)) { ?>
							<div class="h4" style="color: <?php echo $micro_cta_module_text_color; ?>"><?php echo $micro_cta_module_heading; ?></div>
						<?php } ?>
						<div class="micro-cta-btns flex flex-vcenter">
							<?php if (!empty($micro_cta_module_button_text) && !empty($micro_cta_module_button_link)) { ?>
								<a href="<?php echo $micro_cta_module_button_link; ?>" class="button btn-white" style=" background:<?php echo $micro_cta_module_button_color; ?>; color: <?php echo $micro_cta_module_button_text_color; ?>"><?php echo $micro_cta_module_button_text; ?></a>
							<?php } ?>
							<?php if (!empty($micro_cta_module_link_text) && !empty($micro_cta_module_link)) { ?>
								<a href="<?php echo $micro_cta_module_link; ?>" class="button trans-btn" style="background:<?php echo $micro_cta_module_button_color; ?>; color: <?php echo $micro_cta_module_button_text_color; ?>"><?php echo $micro_cta_module_link_text; ?></a>
							<?php } ?>
						</div>
					</div>
					<?php if (!empty($micro_cta_module_image)) { ?>
						<div class="micro-cta-rt">
							<div class="micro-cta-img">
								<figure class="object-fit">
									<img src="<?php echo $micro_cta_module_image['url']; ?>" alt="<?php echo $micro_cta_module_image['alt']; ?>" title="<?php echo $micro_cta_module_image['title']; ?>" />
								</figure>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
	<?php
		return ob_get_clean();
	}
}
add_shortcode('Micro_cta', 'render_why_give_micro_cta_shortcode');


function render_why_give_images_shortcode()
{
	$image_repeater = get_field('why_give_image_repeater');

	if ($image_repeater) {
		ob_start();
	?>
		<div class="default-slider">
			<span class="counter-info"></span>
			<div class="def-slider">
				<?php foreach ($image_repeater as $image_item) { ?>
					<?php $image = $image_item['why_give_image']; ?>
					<?php if (!empty($image)) { ?>
						<div class="default-slide">
							<figure class="object-fit">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
							</figure>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	<?php
		return ob_get_clean();
	}
}
add_shortcode('Images', 'render_why_give_images_shortcode');

function render_why_give_supporting_link_shortcode()
{
	$supporting_link_color_picker = get_field('why_give_supporting_link_background_color');
	$supporting_link_text_color = get_field('why_give_supporting_link_text_color');
	$supporting_link_description = get_field('why_give_supporting_link_description');
	$supporting_link_link_text = get_field('why_give_supporting_link_text');
	$supporting_link_link = get_field('why_give_supporting_link');

	if (!empty($supporting_link_description) && !empty($supporting_link_link_text) && !empty($supporting_link_link)) {
		ob_start();
	?>
		<section class="single-note">
			<div class="container">
				<div class="bg" style="background:<?php echo $supporting_link_color_picker; ?>;"></div>
				<?php if (!empty($supporting_link_description) && !empty($supporting_link_link_text) && !empty($supporting_link_link)) { ?>
					<div class="single-note-wrap">
						<?php if (!empty($supporting_link_description)) { ?>
							<?php echo $supporting_link_description; ?>
						<?php } ?>
						<?php if (!empty($supporting_link_link_text) && !empty($supporting_link_link)) { ?>
							<a href="<?php echo $supporting_link_link; ?>" class="readmore" style="color: <?php echo $supporting_link_text_color; ?>"><?php echo $supporting_link_link_text; ?></a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</section>
	<?php
		return ob_get_clean();
	}
}
add_shortcode('Supporting_link', 'render_why_give_supporting_link_shortcode');

function render_why_give_cta_shortcode()
{
	$primary_cta_shortcode_desktop_image = get_field('why_give_call_to_action_shortcode_image');
	$primary_cta_shortcode_mobile_image = get_field('why_give_call_to_action_shortcode_mobile_image');
	$primary_cta_shortcode_background_color = get_field('why_give_call_to_action_shortcode_background_color');
	$primary_cta_shortcode_text_color = get_field('why_give_call_to_action_shortcode_text_color');
	$primary_cta_shortcode_sub_heading = get_field('why_give_call_to_action_shortcode_sub_heading');
	$primary_cta_shortcode_heading = get_field('why_give_call_to_action_shortcode_heading');
	$primary_cta_shortcode_button_text = get_field('why_give_call_to_action_shortcode_button_text');
	$primary_cta_shortcode_button_link = get_field('why_give_call_to_action_shortcode_button_link');
	$primary_cta_shortcode_button_color = get_field('why_give_call_to_action_shortcode_button_color');
	$primary_cta_shortcode_button_text_color = get_field('why_give_call_to_action_shortcode_button_text_color');
	$primary_cta_shortcode_link_text = get_field('why_give_call_to_action_shortcode_link_text');
	$primary_cta_shortcode_link = get_field('why_give_call_to_action_shortcode__link');

	if (!empty($primary_cta_shortcode_desktop_image) || !empty($primary_cta_shortcode_mobile_image) || !empty($primary_cta_shortcode_sub_heading) || !empty($primary_cta_shortcode_heading) || !empty($primary_cta_shortcode_button_text) || !empty($primary_cta_shortcode_button_link) || !empty($primary_cta_shortcode_link_text) || !empty($primary_cta_shortcode_link)) {
		ob_start();
	?>
		<section class="fluid-cta-module fluid-width pos-relative">
			<div class="fluid-cta-main">
				<?php if ($primary_cta_shortcode_mobile_image ||  $primary_cta_shortcode_desktop_image) {
					$primary_cta_shortcode_mobile_image = $primary_cta_shortcode_mobile_image ? $primary_cta_shortcode_mobile_image : $primary_cta_shortcode_desktop_image;
					$primary_cta_shortcode_desktop_image = $primary_cta_shortcode_desktop_image ? $primary_cta_shortcode_desktop_image : $primary_cta_shortcode_mobile_image; ?>
					<div class="fluid-cta-thumb">
						<picture class="object-fit">
							<source srcset="<?php echo $primary_cta_shortcode_desktop_image['url']; ?>" media="(min-width: 1024px)">
							<source srcset="<?php echo $primary_cta_shortcode_desktop_image['url']; ?>" media="(min-width: 768px)">
							<img src="<?php echo $primary_cta_shortcode_mobile_image['url']; ?>" alt="CTA Thumb" title="CTA Thumb" />
						</picture>
						<div class="ripple">
							<div class="pulse1">&nbsp;</div>
							<div class="pulse2">&nbsp;</div>
						</div>
					</div>
				<?php } ?>
				<div class="fluid-cta-txt">
					<div class="fluid-cta-inner-txt pos-relative">
						<div class="bg pos-absolute" style="background:<?php echo $primary_cta_shortcode_background_color; ?>;"></div>
						<?php if (!empty($primary_cta_shortcode_sub_heading)) { ?>
							<span class="optional-text" style="color: <?php echo $primary_cta_shortcode_text_color; ?>"><?php echo $primary_cta_shortcode_sub_heading; ?></span>
						<?php } ?>
						<?php if (!empty($primary_cta_shortcode_heading)) { ?>
							<h3 style="color: <?php echo $primary_cta_shortcode_text_color; ?>"><?php echo $primary_cta_shortcode_heading; ?></h3>
						<?php } ?>
						<div class="fluid-cta-btns">
							<?php if (!empty($primary_cta_shortcode_button_text) && !empty($primary_cta_shortcode_button_link)) { ?>
								<a href="<?php echo $primary_cta_shortcode_button_link; ?>" class="button btn-white" style=" background:<?php echo $primary_cta_shortcode_button_color; ?>; color: <?php echo $primary_cta_shortcode_button_text_color; ?>"><?php echo $primary_cta_shortcode_button_text; ?></a>
							<?php } ?>
							<?php if (!empty($primary_cta_shortcode_link_text) && !empty($primary_cta_shortcode_link)) { ?>
								<a href="<?php echo $primary_cta_shortcode_link; ?>" class="readmore" style=" color: <?php echo $primary_cta_shortcode_text_color; ?>"><?php echo $primary_cta_shortcode_link_text; ?></a>
							<?php } ?>
						</div>
					</div>
					<div class="ripple">
						<div class="pulse1">&nbsp;</div>
						<div class="pulse2">&nbsp;</div>
					</div>
				</div>
			</div>
		</section>
		<?php
		return ob_get_clean();
	}
}
add_shortcode('Cta_short_code', 'render_why_give_cta_shortcode');



function render_why_give_testimonial_shortcode()
{
	$selected_testimonials = get_field('why_give_select_testimonial_one');
	$why_give_testimonial_text_color = get_field('why_give_testimonial_text_color');
	$why_give_testimonial_background_color = get_field('why_give_testimonial_background_color');

	if ($selected_testimonials) {
		ob_start();
		foreach ($selected_testimonials as $testimonial) {
		?>
			<section class="single-quote">
				<div class="container">
					<div class="bg" style="background:<?php echo $why_give_testimonial_background_color; ?>;"></div>
					<div class="single-quote-wrap" style="color: <?php echo $why_give_testimonial_text_color; ?>">
						<?php echo get_field('testimonial_post_review', $testimonial->ID); ?>
						<div class="quote-by">
							<div class="quote-line">&nbsp;</div>
							<span class="quote-name" style="color: <?php echo $why_give_testimonial_text_color; ?>"><?php echo get_field('testimonial_post_name', $testimonial->ID); ?></span>
							<span class="quote-pos" style="color: <?php echo $why_give_testimonial_text_color; ?>"><?php echo get_field('testimonial_post_position_title_or_credential', $testimonial->ID); ?></span>
						</div>
					</div>
				</div>
			</section>
		<?php
		}
		return ob_get_clean();
	} else {
		$testimonial_query = new WP_Query(array(
			'post_type' => 'testimonial',
			'posts_per_page' => 1,
		));

		if ($testimonial_query->have_posts()) {
			$testimonial_query->the_post();
			ob_start();
		?>
			<section class="single-quote">
				<div class="container">
					<div class="bg" style="background:<?php echo $why_give_testimonial_background_color; ?>;"></div>
					<div class="single-quote-wrap" style="color: <?php echo $why_give_testimonial_text_color; ?>">
						<?php the_field('testimonial_post_review'); ?>
						<div class="quote-by">
							<div class="quote-line">&nbsp;</div>
							<span class="quote-name" style="color: <?php echo $why_give_testimonial_text_color; ?>"><?php the_field('testimonial_post_name'); ?></span>
							<span class="quote-pos" style="color: <?php echo $why_give_testimonial_text_color; ?>"><?php the_field('testimonial_post_position_title_or_credential'); ?></span>
						</div>
					</div>
				</div>
			</section>
		<?php
			wp_reset_postdata();
			return ob_get_clean();
		}
	}
}
add_shortcode('Testimonial_shortcode', 'render_why_give_testimonial_shortcode');


function render_why_give_faq_shortcode()
{
	$faq_items = get_field('why_give_faq_repeater');

	if ($faq_items) {
		ob_start();
		?>
		<section class="accordion-module">
			<div class="container">
				<div class="accordion-main">
					<?php foreach ($faq_items as $faq_item) { ?>
						<?php
						$question = $faq_item['why_give_faq_question'];
						$answer = $faq_item['why_give_faq_answer'];
						?>
						<?php if ($question && $answer) { ?>
							<div class="accordion">
								<div class="accordion-item">
									<?php if ($question) { ?>
										<a href="#" class="accordion-heading">
											<span class="title"><?php echo $question; ?></span>
										</a>
									<?php }
									if ($question) { ?>
										<div class="content">
											<?php echo $answer; ?>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</section>
	<?php
		return ob_get_clean();
	}
}
add_shortcode('Faq', 'render_why_give_faq_shortcode');

function render_why_give_financial_statement_shortcode()
{
	$fs_image_one = get_field('why_give_financial_statements_image_one');
	$fs_image_two = get_field('why_give_financial_statements_image_two');
	$fs_sub_heading = get_field('why_give_financial_statements_sub_heading');
	$fs_heading = get_field('why_give_financial_statements_heading');
	$fs_button_text = get_field('why_give_financial_statements_button_text');
	$fs_button_link = get_field('why_give_financial_statements_button_link');
	$fs_link_text = get_field('why_give_financial_statements_link_text');
	$fs_link = get_field('why_give_financial_statements_link');


	if ($fs_image_one || $fs_image_two || $fs_sub_heading || $fs_heading || ($fs_button_text && $fs_button_link) || ($fs_link_text && $fs_link)) {
		ob_start();
	?>
		<section class="financial-statements pos-relative">
			<div class="container">
				<div class="fs-wrap flex">
					<?php if ($fs_sub_heading || $fs_heading || ($fs_button_text && $fs_button_link)) { ?>
						<div class="fs-lt">
							<?php if ($fs_sub_heading) { ?>
								<span class="optional-text"><?php echo $fs_sub_heading; ?></span>
							<?php } ?>
							<?php if ($fs_heading) { ?>
								<div class="h4"><?php echo $fs_heading; ?></div>
							<?php } ?>
							<div class="fs-btns flex flex-vcenter">
								<?php if ($fs_button_text && $fs_button_link) { ?>
									<a href="<?php echo $fs_button_link; ?>" class="button btn-white"><?php echo $fs_button_text; ?></a>
								<?php } ?>
								<?php if ($fs_link_text && $fs_link) { ?>
									<a href="<?php echo $fs_link; ?>" class="readmore"><?php echo $fs_link_text; ?></a>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
					<?php if ($fs_image_one || $fs_image_two) { ?>
						<div class="fs-rt">
							<?php if ($fs_image_one) { ?>
								<div class="fs-bg pos-absolute">
									<figure class="object-fit">
										<img src="<?php echo $fs_image_one['url']; ?>" alt="<?php echo $fs_image_one['alt']; ?>" title="<?php echo $fs_image_one['title']; ?>" />
									</figure>
								</div>
							<?php } ?>
							<?php if ($fs_image_two) { ?>
								<div class="fs-img">
									<figure class="object-fit">
										<img src="<?php echo $fs_image_two['url']; ?>" alt="<?php echo $fs_image_two['alt']; ?>" title="<?php echo $fs_image_two['title']; ?>" />
									</figure>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
	<?php }
	return ob_get_clean();
}
add_shortcode('financial_statement', 'render_why_give_financial_statement_shortcode');

function custom_video_shortcode()
{
	$video_type = get_field('campaign_video_shortcode_type');
	$video_image = get_field('campaign_video_shortcode_image');
	$vimeoid = get_field('campaign_video_shortcode_vimeoid');
	$youtubeid = get_field('campaign_video_shortcode_youtubeid');
	$caption = get_field('campaign_video_shortcode_caption');
	$optional_link_text = get_field('campaign_video_shortcode_optional_link_text');
	$optional_link = get_field('campaign_video_shortcode_optional_link');

	ob_start();
	?>

	<div class="def-video">
		<div class="video-wrap">
			<?php if ($video_image) { ?>
				<div class="video-thumbnail">
					<img src="<?php echo $video_image['url']; ?>" alt="<?php echo $video_image['alt']; ?>">
					<?php if ($video_type == 'youtube' && !empty($youtubeid)) { ?>
						<div class="play-btn-main video-popup flex flex-center">
							<a class="play-btn flex popup-youtube flex-center" href="https://www.youtube.com/watch?v=<?php echo $youtubeid; ?>" tabindex="0">
								<span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play"></i></span>
							</a>
						</div>
					<?php } elseif ($video_type == 'vimeo' && !empty($vimeoid)) { ?>
						<div class="play-btn-main  video-popup flex flex-center">
							<a class="play-btn flex popup-vimeo flex-center" href="https://vimeo.com/<?php echo $vimeoid; ?>" tabindex="0">
								<span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play"></i></span>
							</a>
						</div>
					<?php } ?>
				</div>
			<?php } ?>

			<div class="video-caption flex">
				<?php if ($caption) { ?>
					<div class="video-txt">
						<?php echo $caption; ?>
					</div>
				<?php } ?>

				<?php if ($optional_link_text && $optional_link) { ?>
					<div class="video-btn">
						<a href="<?php echo $optional_link; ?>" class="readmore"><?php echo $optional_link_text; ?></a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

<?php
	return ob_get_clean();
}

add_shortcode('video', 'custom_video_shortcode');

function supporting_link_shortcode()
{
	$description = get_field('support_shortcode_description');
	$link_text = get_field('support_shortcode_link_text');
	$link = get_field('support_shortcode_link');
	$background_color = get_field('support_shortcode_backround_color');
	$text_color  = get_field('support_shortcode_link_text');

	ob_start();
?>

	<section class="single-note">
		<div class="container">
			<div class="bg" style="background:<?php echo $background_color; ?>;"></div>
			<?php if (!empty($description) && (!empty($link_text) && !empty($link))) { ?>
				<div class="single-note-wrap">
					<?php if ($description) { ?>
						<?php echo $description; ?>
					<?php } ?>

					<?php if ($link_text && $link) { ?>
						<a href="<?php echo $link; ?>" class="readmore" style="color: <?php echo $text_color; ?>"><?php echo $link_text; ?></a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</section>

<?php
	return ob_get_clean();
}

add_shortcode('Supporting-Link', 'supporting_link_shortcode');

function images_slider_shortcode()
{
	$slides = get_field('slider_shortcode_slides');

	ob_start();
?>

	<div class="default-slider">
		<span class="counter-info"></span>
		<div class="def-slider">
			<?php
			if ($slides) {
				foreach ($slides as $slide) {
					$slide_image = $slide['slider_shortcode_slide_image'];
					if ($slide_image) {
			?>
						<div class="default-slide">
							<figure class="object-fit">
								<img src="<?php echo $slide_image['url']; ?>" alt="<?php echo $slide_image['alt']; ?>" title="<?php echo $slide_image['title']; ?>" />
							</figure>
						</div>
			<?php
					}
				}
			}
			?>
		</div>
	</div>

	<?php
	return ob_get_clean();
}

add_shortcode('IMAGES', 'images_slider_shortcode');


function render_campaign_testimonial_shortcode()
{
	$selected_testimonials = get_field('campaign_select_testimonial');
	$testimonial_background_color = get_field('testimonial_shortcode_background_color');
	$testimonial_text_color = get_field('testimonial_shortcode_text_color');

	if ($selected_testimonials) {
		ob_start();
		foreach ($selected_testimonials as $testimonial) {
	?>
			<section class="single-quote">
				<div class="container">
					<div class="bg" style="background:<?php echo $testimonial_background_color; ?>;"></div>
					<div class="single-quote-wrap" style="color: <?php echo $testimonial_text_color; ?>">
						<?php echo get_field('testimonial_post_review', $testimonial->ID); ?>
						<div class="quote-by">
							<div class="quote-line">&nbsp;</div>
							<span class="quote-name" style="color: <?php echo $testimonial_text_color; ?>"><?php echo get_field('testimonial_post_name', $testimonial->ID); ?></span>
							<span class="quote-pos" style="color: <?php echo $testimonial_text_color; ?>"><?php echo get_field('testimonial_post_position_title_or_credential', $testimonial->ID); ?></span>
						</div>
					</div>
				</div>
			</section>
		<?php
		}
		return ob_get_clean();
	} else {
		$testimonial_query = new WP_Query(array(
			'post_type' => 'testimonial',
			'posts_per_page' => 1,
		));

		if ($testimonial_query->have_posts()) {
			$testimonial_query->the_post();
			ob_start();
		?>
			<section class="single-quote">
				<div class="container">
					<div class="bg" style="background:<?php echo $testimonial_background_color; ?>;"></div>
					<div class="single-quote-wrap" style="color: <?php echo $testimonial_text_color; ?>">
						<?php the_field('testimonial_post_review'); ?>
						<div class="quote-by">
							<div class="quote-line">&nbsp;</div>
							<span class="quote-name" style="color: <?php echo $testimonial_text_color; ?>"><?php the_field('testimonial_post_name'); ?></span>
							<span class="quote-pos" style="color: <?php echo $testimonial_text_color; ?>"><?php the_field('testimonial_post_position_title_or_credential'); ?></span>
						</div>
					</div>
				</div>
			</section>
		<?php
			wp_reset_postdata();
			return ob_get_clean();
		}
	}
}
add_shortcode('Testimonial_Shortcode', 'render_campaign_testimonial_shortcode');

function render_campaign_faq_shortcode()
{
	$faq_items = get_field('faqs_shortcode_faqs');

	if ($faq_items) {
		ob_start();
		?>
		<section class="accordion-module">
			<div class="container">
				<div class="accordion-main">
					<?php foreach ($faq_items as $faq_item) { ?>
						<?php
						$question = $faq_item['faqs_shortcode_faq_question'];
						$answer = $faq_item['faqs_shortcode_faq_answer'];
						?>
						<?php if ($question && $answer) { ?>
							<div class="accordion">
								<div class="accordion-item">
									<?php if ($question) { ?>
										<a href="#" class="accordion-heading">
											<span class="title"><?php echo $question; ?></span>
										</a>
									<?php }
									if ($question) { ?>
										<div class="content">
											<?php echo $answer; ?>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</section>
	<?php
		return ob_get_clean();
	}
}
add_shortcode('FAQ', 'render_campaign_faq_shortcode');


function micro_cta_shortcode()
{
	$image = get_field('your_impact_micro_cta_module_image');
	$sub_heading = get_field('your_impact_micro_cta_module_sub_heading');
	$heading = get_field('your_impact_micro_cta_module_heading');
	$button_text_one = get_field('your_impact_micro_cta_module_button_text_one');
	$button_link_one = get_field('your_impact_micro_cta_module_button_link_one');
	$button_text_two = get_field('your_impact_micro_cta_module_button_text_two');
	$button_link_two = get_field('your_impact_micro_cta_module_button_link_two');
	$background_color = get_field('your_impact_micro_cta_module_background_color');
	$text_color = get_field('your_impact_micro_cta_module_text_color');
	$button_text_color = get_field('your_impact_micro_cta_module_button_text_color');
	$button_color_one = get_field('your_impact_micro_cta_module_button_color');
	$button_color_two = get_field('your_impact_micro_cta_module_button_color_one');

	ob_start();
	?>
	<section class="micro-cta pos-relative">
		<div class="container">
			<div class="bg" style="background:<?php echo $background_color; ?>;"></div>
			<div class="micro-cta-wrap flex">
				<div class="micro-cta-lt">
					<?php if ($sub_heading) { ?>
						<span class="optional-text" style="color: <?php echo $text_color; ?>"><?php echo $sub_heading; ?></span>
					<?php } ?>
					<?php if ($heading) { ?>
						<div class="h4" style="color: <?php echo $text_color; ?>"><?php echo $heading; ?></div>
					<?php } ?>
					<div class="micro-cta-btns flex flex-vcenter">
						<?php if ($button_text_one && $button_link_one) { ?>
							<a href="<?php echo $button_link_one; ?>" class="button btn-white" style=" background:<?php echo $button_color_one; ?>; color: <?php echo $button_text_color; ?>"><?php echo $button_text_one; ?></a>
						<?php } ?>
						<?php if ($button_text_two && $button_link_two) { ?>
							<a href="<?php echo $button_link_two; ?>" class="button trans-btn" style=" background:<?php echo $button_color_two; ?>; color: <?php echo $button_text_color; ?>"><?php echo $button_text_two; ?></a>
						<?php } ?>
					</div>
				</div>
				<?php if ($image) { ?>
					<div class="micro-cta-rt">
						<div class="micro-cta-img">
							<figure class="object-fit">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
							</figure>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php
	return ob_get_clean();
}
add_shortcode('Micro_Cta', 'micro_cta_shortcode');

function images_shortcode()
{
	$image_repeater = get_field('your_impact_image_repeater');
	ob_start();
?>

	<div class="default-slider">
		<span class="counter-info"></span>
		<div class="def-slider">
			<?php if ($image_repeater) { ?>
				<?php foreach ($image_repeater as $item) { ?>
					<?php if ($item['your_impact_image']) { ?>
						<div class="default-slide">
							<figure class="object-fit">
								<img src="<?php echo $item['your_impact_image']['url']; ?>" alt="<?php echo $item['your_impact_image']['alt']; ?>" title="<?php echo $item['your_impact_image']['title']; ?>" />
							</figure>
						</div>
					<?php } ?>
				<?php } ?>
			<?php } ?>
		</div>
	</div>

<?php
	return ob_get_clean();
}
add_shortcode('images_shortcode', 'images_shortcode');


function your_impact_supporting_link_shortcode()
{
	$description = get_field('your_impact_supporting_link_description');
	$link_text = get_field('your_impact_supporting_link_text');
	$link = get_field('your_impact_supporting_link');
	$background_color = get_field('your_impact_supporting_link_background_color');
	$text_color = get_field('your_impact_supporting_link_text_color');
	ob_start();
?>

	<section class="single-note">
		<div class="container">
			<div class="bg" style="background:<?php echo $background_color; ?>;"></div>
			<div class="single-note-wrap">
				<?php if ($description) { ?>
					<?php echo $description; ?>
				<?php } ?>
				<?php if ($link && $link_text) { ?>
					<a href="<?php echo $link; ?>" class="readmore" style="color: <?php echo $text_color; ?>"><?php echo $link_text; ?></a>
				<?php } ?>
			</div>
		</div>
	</section>

	<?php
	return ob_get_clean();
}
add_shortcode('supporting_link_shortcode', 'your_impact_supporting_link_shortcode');



function render_your_impact_testimonial_shortcode()
{
	$selected_testimonials = get_field('your_impact_select_testimonial_one');
	$testimonial_background_color = get_field('your_impact_testimonial_one_background_color');
	$testimonial_text_color = get_field('your_impact_testimonial_one_text_color');

	if ($selected_testimonials) {
		ob_start();
		foreach ($selected_testimonials as $testimonial) {
	?>
			<section class="single-quote">
				<div class="container">
					<div class="bg" style="background:<?php echo $testimonial_background_color; ?>;"></div>
					<div class="single-quote-wrap" style="color: <?php echo $testimonial_text_color; ?>">
						<?php echo get_field('testimonial_post_review', $testimonial->ID); ?>
						<div class="quote-by">
							<div class="quote-line">&nbsp;</div>
							<span class="quote-name" style="color: <?php echo $testimonial_text_color; ?>"><?php echo get_field('testimonial_post_name', $testimonial->ID); ?></span>
							<span class="quote-pos" style="color: <?php echo $testimonial_text_color; ?>"><?php echo get_field('testimonial_post_position_title_or_credential', $testimonial->ID); ?></span>
						</div>
					</div>
				</div>
			</section>
		<?php
		}
		return ob_get_clean();
	} else {
		$testimonial_query = new WP_Query(array(
			'post_type' => 'testimonial',
			'posts_per_page' => 1,
		));

		if ($testimonial_query->have_posts()) {
			$testimonial_query->the_post();
			ob_start();
		?>
			<section class="single-quote">
				<div class="container">
					<div class="bg" style="background:<?php echo $testimonial_background_color; ?>;"></div>
					<div class="single-quote-wrap" style="color: <?php echo $testimonial_text_color; ?>">
						<?php the_field('testimonial_post_review'); ?>
						<div class="quote-by">
							<div class="quote-line">&nbsp;</div>
							<span class="quote-name" style="color: <?php echo $testimonial_text_color; ?>"><?php the_field('testimonial_post_name'); ?></span>
							<span class="quote-pos" style="color: <?php echo $testimonial_text_color; ?>"><?php the_field('testimonial_post_position_title_or_credential'); ?></span>
						</div>
					</div>
				</div>
			</section>
		<?php
			wp_reset_postdata();
			return ob_get_clean();
		}
	}
}
add_shortcode('Testimonials_Shortcode', 'render_your_impact_testimonial_shortcode');

function render_your_impact_cta_shortcode()
{
	$primary_cta_shortcode_desktop_image = get_field('your_impact_call_to_action_shortcode_desktop_image');
	$primary_cta_shortcode_mobile_image = get_field('your_impact_call_to_action_shortcode_mobile_image');
	$primary_cta_shortcode_background_color = get_field('your_impact_call_to_action_shortcode_background_color');
	$primary_cta_shortcode_text_color = get_field('your_impact_call_to_action_shortcode_text_color');
	$primary_cta_shortcode_sub_heading = get_field('your_impact_call_to_action_shortcode_sub_heading');
	$primary_cta_shortcode_heading = get_field('your_impact_call_to_action_shortcode_heading');
	$primary_cta_shortcode_button_text = get_field('your_impact_call_to_action_shortcode_button_text');
	$primary_cta_shortcode_button_link = get_field('your_impact_call_to_action_shortcode_button_link');
	$primary_cta_shortcode_button_color = get_field('your_impact_call_to_action_shortcode_button_color');
	$primary_cta_shortcode_button_text_color = get_field('your_impact_call_to_action_shortcode_button_text_color');
	$primary_cta_shortcode_link_text = get_field('your_impact_call_to_action_shortcode_link_text');
	$primary_cta_shortcode_link = get_field('your_impact_call_to_action_shortcode__link');

	if (!empty($primary_cta_shortcode_desktop_image) || !empty($primary_cta_shortcode_mobile_image) || !empty($primary_cta_shortcode_sub_heading) || !empty($primary_cta_shortcode_heading) || !empty($primary_cta_shortcode_button_text) || !empty($primary_cta_shortcode_button_link) || !empty($primary_cta_shortcode_link_text) || !empty($primary_cta_shortcode_link)) {
		ob_start();
		?>
		<section class="fluid-cta-module fluid-width pos-relative">
			<div class="fluid-cta-main">
				<?php if ($primary_cta_shortcode_mobile_image ||  $primary_cta_shortcode_desktop_image) {
					$primary_cta_shortcode_mobile_image = $primary_cta_shortcode_mobile_image ? $primary_cta_shortcode_mobile_image : $primary_cta_shortcode_desktop_image;
					$primary_cta_shortcode_desktop_image = $primary_cta_shortcode_desktop_image ? $primary_cta_shortcode_desktop_image : $primary_cta_shortcode_mobile_image; ?>
					<div class="fluid-cta-thumb">
						<picture class="object-fit">
							<source srcset="<?php echo $primary_cta_shortcode_desktop_image['url']; ?>" media="(min-width: 1024px)">
							<source srcset="<?php echo $primary_cta_shortcode_desktop_image['url']; ?>" media="(min-width: 768px)">
							<img src="<?php echo $primary_cta_shortcode_mobile_image['url']; ?>" alt="CTA Thumb" title="CTA Thumb" />
						</picture>
						<div class="ripple">
							<div class="pulse1">&nbsp;</div>
							<div class="pulse2">&nbsp;</div>
						</div>
					</div>
				<?php } ?>
				<div class="fluid-cta-txt">
					<div class="fluid-cta-inner-txt pos-relative">
						<div class="bg pos-absolute" style="background:<?php echo $primary_cta_shortcode_background_color; ?>;"></div>
						<?php if (!empty($primary_cta_shortcode_sub_heading)) { ?>
							<span class="optional-text" style="color: <?php echo $primary_cta_shortcode_text_color; ?>"><?php echo $primary_cta_shortcode_sub_heading; ?></span>
						<?php } ?>
						<?php if (!empty($primary_cta_shortcode_heading)) { ?>
							<h3 style="color: <?php echo $primary_cta_shortcode_text_color; ?>"><?php echo $primary_cta_shortcode_heading; ?></h3>
						<?php } ?>
						<div class="fluid-cta-btns">
							<?php if (!empty($primary_cta_shortcode_button_text) && !empty($primary_cta_shortcode_button_link)) { ?>
								<a href="<?php echo $primary_cta_shortcode_button_link; ?>" class="button btn-white" style=" background:<?php echo $primary_cta_shortcode_button_color; ?>; color: <?php echo $primary_cta_shortcode_button_text_color; ?>"><?php echo $primary_cta_shortcode_button_text; ?></a>
							<?php } ?>
							<?php if (!empty($primary_cta_shortcode_link_text) && !empty($primary_cta_shortcode_link)) { ?>
								<a href="<?php echo $primary_cta_shortcode_link; ?>" class="readmore" style=" color: <?php echo $primary_cta_shortcode_text_color; ?>"><?php echo $primary_cta_shortcode_link_text; ?></a>
							<?php } ?>
						</div>
					</div>
					<div class="ripple">
						<div class="pulse1">&nbsp;</div>
						<div class="pulse2">&nbsp;</div>
					</div>
				</div>
			</div>
		</section>
		<?php
		return ob_get_clean();
	}
}
add_shortcode('Optional_Cta', 'render_your_impact_cta_shortcode');

function render_your_impact_two_testimonial_shortcode()
{
	$selected_testimonials = get_field('your_impact_select_testimonial_two');
	$testimonial_background_color = get_field('your_impact_testimonial_two_background_color');
	$testimonial_text_color = get_field('your_impact_testimonial_two_text_color');

	if ($selected_testimonials) {
		ob_start();
		foreach ($selected_testimonials as $testimonial) {
		?>
			<section class="single-quote">
				<div class="container">
					<div class="bg" style="background:<?php echo $testimonial_background_color; ?>;"></div>
					<div class="single-quote-wrap" style="color: <?php echo $testimonial_text_color; ?>">
						<?php echo get_field('testimonial_post_review', $testimonial->ID); ?>
						<div class="quote-by">
							<div class="quote-line">&nbsp;</div>
							<span class="quote-name" style="color: <?php echo $testimonial_text_color; ?>"><?php echo get_field('testimonial_post_name', $testimonial->ID); ?></span>
							<span class="quote-pos" style="color: <?php echo $testimonial_text_color; ?>"><?php echo get_field('testimonial_post_position_title_or_credential', $testimonial->ID); ?></span>
						</div>
					</div>
				</div>
			</section>
		<?php
		}
		return ob_get_clean();
	} else {
		$testimonial_query = new WP_Query(array(
			'post_type' => 'testimonial',
			'posts_per_page' => 1,
		));

		if ($testimonial_query->have_posts()) {
			$testimonial_query->the_post();
			ob_start();
		?>
			<section class="single-quote">
				<div class="container">
					<div class="bg" style="background:<?php echo $testimonial_background_color; ?>;"></div>
					<div class="single-quote-wrap" style="color: <?php echo $testimonial_text_color; ?>">
						<?php the_field('testimonial_post_review'); ?>
						<div class="quote-by">
							<div class="quote-line">&nbsp;</div>
							<span class="quote-name" style="color: <?php echo $testimonial_text_color; ?>"><?php the_field('testimonial_post_name'); ?></span>
							<span class="quote-pos" style="color: <?php echo $testimonial_text_color; ?>"><?php the_field('testimonial_post_position_title_or_credential'); ?></span>
						</div>
					</div>
				</div>
			</section>
		<?php
			wp_reset_postdata();
			return ob_get_clean();
		}
	}
}
add_shortcode('Testimonial_Two_Shortcode', 'render_your_impact_two_testimonial_shortcode');


function render_your_impact_faq_shortcode()
{
	$faq_items = get_field('your_impact_faq_repeater');

	if ($faq_items) {
		ob_start();
		?>
		<section class="accordion-module">
			<div class="container">
				<div class="accordion-main">
					<?php foreach ($faq_items as $faq_item) { ?>
						<?php
						$question = $faq_item['your_impact_faq_question'];
						$answer = $faq_item['your_impact_faq_answer'];
						?>
						<?php if ($question && $answer) { ?>
							<div class="accordion">
								<div class="accordion-item">
									<?php if ($question) { ?>
										<a href="#" class="accordion-heading">
											<span class="title"><?php echo $question; ?></span>
										</a>
									<?php }
									if ($question) { ?>
										<div class="content">
											<?php echo $answer; ?>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</section>
	<?php
		return ob_get_clean();
	}
}
add_shortcode('Faq_shortcode', 'render_your_impact_faq_shortcode');


function custom_default_post_video_shortcode()
{
	$video_type = get_field('default_post_video_type');
	$video_image = get_field('default_post_image');
	$vimeoid = get_field('default_post_vimeo_id');
	$youtubeid = get_field('default_post_youtube_id');
	$caption = get_field('default_post_description');
	$optional_link_text = get_field('default_post_link_text');
	$optional_link = get_field('default_post_link');

	ob_start();
	?>

	<div class="def-video">
		<div class="video-wrap">
			<?php if ($video_image) { ?>
				<div class="video-thumbnail">
					<img src="<?php echo $video_image['url']; ?>" alt="<?php echo $video_image['alt']; ?>">
					<?php if ($video_type == 'youtube' && !empty($youtubeid)) { ?>
						<div class="play-btn-main video-popup flex flex-center">
							<a class="play-btn flex popup-youtube flex-center" href="https://www.youtube.com/watch?v=<?php echo $youtubeid; ?>" tabindex="0">
								<span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play"></i></span>
							</a>
						</div>
					<?php } elseif ($video_type == 'vimeo' && !empty($vimeoid)) { ?>
						<div class="play-btn-main  video-popup flex flex-center">
							<a class="play-btn flex popup-vimeo flex-center" href="https://vimeo.com/<?php echo $vimeoid; ?>" tabindex="0">
								<span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play"></i></span>
							</a>
						</div>
					<?php } ?>
				</div>
			<?php } ?>

			<div class="video-caption flex">
				<?php if ($caption) { ?>
					<div class="video-txt">
						<?php echo $caption; ?>
					</div>
				<?php } ?>

				<?php if ($optional_link_text && $optional_link) { ?>
					<div class="video-btn">
						<a href="<?php echo $optional_link; ?>" class="readmore"><?php echo $optional_link_text; ?></a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

<?php
	return ob_get_clean();
}

add_shortcode('Video', 'custom_default_post_video_shortcode');


function register_to_attend_shortcode()
{
	$sub_heading = get_field('default_post_register_to_attend_sub_heading');
	$heading = get_field('default_post_register_to_attend_heading');
	$description = get_field('default_post_register_to_attend_description');
	$button_text = get_field('default_post_register_to_attend_button_text');
	$button_link = get_field('default_post_register_to_attend_button_link');

	ob_start();
?>
	<div class="attend sidebucket hide-in-desktop">
		<?php if ($sub_heading) { ?>
			<span class="optional-text"><?php echo $sub_heading; ?></span>
		<?php } ?>
		<?php if ($heading) { ?>
			<div class="h4"><?php echo $heading; ?></div>
		<?php } ?>
		<?php if ($description) { ?>
			<?php echo $description; ?>
		<?php } ?>
		<?php if ($button_text && $button_link) { ?>
			<a href="<?php echo $button_link; ?>" class="button btn-white"><?php echo $button_text; ?></a>
		<?php } ?>
	</div>
<?php
	return ob_get_clean();
}

add_shortcode('register_to_attend', 'register_to_attend_shortcode');


function support_us_shortcode()
{
	$sub_heading = get_field('default_post_support_us_sub_heading');
	$heading = get_field('default_post_support_us_heading');
	$partners_repeater = get_field('default_post_support_us_partners_repeater');
	$note = get_field('default_post_support_us_note');
	$button_text = get_field('default_post_support_us_button_text');
	$button_link = get_field('default_post_support_us_button_link');
	$support_us_background_color  = get_field('default_post_support_us_background_color');
	$support_us_text_color  = get_field('default_post_support_us_text_color');
	$support_us_button_color  = get_field('default_post_support_us_button_color');
	$support_us_button_text_color  = get_field('default_post_support_us_button_text_color');

	if($sub_heading  || $heading || $partners_repeater  || $note || ($button_text && $button_link )) { 
	ob_start();
?>
	<div class="supporting-partners pos-relative">
		<div class="sp-top">
			<div class="bg" style="background:<?php echo $support_us_background_color; ?>;"></div>
			<div class="container">
				<?php if ($sub_heading) { ?>
					<span class="optional-text" style="color: <?php echo $support_us_text_color; ?>"><?php echo $sub_heading; ?></span>
				<?php } ?>

				<?php if ($heading) { ?>
					<h3 style="color: <?php echo $support_us_text_color; ?>"><?php echo $heading; ?></h3>
				<?php } ?>
			</div>
		</div>
		<div class="sp-btm">
			<div class="bg" style="background:<?php echo $support_us_background_color; ?>;"></div>
			<div class="container">
				<div class="partners-wrap flex">
					<?php if ($partners_repeater) {
						foreach ($partners_repeater as $partner) {
							$partner_image = $partner['default_post_support_us_partner'];
							if ($partner_image) { ?>
								<div class="partners-grid">
									<figure class="object-fit">
										<img src="<?php echo $partner_image['url']; ?>" alt="Partners Thumbnail" title="Partners Thumbnail" />
									</figure>
								</div>
					<?php }
						}
					} ?>
				</div>
				<?php if ($note || ($button_text && $button_link)) { ?>
				<div class="bottom-frame">
					<div class="frame-lt-inner flex">
					<?php if ($note) { ?>
						<div class="frame-lt">
								<?php echo $note; ?>
						</div>
						<div class="frame-mid">
							<div class="animated-arrow">
								<span class="the-arrow right">
									<span class="shaft"></span>
								</span>
							</div>
						</div>
						<?php } ?>
						<div class="frame-mid hide-in-desktop hide-in-tab">
							<div class="animated-arrow">
								<span class="the-arrow right">
									<span class="shaft"></span>
								</span>
							</div>
						</div>
					</div>

					<?php if ($button_text && $button_link) { ?>
						<div class="frame-rt">
							<a href="<?php echo $button_link; ?>" class="button" style=" background:<?php echo $support_us_button_color; ?>; color: <?php echo $support_us_button_text_color; ?>"><?php echo $button_text; ?></a>
							
						</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php
	return ob_get_clean();
}

add_shortcode('support_us', 'support_us_shortcode');

function render_defalt_post_images_shortcode()
{
	$image_repeater = get_field('default_post_image_repeater');

	if ($image_repeater) {
		ob_start();
	?>
		<div class="default-slider">
			<span class="counter-info"></span>
			<div class="def-slider">
				<?php foreach ($image_repeater as $image_item) { ?>
					<?php $image = $image_item['default_post_image']; ?>
					<?php if (!empty($image)) { ?>
						<div class="default-slide">
							<figure class="object-fit">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
							</figure>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
add_shortcode('images-shortcode', 'render_defalt_post_images_shortcode');

function render_default_post_testimonial_shortcode()
{
	$selected_testimonials = get_field('default_post_select_testimonial');
	$background_color  = get_field('default_post_select_testimonial_background_color');
	$text_color  = get_field('default_post_select_testimonial_text_color');

	if ($selected_testimonials) {
		ob_start();
		foreach ($selected_testimonials as $testimonial) {
		?>
			<section class="single-quote">
				<div class="container">
					<div class="bg" style="background:<?php echo $background_color; ?>;"></div>
					<div class="single-quote-wrap">
						<?php echo get_field('testimonial_post_review', $testimonial->ID); ?>
						<div class="quote-by">
							<div class="quote-line">&nbsp;</div>
							<span class="quote-name" style="color: <?php echo $text_color; ?>"><?php echo get_field('testimonial_post_name', $testimonial->ID); ?></span>
							<span class="quote-pos" style="color: <?php echo $text_color; ?>"><?php echo get_field('testimonial_post_position_title_or_credential', $testimonial->ID); ?></span>
						</div>
					</div>
				</div>
			</section>
		<?php
		}
		return ob_get_clean();
	} else {
		$testimonial_query = new WP_Query(array(
			'post_type' => 'testimonial',
			'posts_per_page' => 1,
		));

		if ($testimonial_query->have_posts()) {
			$testimonial_query->the_post();
			ob_start();
		?>
			<section class="single-quote">
				<div class="container">
					<div class="bg" style="background:<?php echo $background_color; ?>;"></div>
					<div class="single-quote-wrap">
						<?php the_field('testimonial_post_review'); ?>
						<div class="quote-by">
							<div class="quote-line">&nbsp;</div>
							<span class="quote-name" style="color: <?php echo $text_color; ?>"><?php the_field('testimonial_post_name'); ?></span>
							<span class="quote-pos" style="color: <?php echo $text_color; ?>"><?php the_field('testimonial_post_position_title_or_credential'); ?></span>
						</div>
					</div>
				</div>
			</section>
		<?php
			wp_reset_postdata();
			return ob_get_clean();
		}
	}
}
add_shortcode('testimonial-shortcode', 'render_default_post_testimonial_shortcode');

function donor_stories_shortcode()
{
	$stories_heading = get_field('default_post_donor_stories_heading');
	$stories_repeater = get_field('default_post_donor_stories_repeater');

	ob_start();

	if ($stories_heading || ($stories_repeater && have_rows('default_post_donor_stories_repeater'))) { ?>
		[ <section class="stories-slider fluid-width">
			<div class="bg"></div>
			<div class="container">
				<?php if ($stories_heading) { ?>
					<h2><?php echo $stories_heading; ?></h2>
				<?php } ?>
				<div class="stories-slider-wrap">
					<div class="slider slider-nav">
						<?php if ($stories_repeater) {
							foreach ($stories_repeater as $stories) {
								$stories_repeater_heading = $stories['default_post_donor_stories_repeater_heading'];
								$stories_description = $stories['default_post_donor_stories_description'];
						?>
								<div class="stories-thumb">
									<div class="stories-thumb-nav">
										<?php if ($stories_repeater_heading) { ?>
											<div class="h6"><?php echo $stories_repeater_heading; ?></div>
										<?php } ?>
										<?php if ($stories_description) { ?>
											<?php echo $stories_description; ?>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
					<div class="slider slider-for">
						<?php foreach ($stories_repeater as $stories) {
							$stories_image = $stories['default_post_donor_stories_image'];
							$stories_repeater_heading = $stories['default_post_donor_stories_repeater_heading'];
							$repeater_video_type = $stories['default_post_donor_stories_video_type'];
							$repeater_youtube_id = $stories['default_post_donor_stories_repeater_youtube_id'];
							$repeater_vimeo_id = $stories['default_post_donor_stories_repeater_vimeo_id'];
						?>
							<div class="stories-slide">
								<?php if ($stories_image) { ?>
									<figure class="object-fit">
										<img src="<?php echo $stories_image['url']; ?>" alt="<?php echo $stories_image['alt']; ?>" title="<?php echo $stories_image['title']; ?>" />
									</figure>
									<?php if ($repeater_video_type === 'youtube' && !empty($repeater_youtube_id)) { ?>
										<div class="play-btn-main video-popup flex flex-center">
											<a class="play-btn flex popup-youtube flex-center" href="https://www.youtube.com/watch?v=<?php echo $repeater_youtube_id; ?>" tabindex="0">
												<span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play" aria-hidden="true"></i> </span>
												<span class="play-btn-txt"><?php echo $stories_repeater_heading; ?> Promise</span>
											</a>
										</div>
									<?php } elseif ($repeater_video_type === 'vimeo' && !empty($repeater_vimeo_id)) { ?>
										<div class="play-btn-main video-popup flex flex-center">
											<a class="play-btn flex popup-youtube flex-center" href="https://vimeo.com/<?php echo $repeater_vimeo_id; ?>" tabindex="0">
												<span class="play-btn-wrap"><i class="fa-sharp fa-light fa-play" aria-hidden="true"></i> </span>
												<span class="play-btn-txt"><?php echo $stories_repeater_heading; ?> Promise</span>
											</a>
										</div>
									<?php } ?>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
	<?php }

	return ob_get_clean();
}


add_shortcode('donor_stories', 'donor_stories_shortcode');


function render_default_post_supporting_link_shortcode()
{
	$supporting_link_color_picker = get_field('default_post_supporting_background_color');
	$supporting_link_text_color = get_field('default_post_supporting_link_text_color');
	$supporting_link_description = get_field('default_post_supporting_link_description');
	$supporting_link_link_text = get_field('default_post_supporting_link_link_text');
	$supporting_link_link = get_field('default_post_supporting_link_link');

	if (!empty($supporting_link_description) && !empty($supporting_link_link_text) && !empty($supporting_link_link)) {
		ob_start();
	?>
		<section class="single-note">
			<div class="container">
				<div class="bg" style="background:<?php echo $supporting_link_color_picker; ?>;"></div>
				<?php if (!empty($supporting_link_description) && !empty($supporting_link_link_text) && !empty($supporting_link_link)) { ?>
					<div class="single-note-wrap">
						<?php if (!empty($supporting_link_description)) { ?>
							<?php echo $supporting_link_description; ?>
						<?php } ?>
						<?php if (!empty($supporting_link_link_text) && !empty($supporting_link_link)) { ?>
							<a href="<?php echo $supporting_link_link; ?>" class="readmore" style="color: <?php echo $supporting_link_text_color; ?>"><?php echo $supporting_link_link_text; ?></a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</section>
	<?php
		return ob_get_clean();
	}
}
add_shortcode('supporting-link', 'render_default_post_supporting_link_shortcode');

function render_default_post_faq_shortcode()
{
	$faq_items = get_field('default_post_faq_repeater');

	if ($faq_items) {
		ob_start();
	?>
		<section class="accordion-module">
			<div class="container">
				<div class="accordion-main">
					<?php foreach ($faq_items as $faq_item) { ?>
						<?php
						$question = $faq_item['default_post_faq_question'];
						$answer = $faq_item['default_post_faq_answer'];
						?>
						<?php if ($question && $answer) { ?>
							<div class="accordion">
								<div class="accordion-item">
									<?php if ($question) { ?>
										<a href="#" class="accordion-heading">
											<span class="title"><?php echo $question; ?></span>
										</a>
									<?php }
									if ($question) { ?>
										<div class="content">
											<?php echo $answer; ?>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</section>
<?php
		return ob_get_clean();
	}
}
add_shortcode('Faq-shortcode', 'render_default_post_faq_shortcode');

add_shortcode('get_campaign_page', 'get_campaign_page_url');
function get_campaign_page_url()
{
	if (isset($_GET['campaign_page'])) {
		$campaign_page_id = $_GET['campaign_page'];
		$campaign_page_url = get_permalink($_GET['campaign_page']);
	}
	return $campaign_page_url;
}
