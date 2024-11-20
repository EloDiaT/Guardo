<?php
if (function_exists('register_nav_menus')) {
	register_nav_menus(
		array( // создаём любое количество областей

		)
	);
}

add_action('wp_enqueue_scripts', 'file_connect');

function file_connect()
{

	wp_register_style('style-main', get_stylesheet_directory_uri() . '/static/css/style.css', array(), 47, 'all');
	wp_enqueue_style('style-main');
	wp_enqueue_style('style', get_stylesheet_uri());


	// function prefix_add_footer_styles()
	// {
	// 	wp_enqueue_style('animate', '/js_plugins/wow_js/animate.css');
	// };
	// add_action('get_footer', 'prefix_add_footer_styles');

	wp_register_script('jquery', get_stylesheet_directory_uri() . '/static/js/jquery-3.1.1.js', array('jquery'), 1, false);
	wp_enqueue_script('jquery');

	// wp_register_script('jquery_cookie', '/js_plugins/jquery_cookie/jquery.cookie.js', array('jquery'), 1, true);
	// wp_enqueue_script('jquery_cookie');

	wp_register_script('wow', get_stylesheet_directory_uri() . '/static/js/wow.js', array('jquery'), 1, true);
	wp_enqueue_script('wow');

	wp_register_script('script', get_stylesheet_directory_uri() . '/static/js/script.js', array('jquery'), 47, true);
	wp_enqueue_script('script');
}

add_action('wp_enqueue_scripts', 'del_style');
function del_style()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('classic-theme-styles');
}

function my_deregister_styles()
{
	wp_dequeue_style('contact-form-7');
	wp_dequeue_style('wpm-main');
	wp_dequeue_style('dashicons');
	wp_dequeue_style('menu-image');
	wp_dequeue_style('wp-pagenavi');
}
add_action('wp_print_styles', 'my_deregister_styles', 100);

function my_add_footer_styles()
{
	wp_enqueue_style('contact-form-7');
	wp_enqueue_style('wpm-main');
	wp_enqueue_style('wp-pagenavi');
	wp_enqueue_style('menu-image');
};
add_action('get_footer', 'my_add_footer_styles');

function formatBytes($size, $precision = 2)
{
	$base = log($size, 1024);
	$suffixes = array('', 'kb', 'M', 'G', 'T');

	return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

function my_stylesheet1()
{
	wp_enqueue_style("style-admin", get_bloginfo('stylesheet_directory') . "/admin-style.css");
}
add_action('admin_head', 'my_stylesheet1');

add_filter('site_transient_update_plugins', 'filter_plugin_updates');
function filter_plugin_updates($value)
{
	unset($value->response['advanced-custom-fields-pro/acf.php']);
	unset($value->response['filebird-pro/filebird.php']);
	return $value;
}

function codernote_request($query_string)
{
	if (isset($query_string['page'])) {
		if ('' != $query_string['page']) {
			if (isset($query_string['name'])) {
				unset($query_string['name']);
			}
		}
	}
	return $query_string;
}
add_filter('request', 'codernote_request');


add_action('pre_get_posts', 'codernote_pre_get_posts');
function codernote_pre_get_posts($query)
{
	if ($query->is_main_query() && !$query->is_feed() && !is_admin()) {
		$query->set('paged', str_replace('/', '', get_query_var('page')));
	}
}

if (function_exists('acf_add_options_page')) {

	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Общие опции',
		'menu_title' 	=> 'Общие опции',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));
	//
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Контактная информация',
	// 	'menu_title'	=> 'Контакты',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
}




add_action('init', 'blog_articles'); // Использовать функцию только внутри хука init
function blog_articles()
{
	$labels = array(
		'name' => 'Статья блога',
		'singular_name' => 'Статья блога',
		'add_new' => 'Добавить статью',
		'add_new_item' => 'Добавить статью',
		'edit_item' => 'Редактировать статью',
		'new_item' => 'Новая статья',
		'all_items' => 'Все статьи',
		'view_item' => 'Просмотр статей',
		'search_items' => 'Искать статьи',
		'not_found' => 'Статей не найдено',
		'not_found_in_trash' => 'В корзине нет статей',
		'menu_name' => 'Блог'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_icon' => 'dashicons-analytics',
		'menu_position' => 5,
		'has_archive' => true,
		'show_in_rest' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
		'rewrite' => array('pages' => true),
		// 'taxonomies' => array('post_tag','category')
	);
	register_post_type('blog_articles', $args);
}










function true_301_redirect() {
	/* в массиве указываем все старые=>новые ссылки  */
	global $wp_rewrite;
	
	$rules = array(
		array('old'=>'/technologies/','new'=>'/technologies/fully-homomorphic-encryption/'),
		array('old'=>'/use-cases/','new'=>'/use-cases/oil-gas/'),
		array('old'=>'/product/','new'=>'/product/faq/'),
		array('old'=>'/legal/','new'=>'/legal/privacy/')
	);

	// Редирект на url со слэшем
	if(substr(urldecode($_SERVER['REQUEST_URI']) , -1) != '/'){
		wp_redirect( site_url( user_trailingslashit($_SERVER['REQUEST_URI']) ), 301 );
	}

	foreach( $rules as $rule ) :
		// если URL совпадает с одним из указанных в массиве, то редиректим
		if( urldecode($_SERVER['REQUEST_URI']) == $rule['old'] ) :
			wp_redirect( site_url( $rule['new'] ), 301 );
			exit();
		endif;
	endforeach;
}
 
add_action('template_redirect', 'true_301_redirect');











// do not use on live/production servers
add_action('init', 'maybe_rewrite_rules');
function maybe_rewrite_rules()
{
	// Получим время файла, как номер версии
	$ver = filemtime(__FILE__);
	$defaults = array('version' => 0, 'time' => time());
	$r = wp_parse_args(get_option(__CLASS__ . '_flush', array()), $defaults);

	// Сбрасываем если изменилась версия если прошло 48 часов.
	if ($r['version'] != $ver || $r['time'] + 172800 < time()) {
		flush_rewrite_rules();

		$args = array('version' => $ver, 'time' => time());
		if (!update_option(__CLASS__ . '_flush', $args))
			add_option(__CLASS__ . '_flush', $args);
	}
}







add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
	// Use your post type key instead of 'product'
	if ($post_type === 'page') return false;
	return $current_status;
}






add_action('admin_head', 'hidden_term_description');

function hidden_term_description()
{
	print '<style>

		.term-parent-wrap { display:none; }
		</style>';
}


// создаем новую колонку
add_filter('manage_' . 'wiki' . '_posts_columns', 'add_descr_column', 4);
add_filter('manage_' . 'blog' . '_posts_columns', 'add_descr_column', 4);
function add_descr_column($columns)
{
	$num = 2; // после какой по счету колонки вставлять новые

	$new_columns = array(
		'description' => 'Описание',
		'image' => 'Изображение',
	);

	return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
}
// заполняем колонку данными
add_action('manage_' . 'wiki' . '_posts_custom_column', 'fill_descr_column', 5, 2);
add_action('manage_' . 'blog' . '_posts_custom_column', 'fill_descr_column', 5, 2);
function fill_descr_column($colname, $post_id)
{
	if ($colname === 'description') {
		$descr = get_field('article_data', $post_id)['card_data']['card_description'];
		echo $descr;
	}
}
// заполняем колонку данными
add_action('manage_' . 'wiki' . '_posts_custom_column', 'fill_image_column', 5, 2);
add_action('manage_' . 'blog' . '_posts_custom_column', 'fill_image_column', 5, 2);
function fill_image_column($colname, $post_id)
{
	if ($colname === 'image') {
		$image = get_field('article_data', $post_id)['card_data']['card_image']['url'];
		echo '<img src=' . $image . ' style="width: 50px;">';
	}
}


add_filter('manage_' . 'doc_item' . '_posts_columns', 'add_type_column', 4);
function add_type_column($columns)
{
	$num = 2; // после какой по счету колонки вставлять новые

	$new_columns = array(
		'doc_type' => 'Тип документа',
	);

	return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
}

add_action('manage_' . 'doc_item' . '_posts_custom_column', 'fill_doc_type_column', 5, 2);
function fill_doc_type_column($colname, $post_id)
{
	if ($colname === 'doc_type') {
		foreach (get_the_terms($post_id, 'doc_type') as $key => $tax_item) {
			echo '<p>' . $tax_item->name . '</p>';
		}
	}
}


add_filter('manage_' . 'client' . '_posts_columns', 'add_client_logo_column', 4);
function add_client_logo_column($columns)
{
	$num = 2; // после какой по счету колонки вставлять новые

	$new_columns = array(
		'client_logo' => 'Логотип клиента',
		'client_link' => 'Ссылка'
	);

	return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
}

add_action('manage_' . 'client' . '_posts_custom_column', 'fill_client_logo_column', 5, 2);
function fill_client_logo_column($colname, $post_id)
{
	if ($colname === 'client_logo') {
		$image = get_field('client_item')['client_logo']['url'];
		echo '<img src=' . $image . ' style="width: auto; height: 50px;">';
	} else if ($colname === 'client_link') {
		echo '<p>' . get_field('client_item')['client_link'] . '</p>';
	}
}





add_filter('manage_' . 'atlas_item' . '_posts_columns', 'add_atlas_item_column', 4);
function add_atlas_item_column($columns)
{
	$num = 2; // после какой по счету колонки вставлять новые

	$new_columns = array(
		'atlas_img' => 'Изображение',
		'atlas_country' => 'Страна',
		'atlas_gem_type' => 'Тип камня',
		'atlas_enhancement' => 'Облагораживание'
	);

	return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
}

add_action('manage_' . 'atlas_item' . '_posts_custom_column', 'fill_atlas_item_column', 5, 2);
function fill_atlas_item_column($colname, $post_id)
{
	if ($colname === 'atlas_img') {
		if (get_field('atlas_item')['atlas_img']) {
			$image = get_field('atlas_item')['atlas_img']['url'];
			echo '<img src=' . $image . ' style="width: auto; height: 50px;">';
		}
	} else if ($colname === 'atlas_country') {
		if (get_the_terms($post_id, 'atlas_country')) {
			foreach (get_the_terms($post_id, 'atlas_country') as $key => $tax_item) {
				echo '<p>' . $tax_item->name . '</p>';
			}
		}
	} else if ($colname === 'atlas_gem_type') {
		if (get_the_terms($post_id, 'atlas_gem_type')) {
			foreach (get_the_terms($post_id, 'atlas_gem_type') as $key => $tax_item) {
				echo '<p>' . $tax_item->name . '</p>';
			}
		}
	} else if ($colname === 'atlas_enhancement') {
		if (get_the_terms($post_id, 'atlas_enhancement')) {
			foreach (get_the_terms($post_id, 'atlas_enhancement') as $key => $tax_item) {
				echo '<p>' . $tax_item->name . '</p>';
			}
		}
	}
}






## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
	return preg_replace('~^[^:]+: ~', '', $title);
});


function get_number($key)
{
	$key = $key + 1;
	if ($key < 10) {
		$key = '0' . $key;
	}
	echo $key;
}



function wpcourses_breadcrumb( $sep = ' > ' ) {
	global $post;
	$out = '';
	$out .= '<div class="wpcourses-breadcrumbs">';
	$out .= '<a href="' . home_url( '/' ) . '">Главная</a>';
	$out .= '<span class="wpcourses-breadcrumbs-sep">' . $sep . '</span>';
	if ( is_page() ) {
		$out .= '123';
	}
	if ( is_single() ) {
		$terms = get_the_terms( $post, 'category' );
		if ( is_array( $terms ) && $terms !== array() ) {
			$out .= '<a href="' . get_term_link( $terms[0] ) . '">' . $terms[0]->name . '</a>';
			$out .= '<span class="wpcourses-breadcrumbs-sep">' . $sep . '</span>';
		}
	}
	if ( is_singular() ) {
		$out .= '<span class="wpcourses-breadcrumbs-last">' . get_the_title() . '</span>';
	}
	$out .= '</div>';
	return $out;
}


function get_format_number($num) {
	$num = $num + 1;

	if($num < 10) {
		echo '0' . $num;
	} else {
		echo $num;
	}
}

// Функция возврата последнего слова
function get_aqua_title($str)
{
	$block_title = $str;
	$arr = explode(' ', $block_title);
	$last = $arr[count($arr) - 1];
	$txt = '';

	if (count($arr) > 1) {
		foreach ($arr as $key => $value) {
			if ($value != $last) {
				$txt = $txt . $value . ' ';
			}
		}

		echo $txt . '<span class="aqua_bgr">' . $last . '</span>';
	} else {
		echo $str;
	}
}


// Форматирование телефонного номера
function get_phone_link($phone)
{
	$tel = $phone;
	$replace = array('-', ' ', '+', '(', ')');
	$tel = str_replace($replace, '', $tel);

	echo $tel;
}


function get_image_width($width)
{
	$str = 'width: ' . $width / 10 . 'em;';

	echo $str;
}











add_action('wp_ajax_myfilter', 'true_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'true_filter_function');

function true_filter_function()
{


	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	if (!isset($_POST['atlas_country']) && !isset($_POST['atlas_gem_type']) && !isset($_POST['atlas_enhancement'])) {

		$args = array('post_type' => 'atlas_item', 'posts_per_page' => -1, 'order' => 'ASC');
	} else {

		$args = array(
			'orderby' => 'date',
			'posts_per_page' => 999,
			'paged' => $paged,
			'tax_query' => array(
				'relation' => 'OR'
			)
		);

		foreach ($_POST as $key => $value) {
			if ($key != 'action') {
				$values = array();
				$values = explode(' ', $value);
				$item = array(
					'taxonomy' => $key,
					'type' => 'atlas_item',
					'field' => 'id',
					'terms' => $values
				);
				array_push($args['tax_query'], $item);
			}
		}
	}

	query_posts($args);


	$query = new WP_Query($args);


	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$atlas_item = get_field('atlas_item');
			get_template_part('templates/atlas_card_item', get_post_type(), $atlas_item);
		}
	} else {
		echo 'Ничего не найдено';
	}
	$total_pages = $query->max_num_pages;
	$current_page = max(1, get_query_var('paged'));
	// echo '<div class="pagination">';
	// echo paginate_links(array(
	// 	'base' => get_pagenum_link(1) . '%_%',
	// 	'format' => '/page/%#%',
	// 	'current' => $current_page,
	// 	'total' => $total_pages,
	// 	'prev_text'    => __('« prev'),
	// 	'next_text'    => __('next »'),
	// ));
	//
	// echo '</div>';


	die();
}



add_action('wp_footer', 'mycustom_wp_footer');

function mycustom_wp_footer()
{
?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			var wpcf7Elm = document.querySelector('.wpcf7');

			if (wpcf7Elm) {
				wpcf7Elm.addEventListener('wpcf7submit', function(event) {
					$('.feedback_content_inner').remove();
					$('.form_sent').css('display', 'block');
				}, false);
			}
		});
	</script>
<?php
}


/* Удаление пунктов меню в админке */
function remove_admin_submenu_items()
{
	if (is_admin()) {
		// remove_menu_page('edit.php');
	} else {
		// remove_menu_page('edit.php');
		// remove_menu_page( 'link-manager.php' );
		// remove_menu_page( 'edit-comments.php' );
		// remove_menu_page( 'themes.php' );
		// remove_menu_page( 'plugins.php' );
		// remove_menu_page( 'users.php' );
		// remove_menu_page( 'tools.php' );
		// remove_menu_page( 'options-general.php' );
	}
}
add_action('admin_menu', 'remove_admin_submenu_items');


add_action('template_redirect', 'disable_author_page');

function disable_author_page()
{
	// global $wp_query;

	if (is_author()) {
		wp_redirect(get_option('home'), 301);
		exit;
	}
}


add_action('template_redirect', 'disable_custom_page');

function disable_custom_page()
{
	// global $wp_query;

	if (get_post_type() == 'client') {
		wp_redirect(get_option('home'), 301);
		exit;
	}
	if (get_post_type() == 'service_item') {
		wp_redirect(get_option('home'), 301);
		exit;
	}
	if (get_post_type() == 'faq_item') {
		wp_redirect(get_option('home'), 301);
		exit;
	}
}



function my_site_custom_languages_selector_template () {
  if (function_exists('wpm_language_switcher')) {
    $languages = wpm_get_languages();
    $current = wpm_get_language();

    $out = '<ul class="sub-menu sub-lang_menu">';

    foreach ($languages as $code => $language) {
      $toggle_url = esc_url(wpm_translate_current_url($code));
      $css_classes = 'lang_link ';

      if ($code === $current) {
		$active = 'active';
      } else {
		$active = '';
	  }

      $out .= '<li class="menu-item '. $active .'"><a href="' . $toggle_url . '" class="' . $css_classes . '" data-lang="' . esc_attr($code) . '">';
      $out .= $language['name'];
      $out .= '</a></li>';
    }

    $out .= '</ul>';

    return $out;
  }
}







?>