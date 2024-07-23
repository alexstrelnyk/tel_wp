<?php

/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */


// Used for product sliders and products page
$category_order = [
	get_label('telecom-solution', 'telecom-solutions-en'),
	get_label('services', 'services-en'),
	get_label('qa-services', 'qa-services-en'),
	get_label('pm-ba-departament', 'pm-ba-office'),
];

/**
 * Register block styles.
 */

if (!function_exists('twentytwentyfour_block_styles')) :
	/**
	 * Register custom block styles
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles()
	{

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __('Arrow icon', 'twentytwentyfour'),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __('Pill', 'twentytwentyfour'),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __('Checkmark', 'twentytwentyfour'),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __('With arrow', 'twentytwentyfour'),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __('With asterisk', 'twentytwentyfour'),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action('init', 'twentytwentyfour_block_styles');

/**
 * Enqueue block stylesheets.
 */

if (!function_exists('twentytwentyfour_block_stylesheets')) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets()
	{
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri('assets/css/button-outline.css'),
				'ver'    => wp_get_theme(get_template())->get('Version'),
				'path'   => get_parent_theme_file_path('assets/css/button-outline.css'),
			)
		);
	}
endif;

add_action('init', 'twentytwentyfour_block_stylesheets');

/**
 * Register pattern categories.
 */

if (!function_exists('twentytwentyfour_pattern_categories')) :
	/**
	 * Register pattern categories
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories()
	{

		register_block_pattern_category(
			'page',
			array(
				'label'       => _x('Pages', 'Block pattern category'),
				'description' => __('A collection of full page layouts.'),
			)
		);
	}
endif;

add_action('init', 'twentytwentyfour_pattern_categories');

function path($param, $file_name)
{
	$postfix = '';
	switch ($param) {
		case 'css':
			$path = '/assets/css/';
			$postfix = '?t=' . time();
			break;
		case 'js':
			$path = '/assets/js/';
			$postfix = '?t=' . time();
			break;
		case 'images':
			$path = '/assets/images/';
			break;
	}

	return get_template_directory_uri() . $path . $file_name . $postfix;
}


register_nav_menus(
	array(
		'primary-menu' => __('Primary Menu'),
		'secondary-menu' => __('Secondary Menu')
	)
);

add_action('wp_ajax_get_product_services', 'get_product_services');
add_action('wp_ajax_nopriv_get_product_services', 'get_product_services');

function get_product_services()
{
	$category_id = $_POST['cat_id'];

	if ($categories = get_categories(['parent' => $category_id])) {

		$params = array(
			'level' => $_POST['level'],
			'cat_title' => $_POST['cat_title'],
			'categories' => $categories,
		);
		$template = get_template_directory() . '/single-product.php';
	} else {

		$query = new WP_Query([
			'cat' => $category_id,
			'posts_per_page' => -1,
		]);
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				$params = array(
					'content' => get_the_content(),
					'level' => $_POST['level'],
					'post' => $query->post,
				);
			}
			wp_reset_postdata();
		}
		$template = get_template_directory() . '/single-product-post.php';
	}

	ob_start();

	extract($params);

	require_once($template);
	$html = ob_get_clean();

	wp_send_json($html);
}

function get_label($uk, $en)
{
	return pll_current_language() == 'en' ? $en : $uk;
}

function get_url($slug)
{
	return get_permalink(pll_get_post(get_page_by_path($slug)->ID, pll_current_language()));
}

function is_contact_page()
{
	return in_array(get_post()->post_name, ['contact-us', 'contact-us-en']);
}

function sort_categories_by_slugs($categories, $slugs)
{
	$sorted_categories = [];
	foreach ($slugs as $slug) {
		foreach ($categories as $category) {
			if ($category->slug === $slug) {
				$sorted_categories[] = $category;
				break;
			}
		}
	}

	return $sorted_categories;
}

function yoast_seo_meta()
{
	if (is_singular()) {
		global $post;

		// Get Yoast SEO title
		$yoast_title = get_post_meta($post->ID, '_yoast_wpseo_title', true);
		if (!$yoast_title) {
			$yoast_title = get_the_title($post->ID);
		}

		// Get Yoast SEO meta description
		$yoast_description = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
		if (!$yoast_description) {
			$yoast_description = get_bloginfo('description');
		}

		// Print the meta tags
		echo '<title>' . esc_html($yoast_title) . '</title>' . "\n";
		echo '<meta name="description" content="' . esc_attr($yoast_description) . '">' . "\n";
	}
}

function get_cats_by_slug($catslugs)
{
	$catids = array();
	foreach ($catslugs as $slug) {
		$catids[] = get_category_by_slug($slug)->term_id;
	}
	return $catids;
}

function codecanal_ajax_enqueue()
{
	wp_localize_script(
		'ajax-script',
		'codecanal_ajax_object',
		array('ajax_url' => admin_url('admin-ajax.php'))
	);
}
add_action('wp_enqueue_scripts', 'codecanal_ajax_enqueue');

function codecanal_ajax_request()
{

	if (isset($_REQUEST['category_slug'])) {

		$category_slug = $_REQUEST['category_slug'];
		$cat_id = get_cats_by_slug($category_slug);
		$args = array(
			'category__and' => $cat_id,
			'posts_per_page' => -1,
		);

		$the_query = new WP_Query($args);
		$result = '';
		if ($the_query->have_posts()) {
			while ($the_query->have_posts()) {
				$the_query->the_post();
				$form_name = 'career_form_' . $the_query->post->ID;
				$form_names[] = $form_name;
				$result .= get_template_part('parts/single-vacancy', null, array('form_name' => $form_name));
			};
			wp_reset_postdata();
		};

		echo $result;
	}
	exit;
}
add_action('wp_ajax_codecanal_ajax_request', 'codecanal_ajax_request');
add_action('wp_ajax_nopriv_codecanal_ajax_request', 'codecanal_ajax_request');

function posts_count_ajax_request()
{

	if (isset($_REQUEST['category_slug'])) {

		$category_slug = $_REQUEST['category_slug'];
		$cat_id = get_category_by_slug($category_slug)->term_id;
		$args = array(
			'cat' => $cat_id,
			'posts_per_page' => -1,
		);

		$the_query = new WP_Query($args);
		$result = '';
		if ($the_query->have_posts()) {
			$the_query->the_post();
			$result .= $the_query->found_posts;
			wp_reset_postdata();
		};

		echo $result;
	}
	exit;
}
add_action('wp_ajax_posts_count_ajax_request', 'posts_count_ajax_request');
add_action('wp_ajax_nopriv_posts_count_ajax_request', 'posts_count_ajax_request');


function get_page_slug()
{
	return get_post_field('post_name', get_queried_object_id());
}
